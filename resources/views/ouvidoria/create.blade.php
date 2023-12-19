@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Criar Formulário</h1>

    @if (request()->has('num-questions'))
        <form action="{{ route('create.form') }}" method="post">
            @csrf

            <div class="name">
                <label for="title">Nome do formulário:</label>
                <input type="text" name="title" id="title">
            </div>

            @php
                $maxQuestions = min(15, max(0, intval(request('num-questions'))));

                for ($i = 1; $i <= $maxQuestions; $i++) {
            @endphp

                <div class="quest">
                    <label for="questions{{$i}}">{{$i}}º pergunta:</label>
                    <input type="text" name="questions{{$i}}" id="questions{{$i}}">
                    <br>
                </div>

            @php
                }
            @endphp

            <button type="submit">Criar Formulário</button>
        </form>
    @else
            <form>
                <div class="quant">
                    <input class="button-inc" id="decrement" type="button" onclick="stepper(this)" value="-">
                    <input type="number" name="num-questions" min="1" max="15" step="1" value="1" id="num-questions" readonly>
                    <input class="button-inc" id="increment" type="button" onclick="stepper(this)" value="+">
                </div>
                <button class="btn btn-primary" id="confirm" type="submit">Confirmar</button>
            </form>
    @endif

    <script src="{{ asset('js/incremment.js') }}"></script>
@endsection
