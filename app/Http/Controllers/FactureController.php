<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Reparation;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        $factures=Facture::all();
        return view('admin.factures.index',compact('factures'));
                   
    }


    public function create()
    {
       
        return view('admin.factures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required',
            'chargeSupp' => 'required',
            'montant' => 'required',
        ]);
        
        Facture::create([
            'description'=>$request->input('description'),
            'chargeSupp'=>$request->input('chargeSupp'),
            'montant'=>$request->input('montant'),

        ]);
        return redirect()->route('factures.index')
                        ->with('success','facture creer avec success.');
    }
    public function edit($id)
    {
        $f = Facture::findOrFail($id);
        return view('admin.factures.edit', compact('f'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description'=>'required',
            'chargeSupp' => 'required',
            'montant' => 'required',
        ]);
        
        $facture = Facture::findOrFail($id);
        $facture->description = $request->input('description');
        $facture->chargeSupp = $request->input('chargeSupp');
        $facture->montant = $request->input('montant');
        $facture->save();
    
        return redirect()->route('factures.index')
                        ->with('success', 'facture mis à jour avec succès');
    }


    public function delete(){
        $facture_id=request('txtId');
     
        $facture=Facture::find($facture_id);
        try{
           $facture->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }
  
     }
    //partie client
    public function indexcl()
    {
        $factures=Facture::all();
        return view('client.factures.index',compact('factures'));
                   
    }


    public function createcl()
    {
       
        return view('client.factures.create');
    }

    public function storecl(Request $request)
    {
        $request->validate([
            'description'=>'required',
            'chargeSupp' => 'required',
            'montant' => 'required',
        ]);
        
        Facture::create([
            'description'=>$request->input('description'),
            'chargeSupp'=>$request->input('chargeSupp'),
            'montant'=>$request->input('montant'),
        ]);
        return redirect()->route('factures.indexcl')
                        ->with('success','facture creer avec success.');
    }


    public function editcl($id)
    {
        $f = Facture::findOrFail($id);
        return view('client.factures.edit', compact('f'));
    }

    public function updatecl(Request $request, $id)
    {
        $request->validate([
            'description'=>'required',
            'chargeSupp' => 'required',
            'montant' => 'required',
        ]);
        
        $facture = Facture::findOrFail($id);
        $facture->description = $request->input('description');
        $facture->chargeSupp = $request->input('chargeSupp');
        $facture->montant = $request->input('montant');
        $facture->save();
    
        return redirect()->route('factures.indexcl')
                        ->with('success', 'facture mis à jour avec succès');
    }


    public function deletecl(){
        $facture_id=request('txtId');
     
        $facture=Facture::find($facture_id);
        try{
           $facture->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }
  
     }

    //partie mecanicien
    public function indexm()
    {
        $factures=Facture::all();
        return view('mecanicien.factures.index',compact('factures'));
                   
    }


    public function createm()
    {
       
        return view('mecanicien.factures.create');
    }

    public function storem(Request $request)
    {
        $request->validate([
            'description'=>'required',
            'chargeSupp' => 'required',
            'montant' => 'required',
        ]);
        
        Facture::create([
            'description'=>$request->input('description'),
            'chargeSupp'=>$request->input('chargeSupp'),
            'montant'=>$request->input('montant'),
        ]);
        return redirect()->route('factures.indexm')
                        ->with('success','facture creer avec success.');
    }


    public function editm($id)
    {
        $f = Facture::findOrFail($id);
        return view('mecanicien.factures.edit', compact('f'));
    }

    public function updatem(Request $request, $id)
    {
        $request->validate([
            'description'=>'required',
            'chargeSupp' => 'required',
            'montant' => 'required',
        ]);
        
        $facture = Facture::findOrFail($id);
        $facture->description = $request->input('description');
        $facture->chargeSupp = $request->input('chargeSupp');
        $facture->montant = $request->input('montant');
        $facture->save();
    
        return redirect()->route('factures.indexm')
                        ->with('success', 'facture mis à jour avec succès');
    }


    public function deletem(){
        $facture_id=request('txtId');
     
        $facture=Facture::find($facture_id);
        try{
           $facture->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }
  
     }
}

