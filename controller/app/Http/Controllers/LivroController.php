<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index() {
        $livros = ["Harry Potter", "Percy Jackson", "O Hobbit"];

        return view('lista_livros', ['livros' => $livros]);
    }

    public function show($id){
        return "Você está vendo os detalhes do livro número: " . $id;
    }
}