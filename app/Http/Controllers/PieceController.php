<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function index()
    {
        $pieces=Piece::all();
        return view('admin.pieces.index',compact('pieces'));
                   
    }
    public function search()
    {
         $word = request('search');
         $pieces = Piece::where('nompiece','like','%'. $word .'%')
         ->orWhere ('referencep','like','%'. $word .'%')
         ->get();
         return view('admin.pieces.search', compact('pieces'));
 
    }

    public function create()
    {
       
        return view('admin.pieces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nompiece' => 'required',
            'referencep' => 'required',
            'fournisseur' => 'required',
            'prix' => 'required',
            
        ]);
        
        Piece::create([
            'nompiece'=>$request->input('nompiece'),
            'referencep'=>$request->input('referencep'),
            'prix'=>$request->input('prix'),
            'fournisseur'=>$request->input('fournisseur'),
        ]);
        return redirect()->route('pieces.index')
                        ->with('success','piece creer avec success.');
    }

    public function edit($id)
    {
        $p = Piece::findOrFail($id);
        return view('admin.pieces.edit', compact('p'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nompiece' => 'required',
            'referencep' => 'required',
            'fournisseur' => 'required',
            'prix' => 'required',
        ]);
        
        $piece = Piece::findOrFail($id);
        $piece->nompiece = $request->input('nompiece');
        $piece->referencep = $request->input('referencep');
        $piece->fournisseur = $request->input('fournisseur');
        $piece->prix = $request->input('prix');
        $piece->save();
    
        return redirect()->route('pieces.index')
                        ->with('success', 'piece mis à jour avec succès');
    }


    public function delete(){
        $piece_id=request('txtId');
     
        $piece=Piece::find($piece_id);
        try{
           $piece->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }
  
     }
     public function show()
     {
      $piece_id = request('piece_id');
      $piece = Piece::find($piece_id);
      return view ('admin.pieces.show',compact('piece'));
     }


     //partie mecanicien
     public function indexm()
    {
        $pieces=Piece::all();
        return view('mecanicien.pieces.index',compact('pieces'));
                   
    }
    public function searchm()
    {
         $word = request('search');
         $pieces = Piece::where('nompiece','like','%'. $word .'%')
         ->orWhere ('referencep','like','%'. $word .'%')
         ->get();
         return view('mecanicien.pieces.search', compact('pieces'));
 
    }

    public function createm()
    {
       
        return view('mecanicien.pieces.create');
    }

    public function storem(Request $request)
    {
        $request->validate([
            'nompiece' => 'required',
            'referencep' => 'required',
            'fournisseur' => 'required',
            'prix' => 'required',
            
        ]);
        
        Piece::create([
            'nompiece'=>$request->input('nompiece'),
            'referencep'=>$request->input('referencep'),
            'prix'=>$request->input('prix'),
            'fournisseur'=>$request->input('fournisseur'),
        ]);
        return redirect()->route('pieces.indexm')
                        ->with('success','piece creer avec success.');
    }

    public function editm($id)
    {
        $p = Piece::findOrFail($id);
        return view('mecanicien.pieces.edit', compact('p'));
    }

    public function updatem(Request $request, $id)
    {
        $request->validate([
            'nompiece' => 'required',
            'referencep' => 'required',
            'fournisseur' => 'required',
            'prix' => 'required',
        ]);
        
        $piece = Piece::findOrFail($id);
        $piece->nompiece = $request->input('nompiece');
        $piece->referencep = $request->input('referencep');
        $piece->fournisseur = $request->input('fournisseur');
        $piece->prix = $request->input('prix');
        $piece->save();
    
        return redirect()->route('pieces.indexm')
                        ->with('success', 'piece mis à jour avec succès');
    }


    public function deletem(){
        $piece_id=request('txtId');
     
        $piece=Piece::find($piece_id);
        try{
           $piece->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }
  
     }
     public function showm()
     {
      $piece_id = request('piece_id');
      $piece = Piece::find($piece_id);
      return view ('mecanicien.pieces.show',compact('piece'));
     }
}
