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
                            <input type="text" name="doctor">
                            <input type="text" name="date" class="datepicker">
                            <input type="text" name="time" class="timepicker">

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
    $('.datepicker').pickadate({

    });
    $('.timepicker').pickatime({

    });
</script>


@endsection