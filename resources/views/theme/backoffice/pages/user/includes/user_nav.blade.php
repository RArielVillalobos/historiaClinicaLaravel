<div class="collection">
    {{-- <a href="#!" class="collection-item">Alvin</a> --}}
    <a href="{{route('backoffice.user.show',$user)}}" class="collection-item active">{{$user->name}}</a>
    <a href="#!" class="collection-item">Asignar Rol</a>

</div>