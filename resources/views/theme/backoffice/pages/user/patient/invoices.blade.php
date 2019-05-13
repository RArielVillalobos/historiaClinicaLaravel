@extends('theme.backoffice.layout.admin')

@section('title','Facturas de '.$user->name)

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
    <li><a href="{{route('backoffice.user.show',$user)}}">{{$user->name}}</a></li>
    <li><a href="{{route('backoffice.patient.back_invoices',$user)}}">Facturas de {{$user->name}}</a></li>
@endsection

@section('dropdown_settings')
    {{-- <li><a class="grey-text text-darken-2"></a></li> --}}
    <li><a href="{{route('backoffice.patient.back_schedule',$user)}}" class="grey-text text-darken-2">Agendar una cita</a></li>
    <li><a class="grey-text text-darken-2">Añadir factura</a></li>
@endsection

@section('content')
    <div class="section">
        <p class="caption"><strong>{{'Facturas de '.$user->name}}</strong></p>
        <div class="divider"></div>
        <div class="row">
            <div id="basic-form" class="section">
                <div class="col s12 m8">
                    <div class="card">
                        <div class="card-content">
                            <table class="bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>744</td>
                                    <td>$500</td>
                                    <td>25/02/2019 </td>
                                    <td>En progreso</td>
                                    <td>
                                        <a>Editar</a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
                <div class="col s12 m4">
                    @include('theme.backoffice.pages.user.includes.user_nav')
                </div>
            </div>

        </div>


@endsection

@section('foot')

@endsection