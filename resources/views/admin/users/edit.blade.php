

@extends('layouts.app')

<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >

@section('content')

<!-- Page Content -->
<div class="container">

<div class="row justify-content-center">

<div class="card border-secondary mb-3" style="max-width: 50rem;">
  <div class="card-header"><strong>Perfil de Usuario:</strong> <span style="margin-left: 5px;">...</span></div>
  <div class="card-body text-secondary">



{!! Form::model($user,['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files'=>true]) !!}
<table class="table table-bordered">

  <tr>

    @if($user->foto)
    <td><img src="{{ URL::to('/images/' . $user->foto->ruta_foto) }}" height="100px"/></td>
    @else
    <td><img src="{{ URL::to('/images/user-no-image.png') }}" height="50px"/></td>
    @endif

  </tr>
  <tr>
    <td colspan="2">
    {!! Form::file('foto_id', ['class' => 'btn btn-secondary']) !!}
    </td>
  </tr>

  <tr>
    <td>
    {!! Form::label('name', 'Nombre(s):') !!}
    </td>
    <td>
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escribe tu nombre(s)' ]) !!}
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
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com' ]) !!}
    </td>
  </tr>

  <tr>
    <td>
    {!! Form::submit('Actualizar Información', ['class' => 'btn btn-primary']) !!}
    </td>
    <td>
    <a href="{{ url('home') }}" type="button" class="btn btn-outline-primary" >Cancelar</a>
    </td>
  </tr>


</table>
{!! Form::close() !!}




{!! Form::model($user,['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

@if(Auth::user()->role_id == 1)
  {!! Form::submit('Eliminar usuario', ['class' => 'btn btn-dark']) !!}
@endif

{!! Form::close() !!}


</div>

@endsection
