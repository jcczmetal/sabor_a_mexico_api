@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row mb-4">
		<div class="col-12">
			<div class="card text-center">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8 text-left">
                            Direcciones
                        </div>

                        <div class="col-4 text-right">
                            <a type="button" class="btn btn-primary btn-sm" href="{{ route('mg-create-address', $slug) }}">Registrar dirección</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                </div>
            </div>
		</div>
	</div>

    <div class="row mb-4">
        @foreach($addresses as $address)
        <div class="col-4">
            <div class="card text-center">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8 text-left">
                            Sucursal: {{ $address->branch }}
                        </div>
                        <div class="col-4 text-right">
                            <a type="button" class="btn btn-primary btn-sm" href="{{ route('mg-show-address', $address->slug) }}">Ver</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h6>{{ $address->CompleteAddress }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
