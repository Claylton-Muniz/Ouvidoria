@extends('layouts.master')

@section('title', '- Permissões de Perfil')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Permissões para <span class="text-danger"><u>{{$role->name}}</u></span></h1>
    <p class="mb-4"> </p>
    <!-- Formulário Adicionar -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Permissões</h6>
            <button class="btn btn-primary btn-icon-split" id="select-all-btn">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Selecionar Todos</span>
            </button>
            
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <form role="form" action="{{ route('roles.permissionsSync', ['role'=> $role]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')                    
                    <div class="form-row">
                
                        
                        @foreach($permissions as $group => $groupPermissions)
                            <div class="form-group col-md-4">
                                <dl>
                                    <dt>
                                        <h6 class="m-2 font-weight-bold text-danger">{{$group}} <button type="button" class="btn btn-primary btn-icon-split btn-sm select-group-btn" data-group="{{ $group }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Selecionar Todos</span>
                                        </button></h6>
                                        
                                    </dt>
                                    
                                    @foreach($groupPermissions as $permission)
                                        <dd>
                                            <input type="checkbox" id="{{ $permission->id }}" name="{{ $permission->id }}"
                                                 data-group="{{ $group }}"
                                                class="minimal-red group-permission" {{ $permission->can ? 'checked' : '' }} />
                                            <label for="formularios_almoxarifado">{{ $permission->name }}</label> 
                                        </dd>
                                    @endforeach
                                </dl>
                            </div>
                        @endforeach      
                    </div>
                             
                    <button type="submit" class="btn btn-primary">Sincronizar Perfil</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        // código JavaScript aqui
        $(document).ready(function() {
            $('#select-all-btn').click(function() {
                var isChecked = $(this).data('checked');
            
                $('.group-permission').prop('checked', !isChecked);
                $(this).data('checked', !isChecked);

                var icon = !isChecked ? 'fas fa-times' : 'fas fa-check';
                var text = !isChecked ? 'Desmarcar Todos' : 'Selecionar Todos';

                $(this).html('<span class="icon text-white-50"><i class="' + icon + '"></i></span><span class="text">' + text + '</span>');
            });
            

            //$('.select-all-group').change(function() {
            //    var group = $(this).data('group');
            //    var isChecked = $(this).prop('checked');
            //    $('.group-permission[data-group="' + group + '"]').prop('checked', isChecked);
            //});

            $('.group-permission').change(function() {
                var group = $(this).data('group');
                var allChecked = $('.group-permission[data-group="' + group + '"]:checked').length === $('.group-permission[data-group="' + group + '"]').length;
                $('.select-group-btn[data-group="' + group + '"]').data('checked', allChecked);
                updateGroupButton($('.select-group-btn[data-group="' + group + '"]'), allChecked);
            });

            $('.select-group-btn').click(function() {
                var group = $(this).data('group');
                var isChecked = $(this).data('checked');
                $('.group-permission[data-group="' + group + '"]').prop('checked', !isChecked);
                $(this).data('checked', !isChecked);
                updateGroupButton($(this), !isChecked);
            });

            function updateGroupButton(button, isChecked) {
                var icon = isChecked ? 'fas fa-times' : 'fas fa-check';
                var text = isChecked ? 'Desmarcar Todos' : 'Selecionar Todos';
                button.html('<span class="icon text-white-50"><i class="' + icon + '"></i></span><span class="text">' + text + '</span>');
            }
        });
    </script>
@endsection