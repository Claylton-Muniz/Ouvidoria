<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreApiRequest;

use App\Models\User;
use App\Models\OuvidoriaForms;
use App\Models\OuvidoriaQuestions;
use App\Models\OuvidoriaResponse;
use App\Models\OuvidoriaQuestionsResponse;

use App\Http\Resources\UsersResource;
use App\Http\Resources\FormsResource;
use App\Http\Resources\QuestionsResource;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\QuestionsResponseResource;

class FormsApiController extends Controller
{
    /** Api */

    /** GET */
    public function users() {
        $data = User::all();

        return UsersResource::collection($data);
    }

    public function forms() {
        $data = OuvidoriaForms::all();

        return FormsResource::collection($data);
    }

    public function questions() {
        $data = OuvidoriaQuestions::all();

        return QuestionsResource::collection($data);
    }

    public function response() {
        $data = OuvidoriaResponse::all();

        return ResponseResource::collection($data);
    }

    public function questionResponse() {
        $data = OuvidoriaQuestionsResponse::all();
        // dd($data[0]->response_id);

        return QuestionsResponseResource::collection($data);
    }

    /** POST */
    public function responseStore(StoreApiRequest $request) {
        $forms = $request->all();
        $questionsResponse = $forms['respostas'];

        unset($forms['respostas']);
        // dd($questionsResponse);
        $info = [
            "servidor" => $forms['servidor'],
            "entrevistado" => $questionsResponse[0]['respostaAberta'],
            "tipo_form" => $forms['idFormulario'],
            "endereco" => $questionsResponse[1]['respostaAberta'],
            "data_nasc" => null, //modificar depois
            "email" => $questionsResponse[3]['respostaAberta'],
            "telefone" => "",
            "sexo" => $questionsResponse[4]['respostaFechada'][0],
            "mensagem" => null
        ];


        for ($i = 5; $i < count($questionsResponse); $i++) {
            $data[] = $questionsResponse[$i];
        }

        $count = OuvidoriaQuestions::where('form_id', $info['tipo_form'])->count();

        $nQuestion = 1;
        $maxId = OuvidoriaResponse::max('id');

        for ($i = 1; $i <= $count; $i++) {
            $questions[] = [
                'response_id' => $maxId + 1,
                'n_question' => $nQuestion++,
                'info' => $data[$i - 1]['respostaFechada'][0],
                'comment' => $data[$i - 1]['respostaAberta'] ?? ''
            ];
        }

        // dd($questions);
        $form = OuvidoriaResponse::create($info);
        foreach ($questions as $question) {
            OuvidoriaQuestionsResponse::create($question);
        }

        return new ResponseResource($form);
    }
}
