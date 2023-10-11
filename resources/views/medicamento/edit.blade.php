<div class="modal fade" id="editMedicamento{{ $medicamento->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #6c757d !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    EDICION MEDICAMENTO
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('medicamento.update', $medicamento->id) }}"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <h5 class="modal-title bg-secondary col-md-7"> Datos del Medicamento</h5>
                    <input type="text" name="adulto_id" value="{{ $adulto->id }}" required="true"
                        style="visibility:hidden">
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Nombre del medicamento</label>
                            <input type="text" name="nombre_medicamento" class="form-control"
                                value="{{ $medicamento->nombre_medicamento }}"
                                placeholder="Ingresar el nombre del medicamento" required="true">
                        </div>
                    </div>
                    <h6 class="modal-title bg-secondary text-white col-md-6">Detalles de administracion</h6>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Dosis cantidad</label>
                            <input type="text" name="cantidad_medicamento" class="form-control"
                                value="{{ $medicamento->cantidad_medicamento }}" placeholder="Dosis en numeros"
                                required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Dosis medida</label>
                            <select class="form-control" name="medida_medicamento" id="medida_medicamento"
                                class="form-control rounded-pill">
                                <option value="UI">Unidad UI</option>
                                <option value="mg">Miligramos (mg)</option>
                                <option value="ml" >Mililitros (ml)</option>
                                <option value="L" >Litros(L)</option>
                                <option value="Gotas" >Gotas</option>
                                <option value="Cucharadita" >Cucharadita</option>
                                <option value="Cuchara" >Cuchara</option>
                                <option value="mcg" >Microgramos(mcg)</option>
                                <option>Otra</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Via de administracion</label>
                            <select class="form-control" name="via_administracion" id="via_administracion"
                                class="form-control rounded-pill">
                                <option>Vía Oral</option>
                                <option>Vía Intravenosa</option>
                                <option>Vía Rectal</option>
                                <option>Vía Subcutánea</option>
                                <option>Vía Tópica</option>
                                <option>Vía Sublingual</option>
                                <option>Vía Otica</option>oftálmica
                                <option>Vía Oftálmica</option>
                                <option>Otra</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Frecuencia</label>
                            <input type="text" name="frecuencia_tiempo" class="form-control"
                                value="{{ $medicamento->frecuencia_tiempo }}" placeholder="Frecuencia en numeros"
                                required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Tiempo</label>
                            <select class="form-control" name="frecuencia_dia" id="frecuencia_dia"
                                class="form-control rounded-pill">
                                <option value="hrs">Horas</option>
                                <option value="dias">Dias</option>
                            </select>
                        </div>
                    </div>
                    <h6 class="modal-title bg-secondary text-white col-md-6">Tiempo de duracion</h6>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Fecha de inicio</label>
                            <input type="date" name="fecha_inicio" class="form-control"
                                value="{{ $medicamento->fecha_inicio }}" required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Fecha del final</label>
                            <input type="date" name="fecha_fin" class="form-control"
                                value="{{ $medicamento->fecha_fin }}">
                        </div>
                    </div>
                    <div class="form-row ">
                        <label>Notas del medicamento</label>
                        <textarea class="form-control" name="nota_medicamento" rows="10"
                            placeholder="Información adicional sobre el medicamento">{{ $medicamento->nota_medicamento }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
