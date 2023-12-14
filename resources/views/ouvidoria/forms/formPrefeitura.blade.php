@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')

@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Formulário da prefeitura</h1>

    @component('components.ouvidoria.form')
        Test
    @endcomponent

@endsection
