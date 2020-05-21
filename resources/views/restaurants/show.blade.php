@extends('layouts.app')

@section('content')

<div class="container">

	{{-- 2 cards--}}
	<div class="row mb-4">
		<div class="col-4">
			<div class="card">
  				<div class="card-header">
    				{{ $restaurant->name }}
  				</div>

  				<div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p class="card-text">web: {{ $restaurant->website }}</p>
                        </div>
                        <div class="col-12">
                            <p class="card-text">email: {{ $restaurant->email }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a type="button" class="btn btn-primary btn-sm" href="#">Editar</a>
                        </div>
                    </div>
  				</div>
			</div>
		</div>

        <div class=" col-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            Sucursales
                        </div>
                        <div class="col-4 text-right">

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>{{ $restaurant->addresses_count }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a type="button" class="btn btn-primary btn-sm" href="{{ route('mg-index-address', $restaurant->slug) }}">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-4">
            <div class="card">
                <div class="card-header">
                    Administración
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

	<div class="row mb-4">

	</div>
</div>

@include('general.modals.create-address')


@endsection
