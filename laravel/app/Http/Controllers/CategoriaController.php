<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function createCategoria(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required'
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        Categorie::create($incomingFields);
        return redirect('/');
    }
    public function deleteCategoria(Categorie $categorie){
        $categorie->delete();
        return redirect('/');
    }
}
