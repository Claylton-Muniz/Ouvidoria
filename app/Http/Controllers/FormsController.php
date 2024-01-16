<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\OuvidoriaForms;
use App\Models\OuvidoriaQuestions;
use App\Models\OuvidoriaResponse;
use App\Models\OuvidoriaQuestionsResponse;

class FormsController extends Controller
{
    // Páginas

    public function index(OuvidoriaResponse $data, OuvidoriaForms $form) {
        $datas = $data->all();
        $forms = $form->all();

        return view('ouvidoria.index', compact('datas', 'forms'));
    }

    public function forms(OuvidoriaForms $form) {
        $forms = $form->all();

        return view('ouvidoria.forms', compact('forms'));
    }

    public function form(
        Request $r,
        OuvidoriaForms $form,
        OuvidoriaQuestions $question,
        OuvidoriaResponse $info,
        OuvidoriaQuestionsResponse $infoQuestion
    ) {
        $data = [
            'typ' => $r->typ,
            'id' => $r->id
        ];

        $forms = $form->all();
        $questions = $question->all();

        if ($data['id'] === 'new') {
            return view('ouvidoria.form', $data, compact('forms', 'questions'));
        } else {
            $data['id'] = intval($data['id']);
            $id = $data['id'] - 1;

            $infos = $info->all();

            $infoQuestions = $infoQuestion->where('response_id', $data['id'])->get();
            $inform = $infos[$id];

            // dd($infoQuestions);
            return view('ouvidoria.form', $data, compact('forms', 'questions', 'inform', 'infoQuestions'));
        }
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
            'data_atual' => 'nullable|date',
            'data_nasc' => 'nullable|date',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string',
            'endereco' => 'nullable|string',
            'sexo' =>  'nullable|in:Masculino,Feminino,Outro,PND',
            'mensagem' => 'nullable|string',
        ]);

        $data = $request->except('_token');

        $infos = [];
        $comments = [];
        $count = OuvidoriaQuestions::where('form_id', $data['tipo_form'])->count();

        for ($i = 1; $i <= $count; $i++) {
            $key = 'info' . $i;
            $keyComment = 'comment' . $i;

            $infos[$i - 1] = isset($data[$key]) ? $data[$key] : 'não informado';
            $comments[$i - 1] = isset($data[$keyComment]) ? $data[$keyComment] : '';

            unset($data[$keyComment]);
        }

        unset($data['Submit']);

        $id = isset($data['form_id']) ? intval($data['form_id']) : null;
        unset($data['form_id']);

        $data['tipo_form'] = intval($data['tipo_form']);

        $data['entrevistado'] = $data['entrevistado'] ?? 'anônimo';
        $data['email'] = $data['email'] ?? '';

        $data['data_atual'] = Carbon::now()->format('d-m-y');

        $data['data_nasc'] = $data['data_nasc'] ?? null;
        $data['telefone'] = $data['telefone'] ?? '';
        $data['endereco'] = $data['endereco'] ?? '';
        $data['mensagem'] = $data['mensagem'] ?? '';

        // dd($data);

        for ($i=1; $i <= 8; $i++) {
            if (isset($data['info'.$i])) unset($data['info'.$i]);
        }

        $nQuestion = 1;

        // dd($data);
        if ($id) {
            OuvidoriaResponse::where('id', $id)->update($data);
            OuvidoriaQuestionsResponse::where('response_id', $id)->delete();

            for ($i = 1; $i <= $count; $i++) {
                OuvidoriaQuestionsResponse::create([
                    'response_id' => $id,
                    'n_question' => $nQuestion++,
                    'info' => $infos[$i - 1],
                    'comment' => $comments[$i - 1]
                ]);
            }

        } else {
            OuvidoriaResponse::create($data);

            $maxId = OuvidoriaResponse::max('id');

            for ($i = 1; $i <= $count; $i++) {
                OuvidoriaQuestionsResponse::create([
                    'response_id' => $maxId,
                    'n_question' => $nQuestion++,
                    'info' => $infos[$i - 1],
                    'comment' => $comments[$i - 1]
                ]);
            }

        }

        return redirect('ouvidoria')->with('success', 'Dados enviados com sucesso!');
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
        // dd($questions);

        foreach ($questions as $question) {
            OuvidoriaQuestions::create([
                'form_id' => $maxFormId,
                'tipo_question' => 'Padrão',
                'question' => $question
            ]);
        }

        return redirect('ouvidoria/forms')->with('success', 'Dados enviados com sucesso!');
    }

}
