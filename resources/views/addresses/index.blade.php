@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card text-center">
                <div class="card-header">
                	Direcciones
                </div>

                <div class="card-body">
                    <h2 class="card-title">{{ $restaurants->count() }}</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createRestaurantModal">
                        Crear resturante
                    </button>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
