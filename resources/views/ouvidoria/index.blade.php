@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')
    <link href="{{ asset('css/ouvidoria.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Ouvidoria</h1>
    <a href="ouvidoria/forms">
        <input class="btn btn-primary" type="button" value="Formulários">
    </a>

    <div class="search">
        <div class="input-group mb-3" style="margin-top: 10px;">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-search" style="font-size: 1rem; width: 1.5rem;"></i>
                </span>
            </div>
            <input type="text" id="searchInput" class="form-control" style="padding-left: 10px;" placeholder="Pesquisar...">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-sm" id="dataTableForms" cellspacing="0">
                <tr id="title">
                    <th>Id.</th>
                    <th>Servidor</th>
                    <th>Tipo de formulário</th>
                    <th>Data</th>
                    <th>Participante</th>
                    <th>Editar</th>
                </tr>
                <tr>
                    <td>01</td>
                    <td>Claylton Muniz</td>
                    <td>Padre Cícero</td>
                    <td>28/11/23</td>
                    <td>Paulo Vitor</td>
                    <td>lap.</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
