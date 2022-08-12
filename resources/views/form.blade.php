@extends('layout.common-layout')
@section('content')
<h1 class="text-center text-dark mt-4">Student Registration Form</h1>
<form action="{{ url('/register') }}" class="col-9 mx-auto" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
        @error('name')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
        @error('email')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input value="" type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
        @error('password')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input value="" type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="" aria-describedby="helpId">
        @error('password_confirmation')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </div>
    <div><button class="btn btn-primary">Submit</button></div>
</form>
@endsection
