@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-3">
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

            <div class="col-md-3">
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
           
        </div>
    </div>

@endsection