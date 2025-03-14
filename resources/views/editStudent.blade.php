@extends('base')
@section('title', 'Edit Student')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Student</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('std.update', $student->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="stdName" value="{{ $student->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Age</label>
                            <input type="number" class="form-control" name="stdAge" value="{{ $student->age }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Gender</label>
                            <input type="text" class="form-control" name="stdGender" value="{{ $student->gender }}">
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('std.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

