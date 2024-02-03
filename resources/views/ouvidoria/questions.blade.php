@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Criar Formulário</h1>

    @if (request()->has('num-questions') && request()->has('nome'))
        <form action="{{ route('saveQuestions.form') }}" method="post">
            @csrf

            <input type="hidden" name="nome" value="{{ request('nome') }}" id="nome">

            <div class="container_form">
                @php
                    $maxQuestions = min(15, max(0, intval(request('num-questions'))));

                    for ($i = 1; $i <= $maxQuestions; $i++) {
                @endphp

                    <div class="form_grupo">
                        <label for="questions{{$i}}" class="form_label">{{$i}}º pergunta:</label>
                        <input type="text" name="question[]" class="form_input" id="questions{{$i}}" required>
                    </div>

                @php
                    }
                @endphp
                <div class="submit">
                    <button type="submit" name="Submit" class="btn btn-primary">Criar Formulário</button>
                </div>
            </div>

        </form>
    @else
            <form>
                <input type="hidden" name="nome" value="{{ request('nome') }}" id="nome">
                <div class="quant">
                    <input class="button-inc" id="decrement" type="button" onclick="stepper(this)" value="-">
                    <input type="number" name="num-questions" min="1" max="15" step="1" value="1" id="num-questions" readonly>
                    <input class="button-inc" id="increment" type="button" onclick="stepper(this)" value="+">
                </div>
                <button class="btn btn-primary" id="confirm" type="submit">Confirmar</button>
            </form>
    @endif

@endsection

@section('js')
    <script src="{{ asset('js/incremment.js') }}"></script>
@endsection
