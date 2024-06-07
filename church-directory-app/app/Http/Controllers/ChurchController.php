<?php

namespace App\Http\Controllers;

use App\Models\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\reponse;
class ChurchController extends Controller
{
    public function index()
    {
        //vista normal
        $churches = Church::orderBy('status')->get();
        return view('churches.index', ['churches'=>$churches, 'status'=>'']);
    }

    public function create()
    {
        return view('churches.create');
    }

    public function store(Request $request)
    {
      
        try{
            $validate= Validator::make(
                $request->all(),
                [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'zipcode' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'phone' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|url',
                'status' => 'required|string|in:Establecida,Mision,En Proceso de Reforma',
                ],
                [
                    //Aqui van validaciones en español 
                ]);

            if($validate-> fails() ){
                return response()->json(["message"=>$validate->errors()], 400);
            }

            $church = Church::create($request->all());
            if($church){
                $churches = Church::orderBy('status')->get();
        return view('churches.index', ['churches'=>$churches, 'status'=>'Agregado exitosamente!']);
            }
            else{
                return redirect('/churches')->with('error', 'Error al registrar iglesia');
            }
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Error al registrar la iglesia: ' . $e->getMessage()]);
        }
    }

    public function edit(Church $church)
    {
        return view('churches.edit', compact('church'));
    }

    public function update(Request $request, Church $church)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipcode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'status' => 'required|string|in:Establecida,Mision,En Proceso de Reforma',
        ]);

        $church->update($request->all());

        return redirect()->route('churches.index')->with('success', 'Iglesia actualizada correctamente.');
    }

    public function destroy(Church $church)
    {
        $church->delete();

        return redirect()->route('churches.index')->with('success', 'Iglesia eliminada correctamente.');
    }
}
