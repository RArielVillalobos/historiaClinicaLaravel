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
                <div class="col s12 m8">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-title">Asignar roles</div>
                            <form class="col s12" method="post" action="{{route('backoffice.user.role_assignament',$user)}}" >
                                @csrf
                                @foreach($roles as $role)
                                    <p>
                                        <input type="checkbox" id="rol_{{$role->id}}" name="roles[]" value="{{$role->id}}" @if($user->has_role($role->id)) checked @endif/>
                                        <label for="rol_{{$role->id}}">
                                            <span>{{$role->name}}</span>
                                        </label>
                                    </p>

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

