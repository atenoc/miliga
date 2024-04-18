
@extends('layouts.app')

<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >

@section('content')

<!-- Page Content -->
<div class="container">

<div class="page-header">
  <h2>Administrador de Usuarios</h2>
</div>

<div class="row">
  <h5><a href="{{ url('ligas') }}" type="button" class="btn btn-primary" style="margin-left: 15px;">Ver Ligas</a></h5>
  @if(Auth::user()->role_id == 1)
  <h5><a href="{{ url('admin/users/create') }}" type="button" class="btn btn-dark" style="margin-left: 5px;">Agregar Usuarios</a></h5>
  @endif
</div>

<table class="table table-striped table-hover">
  <tr>
    <th>ID</th>
    <th>ROL</th>
    <th>IMAGEN</th>
    <th>NOMBRE</th>
    <th>CORREO</th>
    <th>FECHA ALTA</th>
    <th>FECHA ACTUALIZACION</th>
  </tr>

@if($users)
  @foreach($users as $user)

  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->role_id}}</td>

    @if($user->foto)
    <td><img src="{{ URL::to('/images/' . $user->foto->ruta_foto) }}"
      class="redondo" height="50px"/></td>
    @else
    <td><img src="{{ URL::to('/images/user-no-image.png') }}" height="50px"/></td>
    @endif

    @if(Auth::user()->role_id == 1)
    <td><a href="{{route('users.edit', $user->id)}}"> {{ $user->name }} {{ $user->last_name }} </a></td>
    @else
    <td><strong> {{ $user->name }} {{ $user->last_name }} </strong></td>
    @endif

    <td>{{$user->email}}</td>
    <td>{{$user->created_at}}</td>
    <td>{{$user->updated_at}}</td>
  </tr>

  @endforeach
@endif
</table>


</div>

@endsection

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('bootstrap-notify-3.1.3/bootstrap-notify.min.js')}}"></script>
