@extends('theme.backoffice.layout.admin')

@section('title','Editar '.$user->name)

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
    <li>Editar {{$user->name}}</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Actualiza los datos de usuario</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-title">Crear Usuario</div>
                            <form class="col s12" method="post" action="{{route('backoffice.user.update',['user'=>$user])}}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name" value="{{$user->name}}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <label for="name">Nombre del usuario</label>

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="input-field col s12">
                                        <input id="dob" type="date" name="dob" value="{{$user->dob->format('d/m/Y')}}">
                                        @if ($errors->has('dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="email" value="{{$user->email}}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <label for="email">Correo electrónico</label>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect light-blue lighten-2 right mb-2" type="submit">Actualizar
                                            <i class="material-icons right">send</i>
                                        </button>
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

