<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Registrar un nuevo administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form >
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="nameNewAdmin" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Apellido (solo el primero)</label>
                        <input type="text" id="lastNameNewAdmin" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="emailNewAdmin" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>Perfil</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Administrador interno</option>
                            <option>Asociado restaurantero</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña provisional</label>
                        <input type="passwordNewAdmin" class="form-control">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Activar perfil
                        </label>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>