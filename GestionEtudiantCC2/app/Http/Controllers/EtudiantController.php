<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    public function index()
    {   
        $data = Etudiant::with('filiere')->get();
        if (Auth::user()->type === 'admin') {
        return view('etudiants.index_admin', compact('data'));
    }else{
        return view('etudiants.index_etudiant', compact('data'));   
    }}


    public function create(){
        if (Auth::user()->type === 'admin') {
        $filieres = Filiere::all();
        return view('etudiants.form', compact('filieres'));
    }else{
        return view('etudiants.index_etudiant', compact('data'));   
    }}
    
    public function store(Request $request)
    {           if (Auth::user()->type === 'admin') {

       
        $user = User::updateOrCreate(
            ['email' => $request->input('user.email')],
            [
                'name' => $request->input('user.name'),
                'password' => Hash::make($request->input('user.password')),
                'type' => $request->input('user.type'),

            ]
        );

        
        $etudiant = Etudiant::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'sexe' => $request->input('sexe'),
            'filiere_id' => $request->input('filiere_id'),
            'user_id' => $user->id,
        ]);

        return redirect()->route('etudiants.index');
    }else{
        return view('etudiants.index_etudiant', compact('data'));   
    }}


    public function update(Request $request, $id){
       
        
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->except('user'));

        
        $user = User::updateOrCreate(
            ['email' => $request->input('user.email')],
            [
                'name' => $request->input('user.name'),
                'password' => Hash::make($request->input('user.password')),
                'type' => Auth::user()->type,

            ]
        );

        
        $etudiant->user()->associate($user);
        $etudiant->save();

        return redirect()->route('etudiants.index');
    }

    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        return view('etudiants.show', compact('etudiant'));

    }
    public function edit($id){
        $etudiant = Etudiant::findOrFail($id);
        $filieres = Filiere::all();
        return view('etudiants.form', compact('etudiant', 'filieres'));
    }


    public function destroy($id){
        Etudiant::destroy($id);
        return redirect()->route('etudiants.index');
    }

}
