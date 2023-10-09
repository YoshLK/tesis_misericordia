

@section('content_header')
    <h1 class="text-center bg-primary ">Edición de Adulto Mayor</h1>
@stop

@extends('layouts.app')

@section('title', 'Edicion Adulto')

@section('content')
    <section class="section">
        <div class="section-header text-logo">
            <h3 class="page__heading">EDICION DE ADULTO MAYOR</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-light"> 
                        <div class="text-center px-4 py-2 color-logo">
                            <h1 class="text-white">EDICION - FICHA DE INGRESO - ADULTO MAYOR</h1>
                        </div>
                        <div class="card-body border-info mb-6">
                            <div class="container">
                                <form action="{{ url('/adulto/' . $adulto->id) }}" method="POST" enctype="multipart/form-data" style="width: 300px height:75px">
                                    @csrf
                                    @method('PUT')
                                    @include('adulto.form', ['modo' => 'Editar', 'color' => 'outline-primary'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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