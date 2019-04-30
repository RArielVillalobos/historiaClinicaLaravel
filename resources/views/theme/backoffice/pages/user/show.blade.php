@extends('theme.backoffice.layout.admin')

@section('title',$user->name)

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
    <li>{{$user->name}}</li>
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
                            <span class="card-title">{{$user->name}}</span>


                        </div>
                        <div class="card-action">
                            <p><a href="#" style="color:red" onclick="enviar_formulario()">Eliminar</a></p>
                        </div>


                    </div>
                </div>
                <div class="col s12 m4">
                    @include('theme.backoffice.pages.user.includes.user_nav')
                </div>


            </div>


        </div>
    </div>
    <form method="post" action="{{route('backoffice.user.destroy',['user'=>$user])}}" name="delete_form">
        @csrf
        @method('delete')



    </form>
@endsection

@section('foot')

    <script>
        function enviar_formulario()
        {
            Swal.fire({
                title:'¿Desea eliminar este permiso?',
                text:'Esta accion no se puede deshacer',
                type:'warning',
                showCancelButton:true,
                confirmButtonText:'Si,continuar',
                cancelButtonText:'No,cancelar',
                // closeOnCancel:false,
                //closeOnConfirm:true,

            }).then((result)=>{
                if (result.value==true){
                    //delete_form es el name del formulario
                    //aca estamos diciendo que se envie el formulario
                    document.delete_form.submit();
                }

            });

        }
    </script>

@endsection

