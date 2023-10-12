<div class="modal fade" id="detallePatologia{{ $contadorPatologia }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #28a745 !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    OBSERVACIONES PATOLOGIA
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="cont_modal">
              
                    
                        <h6 class="modal-title bg-success text-white col-md-6">Observaciones</h6>
                        <textarea class="form-control" name="dificultad_motora" rows="10" placeholder="Notas de dificultades motoras" disabled>{{ $adulto->patologiasDatos[$contadorPatologia]->notas_patologia }} </textarea>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    </div>
            
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Ajustar la altura del textarea en función del contenido
                var textarea = document.getElementById('dificultad_motora');
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });
            });
        </script>