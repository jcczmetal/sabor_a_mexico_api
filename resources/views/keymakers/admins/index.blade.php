@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Restaurantes registrados
                    </div>
                    
                    <div class="card-body">
                        <h3 class="card-title">5</h3>
                        <p class="card-text">Has click en el botón para registrar un restaurante</p>
                        <a href="#" class="btn btn-primary">Registrar restaurante</a>
                    </div>                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Asociados registrados
                    </div>
                    
                    <div class="card-body">
                        <h3 class="card-title">3</h3>
                        <p class="card-text">Has click en el botón para registrar un asociado</p>
                        <a href="#" class="btn btn-primary">Registrar asociados</a>
                    </div>                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Editar</a>
                                            <a class="dropdown-item" href="#">Asignaciones</a
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection