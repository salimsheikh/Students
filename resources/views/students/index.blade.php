@extends('layouts.layout')

@section('title', 'Student List')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h2>Student List</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary mb-2">Add New Student</a>
    </div>
        
    <table class="table table-bordered table-striped table-hover table-custom">
        <thead class="table-header">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th class="action">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td class="action">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn-edit"><i class="material-icons">edit</i></a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

     <!-- Pagination Links -->     
    <div class="d-flex justify-content-between align-items-center">
        <!-- Left Side: Display Current Page and Total Pages -->
        <div>
            Page {{ $items->currentPage() }} of {{ $items->lastPage() }} (Total: {{ $items->total() }} items)
        </div>
    
        <!-- Right Side: Display Pagination Links -->
        <div>
            {{ $items->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
