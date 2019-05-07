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
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Especialista</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Estado</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jorge</td>
                                    <td>15 de junio</td>
                                    <td>15:00</td>
                                    <td>Pagado</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>


@endsection

@section('foot')


@endsection