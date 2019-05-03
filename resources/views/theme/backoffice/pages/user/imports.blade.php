@extends('theme.backoffice.layout.admin')

@section('title','Importar usuarios desde excel')

@section('head')

@endsection

@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
    <li>Importar usuarios</li>
@endsection

@section('dropdown_settings')
    {{-- <li><a class="grey-text text-darken-2"></a></li> --}}
@endsection


@section('content')
    <div class="section">
        <p class="caption">Seleccione un archivo excel</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-title">Importar usuario</div>
                            <form class="col s12" method="post" action="{{route('backoffice.user.make_import')}}" enctype="multipart/form-data">
                                @csrf
                                <div class = "row">
                                    <div class="file-field input-field ">
                                        <div class="btn light-blue lighten-2">
                                            <span>Seleccionar archivo</span>
                                            <input type="file" name="excel" required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect light-blue lighten-2 right mb-2" type="submit">Guardar
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
