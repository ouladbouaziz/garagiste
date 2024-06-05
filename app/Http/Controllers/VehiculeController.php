<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    
        public function index(){
            $vehicules=Vehicule::all();
            return view('admin.vehicules.index',compact('vehicules'));
        }

        public function create()
        {
            return view('admin.vehicules.create');
        }
      
    
        public function store(Request $request)
        {
            $request->validate([
                'marque' => 'required',
                'modele' => 'required',
                'typeFuel' => 'required',
                'registration' => 'required',
                "image"=>"required",
            ]);
           
            Vehicule::create([
                'marque'=>$request->input('marque'),
                'modele'=>$request->input('modele'),
                'typeFuel'=>$request->input('typeFuel'),
                'registration'=>$request->input('registration'),
                'image'=>$request->input('image'),
            ]);
            return redirect()->route('vehicules.index')
                            ->with('success','vehicule creer avec success.');
            }
            
            
        public function show()
        {
         $vehicule_id = request('vehicule_id');
         $vehicule = Vehicule::find($vehicule_id);
         return view ('admin.vehicules.show',compact('vehicule'));
        }
     
     
        public function search()
        {
             $word = request('search');
             $vehicules = Vehicule::where('marque','like','%'. $word .'%')
             ->orWhere ('model','like','%'. $word .'%')
             ->get();
             return view('admin.vehicules.search', compact('vehicules'));
     
        }
    
    
        public function edit($id)
        {
            $v = Vehicule::findOrFail($id);
            return view('admin.vehicules.edit', compact('v'));
        }
    
        public function update(Request $request, $id)
        {
            $request->validate([
                'marque' => 'required',
                'modele' => 'required',
                'typeFuel' => 'required',
                'registration' => 'required',
                "image"=>"required",
            ]);
            
            $vehicule = Vehicule::findOrFail($id);
            $vehicule->marque = $request->input('marque');
            $vehicule->modele = $request->input('modele');
            $vehicule->typeFuel = $request->input('typeFuel');
            $vehicule->registration = $request->input('registration');
            $vehicule->image = $request->input('image');
            $vehicule->save();
        
            return redirect()->route('vehicules.index')
                            ->with('success', 'vehicule mis à jour avec succès');
        }
    
    
        public function delete(){
            $vehicule_id=request('txtId');
         
            $vehicule=Vehicule::find($vehicule_id);
            try{
               $vehicule->delete();
               return "ok";
            } catch(\Exception $e){
               return "error";
            }
      
         }


         //partie client

         public function indexcl(){
            $vehicules=Vehicule::all();
            return view('client.vehicules.index',compact('vehicules'));
        }

        public function createcl()
        {
            return view('client.vehicules.create');
        }
      
    
        public function storecl(Request $request)
        {
            $request->validate([
                'marque' => 'required',
                'modele' => 'required',
                'typeFuel' => 'required',
                'registration' => 'required',
                "image"=>"required",
            ]);
           
            Vehicule::create([
                'marque'=>$request->input('marque'),
                'modele'=>$request->input('modele'),
                'typeFuel'=>$request->input('typeFuel'),
                'registration'=>$request->input('registration'),
                'image'=>$request->input('image'),
            ]);
            return redirect()->route('vehicules.indexcl')
                            ->with('success','vehicule creer avec success.');
            }
            
            
        public function showcl()
        {
         $vehicule_id = request('vehicule_id');
         $vehicule = Vehicule::find($vehicule_id);
         return view ('client.vehicules.show',compact('vehicule'));
        }
     
     
        public function searchcl()
        {
             $word = request('search');
             $vehicules = Vehicule::where('marque','like','%'. $word .'%')
             ->orWhere ('model','like','%'. $word .'%')
             ->get();
             return view('client.vehicules.search', compact('vehicules'));
     
        }
    
    
        public function editcl($id)
        {
            $v = Vehicule::findOrFail($id);
            return view('client.vehicules.edit', compact('v'));
        }
    
        public function updatecl(Request $request, $id)
        {
            $request->validate([
                'marque' => 'required',
                'modele' => 'required',
                'typeFuel' => 'required',
                'registration' => 'required',
                "image"=>"required",
            ]);
            
            $vehicule = Vehicule::findOrFail($id);
            $vehicule->marque = $request->input('marque');
            $vehicule->modele = $request->input('modele');
            $vehicule->typeFuel = $request->input('typeFuel');
            $vehicule->registration = $request->input('registration');
            $vehicule->image = $request->input('image');
            $vehicule->save();
        
            return redirect()->route('vehicules.indexcl')
                            ->with('success', 'vehicule mis à jour avec succès');
        }
    
    
        public function deletecl(){
            $vehicule_id=request('txtId');
         
            $vehicule=Vehicule::find($vehicule_id);
            try{
               $vehicule->delete();
               return "ok";
            } catch(\Exception $e){
               return "error";
            }
      
         }
  
}
