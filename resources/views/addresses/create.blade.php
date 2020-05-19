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
                            <div class="row">
                                <div class="col-12">
                                    <form>
                                        <div class="form-group">
                                            <input id="addressComplete" class="form-control" type="text" placeholder="Escribe una nueva dirección">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form>
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <input id="street" class="form-control" type="text" placeholder="Calle" readonly>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input id="number" class="form-control" type="text" placeholder="#" readonly>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input id="zipcode" class="form-control" type="text" placeholder="CP" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <input id="city" class="form-control" type="text" placeholder="Ciudad" readonly>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <input id="state" class="form-control" type="text" placeholder="Estado" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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

<script type="text/javascript" src="/js/mapscode.js"></script>
@endsection



