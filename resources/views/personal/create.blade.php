@extends('layouts.app')

@section('title', 'Nuevo Adulto')

@section('content')
    <section class="section">
        <div class="section-header text-logo">
            <h3 class="page__heading" >REGISTRO DE NUEVO ADULTO</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-light"> 
                        <div class="text-center px-4 py-2 color-logo">
                            <h1 class="text-white">REGISTRO NUEVO - PERSONAL</h1>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form action="{{ url('/personal') }}" method="post" enctype="multipart/form-data"
                                    class="px-4 py-2 border border-info rounded-lg formulario-guardar" style="width: 300px height:75px">
                                    @csrf
                                    @include('personal.form', ['modo' => 'Guardar', 'color' => 'outline-success', 'ColorFormato'=>'badge text-green bg-success rounded-pill'])
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
    }
    .text-logo {
        color: #8e0432;
    }
</style>



