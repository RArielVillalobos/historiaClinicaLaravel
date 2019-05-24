@extends('theme.backoffice.layout.admin')

@section('title','Editar especialidad')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.speciality.index')}}">Especialidades médicas</a></li>
    <li><a  href="#">{{$speciality->name}}</a></li>
    <li><a  href="#" class="active">Editar especialidad</a></li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Introduce los datos para editar <strong>{{$speciality->name}}</strong></p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-title">Editar especialidad</div>
                            <div class="row">


                                <form class="col s12" method="post" action="{{route('backoffice.speciality.update',$speciality)}}" >
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name="name" value="{{$speciality->name}}">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            <label for="name">Nombre de la especialidad</label>

                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn waves-effect light-blue lighten-2 right" type="submit">Actualizar
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection

@section('foot')

@endsection
