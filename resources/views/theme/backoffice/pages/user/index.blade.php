@extends('theme.backoffice.layout.admin')

@section('title','Usuarios d sistema')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
@endsection

@section('dropdown_settings')
    {{-- <li><a class="grey-text text-darken-2"></a></li> --}}
    <li><a href="{{route('backoffice.user.create')}}" class="grey-text text-darken-2">Crear Usuario</a></li>

@endsection

@section('content')
    <div class="section">
        <p class="caption"><strong>Usuarios del sistema</strong></p>
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
                                    <th>Edad</th>
                                    <th>Correo</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td><a href="{{route('backoffice.user.show',$user)}}">{{$user->name}}</a></td>
                                        <td>{{$user->dob}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="{{route('backoffice.user.edit',$user)}}">Editar</a></td>
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