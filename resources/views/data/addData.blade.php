@extends('layouts.app')

@section('content')
    <div class="mt-5 row justify-content-center">
        <div class="col-md-5">

            @if (Session::has('create'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('create') }}</p>
            @endif

            <div class="card">
                <div class="card-header h3">{{ __('Agregar Tarea') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tareas.add.send') }}">
                        @csrf

                        <input type="hidden" name="userID" value="{{ Auth::user()->id }}">

                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end"><strong>{{ __('Nombre') }}</strong>:</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control border border-primary @error('nombre') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus maxlength="60">

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>{{-- 

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}:</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control border border-primary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}:</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control border border-primary @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}:</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control border border-primary" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div> --}}

                        <div class="row mx-auto" style="width: 14rem">
                            <div class="col-sm">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                            <div class="col-sm">
                                <a href="{{ route('home') }}" class="btn btn-secondary"> Regresar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
