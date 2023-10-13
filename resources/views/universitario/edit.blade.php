@extends('layouts.app')

@section('title', 'Nuevo Adulto')

@section('content')
    <section class="section">
        <div class="section-header text-logo">
            <h3 class="page__heading" >EDICION DE UNIVERSITARIO</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-light"> 
                        <div class="text-center px-4 py-2 color-logo">
                            <h1 class="text-white">EDICION - UNIVERSITARIO</h1>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form action="{{ url('/universitario/' . $universitario->id) }}" method="post" enctype="multipart/form-data"
                                    class="px-4 py-2 border border-info rounded-lg" style="width: 300px height:75px">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    @include('universitario.form', ['modo' => 'Editar', 'color' => 'outline-primary', 'ColorFormato'=>'badge text-green bg-primary rounded-pill'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

