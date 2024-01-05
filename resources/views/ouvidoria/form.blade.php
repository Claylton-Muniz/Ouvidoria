@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Formulário {{ strtolower($forms[$typ]->nome) }}</h1>

    <form class="form" action="{{ route('send.form') }}" method="POST">
        @csrf()
        <input type="hidden" name="form_id" id="form_id" value="{{ isset($inform) ? $inform->id : null }}">
        <input type="hidden" name="tipo_form" id="tipo_form" value="{{ $typ + 1 }}">

        <x-ouvidoria.form
            servidor="{{ isset($inform) ? $inform->servidor : '' }}"
            nome="{{ isset($inform) ? $inform->entrevistado : '' }}"
            data="{{ isset($inform) ? $inform->data_nasc : '' }}"
            email="{{ isset($inform) ? $inform->email : '' }}"
            telefone="{{ isset($inform) ? $inform->telefone : '' }}"
            endereco="{{ isset($inform) ? $inform->endereco : '' }}"
            sexo="{{ isset($inform) ? $inform->sexo : '' }}"
            mensagem="{{ isset($inform) ? $inform->mensagem : '' }}"
        >

            @php $i = 1; @endphp
            @foreach ($questions as $question)
                @if ($question->form_id == $forms[$typ]->id)
                    <x-ouvidoria.question
                        name="info{{ $i }}"
                        avaliacao="{{ isset($infoQuestions) ? $infoQuestions[$i-1]->info : '' }}"
                    >
                        {{ $i++ }} - {{ $question->question }}
                    </x-ouvidoria.question>
                @endif
            @endforeach

        </x-ouvidoria.form>
    </form>
@endsection
