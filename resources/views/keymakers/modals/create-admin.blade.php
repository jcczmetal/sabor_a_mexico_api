<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
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
                
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Apellido (solo el primero)</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>Perfil</label>
                        <select class="form-control" name="profile">
                            <option value="admin">Administrador interno</option>
                            <option value="associate">Asociado restaurantero</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña provisional</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="active">
                        <label class="form-check-label" for="defaultCheck1">
                            Activar perfil
                        </label>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>