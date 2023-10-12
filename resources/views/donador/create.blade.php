<div class="modal fade" id="createDonador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fca424  !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    FORMULARIO NUEVO DONADOR
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('donador.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Nombre del donador</label>
                            <input type="text" name="nombre_donador" class="form-control"
                                placeholder="Ingresar el nombre completo del donador" required="true">
                        </div>
                    </div>
                    <h5 class="modal-title bg-info text-white col-md-7">DATOS OPCIONALES</h5>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Organizacion</label>
                            <input type="text" name="organizacion" class="form-control"
                                placeholder="Nombre de la organización">
                        </div>
                        <div class="form-group col-md">
                            <label>Telefono</label>
                            <input type="text" name="telefono_donador" class="form-control"
                                placeholder="Numero de contacto">
                        </div>
                    </div>

                    <h5 class="modal-title bg-warning text-white">DATOS DE LA DONACION</h5>
                   
                        <div class="form-row ">
                            <label>Tipo de donacion</label>
                            <select class="form-control" name="tipo_donacion" id="tipo_donacion"
                                class="form-control rounded-pill">
                                <option>Viveres</option>
                                <option>Medicamento</option>
                                <option>Prendas</option>
                                <option>Voluntariado</option>
                                <option>Monetaria</option>
                                <option>Otras</option>
                            </select>
                        </div>
                        <div class="form-row ">
                            <label>Descripcion</label>
                            <textarea class="form-control" name="descripcion" rows="5"
                                placeholder="Descripción general de la donación" required="true"></textarea>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Añadir Donador</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
