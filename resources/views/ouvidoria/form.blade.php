@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Formulário {{strtolower($forms[$typ]->nome)}}</h1>

    <form class="form" action="{{ route('send.form') }}" method="POST">
        @csrf()
        <input type="hidden" name="tipo_form" id="tipo_form" value="{{$typ+1}}">
        <x-ouvidoria.form>
            @php
                $i = 1;
            @endphp
            @foreach ($questions as $question)
                @if ($question->form_id == $forms[$typ]->id)
                    <x-ouvidoria.question name="info{{$i}}">
                            {{$i++}} - {{$question->question}}
                    </x-ouvidoria.question>
                @endif
            @endforeach
        </x-ouvidoria.form>
    </form>
@endsection
