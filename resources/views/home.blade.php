
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                  @if($liga)

                      @if($liga->image)
                        <img src="{{ URL::to('/images/' . $liga->image->nombre_imagen) }}" class="redondop"/>
                      @else
                      <img src="{{ URL::to('/images/user-no-image.png') }}" height="50px"/>
                      @endif

                      <span style="margin-left: 15px;"><strong>  {{ $liga->nombre_liga }}</strong>, </span>

                      @if($liga->sede->nombre_sede)
                        <span>{{ $liga->sede->nombre_sede }}</span>
                      @else <span>- - -</span> @endif

                      @if($liga->temporada->nombre_temporada)
                        <span>{{ $liga->temporada->nombre_temporada }}</span>
                      @else <span>- - -</span> @endif

                  @else
                      ¡¡ Debes agregar una liga para administrarla !!
                      <h5><a href="{{ url('ligas/create') }}" type="button" class="btn btn-primary" style="margin-left: 5px;">Agrega una liga</a></h5>
                  @endif

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <h6><a href="{{ url('ligas') }}" type="button" >Ver Ligas Inscritas</a></h6>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
