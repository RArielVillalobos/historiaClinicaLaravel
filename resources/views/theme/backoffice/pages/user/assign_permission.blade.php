@extends('theme.backoffice.layout.admin')

@section('title','Asignar permisos')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.role.index')}}">Usuarios del sistema</a></li>
    <li><a href="{{route('backoffice.user.show',$user)}}">{{$user->name}}</a></li>
    <li>Asignar Permisos</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Seleccione los permisos que desea asignar</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-title">Asignar permisos</div>
                            <form class="col s12" method="post" action="{{route('backoffice.user.permission_assignament',$user)}}" >
                                @csrf
                                {{-- aqui se van a mostrar los permisos--}}
                                @foreach($roles as $role)
                                    <p>{{$role->name}}</p>
                                    @foreach($role->permissions as $permission)
                                        <p>
                                            <input type="checkbox" id="permission_{{$permission->id}}" name="permissions[]" value="{{$permission->id}}" @if($user->has_permission($permission->id)) checked @endif>
                                            <label for="permission_{{$permission->id}}">
                                                <span>{{$permission->name}}</span>
                                            </label>
                                        </p>


                                    @endforeach


                                @endforeach

                                <div class="input-field col s12">
                                    <button class="btn waves-effect light-blue lighten-2 right" type="submit">Guardar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    @include('theme.backoffice.pages.user.includes.user_nav')
                </div>

            </div>
        </div>
    </div>
@endsection

@section('foot')

@endsection

