<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FiliereController extends Controller
{
    public function index(){
        $filieres = Filiere::all();
        if (Auth::user()->type === 'admin') {
        return view('filieres.index_admin', compact('filieres'));
    }else{
        return view('filieres.index_etudiant', compact('filieres'));   
    }
    }

    public function create(){
        if (Auth::user()->type === 'admin') {
        return view('filieres.form');
    }else{
        return view('filieres.index_etudiant', compact('data'));   
    }
    }
    public function store(Request $request){
       Filiere::create($request->all());
       return redirect()->route('filiere.index');
    }
    public function show($id)
    {        if (Auth::user()->type === 'admin') {
        $filieres = Filiere::find($id);
        return view('filieres.show', compact('filieres'));
        }else{
        return view('filieres.index_etudiant', compact('data'));   
    }

    }
    public function edit($id){
        $filiere = Filiere::find($id);
        return view('filieres.form', compact('filiere'));
    }

    public function update(Request $request){
        $filiere = Filiere::find($request->id);
        $filiere->update($request->all());
        return redirect()->route('filiere.index');
    }

    public function destroy($id){
        Filiere::destroy($id);
        return redirect()->route('filiere.index');
    }
}
