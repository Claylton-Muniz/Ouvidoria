<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index() {
        return view('ouvidoria.index');
    }

    public function forms() {
        return view('ouvidoria.forms');
    }



    public function create() {
        return view('ouvidoria.create');
    }

    public function store(Request $request) {

        $lastNumber = $this->getLastNumber();
        $num = $lastNumber + 1;

        $nameForm = 'new_form_' . $num . '.blade.php';
        $formPath = resource_path('views/ouvidoria/new_forms/' . $nameForm);

        $content = <<<EOD
        @extends('layouts.master')

        @section('title', '- Ouvidoria')

        @section('css')

        @endsection

        @section('content')\n\t
        EOD;

        $content .= '<h1 class="h3 mb-2 text-gray-800">' . $request->input('title') . '</h1>';


        for ($i=1; $i <= 15; $i++) {
            if ($request->input('questions'.$i) == '') {
                break;
            }
            $title = '<p>' . $request->input('questions'.$i) . '</p>';

            $content .= "\n\t" . $title;
        }

        $content .= "\n@endsection";

        file_put_contents($formPath, $content);

        return redirect('ouvidoria/forms/create')->with('success', 'Formulário criado com sucesso!');
    }

    private function getLastNumber() {
        $files = scandir(resource_path('views/ouvidoria/new_forms/'));
        $formFiles = preg_grep('/^new_form_\d+\.blade\.php$/', $files);

        if (empty($formFiles)) {
            return 0;
        }

        $formNumbers = array_map(function ($file) {
            preg_match('/^new_form_(\d+)\.blade\.php$/', $file, $matches);
            return isset($matches[1]) ? (int)$matches[1] : 0;
        }, $formFiles);

        return max($formNumbers);
    }

    public function formPrefeitura() {
        return view('ouvidoria.forms.formPrefeitura');
    }

    public function formPeCicero() {
        return view('ouvidoria.forms.formPeCicero');
    }

}
