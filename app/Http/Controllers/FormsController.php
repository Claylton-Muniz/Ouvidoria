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
        file_put_contents(resource_path('views/ouvidoria/forms/generated_form.blade.php'), $request->input('questions'));

        return redirect('ouvidoria/forms/create')->with('success', 'Formulário criado com sucesso!');
    }

}
