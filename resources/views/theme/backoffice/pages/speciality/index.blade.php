@extends('theme.backoffice.layout.admin')

@section('title','Especialidades médicas')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.speciality.index')}}" class="active">Especialidades médicas</a></li>
@endsection

@section('dropdown_settings')
    {{-- <li><a class="grey-text text-darken-2"></a></li> --}}
    <li><a href="{{route('backoffice.speciality.create')}}" class="grey-text text-darken-2">Crear especialidad</a></li>

@endsection

@section('content')
    <div class="section">
        <p class="caption"><strong>Especialidades médicas</strong></p>
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
                                    <th># de médicos</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($specialities as $speciality)
                                    <tr>
                                        <td><a href="{{route('backoffice.speciality.show',['speciality'=>$speciality])}}">{{$speciality->name}}</a></td>
                                        <td>{{$speciality->users->count()}}</td>
                                        <td><a href="{{route('backoffice.speciality.edit',['speciality'=>$speciality])}}"><i class="material-icons">edit</i></a></td>
                                    </tr>


                                @empty
                                    <tr>
                                        <td colspan="12">No hay especialidades para mostrar</td>
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

