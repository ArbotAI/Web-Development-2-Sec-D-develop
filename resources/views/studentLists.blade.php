@extends('base')
@section('title', 'Student Lists')

<div>
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><strong>Student Lists</strong></h4>
                        <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#createNewStd">Create New Student</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $std)
                                <tr>
                                    <td>{{ $std->id }}</td>
                                    <td>{{ $std->name }}</td>
                                    <td>{{ $std->age }}</td>
                                    <td>{{ $std->gender }}</td>
                                    <td>
                                        <a href="{{ route('std.edit', $std->id) }}" class="btn" style="color: blue;">Edit</a>
                                        <a href="{{ route('std.delete', $std->id) }}" class="btn" style="color: red;">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Student -->
    <div class="modal fade" id="createNewStd" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" action="{{ route('std.create') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Student</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="stdName" required>
                        </div>
                        <div class="mb-3">
                            <label>Age</label>
                            <input type="number" class="form-control" name="stdAge" required>
                        </div>
                        <div class="mb-3">
                            <label>Gender</label>
                            <input type="text" class="form-control" name="stdGender">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
