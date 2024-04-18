@extends('layouts.app')

<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >

@section('content')

<!-- Page Content -->
<div class="container">


<div class="row justify-content-center">

<div class="card border-secondary mb-3" style="max-width: 50rem;">
  <div class="card-header"><strong>Editar Liga:</strong> <span style="margin-left: 5px;">completa la información</span></div>
  <div class="card-body text-secondary">



{!! Form::model($liga,['method' => 'PATCH', 'action' => ['LigasController@update', $liga->id], 'files'=>true]) !!}
<table class="table table-bordered">

  <tr>

    @if($liga->image)
    <td><img src="{{ URL::to('/images/' . $liga->image->nombre_imagen) }}" height="100px"/></td>
    @else
    <td><img src="{{ URL::to('/images/user-no-image.png') }}" height="50px"/></td>
    @endif

  </tr>
  <tr>
    <td colspan="2">
    {!! Form::file('image_id') !!}
    </td>
  </tr>

  <tr>
    <td>
    {!! Form::label('name', 'Nombre de la liga:') !!}
    </td>
    <td>
    {!! Form::text('nombre_liga', null, ['class' => 'form-control', 'placeholder' => 'p. ej: Liga MX' ]) !!}
    </td>
  </tr>



  <tr>
    <td>
    {!! Form::label('tempo', 'Nombre de la temporada:') !!}
    </td>
    <td>
    {!! Form::text('temporada_id', $liga->temporada->nombre_temporada,
              ['class' => 'form-control','placeholder' => 'p. ej: Clausura 2020-2021 ' ]) !!}
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
          'Fútbol Rápido' => 'Fútbol Rápido'),
            $liga->tipo->nombre_tipo) !!}
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
                'Femenil' => 'Femenil'),
                $liga->rama->nombre_rama) !!}
    </td>
  </tr>

  <tr>
    <td>
    {!! Form::label('lugar', 'Ciudad dónde se realiza:') !!}
    </td>
    <td>
    {!! Form::text('sede_id', $liga->sede->nombre_sede,
                ['class' => 'form-control' ,'placeholder' => 'p. ej: Zaragoza Puebla ']) !!}
    </td>
  </tr>

  <tr>
    <td>
    {!! Form::label('fecha', 'Fecha en que inicia la liga:') !!}
    </td>
    <td>
    {!! Form::text('fecha_inicio', null,
          ['class' => 'form-control' ,'placeholder' =>'aaaa-mm-dd']) !!}
    </td>
  </tr>

  <tr>
    <td>
    {!! Form::submit('Actualizar Información', ['class' => 'btn btn-primary']) !!}
    </td>
    <td>
    <a href="{{ url('ligas') }}" type="button" class="btn btn-outline-primary" >Cancelar</a>
    </td>
  </tr>


</table>
{!! Form::close() !!}


{!! Form::model($liga,['method' => 'DELETE', 'action' => ['LigasController@destroy', $liga->id]]) !!}

    {!! Form::submit('Eliminar Liga', ['class' => 'btn btn-dark']) !!}

{!! Form::close() !!}





</div>

</div>

</div>


@endsection
