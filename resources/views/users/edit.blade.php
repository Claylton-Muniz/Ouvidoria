@extends('layouts.master')

@section('title', '- Atualizar de Usuário')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Gestão de Usuários</h1>
    <p class="mb-4">Você está editando o usuário <span class="text-danger"><u>{{$user->user_name}}</u></span></p>
    <!-- Formulário Adicionar -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Atualizar Usuário</h6>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('users.update', ['user'=> $user]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="user_name">Nome do Usuário</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') ?? $user->user_name }}" required >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="login">Login / E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $user->email }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="" >
                    </div>                        
                </div>
                <hr>
                <h6 class="m-2 font-weight-bold text-danger">Perfis do Usuário</h6>
                <div class="form-row">
                    @foreach ($roles as $role)
                        <div class="form-group col-md-4">
                            <input type="checkbox" name="acl_{{$role->id}}" class="minimal-red" {{ ($role->can == 1 ? 'checked' : '') }}>
                            <label for="acl_{{$role->id}}">{{$role->name}}</label> 
                        </div> 
                    @endforeach
                </div> 
                <hr>
                <button type="submit" class="btn btn-warning">Atualizar Usuário</button>
                
            </form>
            
        </div>
    </div>

@endsection
@section('js')
    <script>
       
    </script>
@endsection