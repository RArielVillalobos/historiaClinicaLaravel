@extends('theme.backoffice.layout.admin')

@section('title','agendar cita para '.$user->name)

@section('head')
    <link rel="stylesheet" href="{{asset('assets/frontoffice/js/plugins/pickadate/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontoffice/js/plugins/pickadate/themes/default.date.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontoffice/js/plugins/pickadate/themes/default.time.css')}}">

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
    <li><a href="{{route('backoffice.user.show',$user)}}">{{$user->name}}</a></li>

    <li><a href="#">Agendar cita</a></li>
@endsection
@section('dropdown_settings')
    {{-- <li><a class="grey-text text-darken-2"></a></li> --}}
    <li><a href="{{route('backoffice.user.edit',$user)}}" class="grey-text text-darken-2">Editar usuario</a></li>

@endsection


@section('content')
    <div class="section">
        <p class="caption"><strong>Usuario: </strong>{{$user->name}}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">@yield('title')</span>
                            <form method="post" action="#">
                                @csrf
                                <div class="row">
                                    <div class="input field col s12">
                                        <select name="especialista_id" class="browser-default">
                                            <option value="1">Internistas</option>
                                            <option value="2">Pediatras</option>
                                            <option value="3">Odontologos</option>

                                        </select>
                                        <label>Selecciona especialidad</label>

                                    </div>

                                    <div class="input field col s12">
                                        <select name="medico_id" class="browser-default">
                                            <option value="1">Raul</option>
                                            <option value="2">Melanie</option>
                                            <option value="3">Luciana</option>

                                        </select>
                                        <label>Selecciona un especialista</label>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">today</i>
                                        <input id="datepicker" type="text" name="date" class="datepicker" placeholder="Seleccione una fecha">

                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">access_time</i>
                                        <input id="timepicker" type="text" name="time" class="timepicker" placeholder="Seleccione un horario">

                                </div>

                            </div>



                        <div class="row center">
                                        <button class="btn waves-effect weves-light">Agendar <i class="material-icons right">send</i></button>

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
    <script src="{{asset('assets/frontoffice/js/plugins/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/frontoffice/js/plugins/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('assets/frontoffice/js/plugins/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('assets/frontoffice/js/plugins/pickadate/legacy.js')}}"></script>
    <script>


        var input_date=$('.datepicker').pickadate({
            //a partir de la fecha actual
            min:true,

        });
        var date_picker=input_date.pickadate('picker');
        //deshabilitar los domingos
        //1 es domingo
        date_picker.set('disable',[
            1
        ]);


        var input_time= $('.timepicker').pickatime({
            //se puede elegir un horario desde dos horas despues de la hora actual
            min:4,
        });
        var time_picker=input_time.pickatime('picker');
        //deshabilitar 4 de la mañana
        time_picker.set('disable',[
            4
        ]);



    </script>

@endsection

