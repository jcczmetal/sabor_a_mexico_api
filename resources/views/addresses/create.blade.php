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
                                            <label for="exampleInputEmail1">Escribe el nombre de la sucursal para buscar su ubicación en el mapa</label>
                                            <input id="addressComplete" class="form-control" type="text" placeholder="Escribe una nueva dirección">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <label>Verifica que los datos sean correctos y guarda la nueva sucursal.</label>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="createaddress-form">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="text" id="slug" name="slug" value="{{ $restaurant->slug }}" hidden>
                                                            <input id="branch_name" name="branch_name" class="form-control" type="text" placeholder="Nombre de sucursal" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input id="street" name="street" class="form-control" type="text" placeholder="Calle" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <input id="number" name="number" class="form-control" type="text" placeholder="#" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <input id="city" name="city" class="form-control" type="text" placeholder="Ciudad" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <input id="state" name="state" class="form-control" type="text" placeholder="Estado" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Por favor, añade el teléfono de la sucursal</label>
                                                            <input id="phone" name="phone" class="form-control" type="text" placeholder="Teléfono">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                             <button type="submit" class="btn btn-primary">Guardar sucursal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete"
    async defer>
</script>

<script type="text/javascript" src="/js/mapscode.js"></script>
@endsection



