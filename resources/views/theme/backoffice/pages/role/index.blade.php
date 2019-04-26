@extends('theme.backoffice.layout.admin')

@section('title','roles de sistema')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.role.index')}}">Roles del sistema</a></li>
@endsection

@section('dropdown_settings')
    {{-- <li><a class="grey-text text-darken-2"></a></li> --}}
    <li><a href="{{route('backoffice.role.create')}}" class="grey-text text-darken-2">Crear Rol</a></li>

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
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $role)
                                        <tr>
                                            <td><a href="{{route('backoffice.role.show',['role'=>$role])}}">{{$role->name}}</a></td>
                                            <td>{{$role->slug}}</td>
                                            <td>{{$role->description}}</td>
                                            <td><a href="{{route('backoffice.role.edit',['role'=>$role])}}"><i class="material-icons">edit</i></a></td>
                                        </tr>


                                    @empty
                                        <tr>
                                            <td colspan="12">No hay roles para mostrar</td>
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

