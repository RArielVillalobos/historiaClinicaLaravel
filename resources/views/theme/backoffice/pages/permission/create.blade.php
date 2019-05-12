@extends('theme.backoffice.layout.admin')

@section('title','Crear permiso')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}

    <li>Crear Permiso</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Introduce los datos para dar de alta un permiso</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">Crear Permiso</div>
                            <form method="post" action="{{route('backoffice.permission.store')}}" >
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <label for="name">Nombre del permiso</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="role_id">
                                            <option value="" selected>Seleccione un rol</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>

                                            @endforeach

                                        </select>
                                        @if ($errors->has('role_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('role_id') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description" class="materialize-textarea" name="description"></textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                        <label for="description">Descripción</label>
                                    </div>

                                </div>

                                 <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn waves-effect light-blue lighten-2 right" type="submit">Guardar
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

