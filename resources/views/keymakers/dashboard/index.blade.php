@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Administradores totales
                    </div>
                    
                    <div class="card-body">
                        <h3 class="card-title">{{ $admins }}</h3>
                        <p class="card-text">Haz click para registrar un administrador</p>
                        <a href="#" class="btn btn-primary">Registrar administrador</a>
                    </div>                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Asociados totales
                    </div>
                    
                    <div class="card-body">
                        <h3 class="card-title">{{ $associates }}</h3>
                        <p class="card-text">Haz click para registrar un asociado</p>
                        <a href="#" class="btn btn-primary">Registrar asociado</a>
                    </div>                    
                </div>
            </div>
        </div>

        <div class="row">
           
        </div>
    </div>

@endsection