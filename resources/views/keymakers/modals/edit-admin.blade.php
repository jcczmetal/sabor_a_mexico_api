<div class="modal fade" id="editadmin-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="editadmin-form">
            @csrf
            @method('PUT')

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Editar un administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <input id="editadmin_id" name="editadmin_id" type="hidden">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="editadmin_firstname" id="editadmin_firstname" class="form-control">

                                <div class="invalid-feedback" id="editadmin_firstname_error"></div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Apellido (solo el primero)</label>
                                <input type="text" name="editadmin_lastname" id="editadmin_lastname" class="form-control">

                                <div class="invalid-feedback" id="editadmin_lastname_error"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" name="editadmin_email" id="editadmin_email" class="form-control">
                        <div class="invalid-feedback" id="editadmin_email_error">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Perfil</label>
                        <select class="form-control" name="editadmin_profile" id="editadmin_profile">
                            <option value="admin">Administrador interno</option>
                            <option value="associate">Asociado restaurantero</option>
                        </select>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="editadmin_active" id="editadmin_active">
                        <label class="form-check-label">
                            Activar perfil
                        </label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="dismissModal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
