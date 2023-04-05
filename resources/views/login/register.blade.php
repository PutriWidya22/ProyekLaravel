@extends('login.main')
@section('content')

<div class="d-flex">
    <div class="w-100">
      <h3 class="mb-4">Register</h3>
    </div>
</div>

<form action="/aksiRegister" class="signin-form" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="name" name="name" id="name" class="form-control" autofocus>

        @error('name')
            <span style="color : red;"> {{ $message }}</span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" autofocus>

        @error('email')
            <span style="color : red;"> {{ $message }}</span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" autofocus>

        @error('password')
            <span style="color : red;"> {{ $message }}</span>
        @enderror
    </div>

    <div class="form-group mb-3" hidden>
        <label for="level">Level</label>
        <select name="level" id="level" class="form-control">
            <option value="customer">Customer</option>
        </select>
        @error('level')
            <span style="color : red;"> {{ $message }}</span>
        @enderror
    </div>

    <button class="btn btn-primary">Register</button>
</form>

@endsection