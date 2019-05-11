<div class="collection">

    {{-- <a href="#!" class="collection-item">Alvin</a> --}}
    <a href="{{route('backoffice.user.show',$user)}}" class="collection-item {{active_class(route('backoffice.user.show',$user))}}">{{$user->name}}</a>
    <a href="{{route('backoffice.user.assign_role',$user)}}" class="collection-item {{active_class(route('backoffice.user.assign_role',$user))}}">Asignar roles</a>
    <a href="{{route('backoffice.user.assign_permission',$user)}}" class="collection-item {{active_class(route('backoffice.user.assign_permission',$user))}}">Asignar permisos</a>

</div>