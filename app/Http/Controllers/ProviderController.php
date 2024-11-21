<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    
    public readonly Provider $provider;

    public function __construct() 
    {
        $this->provider = new Provider();
    }

    public function index()
    {

        $providers = $this->provider->all();
        return view('providers.dashProvider', ['provider' => $providers]);
    }

    public function create()
    {
        // $categories = Category::all();
        return view('providers.createProvider');
    }

    public function store(StoreTask $request)
    {

       

        $created = $this->provider->create([
            'description' => $request->input('description'),
            'idCategory' => $request->input('idCategory'),
            
        ]);
        
        if($created){
            return redirect()->route('providers.index')->with('message', 'Task criada com sucesso');
        }

        return redirect()->route('providers.index')->with('message', 'Erro! Task não criada');
       

    }

    public function edit(string $id)
    {
      
        // $categories = Category::all();
        if(!$task = Task::find($id)){
            return redirect()->route('providers.index')->with('message', 'task não encontrada');
        }
        return view('providers.updateProvider', compact('task', 'categories'));
    }

    public function update(UpdateTask $request, string $id)
    {
        
        $updated = $this->provider->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->route('providers.index')->with('message', 'Atualizado com sucesso');
        }
        
    }
    

    public function show(Provider $provider)
    {
        return view('providers.showProvider', ['provider' => $provider]);
    }

    public function destroy(string $id)
    {
        $this->provider->where('id', $id)->delete();

        return redirect()->route('providers.index')->with('message', 'Excluído com sucesso');
    }
}
