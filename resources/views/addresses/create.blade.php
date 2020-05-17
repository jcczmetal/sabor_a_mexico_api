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
                        	<form>
  								<div class="form-group">
  									<input id="pac-input" class="form-control" type="text" placeholder="Search Box">
  								</div>
							</form>
                        </div>
                        <div class="col-6 text-right">
    						<div id="map" style="height: 500px"></div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection

@section('customscripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete" async defer>
    </script>
@endsection



