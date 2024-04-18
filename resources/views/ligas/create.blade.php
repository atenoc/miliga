@extends('layouts.app')

<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >

@section('content')

<!-- Page Content -->
<div class="container">


<div class="row justify-content-center">

<div class="card border-secondary mb-3" style="max-width: 50rem;">
  <div class="card-header"><strong>Nueva Liga:</strong> <span style="margin-left: 5px;">completa la información</span></div>
  <div class="card-body text-secondary">

    {!! Form::open(['method' => 'POST', 'action' => 'LigasController@store', 'files'=>true]) !!}
    <table class="table table-bordered">

      <tr>
        <td>
        {!! Form::label('name', 'Nombre de la liga:') !!}
        </td>
        <td>
        {!! Form::text('nombre_liga', null, ['class' => 'form-control', 'placeholder' => 'p. ej: Liga MX' ] ) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('imagen', 'Imágen representativa de la liga:') !!}
        </td>
        <td>
        {!! Form::file('image_id', ['class' => 'btn btn-secondary'] ) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('tempo', 'Nombre de la temporada:') !!}
        </td>
        <td>
        {!! Form::text('temporada_id' , null, ['class' => 'form-control','placeholder' => 'p. ej: Clausura 2020-2021 ' ] ) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('tipo', 'Tipo:') !!}
        </td>
        <td>
        {!! Form::select('tipo_id',
              array('- - -' => 'Selecciona un tipo',
               'Fútbol Soccer' => 'Fútbol Soccer',
               'Fútbol Rápido' => 'Fútbol Rápido')) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('rama', 'Rama:') !!}
        </td>
        <td>
        {!! Form::select('rama_id',
              array('- - -' => 'Selecciona una rama',
                     'Varonil' => 'Varonil',
                     'Femenil' => 'Femenil')) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('lugar', 'Ciudad dónde se realiza:') !!}
        </td>
        <td>
        {!! Form::text('sede_id', null, ['class' => 'form-control' ,'placeholder' => 'p. ej: Zaragoza Puebla ']) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('fecha', 'Fecha en que inicia la liga:') !!}
        </td>
        <td>
        {!! Form::text('fecha_inicio', null, ['class' => 'form-control'] ) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::label('estatus', 'Estatus:') !!}
        </td>
        <td>
        {!! Form::text('estatu_id','Activo', ['class' => 'form-control', 'readonly' => 'true'] ) !!}
        </td>
      </tr>

      <tr>
        <td>
        {!! Form::submit('Crear Liga', ['class' => 'btn btn-primary']) !!}
        </td>
        <td>
          <a href="{{ url('home') }}" type="button" class="btn btn-outline-primary" >Cancelar</a>
        </td>
      </tr>


    </table>
    {!! Form::close() !!}


  </div>

</div>

</div>


@endsection
