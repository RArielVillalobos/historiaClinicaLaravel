@extends('theme.backoffice.layout.admin')

@section('title','Permisos de sistema')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.permission.index')}}">Permisos del sistema</a></li>
@endsection

@section('dropdown_settings')
    {{-- <li><a class="grey-text text-darken-2"></a></li> --}}
    <li><a href="{{route('backoffice.permission.create')}}" class="grey-text text-darken-2">Crear Permiso</a></li>

@endsection

@section('content')
    <div class="section">
        <p class="caption"><strong>Roles del sistema</strong></p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <table class="bordered">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Descripción</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($permissions as $permission)
                                    <tr>
                                        <td><a href="{{route('backoffice.permission.show',['permission'=>$permission])}}">{{$permission->name}}</a></td>
                                        <td>{{$permission->slug}}</td>
                                        <td>{{$permission->description}}</td>
                                        <td><a href="{{route('backoffice.role.show',$permission->role)}}">{{$permission->role->name}}</a></td>
                                        <td><a href="{{route('backoffice.permission.edit',['permission'=>$permission])}}"><i class="material-icons">edit</i></a></td>
                                    </tr>


                                @empty
                                    <tr>
                                        <td colspan="12">No hay permisos para mostrar</td>
                                    </tr>

                                @endforelse
                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection

@section('foot')

@endsection

