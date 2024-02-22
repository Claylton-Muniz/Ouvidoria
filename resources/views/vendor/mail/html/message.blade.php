<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
<p style="text-align: center; width:250px;" >
    <img src="https://ci6.googleusercontent.com/proxy/iIPdXDSnwnC5jE_22hn9Jru-gYw-31dhA8WK1-V0YVV-0AYXAnAezOqQec060AVg0YWGUu5rvMASEk5P3BqKQzfmnQ0pMxgptdw9urqi9x0QlsUswdml=s0-d-e1-ft#https://painel-egp.programaeficiencia.com.br/img/assinaturaEmail.jpg">
</p>

</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} Porgrama Eficiência. @lang('Todos os direitos reservados.')
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
