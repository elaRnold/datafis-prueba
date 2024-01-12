@extends('layouts.app')

@section('content')
    <div class="mt-5 row justify-content-center">
        <div class="col-md-5">

            <div class="card">
                <div class="card-header h3">{{ __('Editar Tarea') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tareas.edit.send') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $tarea->id }}">

                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end"><strong>{{ __('Nombre') }}</strong>:</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control border border-primary @error('nombre') is-invalid @enderror"
                                    name="name" value="{{ $tarea->name }}" autocomplete required autofocus
                                    maxlength="60">

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mx-auto" style="width: 14rem">
                            <div class="col-sm">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
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
