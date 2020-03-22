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
                        <h2 class="card-title">{{ $admins }}</h2>
                        <p class="card-text">Ir al panel de administradores.</p>
                        <a href="{{ route('index-administrators') }}" class="btn btn-primary">Ver administradores</a>
                    </div>                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Asociados totales
                    </div>
                    
                    <div class="card-body">
                        <h2 class="card-title">{{ $associates }}</h2>
                        <p class="card-text">Ir al panel de asociados.</p>
                        <a href="{{ route('index-associate') }}" class="btn btn-primary">Registrar asociado</a>
                    </div>                    
                </div>
            </div>
        </div>

        <div class="row">
           
        </div>
    </div>

@endsection