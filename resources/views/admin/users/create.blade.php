@extends('layouts.app')

<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >

@section('content')

<!-- Page Content -->
<div class="container">

<div class="row justify-content-center">

<div class="card border-secondary mb-3" style="max-width: 50rem;">
  <div class="card-header"><strong>Nuevo Usuario:</strong> <span style="margin-left: 5px;">completa la información</span></div>
  <div class="card-body text-secondary">

    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files'=>true]) !!}
    <table class="table table-bordered">
      <tr>
        <td>
        {!! Form::label('name', 'Nombre(s):') !!}
        </td>
        <td>
        {!! Form::text('name' , null, ['class' => 'form-control', 'placeholder' => 'Escribe tu nombre(s)' ] ) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('last_name', 'Apellido(s):') !!}
        </td>
        <td>
        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Escribe al menos 1 apellido' ]) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('email', 'Correo:') !!}
        </td>
        <td>
        {!! Form::text('email' , null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com' ]) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('password', 'Contraseña:') !!}
        </td>
        <td>
        {!! Form::password('password' , null, ['class' => 'form-control', 'placeholder' => 'Al menos 8 caracteres' ]) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('role', 'Rol:') !!}
        </td>
        <td>
        Admin {!! Form::radio('admin', 'admin') !!}
        User  {!! Form::radio('user', 'user', true) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('foto', 'Imágen de Perfil:') !!}
        </td>
        <td>
        {!! Form::file('foto_id', ['class' => 'btn btn-secondary']) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::submit('Crear Usuario' , ['class' => 'btn btn-primary']) !!}
        </td>
        <td>
        <a href="{{ url('admin/users') }}" type="button" class="btn btn-outline-primary" >Cancelar</a>
        </td>
      </tr>


    </table>
    {!! Form::close() !!}


  </div>

</div>

</div>


@endsection
