@extends('layouts.master')

@section('title', '- Alterar Perfil')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Gestão de Perfis</h1>
    <!-- Formulário Adicionar -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Alterar Perfil</h6>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <form role="form" action="{{ route('roles.update', ['role'=> $role]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group ">
                        <label for="nome_prefeitura">Nome do Perfil</label>
                        <input type="text" class="form-control" id="name" name="name" required
                         placeholder="Digite o nome do perfil" value="{{ old('name') ?? $role->name }}">
                    </div>               
                    <button type="submit" class="btn btn-warning">Alterar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        // código JavaScript aqui
    </script>
@endsection