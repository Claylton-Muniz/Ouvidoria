@extends('layouts.master')

@section('title', '- Alterar Permissão')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Gestão de Permissões de Acesso</h1>
    <!-- Formulário Adicionar -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Alterar Permissão</h6>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('permissions.update', ['permission' => $permission]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')     
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Nome da Permissão</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Digite o nome da permissão" value="{{ old('name') ?? $permission->name }}" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="group">Grupo da Permissão</label>
                        <input type="text" class="form-control" id="group" name="group"
                            placeholder="Digite o group da permissão"  value="{{ old('group') ?? $permission->group }}" required>
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