<?php

namespace App\Http\Controllers;

use App\Models\Provider;  
use Illuminate\Http\Request;
use App\Http\Requests\StoreProvider;


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
        return view('providers.dashProvider', ['providers' => $providers]);
    }

    public function create()
    {
        // $categories = Category::all();
        return view('providers.createProvider');
    }

    public function store(StoreProvider $request)
    {

       

        $created = $this->provider->create([
            'name' => $request->input('name'),
            'contact_info' => $request->input('contact_info'),
            
        ]);
        
        if($created){
            return redirect()->route('providers.index')->with('message', 'Fornecedor(a) criado(a) com sucesso');
        }

        return redirect()->route('providers.index')->with('message', 'Erro! Fornecedor(a) não criada');
       

    }

    public function edit(string $id)
    {
      
        // $categories = Category::all();
        if(!$provider = Provider::find($id)){
            return redirect()->route('providers.index')->with('message', 'Fornecedor(a) não encontrada');
        }
        return view('providers.updateProvider', compact('provider'));
    }

    public function update(StoreProvider $request, string $id)
    {
        
        $updated = $this->provider->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->route('providers.index')->with('message', 'Atualizado com sucesso');
        }
        
    }
    

    // public function show(Provider $provider)
    // {
    //     return view('providers.showProvider', ['provider' => $provider]);
    // }

    public function destroy(string $id)
    {
        $this->provider->where('id', $id)->delete();

        return redirect()->route('providers.index')->with('message', 'Excluído com sucesso');
    }
}
