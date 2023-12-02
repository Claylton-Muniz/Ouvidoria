@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')

@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Criar Formulário</h1>

    <form action="store" method="post">
        @csrf

        <!-- Adicione campos do formulário conforme necessário -->
        <label for="questions">Perguntas:</label>
        <textarea name="questions" id="questions" rows="5"></textarea>

        <button type="submit">Criar Formulário</button>
    </form>
@endsection
