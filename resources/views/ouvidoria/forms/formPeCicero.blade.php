@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('css')

@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Formulário da prefeitura</h1>

    <x-ouvidoria.form>
        <x-ouvidoria.question>
            1 - Como avalia as condições de hospedagem na Cidade?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            2 - Os pontos turísticos da cidade são fáceis de serem localizados?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            3 - Você utilizou algum serviço público municipal?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            4 - Como você avalia o serviço público utilizado?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            5 - Quais serviços públicos realizados pelo município você destaca na Cidade?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            6 - Qual serviço público deve ser melhorado no município de Juazeiro do Norte/CE para atender
            as necessidades dos romeiros?
        </x-ouvidoria.question>
    </x-ouvidoria.form>

@endsection
