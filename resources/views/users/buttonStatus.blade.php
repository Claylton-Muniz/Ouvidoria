
@can('Ativar/Desativar Usuário')
    @if($user->user_status == 0)
        <button type="button" class="btn btn-info btn-sm active-user" data-active-route="{{route('users.active',['user' => $user])}}"><small>Ativar</small></button>
    @elseif($user->user_status == 1)
        
        <button type="button" class="btn btn-warning btn-sm deactivate-user" data-deactivate-route="{{route('users.deactivate',['user' => $user])}}"><small>Desativar</small></button>
    @endif
@endcan
