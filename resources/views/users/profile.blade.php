@extends('layouts.master')

@section('title', '- Perfil de Usuário')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{$user->user_name}}, você está editando o seu Perfil</h1> 
    <!-- Formulário editar perfil -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- <form> -->
            <form role="form"  action="{{ route('users.updateProfile', ['user'=> $user]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="user_name">Nome</label>
                        <input type="text" class="form-control" id="user_name" value="{{ $user->user_name }}" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="login">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                     
                    <div class="form-group col-md-4">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="nova senha">
                    </div>

                </div>
                <button type="submit" class="btn btn-warning">Alterar</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // código JavaScript aqui
    </script>
@endsection