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
                                    <select id="speciality" name="especialista_id" class="browser-default">
                                        @foreach($specialities as $speciality)
                                            <option disableed selected>Selecciona una especiliadad</option>
                                            <option value="{{$speciality->id}}">{{$speciality->name}}</option>

                                        @endforeach

                                    </select>
                                    <label>Selecciona especialidad</label>

                                </div>

                                <div class="input field col s12">
                                    <select id="doctor" name="medico_id" class="browser-default">
                                        <option disabled selected>Primero selecciona una especialidad</option>

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
                                    <input id="timepicker" type="text" name="time" class="timepicker" placeholder="Seleccione un horario>

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


    $('select').formSelect();
    var speciality=$('#speciality');
    var doctor=$('#doctor');

    speciality.change(function (e) {
        $.ajax({
            url:"{{route('ajax.user_speciality')}}",
            method:'get',
            data:{
                speciality:speciality.val(),
                
            },
            success:function (data) {
                console.log(data);
                
            }

        });

    })

</script>


@endsection