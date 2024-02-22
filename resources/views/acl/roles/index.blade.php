@extends('layouts.master')

@section('title', '- Perfis de Usuário')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Configurações</h1>
    <h2 class="h4 mb-2 text-red-800 text-danger">Perfis de Usuário</h2>
    <p class="mb-4">Gerenciamentos dos perfis de usuários.</p>
    
    
        <!-- Formulário Adicionar -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Perfil de Usuário</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="name">Nome do Perfil</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Digite o nome do perfil" value="{{ old('name') }}" required>
                            </div>                 
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Perfis</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="dataTableRoles" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome do Perfil</th>
                                        <th>Permissões</th>
                                        <th>Registro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var routeRoles = "{{route('roles.load')}}";
            var TableRoles = $('#dataTableRoles').DataTable({ 
                searching: true,
                responsive: true,        
                "pageLength": 10,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: routeRoles,                        
                },
                "columns": [            
                    {data: 'id', name:'id'},
                    {
                        data: 'name',
                        name: 'name',
                        render: function (data, type, full, meta) {
                            return '<a href="' + full.routeEdit + '">' + data + '</a>';  
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function (data, type, full, meta) {
                            var created_at = new Date(full.created_at);
                            var formatted_date = created_at.toLocaleString('pt-BR', {day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute:'2-digit'});
                            return '<small class="text-gray-500">registrado em: ' + formatted_date + '</span>';  
                        }
                    },
                ],
                "language": {
                    "paginate": {
                      "next": "Próxima",
                      "previous": "Anterior"
                    },
                    "search": "Buscar",
                    "info": "Mostrando de _START_ a _END_ de _TOTAL_ usuários",
                    "infoFiltered": "(Filtrados de _MAX_ usuários)",
                    "lengthMenu": "Mostrar _MENU_ usuários",
                    "infoThousands": ".",
                    "emptyTable": "Nenhum registro encontrado",
                    "zeroRecords": "Nenhum registro correspondente encontrado",
                    "loadingRecords": "Carregando...",
                  },
            });


        });
    </script>
@endsection