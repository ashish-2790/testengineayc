@extends('layouts.app')

@section('content')
    <link href="https://unpkg.com/@webpixels/css@1.2.6/dist/index.css" rel="stylesheet">
    <nav class="navbar bg-danger pt-1 pb-1 shadow">
        <div class="container-fluid">
            <a href="#" class="navbar-brand"><img
                        src="https://iqwing.s3.ap-south-1.amazonaws.com/cms/results/2024-03/1710771814888.png"
                        class="img-fluid h-18"></a>
        </div>
    </nav>
    <div class="container-fluid bg-gray-100 pt-5 pb-16 p-md-24">
        <div class="row mb-0">
            <div class="col-md-6 d-none d-md-block">
                <img src="https://iqwing.s3.ap-south-1.amazonaws.com/cms/results/2024-03/1710565835083.webp" alt="Image" class="img-fluid animate__animated animate__bounce w-full animated-image">
            </div>
            <div class="col-md-6 pt-14">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-12 pt-14">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-base font-bold mb-2"
                                           for="email">
                                        {{ __('global.login_email') }}
                                    </label>
                                    <input id="email" name="email" type="email"
                                           class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('email') ? ' ring ring-red-300' : '' }}"
                                           placeholder="{{ __('global.login_email') }}" required autocomplete="email"
                                           autofocus value="{{ old('email') }}"/>
                                    @error('email')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                    @enderror
                                </div>
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-base font-bold mb-2"
                                           for="password">
                                        {{ __('global.login_password') }}
                                    </label>
                                    <input id="password" name="password" type="password"
                                           class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('password') ? ' ring ring-red-300' : '' }}"
                                           placeholder="{{ __('global.login_password') }}" required
                                           autocomplete="current-password"/>
                                    @error('password')
                                    <span class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="inline-flex items-center cursor-pointer"><input id="remember"
                                                                                                  name="remember"
                                                                                                  type="checkbox"
                                                                                                  class="form-checkbox border border-primary rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" {{ old('remember') ? 'checked' : '' }} />
                                        <span class="ml-2 text-base font-semibold text-blueGray-600">
                                        {{ __('global.remember_me') }}
                                    </span>
                                    </label>
                                </div>
                                <div class=" mt-6">
                                    <button class="bg-danger text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        {{ __('global.login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <div class="flex flex-wrap mt-6">
                                <div class="w-1/2">
                                    @if(Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-blue-600 text-base">
                                            <small>{{ __('global.forgot_password') }}</small>
                                        </a>
                                    @endif
                                </div>
                                <div class="w-1/2 text-right">
                                    @if(Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-blue-600 text-base">
                                            <small>{{ __('global.register') }}</small>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-blue-100">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-md-between pt-4 pb-4 m-0">
                <div class="col-md-12">
                    <div class="copyright text-sm text-center  text-dark">
                        Powered by <a href="#" class="h6 text-sm font-bold text-dark">IQwing</a>.
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection