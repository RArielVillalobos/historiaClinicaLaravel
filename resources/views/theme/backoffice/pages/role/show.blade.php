@extends('theme.backoffice.layout.admin')

@section('title','demo')

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.role.index')}}">Roles del sistema</a></li>
    <li>{{$role->name}}</li>
@endsection


@section('content')
    <div class="section">
        <p class="caption"><strong>Rol: </strong>{{$role->name}}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title">Usuarios con el rol {{$role->name}}</h4>

                                <p><strong>Slug: </strong>{{$role->slug}}</p>
                                <p><strong>Descripción: </strong>{{$role->description}}</p>
                                <p><a href="#" style="color:red" onclick="enviar_formulario()">Eliminar</a></p>


                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">Permisos de rol</div>
                            <table class="bordered">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($role->permissions as $permission)
                                    <tr>
                                        <td><a href="{{route('backoffice.permission.show',['permission'=>$permission])}}">{{$permission->name}}</a></td>
                                        <td>{{$permission->slug}}</td>
                                        <td>{{$permission->description}}</td>
                                        <td><a href="{{route('backoffice.permission.edit',['permission'=>$permission])}}"><i class="material-icons">edit</i></a></td>
                                    </tr>


                                @empty
                                    <tr>
                                        <td colspan="12">No hay permisos para mostrar</td>
                                    </tr>

                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-section">

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

