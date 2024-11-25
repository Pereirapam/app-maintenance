<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMaterial;


class MaterialController extends Controller
{
     
    public $material;

    public function __construct() 
    {
        $this->material = new Material();
    }

    public function index()
    {

        $materials = $this->material->all();
        return view('materials.dashmaterial', ['materials' => $materials]);
    }

    public function create()
    {
        // $categories = Category::all();
        return view('materials.createMaterial');
    }

    public function store(StoreMaterial $request)
    {

       

        $created = $this->material->create([
            'name' => $request->input('name'),
            'supplier' => $request->input('supplier'),
            'estimated_cost' => $request->input('estimated_cost'),
            
        ]);
        
        if($created){
            return redirect()->route('materials.index')->with('message', 'Material criado com sucesso');
        }

        return redirect()->route('materials.index')->with('message', 'Erro! Material não criada');
       

    }

    public function edit(string $id)
    {
      
        // $categories = Category::all();
        if(!$material = Material::find($id)){
            return redirect()->route('materials.index')->with('message', 'Material não encontrada');
        }
        return view('materials.updateMaterial', compact('material'));
    }

    public function update(StoreMaterial $request, string $id)
    {
        
        $updated = $this->material->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->route('materials.index')->with('message', 'Atualizado com sucesso');
        }
        
    }
    

    public function show(Material $Material)
    {
        return view('materials.showMaterial', ['material' => $material]);
    }

    public function destroy(string $id)
    {
        $this->material->where('id', $id)->delete();

        return redirect()->route('materials.index')->with('message', 'Excluído com sucesso');
    }
}
