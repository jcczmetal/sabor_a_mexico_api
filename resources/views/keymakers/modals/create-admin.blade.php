<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="createAdmin">
            @csrf

            <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title">Registrar un nuevo administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="firstNameNewAdmin" id="firstNameNewAdmin" class="form-control">
                                
                                <div class="invalid-feedback">
                                    El primer nombre es incorrecto.
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Apellido (solo el primero)</label>
                                <input type="text" name="lastNameNewAdmin" id="lastNameNewAdmin" class="form-control">
                                
                                <div class="invalid-feedback">
                                    El segundo nombre es incorrecto.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" name="emailNewAdmin" id="emailNewAdmin" class="form-control">
                        <div class="invalid-feedback">
                            El correo electrónico es incorrecto o ya existe.
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="profileNewAdmin[]" type="checkbox" value="something" id="admin-checkbox">
                            <label class="form-check-label">
                                Administrador
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="profileNewAdmin[]" type="checkbox" value="else" id="associate-checkbox">
                            <label class="form-check-label">
                                Restaurantero
                            </label>

                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <label>Contraseña provisional</label>
                        <input type="password" class="form-control" name="passwordNewAdmin" id="passwordNewAdmin">
                        <div class="invalid-feedback">
                            La contraseña es incorrecta. Mínimo 10 caracteres.
                        </div>
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