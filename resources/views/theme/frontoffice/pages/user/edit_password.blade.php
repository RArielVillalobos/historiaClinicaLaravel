@extends('theme.frontoffice.layout.main')

@section('title','Modificar contraseña')


@section('head')

@endsection

@section('nav')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('theme.frontoffice.pages.user.includes.nav')
            <div class="col s12 m8">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">
                            @yield('title')
                        </div>

                        <div class="row">
                            <form class="col-s12" method="post" action="{{route('frontoffice.user.change_password')}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="input-field col s12">

                                        <input id="old_password" type="password" name="old_password">
                                        <label for="old_password">Contraseña actual</label>
                                        @if($errors->has('old_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{$errors->first('old_password')}}</strong>
                                            </span>

                                        @endif


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="input-field col s12">

                                        <input id="password" type="password" name="password">
                                        <label for="password">Nueva contraseña</label>
                                        @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{$errors->first('password')}}</strong>
                                            </span>

                                        @endif


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="input-field col s12">

                                        <input id="password_confirmation" type="password" name="password_confirmation">
                                        <label for="password_confirmation">Confirmar contraseña</label>




                                    </div>

                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <button type="submit" class="btn waves-effect waves-light right">
                                            Actualizar <i class="material-icons right">send</i>
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