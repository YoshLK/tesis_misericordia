<div class="modal fade" id="createHistorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #17a2b8 !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    FICHA DE MEDIDAS CORPORALES
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('historial.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <h6 class="modal-title bg-info text-white col-md-7">MEDIDAS CORPORALES</h6>
                    <input type="text" name="adulto_id" value="{{ $adulto->id }}" required="true"
                        style="visibility:hidden">
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Peso Kilogramos (kg)</label>
                            <input step="any" name="peso" class="form-control"
                                placeholder="Ingresar el peso del adulto mayor" step="any" required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Altura en metros (mts)</label>
                            <input type="number" name="altura" class="form-control"
                                placeholder="Ingresar la altura del adulto mayor" step="any" required="true">
                        </div>
                    </div>
                    <h6 class="modal-title bg-info text-white col-md-6">TALLAS DE VESTIMENTA</h6>
                    <div class="form-row ">
                        <label>Talla de Camisa/Sweater</label>
                        <select class="form-control" name="tronco" id="tronco" class="form-control rounded-pill">
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                        </select>
                    </div>
                    <div class="form-row ">
                        <label>Pantalon</label>
                        <input type="number" name="piernas" class="form-control"
                            placeholder="Ingresar la talla de pantalon" required="true">
                    </div>
                    <div class="form-row ">
                        <label>Calzado</label>
                        <input type="number" name="calzado" class="form-control"
                            placeholder="Ingresar la talla de calzado" required="true">
                    </div>
               
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Añadir Ficha Corporal</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
