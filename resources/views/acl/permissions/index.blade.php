@extends('layouts.master')

@section('title', '- Permissões de Acesso')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Configurações</h1>
    <h2 class="h4 mb-2 text-red-800 text-danger">Permissões de Acesso</h2>
    <p class="mb-4">Gerenciamento de Permissões de Acesso.</p>
    
        <!-- Formulário Adicionar -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Permissão</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">Nome da Permissão</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Digite o nome da permissão" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="name">Grupo da Permissão</label>
                                    <input type="text" class="form-control" id="group" name="group"
                                        placeholder="Digite o group da permissão"  value="{{ old('group') }}" required>
                                </div>
                            </div>                 
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    
        <!-- DataTales -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Permissões</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="dataTablePermissions" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome da Permissão</th>
                                        <th>Grupo</th>
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
            var routePermissions = "{{route('permissions.load')}}";
            var TablePermissions = $('#dataTablePermissions').DataTable({ 
                searching: true,
                responsive: true,        
                "pageLength": 10,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: routePermissions,                        
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
                    {data: 'group', name:'group'},
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