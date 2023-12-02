@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Formulários</h1>

    <div class="select-forms">
        <a href="#">
            <input class="btn btn-primary" type="button" value="Prefeitura">
        </a>
        <a href="#">
            <input class="btn btn-primary" type="button" value="Pe. Cicero">
        </a>
        <a href="#">
            <input class="btn btn-primary" id="createForm" type="button" value="+ Criar">
        </a>
    </div>
@endsection
