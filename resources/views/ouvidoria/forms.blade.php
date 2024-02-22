@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')
    <link href="{{ asset('css/formsChose.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Formulários</h1>

    <div class="select-forms">
        @php
            $i = 0;
        @endphp
        @foreach ($forms as $form)
            <a href="form/{{$i++}}/new">
                <button class="btn btn-primary" type="button">
                    <div class="inline-container">
                        <x-icon name="{{$form->icon}}" cor="#ffffff" />
                        <span>{{$form->nome}}</span>
                    </div>
                </button>
            </a>
        @endforeach

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
