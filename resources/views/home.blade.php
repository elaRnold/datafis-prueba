@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-5">
                @if (Session::has('delete'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('delete') }}</p>
                @endif

                @if (Session::has('update'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('update') }}</p>
                @endif

                <div class="card">

                    <div class="card-header h2">{{ __('Tareas pendientes') }}</div>


                    <div class="card-body">

                        <div class="row justify-content-end mb-3">
                            <a style="width: 6rem" href="{{ route('tareas.add.view') }}" type="button"
                                class="col-2 btn btn-success btn-rounded">
                                Agregar <i class="fa fa-plus fa-1x" aria-hidden="true"></i></a>
                        </div>

                        @if ($tareasItems->count() > 0)
                            <div class="tbodyDiv">
                                <table class="table table-hover">
                                    <thead class="sticky-top bg-white">
                                        <tr>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Fecha Creación</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            {{-- <th scope="col">Eliminar</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($tareasItems as $tareas)
                                            <tr>
                                                <td>{{ $tareas->name }}</td>
                                                <td>{{ $tareas->created_at }}</td>
                                                <td><a href="{{ route('tareas.delete', $tareas->id) }}"
                                                        class="btn btn-danger btn-rounded">Eliminar</a></td>
                                                <td><a href="{{ route('tareas.edit.view', $tareas->id) }}"
                                                        class="btn btn-info btn-rounded">Editar</a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h5 class="alert alert-success">No tienes tareas creadas todavía 😊.</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
