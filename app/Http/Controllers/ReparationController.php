<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicule;
use App\Models\Reparation;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    public function index()
    {
        $reparations=Reparation::all();
        return view('admin.reparations.index',compact('reparations'));
                   
    }


    public function create()
    {
       
        return view('admin.reparations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        
        Reparation::create([
            'description'=>$request->input('description'),
            'status'=>'en attente',
            'startDate'=>$request->input('startDate'),
            'endDate'=>$request->input('endDate'),

        ]);
        return redirect()->route('reparations.index')
                        ->with('success','piece creer avec success.');
    }
    public function search()
    {
         $word = request('search');
         $reparations = Reparation::where('description','like','%'. $word .'%')
         ->get();
         return view('admin.reparations.search', compact('reparations'));
 
    }

    public function edit($id)
    {
        $r = Reparation::findOrFail($id);
        return view('admin.reparations.edit', compact('r'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        
        $reparation = Reparation::findOrFail($id);
        $reparation->description = $request->input('description');
        $reparation->startDate = $request->input('startDate');
        $reparation->endDate = $request->input('endDate');
        $reparation->clientNotes = $request->input('clientNotes');
        $reparation->save();
    
        return redirect()->route('reparations.index')
                        ->with('success', 'reparation mis à jour avec succès');
    }


    public function delete(){
        $reparation_id=request('txtId');
     
        $reparation=Reparation::find($reparation_id);
        try{
           $reparation->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }
  
     }

    //partie client
    public function indexcl()
    {
        $reparations=Reparation::all();
        return view('client.reparations.index',compact('reparations'));
                   
    }


    public function createcl()
    {
       
        return view('client.reparations.create');
    }

    public function storecl(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'clientNotes'=>'required'
        ]);
        
        Reparation::create([
            'description'=>$request->input('description'),
            'status'=>'en attente',
            'startDate'=>$request->input('startDate'),
            'endDate'=>$request->input('endDate'),
            'clientNotes'=>$request->input('clientNotes')

        ]);
        return redirect()->route('reparations.indexcl')
                        ->with('success','piece creer avec success.');
    }

    public function searchcl()
    {
         $word = request('search');
         $reparations = Reparation::where('description','like','%'. $word .'%')
         ->get();
         return view('client.reparations.search', compact('reparations'));
 
    }

    public function editcl($id)
    {
        $r = Reparation::findOrFail($id);
        return view('client.reparations.edit', compact('r'));
    }

    public function updatecl(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        
        $reparation = Reparation::findOrFail($id);
        $reparation->description = $request->input('description');
        $reparation->startDate = $request->input('startDate');
        $reparation->endDate = $request->input('endDate');
        $reparation->clientNotes = $request->input('clientNotes');
        $reparation->save();
    
        return redirect()->route('reparations.indexcl')
                        ->with('success', 'piece mis à jour avec succès');
    }


    public function deletecl(){
        $reparation_id=request('txtId');
     
        $reparation=Reparation::find($reparation_id);
        try{
           $reparation->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }
  
     }


    //partie mecanicien
    public function indexm()
    {
        $reparations=Reparation::all();
        return view('mecanicien.reparations.index',compact('reparations'));
                   
    }


    public function createm()
    {
       
        return view('mecanicien.reparations.create');
    }

    public function storem(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'mechanicNotes'=>'required'
        ]);
        
        Reparation::create([
            'description'=>$request->input('description'),
            'status'=>'en attente',
            'startDate'=>$request->input('startDate'),
            'endDate'=>$request->input('endDate'),
            'mechanicNotes'=>$request->input('mechanicNotes')

        ]);
        return redirect()->route('reparations.indexm')
                        ->with('success','reparation creer avec success.');
    }

    public function searchm()
    {
         $word = request('search');
         $reparations = Reparation::where('description','like','%'. $word .'%')
         ->get();
         return view('mecanicien.reparations.search', compact('reparations'));
 
    }

    public function editm($id)
    {
        $r = Reparation::findOrFail($id);
        return view('mecanicien.reparations.edit', compact('r'));
    }

    public function updatem(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        
        $reparation = Reparation::findOrFail($id);
        $reparation->description = $request->input('description');
        $reparation->startDate = $request->input('startDate');
        $reparation->endDate = $request->input('endDate');
        $reparation->mechanicNotes = $request->input('mechanicNotes');
        $reparation->save();
    
        return redirect()->route('reparations.indexm')
                        ->with('success', 'reparation mis à jour avec succès');
    }


    public function deletem(){
        $reparation_id=request('txtId');
     
        $reparation=Reparation::find($reparation_id);
        try{
           $reparation->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }
  
     }


}
