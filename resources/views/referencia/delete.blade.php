  <div class="modal fade" id="deleteReferencia{{ $referencia->id }}" tabindex="-1" role="dialog"
      aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #563d7c !important;">
                  <h4 class="modal-title text-center" style="color: #fff; text-align: center;">
                      @if ($referencia->primer_nombre == 'Yosh')
                          <span>¿Realmente deseas eliminar al Niño ? </span>
                      @else
                          <span><span>¿Realmente deseas eliminar ala Niña ?</span>
                      @endif
                  </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>

              </div>

              <div class="modal-body mt-5 text-center">
                  <strong style="text-align: center !important">

                      {{ $referencia->name }}

                  </strong>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <a class="btn btn-danger" href="{{ route('referencia.destroy', $referencia->id) }}">Borrar</a>
              </div>

          </div>
      </div>
  </div>

