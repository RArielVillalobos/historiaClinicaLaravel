@extends('theme.backoffice.layout.admin')

@section('title','Asignar roles')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.role.index')}}">Usuarios del sistema</a></li>
    <li><a href="{{route('backoffice.user.show',$user)}}">{{$user->name}}</a></li>
    <li>Crear Rol</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Seleccione los roles que desea asignar</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-title">Asignar roles</div>
                            <form class="col s12" method="post" action="{{route('backoffice.user.role_assignament',$user)}}" >
                                @csrf
                                <p>
                                    <label>
                                        <input type="checkbox" />
                                        <span>Rol 1</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="checkbox" />
                                        <span>Rol 2</span>
                                    </label>
                                </p>
                                <div class="input-field col s12">
                                    <button class="btn waves-effect light-blue lighten-2 right" type="submit">Guardar
                                        <i class="material-icons right">send</i>
                                    </button>
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

