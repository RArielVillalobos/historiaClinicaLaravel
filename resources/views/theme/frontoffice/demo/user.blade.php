@extends('theme.frontoffice.layout.main')

@section('title','Mis citas')


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
                        @yield('title')

                    </div>

                </div>

            </div>

        </div>
    </div>


@endsection

@section('foot')


@endsection