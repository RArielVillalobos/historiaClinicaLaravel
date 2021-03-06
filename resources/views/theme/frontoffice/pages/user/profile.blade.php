@extends('theme.frontoffice.layout.main')
@section('title')
Perfil de {{$user->name}}
@endsection

@section('head')

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
                        <p><strong>Nombre: {{$user->name}}</strong></p>
                        <p><strong>Edad: {{$user->age()}}</strong></p>
                        <p><strong>Email: {{$user->email}}</strong></p>
                        <p><strong>Miembro desde: {{$user->created_at->diffForHumans()}}</strong></p>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('foot')


@endsection