@extends('theme.backoffice.layout.admin')

@section('title','editar rol '. $role->name)

@section('head')
@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.role.index')}}">Roles del sistema</a></li>
    <li><a href="{{route('backoffice.role.show',['role'=>$role])}}">{{$role->name}}</a></li>
    <li>Edición</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Editar Rol</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card-panel">
                        <h4 class="header2">Editar Rol {{$role->name}}</h4>
                        <div class="row">
                            <form class="col s12" method="post" action="{{route('backoffice.role.update',['role'=>$role])}}">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name" value="{{$role->name}}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <label for="name">Nombre del rol</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description" class="materialize-textarea"  name="description">{{$role->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                        <label for="description">Descripción</label>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn waves-effect light-blue lighten-2 right" type="submit">Guardar
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

