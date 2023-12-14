<!-- resources/views/users/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create User</h2>

        <!-- User creation form -->
        <form action="{{ route('users.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Create User</button>
        </form>
    </div>
@endsection
