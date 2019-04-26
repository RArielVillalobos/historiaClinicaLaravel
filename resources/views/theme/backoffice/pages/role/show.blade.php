@extends('theme.backoffice.layout.admin')

@section('title','demo')

@section('head')

@endsection

@section('content')
    <div class="section">
        <p class="caption"><strong>Rol: </strong>{{$role->name}}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card-panel">
                        <h4 class="header2">Usuarios con el rol {{$role->name}}</h4>
                        <div class="row">
                            <p>{{$role->slug}}</p>
                            <p>{{$role->description}}</p>
                            <p><a href="#" style="color:red" onclick="enviar_formulario()">Eliminar</a></p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form method="post" action="{{route('backoffice.role.destroy',['role'=>$role])}}" name="delete_form">
        @csrf
        @method('delete')



    </form>
@endsection

@section('foot')

    <script>
        function enviar_formulario()
        {
            Swal.fire({
                title:'¿Desea eliminar este rol?',
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

