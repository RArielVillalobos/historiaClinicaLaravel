<div class="collection">

    {{-- <a href="#!" class="collection-item">Alvin</a> --}}
    <a href="{{route('backoffice.user.show',$user)}}" class="collection-item {{active_class(route('backoffice.user.show',$user))}}">{{$user->name}}</a>
    @if(auth()->user()->has_role(config('app.admin_role')) || auth()->user()->has_role(config('app.secretary_role')))
        {{-- si el usuario al que vamos a editar tiene el rol paciente le podemos asignar una cita --}}
       @if($user->has_role(config('app.patient_role')))
            <a href="{{route('backoffice.patient.back_schedule',$user)}}" class="collection-item {{active_class(route('backoffice.patient.back_schedule',$user))}}">Agendar Cita</a>
            <a href="{{route('backoffice.patient.back_appointments',$user)}}" class="collection-item {{active_class(route('backoffice.patient.back_appointments',$user))}}">Citas</a>
            <a href="{{route('backoffice.patient.back_invoices',$user)}}" class="collection-item {{active_class(route('backoffice.patient.back_invoices',$user))}}">Facturas</a>
       @endif
    @endif
    @if(auth()->user()->has_role(config('app.admin_role')))
        <a href="{{route('backoffice.user.assign_role',$user)}}" class="collection-item {{active_class(route('backoffice.user.assign_role',$user))}}">Asignar roles</a>
        <a href="{{route('backoffice.user.assign_permission',$user)}}" class="collection-item {{active_class(route('backoffice.user.assign_permission',$user))}}">Asignar permisos</a>
    @endif

</div>