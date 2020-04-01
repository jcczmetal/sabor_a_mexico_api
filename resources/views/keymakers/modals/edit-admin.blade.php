<div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="editAdmin">
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

                    <input id="edit_admin_id" name="edit_admin_id" type="hidden">
                
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="edit_first_name" id="edit_first_name" class="form-control">
                        <div class="invalid-feedback" id="edit_first_name_error">
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Apellido (solo el primero)</label>
                        <input type="text" name="edit_last_name" id="edit_last_name" class="form-control">
                        <div class="invalid-feedback" id="edit_last_name_error">
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" name="edit_email" id="edit_email" class="form-control">
                        <div class="invalid-feedback" id="edit_email_error">
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Perfil</label>
                        <select class="form-control" name="edit_profile" id="edit_profile">
                            <option value="admin">Administrador interno</option>
                            <option value="associate">Asociado restaurantero</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Contraseña provisional</label>
                        <input type="password" class="form-control" name="edit_password" id="edit_password">
                        <div class="invalid-feedback">
                            La contraseña es incorrecta. Mínimo 10 caracteres.
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edit_active" id="active">
                        <label class="form-check-label" for="defaultCheck1">
                            Activar perfil
                        </label>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="dismiss-modal-edit">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>