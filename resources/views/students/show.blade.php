@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Details</h1>
    
    <div class="card">
        <div class="card-header">
            <h2>{{ $student->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Phone:</strong> {{ $student->phone }}</p>
            <p><strong>Address:</strong> {{ $student->address }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
            </form>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
