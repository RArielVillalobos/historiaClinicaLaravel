@extends('theme.backoffice.layout.admin')

@section('title','Dar de alta usuario')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
    <li>Crear Usuario</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Introduce los datos para dar de alta un nuevo usuario</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-title">Crear Usuario</div>
                            <form class="col s12" method="post" action="{{route('backoffice.user.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select id="role" name="role_id" required>
                                            <option disabled selected>Selecciona rol</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('role_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('role_id') }}</strong>
                                            </span>
                                        @endif


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <label for="name">Nombre del usuario</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="dob" type="date" name="dob">
                                        @if ($errors->has('dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <label for="email">Correo electrónico</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" name="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        <label for="name">Contraseña</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password_confirmation" type="password" name="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                        <label for="password_confirmation">Confirmar contraseña</label>

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

