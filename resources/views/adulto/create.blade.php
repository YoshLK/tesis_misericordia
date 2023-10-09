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
                            <h1 class="text-white">FICHA DE INGRESO - ADULTO MAYOR</h1>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form action="{{ url('/adulto') }}" method="post" enctype="multipart/form-data"
                                    style="width: 300px height:75px">
                                    @csrf
                                    @include('adulto.form')
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
