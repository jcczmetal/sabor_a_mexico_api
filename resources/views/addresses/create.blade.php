@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row mb-4">
		<div class="col-12">
            <div class="card text-center">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8 text-left">
                            Registrar una nueva dirección.
                        </div>
                        <div class="col-4 text-right">
                            <a type="button" class="btn btn-primary btn-sm" href="#">Regresar</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Instrucciones</h5>
                </div>
            </div>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12">
			<div class="card text-center">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8 text-left">
                            Formulario
                        </div>
                        <div class="col-4 text-right">
                            <a type="button" class="btn btn-primary btn-sm" href="#">Registrar</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-left">

                        </div>
                        <div class="col-6 text-right">
                        	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
    						<div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
