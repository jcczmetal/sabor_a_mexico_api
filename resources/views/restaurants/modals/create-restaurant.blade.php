<div class="modal fade" id="createRestaurantModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="createrestaurant-form">
            @csrf

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Registrar un nuevo restaurante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nombre del restaurante</label>
                                <input type="text" name="newrestaurant_name" id="newrestaurant_name" class="form-control">
                                <div class="invalid-feedback" id="newrestaurant_name_error"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Página web</label>
                                <input type="text" name="newrestaurant_website" id="newrestaurant_name" class="form-control">
                                <div class="invalid-feedback" id="newrestaurant_name_error"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Correo electrónico</label>
                                <input type="email" name="newrestaurant_email" id="newrestaurant_email" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="email" name="newrestaurant_phone" id="newrestaurant_phone" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="newrestaurant_address" id="newrestaurant_address" class="form-control">
                                <div class="invalid-feedback" id="newrestaurant_name_error"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="dismissModal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar restaurante</button>
                </div>
            </form>
        </div>
    </div>
</div>
