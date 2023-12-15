@extends('layouts.master')

@section('title', '- Ouvidoria')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Formulário da prefeitura</h1>

    <x-ouvidoria.form>
        <x-ouvidoria.question>
            1 - Qual sua opinião sobre a infraestrutura municipal?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            2 - Qual sua opinião sobre a limpeza pública municipal?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            3 - Qual sua opinião sobre a prestação dos serviços ofertados pela saúde?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            4 - Como você avalia o atendimento recebido pelos servidores da saúde?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            5 - Qual sua opinião sobre a educação no âmbito municipal?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            6 - Como você avalia o atendimento recebido pelos servidores da educação?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            7 - Qual sua opinião sobre a segurança pública no município?
        </x-ouvidoria.question>
        <x-ouvidoria.question>
            8 - Qual sua avaliação sobre a gestão municipal?
        </x-ouvidoria.question>
    </x-ouvidoria.form>

@endsection
