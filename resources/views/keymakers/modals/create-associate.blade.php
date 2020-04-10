<div class="modal fade" id="createAssociateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="createassociate-form">
            @csrf

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Registrar un nuevo asociado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="newassociate_firstname" id="newassociate_firstname" class="form-control">
                                <div class="invalid-feedback" id="newassociate_firstname_error"></div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Apellido (solo el primero)</label>
                                <input type="text" name="newassociate_lastname" id="newassociate_lastname" class="form-control">
                                <div class="invalid-feedback" id="newassociate_lastname_error"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" name="newassociate_email" id="newassociate_email" class="form-control">
                        <div class="invalid-feedback">
                            El correo electrónico es incorrecto o ya existe.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                            name="newassociate_profile[]" type="checkbox" value="admin" id="admin-checkbox">
                                    <label class="form-check-label">
                                        Administrador
                                    </label>

                                    <div class="invalid-feedback" id="newassociate_profile"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                            name="newadmin_profile[]" type="checkbox" value="associate" id="associate-checkbox">
                                    <label class="form-check-label">
                                        Restaurantero
                                    </label>

                                    <div class="invalid-feedback" id="newadmin_profile"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Contraseña provisional</label>
                        <input type="password" class="form-control" name="newassociate_password" id="newassociate_password">
                        <div class="invalid-feedback" id="newassociate_password_error"></div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="activeNewAdmin" id="activeNewAdmin">
                        <label class="form-check-label" for="defaultCheck1">
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
