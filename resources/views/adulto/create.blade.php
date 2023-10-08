@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading text-center align-middle">Registro de adulto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center align-middle">FICHA DE INGRESO - ADULTO MAYOR</h1>
                        </div>
                        <div class="card-body border-light mb-3">
                            <div class="container">
                                <form action="{{ url('/adulto') }}" method="post" enctype="multipart/form-data"
                                    class="px-4 py-2 border border-info rounded-lg formulario-guardar"
                                    style="width: 300px height:75px">
                                    @csrf
                                    @include('adulto.form', [
                                        'modo' => 'Guardar',
                                        'color' => 'outline-success',
                                        'ColorFormato' => 'badge text-green bg-success rounded-pill',
                                    ])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       



    </section>
@endsection
