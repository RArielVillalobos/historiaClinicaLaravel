@extends('theme.backoffice.layout.admin')

@section('title',$permission->name)

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.role.show',$permission->role->id)}}">Rol: {{$permission->role->name}}</a></li>
    <li>{{$permission->name}}</li>
@endsection


@section('content')
    <div class="section">
        <p class="caption"><strong>Permiso: </strong>{{$permission->name}}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                                <span class="card-title">{{$permission->name}}</span>
                                <p><strong>Slug: </strong>{{$permission->slug}}</p>
                                <p><strong>Descripcion: </strong>{{$permission->description}}</p>
                        </div>
                        <div class="card-action">
                            <p><a href="#" style="color:red" onclick="enviar_formulario()">Eliminar</a></p>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <form method="post" action="{{route('backoffice.permission.destroy',['permission'=>$permission])}}" name="delete_form">
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

