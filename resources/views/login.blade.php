@extends('base')
@section('title', 'Acceso')
@section('content')

@include('flash::message')

<div class="account-container">
    <div class="content clearfix">

        {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}

            <h1>Eclosoft - Servicios</h1>

            <div class="login-fields">

                <p>Por favor ingrese sus datos</p>

                @if (count($errors) > 0)
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                  </div>
                @endif

                <div class="field">
                    <label for="username">Username</label>
                    {!! Form::email('email', null, ['class' => 'login username-field', 'placeholder' => 'Correo Electronico', 'autofocus']) !!}
                </div> <!-- /field -->

                <div class="field">
                    <label for="password">Password:</label>
                    {!! Form::password('password', ['class' => 'login password-field', 'placeholder' => 'Contraseña']) !!}
                </div> <!-- /password -->

            </div> <!-- /login-fields -->

            <div class="login-actions">
                <button class="button btn btn-primary btn-large">Acceder</button>
            </div> <!-- .actions -->

        {!! Form::close() !!}
    </div> <!-- /content -->
</div> <!-- /account-container -->


@stop