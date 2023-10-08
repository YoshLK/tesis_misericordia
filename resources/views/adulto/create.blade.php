@extends('layouts.app')

@section('title', 'Nuevo Adulto')

@section('content')
    <section class="section">
        <div class="section-header text-logo">
            <h3 class="page__heading">Registro de adulto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card "> 
                        <div class="text-center px-4 py-2">
                            <h1>FICHA DE INGRESO - ADULTO MAYOR</h1>
                        </div>
                        <div class="card-body border-info mb-6">
                            <div class="container">
                                <form action="{{ url('/adulto') }}" method="post" enctype="multipart/form-data"
                                    class="px-4 py-2 border border-info rounded-lg formulario-guardar"
                                    style="width: 300px height:75px">
                                    @csrf
                                    @include('adulto.form', [
                                        'modo' => 'Guardar',
                                        'color' => 'outline-success',
                                    ])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text"name="name" id="name"
                placeholder="Nombre del usuario" class="form-control rounded-pill">
        </div>
    </div>
@endsection


<style>
    .color-logo {
        background-color: #8e0432;
        color: #8e0432;
    }

    .text-logo {
        color: #8e0432;
    }
</style>
