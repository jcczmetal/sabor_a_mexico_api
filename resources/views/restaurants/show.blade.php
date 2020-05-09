@extends('layouts.app')

@section('content')

<div class="container">

	{{-- 2 cards--}}
	<div class="row mb-4">
		<div class="col-12">
			<div class="card">
  				<div class="card-header">
    				<div class="row">
    					<div class="col-6">
    						Información básica.
    					</div>
    					<div class="col-6 text-right">
    						<a href="#">Editar</a>
    					</div>
    				</div>
  				</div>

  				<div class="card-body">
  					<div class="row text-center">
    					<div class="col-6">
    						<h4 class="text-left">{{ $restaurant->name }}</h4>
    					</div>
    				</div>

    				<div class="row text-center">
    					<div class="col-4">
    						<p class="card-text">web: {{ $restaurant->website }}</p>
    					</div>

    					<div class="col-4">
    						<p class="card-text">email: {{ $restaurant->email }}</p>
    					</div>

    					<div class="col-4">
    						<p class="card-text">phone: {{ $restaurant->phone }}</p>
    					</div>
    				</div>
  				</div>
			</div>
		</div>
	</div>

	<div class="row mb-4">
		<div class=" col-6">
			<div class="card">
  				<div class="card-header">
    				<div class="row">
    					<div class="col-6">
    						Direcciones.
    					</div>
    					<div class="col-6 text-right">
    						<a href="#" data-toggle="modal" data-target="#createAddressModal">Añadir una dirección</a>
							<!-- <button type="button" class="btn btn-primary btn-sm">Small button</button> -->
    					</div>
    				</div>
  				</div>

  				<div class="card-body">
    				<table id="table_id" class="display">
            	    	<thead>
            	        	<tr>
            	           		<th>Dirección</th>
            	               	<th>Dirección</th>
            	               	<th>Acciones</th>
            	           	</tr>
            	        </thead>
                        <tbody>

                            <tr>
                            	<td></td>
                                <td></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                            <svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  												<path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd"/>
											</svg>
                                        </button>
                                    	   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        		<a  class="dropdown-item" href="#">Editar</a>
                                        		<a  class="dropdown-item" href="#">
                                        			Ver detalles
                                        		</a>
                                    		</div>
                                	</div>
                            	</td>
                        	</tr>

                		</tbody>
            		</table>
  				</div>
			</div>
		</div>
	</div>
</div>

@include('general.modals.create-address')


@endsection
