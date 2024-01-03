<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\OuvidoriaForms;
use App\Models\OuvidoriaQuestions;
use App\Models\OuvidoriaResponse;

class FormsController extends Controller
{
    // Páginas

    public function index(OuvidoriaResponse $data) {
        $datas = $data->all();

        return view('ouvidoria.index', compact('datas'));
    }

    public function forms(OuvidoriaForms $form) {
        $forms = $form->all();

        return view('ouvidoria.forms', compact('forms'));
    }

    public function form(Request $r, OuvidoriaForms $form, OuvidoriaQuestions $question) {
        $data = [
            'typ' => $r->typ
        ];

        $forms = $form->all();
        $questions = $question->all();

        return view('ouvidoria.form', $data, compact('forms', 'questions'));
    }

    public function create() {
        return view('ouvidoria.create');
    }

    public function questions() {
        return view('ouvidoria.questions');
    }

    /** Funcionalidades */

    public function save(Request $request) {
        $request->validate([
            'servidor' => 'required|string',
            'entrevistado' => 'nullable|string',
            'tipo_form' => 'required|string',
            'data_atual' => 'nullable|date',
            'data_nasc' => 'nullable|date',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string',
            'endereco' => 'nullable|string',
            'sexo' =>  'nullable|in:Masculino,Feminino,Outro,PND',
            'mensagem' => 'nullable|string',
        ]);

        $data = $request->except('_token');

        $data['data_atual'] = Carbon::now()->format('d-m-y');

        $data['tipo_form'] = $request->input('tipo_form', 'Erro ao enviar o nome');
        $data['entrevistado'] = $data['entrevistado'] ?? 'anônimo';
        $data['email'] = $data['email'] ?? '';
        $data['data_nasc'] = $data['data_nasc'] ?? null;
        $data['telefone'] = $data['telefone'] ?? '';
        $data['endereco'] = $data['endereco'] ?? '';
        $data['mensagem'] = $data['mensagem'] ?? '';

        // dd($data);
        OuvidoriaResponse::create($data);

        return redirect('ouvidoria/forms')->with('success', 'Dados enviados com sucesso!');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string',
            'icon' => 'nullable|string'
        ]);

        $data = $request->except('_token');

        OuvidoriaForms::create($data);

        return redirect('ouvidoria/forms/questions')->with('success', 'Dados enviados com sucesso!');
    }

    public function storeQuestion(Request $request) {
        $request->validate([
            'question.*' => 'required|string'
        ]);

        $maxFormId = OuvidoriaForms::max('id');

        $questions = $request->input('question');

        foreach ($questions as $question) {
            OuvidoriaQuestions::create([
                'form_id' => $maxFormId,
                'question' => $question
            ]);
        }

        return redirect('ouvidoria/forms')->with('success', 'Dados enviados com sucesso!');
    }

}
