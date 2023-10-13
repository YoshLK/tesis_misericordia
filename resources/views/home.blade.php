@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Dashboard Content</h3>



                            <p>Dashbord ... En Proceso</p>

    <div class="row px-5 mt-2">
        <div class="col-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $conteoActivo }}
                    <p>Adultos Activos</p></h3>
                </div>
                <div>
                    <i class="fas fa-user-check"></i>
                </div>
                <a href="adulto" class="small-box-footer">
                    Ver <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $conteoInactivos }}
                    <p>Adultos Egresados</p></h3>
                </div>
                <div class="icon">
                    <i class="fas fa-user-times"></i>
                </div>
                <a href="adulto/inactivo" class="small-box-footer">
                    Ver <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-6">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-birthday-cake px-5"></i></span>
                <div class="info-box-content">
                    <h3>Proximos Cumpleaños</h3>
                    @foreach ($cumplesAdultos as $cumpleAdulto)
                        <h5 class="px-4">
                            <li class="list-style-type: decimal-leading-zero">{{ $cumpleAdulto->primer_nombre }}
                                {{ $cumpleAdulto->segundo_nombre }}
                                {{ $cumpleAdulto->primer_apellido }}
                                {{ $cumpleAdulto->segundo_apellido }} - {{ $cumpleAdulto->fecha_nacimiento }}</li>
                    @endforeach
                    @foreach ($cumplesPersonals as $cumplePersonal)
                        <li>{{ $cumplePersonal->primer_nombre }} {{ $cumplePersonal->segundo_nombre }}
                            {{ $cumplePersonal->primer_apellido }}
                            {{ $cumplePersonal->segundo_apellido }} - {{ $cumplePersonal->fecha_nacimiento }}</li>
                        </h5>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<br> 










                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

  
{{-- Horario --}}
{{-- <table id="adultos" class="table table-bordered  table-hover" >
    <caption>Horarios del Personal la Misericordia</caption>
    <thead class="thead bg-info ">
        <tr>
            <th >Nombre</th>
            <th >Lunes</th>
            <th >Martes</th>
            <th >Miércoles</th>
            <th >Jueves</th>
            <th >Viernes</th>
            <th >Sábado</th>
            <th >Domingo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleadosConHorarios as $nombrePersonal => $horariosPorDia)
    <tr>
        <th>{{ $nombrePersonal }}</th>
        @foreach (['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'] as $dia)
            <td>
                @if (isset($horariosPorDia[$dia]))
                    {{ $horariosPorDia[$dia] }}
                @else
                    <!-- Puedes mostrar un mensaje o dejarlo en blanco -->
                @endif
            </td>
        @endforeach
    </tr>
@endforeach
    </tbody>
</table>



    {{-- Graficas 
    <div class="card card-white bg-info" style="width:75%">
        <div class="card-header">
            <h3 class="card-title">GRAFICA DE % ENFERMEDADES</h3>
        </div>
        <div class="card-body">
            @foreach ($enfermedades as $enfermedad)
                {{ $enfermedad->nombre_patologia }}: {{ $enfermedad->cantidad_repeticiones }} <
                    theme="orange" value="{{ ($enfermedad->cantidad_repeticiones / $conteoActivo) * 100 }}" vertical
                    with-label />
            @endforeach
        </div>
    </div>
    <br>

    <div class="card card-white bg-info" style="width:75%">
        <div class="card-header">
            <h3 class="card-title">GRAFICA DE MEDICINAS NECESITADAS</h3>
        </div>
        <div class="card-body">
            @foreach ($medicinas as $medicamento)
                {{ $medicamento->nombre_medicamento }}: {{ $medicamento->cantidad_repeticiones }}<
                    theme="danger" value="{{ ($medicamento->cantidad_repeticiones / $sumaMedicina) * 100 }}" with-label />
            @endforeach

        </div>
    </div>

    @foreach ($medicinas as $medicamento)
        <label type="hidden"
            value="{{ $resultado[] = ($medicamento->cantidad_repeticiones / $sumaMedicina) * 100 }}"></label>
        <label type="hidden" value="{{ $nombre[] = $medicamento->nombre_medicamento }}"> </label>
    @endforeach --}}



     {{-- <div style="width:50%">
        <canvas id="myChart"></canvas>
    </div>

    <button id="consultarConteo">Consultar Conteo de Activos</button>

    <div id="resultadoConteo"></div>

    <button id="generarGrafica">Generar Grafica</button>

    <div id="grafica"></div> --}}

    




    {{-- <script>
        var resultado = @json($resultado);
        var nombre = @json($nombre);
        const ctx = document.getElementById('myChart');

        var contador = 0;
        var datosArray = [];

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nombre,
                datasets: [{
                    label: 'Grafica de medicinas',
                    data: resultado,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- <script>
        document.getElementById('consultarConteo').addEventListener('click', function() {
            axios.get('{{ route('conteo-activos') }}')
                .then(function(response) {
                    document.getElementById('resultadoConteo').innerHTML = 'Conteo de Activos: ' + response.data
                        .conteoActivos;
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    </script>


    <script>
        document.getElementById('generarGrafica').addEventListener('click', function() {
            axios.get('{{ route('grafica-medicinas') }}')
                .then(function(response) {
                    var sumaMedicinas = response.data.sumaMedicinas;
                    var operacion = sumaMedicinas * 2; // Ejemplo de una operación

                    sumaMedicinas.forEach(function(valor) {
                        console.log(valor.nombre_medicamento)
                    });

                    for (var i = 0; i < sumaMedicinas.length; i++) {
                        var medicamento = sumaMedicinas[i];
                        console.log("Nombre del medicamento: " + medicamento.nombre_medicamento);
                        console.log("Cantidad de repeticiones: " + medicamento.cantidad_repeticiones);
                    }

                    // Muestra el resultado en el elemento 'grafica'
                    document.getElementById('grafica').innerHTML = 'Respuesta: ' + operacion;
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    </script> --}}




