@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Criar Formulário</h1>

    <form action="{{ route('create.form') }}" method="POST">
        @csrf()
        <div class="container_name">
            <div class="form_name">
                <label for="nome_form" class="form_label">Nome do formulário</label>
                <input type="text" name="nome" class="form_input" id="nome" placeholder="formulário" required>
            </div>
            <button class="btn btn-primary" type="submit">Confirmar</button>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{ asset('js/incremment.js') }}"></script>
@endsection
