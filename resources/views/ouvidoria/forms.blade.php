@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Formulários</h1>

    <div class="select-forms">
        <a href="#">
            <button class="btn btn-primary" type="button">
                <div class="inline-container">
                    <x-icon name="building" cor="#ffffff" />
                    <span>Prefeitura</span>
                </div>
            </button>
        </a>
        <a href="#">
            <button class="btn btn-primary" type="button">
                <div class="inline-container">
                    <x-icon name="hat" cor="#ffffff" />
                    <span>Pe. Cicero</span>
                </div>
            </button>
        </a>
        <a href="forms/create">
            <button class="btn btn-primary" id="createForm" type="button">
                <div class="inline-container">
                    <x-icon name="plus" cor="#ffffff" />
                    <span>Criar</span>
                </div>
            </button>
        </a>
    </div>
@endsection
