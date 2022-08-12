@extends('layout.common-layout')
@section('content')
<h1 class="text-center text-dark mt-4">Login</h1>


<form action="{{ url('/login') }}" class="col-9 mx-auto" method="POST">
@if(Session::has('error'))
    <p class="text-danger">{{ Session::get('error') }}</p>
@endif
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input value="" type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
        @error('password')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </div>
    <div><button class="btn btn-primary">Login</button></div>
</form>
@endsection
