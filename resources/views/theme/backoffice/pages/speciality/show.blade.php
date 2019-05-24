@extends('theme.backoffice.layout.admin')

@section('title',$speciality->name)

@section('head')

@endsection
@section('breadcrumbs')
    {{-- <li><a></a></li> --}}
    <li><a href="{{route('backoffice.speciality.index')}}">Especialidades médicas</a></li>
    <li><a class="active">{{$speciality->name}}</a></li>
@endsection
@section('dropdown_settings')
    {{-- <li><a class="grey-text text-darken-2"></a></li> --}}
    <li><a href="{{route('backoffice.speciality.edit',$speciality)}}" class="grey-text text-darken-2">Editar especialidad</a></li>

@endsection


@section('content')
    <div class="section">
        <p class="caption"><strong>Especialidad: </strong>{{$speciality->name}}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title">{{$speciality->name}}</h4>
                            <table>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)

                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td><a href="{{route('backoffice.user.show',$user)}}" target="_blank">{{$user->name}}</a></td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12"> No hay usuarios con esta especialidad</td>
                                    </tr>



                                @endforelse
                                </tbody>
                            </table>
                            <p><a href="#" style="color:red" onclick="enviar_formulario()">Eliminar</a></p>


                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <form method="post" action="{{route('backoffice.speciality.destroy',['speciality'=>$speciality])}}" name="delete_form">
        @csrf
        @method('delete')



    </form>
@endsection

@section('foot')

    <script>
        function enviar_formulario()
        {
            Swal.fire({
                title:'¿Desea eliminar este especialidad?',
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

