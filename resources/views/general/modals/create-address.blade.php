<div class="modal fade" id="createAddressModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <form id="createrestaurant-form">
            @csrf

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Registrar dirección a restaurante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">

                        </div>

                        <div class="col-6">
                        	    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    							<div id="map"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar restaurante</button>
                </div>
            </form>
        </div>
    </div>
</div>

