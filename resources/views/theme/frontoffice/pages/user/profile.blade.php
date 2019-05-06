@extends('theme.frontoffice.layout.main')


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
                <h1>Seccion lateral</h1>

            </div>

        </div>

    </div>

@endsection

@section('foot')


@endsection