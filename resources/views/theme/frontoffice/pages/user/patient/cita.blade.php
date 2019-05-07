@extends('theme.frontoffice.layout.main')
@section('title')
    Agendar cita
@endsection

@section('head')
   <link rel="stylesheet" href="{{asset('assets/frontoffice/js/plugins/pickadate/themes/default.css')}}">
   <link rel="stylesheet" href="{{asset('assets/frontoffice/js/plugins/pickadate/themes/default.date.css')}}">
   <link rel="stylesheet" href="{{asset('assets/frontoffice/js/plugins/pickadate/themes/default.time.css')}}">

@endsection

@section('nav')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('theme.frontoffice.pages.user.includes.nav')
            {{-- seccion principal--}}
            <div class="col s12 m8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">@yield('title')</span>
                        <form method="post" action="#">
                            @csrf
                            <div class="row">

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
                                    <input id="datepicker" type="text" name="date" class="datepicker">
                                    <label for="datepicker">Seleccione una fecha</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">access_time</i>
                                    <input id="timepicker" type="text" name="time" class="timepicker">
                                    <label for="timepicker">Seleccione un horario</label>
                                </div>

                            </div>



                        <div class="row center">
                            <button class="btn waves-effect weves-light">Agendar <i class="material-icons right">send</i></button>

                        </div>
                        </form>


                    </div>

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

    $
    $('.datepicker').pickadate({

    });
    $('.timepicker').pickatime({

    });
    ('select').formSelect();

</script>


@endsection