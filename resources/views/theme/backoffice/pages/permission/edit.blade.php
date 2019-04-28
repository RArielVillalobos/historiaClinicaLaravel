@extends('theme.backoffice.layout.admin')

@section('title','Editar permiso ' .$permission->name)

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}

    <li>Editar permiso {{$permission->name}}</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Introduce los datos para editar permiso</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-title">Editar Permiso</div>
                            <form class="col s12" method="post" action="{{route('backoffice.permission.update',$permission)}}" >
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name" value="{{$permission->name}}">
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
                                            <option value="">Seleccione un rol</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{($role->id==$permission->role->id) ? 'selected' : ''}}>{{$role->name}}</option>

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
                                        <textarea id="description" class="materialize-textarea" name="description">{{$permission->description}}</textarea>
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
                                        <button class="btn waves-effect light-blue lighten-2 right" type="submit">Actualizar
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

