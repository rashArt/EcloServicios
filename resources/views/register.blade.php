@extends('base')
@section('title', 'Registro')

@section('content')

<div class="account-container register">
    <div class="content clearfix">
        <h1>Formulario de Registro</h1>
        <p>Completa el formulario</p>
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

        {!! Form::open(['route' => 'registro', 'method' => 'POST']) !!}
            <div class="login-fields">
                <div class="field">
                    {!! Form::label('cedula', 'Cedula') !!}
                    {!! Form::text('cedula', null, ['class' => 'login', 'placeholder' => 'Cedula']) !!}
                </div> <!-- /field -->

                <div class="field">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'login', 'placeholder' => 'Nombre']) !!}
                </div> <!-- /field -->

                <div class="field">
                    {!! Form::label('apellido', 'Apellido') !!}
                    {!! Form::text('apellido', null, ['class' => 'login', 'placeholder' => 'Apellido']) !!}
                </div> <!-- /field -->

                <div class="field">
                    {!! Form::label('email', 'Correo Electronico') !!}
                    {!! Form::email('email', null, ['class' => 'login', 'placeholder' => 'Correo Electronico']) !!}
                </div> <!-- /field -->

                <div class="field">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password', ['class' => 'login', 'placeholder' => 'Contraseña']) !!}
                </div> <!-- /field -->

                <div class="field">
                    {!! Form::label('password_confirmation', 'Contraseña') !!}
                    {!! Form::password('password_confirmation', ['class' => 'login', 'placeholder' => 'Confirmar Contraseña']) !!}
                </div> <!-- /field -->

                <div class="field">
                    {!! Form::label('telefono', 'Telefono') !!}
                    {!! Form::text('telefono', null, ['class' => 'login', 'placeholder' => 'Telefono']) !!}
                </div> <!-- /field -->

            </div> <!-- /login-fields -->

            <div class="login-actions">

                <button class="button btn btn-primary btn-large">Registrar</button>

            </div> <!-- .actions -->
        {!! Form::close() !!}
    </div> <!-- /content -->
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
    Ya estas registrado? <a href="{{ route('login') }}">Accede a tu cuenta</a>
</div> <!-- /login-extra -->

@stop