@extends('layouts.app')

@section('title')
<title>EXUM Admin Login</title>
@endsection
@section('style')

@endsection
@section('content')
<div class="container">
    <h1 class="text-center mt-2">EXUM ADMIN LOGIN</h1>
    <div class="d-flex justify-content-center">
        <div class="card w-100 w-sm-75 bg-warning" style="max-width: 600px;">
            <div class="card-body">
              <form action="{{ route('post-login-admin') }}" method="POST">
                @csrf
                    <div style="height: 83px" class="form-group">
                        <label for="exampleInputEmail1"><i class="fa-solid fa-envelope"></i> Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}" aria-describedby="emailHelp">
                        @foreach ($errors->get('email') as $error)
                            <div id="emailHelp" class="form-text text-danger">{{ $error }}</div>
                        @endforeach
                        {{-- @if($errors->has('no_user'))
                        <small id="emailHelp" class="form-text text-danger sss">{{ $errors->get('no_user')[0] }}</small>
                        @endif --}}
                        {{-- ini sama kayak if $errors has no_user --}}
                        
                        {{-- @error('email')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror --}}
                    </div>
                    <div style="height: 64px" class="form-group">
                        <label for="exampleInputPassword1"><i class="fa-solid fa-key"></i> Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        @error('password')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        {{-- ini kalo pakek with --}}
                        {{-- @if(session('wrong_pw'))
                        <small id="emailHelp" class="form-text text-danger sss">{{ session('wrong_pw') }}</small>
                        @endif --}}
                        @error('wrong')
                        <small id="emailHelp" class="form-text text-danger sss">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-success mt-4">Login</button>
                
                
            </form>
            </div>
          </div>
    </div>
</div>

@endsection
@section('script')

@endsection
