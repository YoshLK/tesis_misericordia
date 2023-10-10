<div class="card bg-light" style="width: 100%;">
    <div class="card-body d-flex justify-content-end"> <!-- Utiliza d-flex y justify-content-end para alinear los enlaces a la derecha -->
        <a href="{{ route('login') }}" class="btn btn-primary btn-sm mr-3">Ingresar</a>
        <a href="{{ route('register') }}" class="btn btn-success btn-sm">Registro</a>
    </div>
</div>
     
@extends('layouts.auth_app')
@section('title')
MISAGE-H
@endsection
@section('content')

    <div class="card">
        <div class="text-center px-4 py-2 color-logo">
            <h4 class="text-white">MISAGE-H INGRESO</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Usuario</label>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           placeholder="Ingrese su usuario" tabindex="1"
                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                           required>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Contraseña</label>
                        
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                           placeholder="Ingrese su contraseña"
                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                        INGRESAR
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


<style>
    .color-logo {
        background-color: #8e0432;
    }

    .text-logo {
        color: #8e0432;
    }
</style>