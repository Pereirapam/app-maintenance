<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
     
    public readonly material $material;

    public function __construct() 
    {
        $this->material = new Material();
    }

    public function index()
    {

        $materials = $this->material->all();
        return view('materials.dashmaterial', ['material' => $materials]);
    }

    public function create()
    {
        // $categories = Category::all();
        return view('materials.createMaterial');
    }

    public function store(StoreTask $request)
    {

       

        $created = $this->material->create([
            'description' => $request->input('description'),
            'idCategory' => $request->input('idCategory'),
            
        ]);
        
        if($created){
            return redirect()->route('materials.index')->with('message', 'Task criada com sucesso');
        }

        return redirect()->route('materials.index')->with('message', 'Erro! Task não criada');
       

    }

    public function edit(string $id)
    {
      
        // $categories = Category::all();
        if(!$material = Material::find($id)){
            return redirect()->route('materials.index')->with('message', 'task não encontrada');
        }
        return view('materials.updateMaterial', compact('task', 'categories'));
    }

    public function update(UpdateTask $request, string $id)
    {
        
        $updated = $this->material->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->route('materials.index')->with('message', 'Atualizado com sucesso');
        }
        
    }
    

    public function show(material $Material)
    {
        return view('materials.showMaterial', ['material' => $material]);
    }

    public function destroy(string $id)
    {
        $this->material->where('id', $id)->delete();

        return redirect()->route('materials.index')->with('message', 'Excluído com sucesso');
    }
}
