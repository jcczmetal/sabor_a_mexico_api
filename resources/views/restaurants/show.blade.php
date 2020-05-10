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
    						<h5>Información</h5>
    					</div>
    					<div class="col-6 text-right">
    						<a type="button" href="#" class="btn btn-primary btn-sm">Editar</a>
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
		<div class=" col-3">
			<div class="card">
  				<div class="card-header">
    				<div class="row">
    					<div class="col-8">
    						<h5>Direcciones</h5>
    					</div>
    					<div class="col-4 text-right">
							<a type="button" class="btn btn-primary btn-sm" href="{{ route('mg-index-address', $restaurant->slug) }}">Ver</a>
    					</div>
    				</div>
  				</div>

  				<div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">3</h1>
                        </div>
                    </div>
  				</div>
			</div>
		</div>

        <div class=" col-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h5>Fotografías</h5>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-primary btn-sm">Ver</button>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">3</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h5>Comentarios</h5>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-primary btn-sm">Ver</button>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">3</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h5>Administración</h5>
                        </div>
                        <div class="col-3 text-right">
                            <button type="button" class="btn btn-primary btn-sm">Ver</button>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">3</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

    <!--
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Información del restaurante.
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#addresses" role="tab" aria-controls="pills-home" aria-selected="true">Direcciones</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#photos" role="tab" aria-controls="pills-profile" aria-selected="false">Fotografías</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#reviews" role="tab" aria-controls="pills-contact" aria-selected="false">Comentarios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#assignations" role="tab" aria-controls="pills-contact" aria-selected="false">Administración</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="addresses" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row mb-4">
                                <div class="col-12">
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
                                                            <a  class="dropdown-item" href="#">Ver detalles</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                        </ol>

                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="https://picsum.photos/id/1003/200/100" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>First slide label</h5>
                                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <img src="https://picsum.photos/id/101/200/100" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Second slide label</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <img src="https://picsum.photos/id/1025/200/100" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Third slide label</h5>
                                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>

                                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="pills-contact-tab">
                            Contact
                        </div>

                        <div class="tab-pane fade" id="assignations" role="tabpanel" aria-labelledby="pills-contact-tab">
                            Contact
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
</div>

@include('general.modals.create-address')


@endsection
