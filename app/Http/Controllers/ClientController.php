<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);

        return view('clients.ClientReg', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
    {
        try {
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;
            $client = new Client();
            $client->create($data);

            $request->session()->flash('success', 'Registro gravado com sucesso!');
        }catch (\Exception $e){
            $request->session()->flash('error', 'Ocorreu um erro ao gravar esses dados!' . $e->getMessage());
        }
        return redirect()->back();
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Request $request, Client $client)
    {
        return view('Clients.edit', compact('client'));
    }

    public function update(ClientUpdateRequest $request, Client $client)
    {
        try {
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $client->update($data);

            $request->session()->flash('success', 'O Registro foi alterado com sucesso!');
        } catch(\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao atualizar esses dados!');
        }

        return redirect()->back();
    }

    public function destroy(Request $request, Client $client)
    {
        try {
            $client->delete();
            $request->session()->flash('success', 'O Registro foi excluído com sucesso!');
        } catch(\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao excluir esses dados!');
        }

       return redirect()->back();
    }
}
