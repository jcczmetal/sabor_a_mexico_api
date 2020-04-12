@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                	Restaurantes activos
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

    <div class="row">
        <div class="col-md-12 mt-4">
        	<div class="card text-center">
  				<div class="card-header">
    				Lista de restaurantes
  				</div>

  				<div class="card-body">
    				<table id="table_id" class="display">
            	<thead>
            	    <tr>
            	        <th>Restaurante</th>
            	        <th>Teléfono</th>
            	        <th>Correo</th>
            	        <th>Acciones</th>
            	    </tr>
            	</thead>

                <tbody>
                	@foreach($restaurants as $restaurant)
                        <tr>
                            <td>{{ $restaurant->name }}</td>
                            <td>{{ $restaurant->phone }}</td>
                            <td>{{ $restaurant->email }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                        Acciones
                                    </button>
                                    	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        		<a  class="dropdown-item" href="#">Cambiar status</a>
                                        		<a  class="dropdown-item" href="{{ route('mg-show-restaurant', $restaurant->slug) }}">
                                        			Ver detalles
                                        		</a>
                                    		</div>
                                		</div>
                            		</td>
                        		</tr>
                    		@endforeach
                		</tbody>
            		</table>
  				</div>

  				<div class="card-footer text-muted">
    				2 days ago
  				</div>
			</div>
        </div>
    </div>
</div>



@endsection
