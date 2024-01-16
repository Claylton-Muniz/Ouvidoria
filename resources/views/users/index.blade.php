@extends('layouts.master')

@section('title', '- Usuários')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Gestão de Usuários</h1>
    <!-- Formulário Adicionar -->
    @can('Cadastrar Usuário')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Adicionar Usuário</h6>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <form role="form" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="user_name">Nome do Usuário</label>
                            <input type="text" class="form-control" id="user_name" name="user_name"  value="{{ old('user_name') }}" placeholder="" required >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="login">Login / E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                        </div>                        
                    </div>
                               
                    <button type="submit" class="btn btn-primary">Cadastrar novo Usuário</button>
                </form>
            </div>
        </div>
    </div>
    @endcan
    @can('Listar Usuários')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuários</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTableUsers" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <tbody>
                </table>
            </div>
        </div>
    </div>   
    @endcan
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            
            var routeUsers = "{{route('users.load')}}";
            var TableUsers = $('#dataTableUsers').DataTable({ 
                "createdRow": function(row, data, dataIndex) {
                    $(row).find('td:eq(0), td:eq(1), td:eq(2)').addClass('small');
                },
                searching: true,
                responsive: true,        
                "pageLength": 10,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: routeUsers,                        
                },
                "columns": [            
                    {data: 'id', name:'id'}, 
                    {
                        data: 'user_name',
                        name: 'user_name',
                        render: function (data, type, full, meta) {
                            var created_at = new Date(full.created_at);
                            var formatted_date = created_at.toLocaleString('pt-BR', {day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute:'2-digit'});
                            return '<a href="' + full.routeEdit + '">' + data + '</a> <br><small class="text-gray-500">registrado em: ' + formatted_date + '</span>';  
                        }
                    },            
                    {data: 'email', name:'email'},
                    
                    
                    {data: 'statusButton', name:'statusButton', orderable: false},
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

            //ativar o usuário
            $(document).on('click', '.active-user', function() {
                var routeActiveUser = $(this).data('active-route');
                $.ajax({
                    url: routeActiveUser,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                    _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        TableUsers.ajax.reload(null, false);
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseJSON.message);
                    }
                });
            });
            //desativar o usuário
            $(document).on('click', '.deactivate-user', function() {
                var routeActiveUser = $(this).data('deactivate-route');
                $.ajax({
                    url: routeActiveUser,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                    _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        TableUsers.ajax.reload(null, false);
                    },
                    error: function(xhr, status, error) {
                       alert(xhr.responseJSON.message);
                    }
                });
            });
            
            

        });
    </script>
@endsection