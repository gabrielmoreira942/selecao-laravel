<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
        //dados do formulário

        try { //tente executar o que está dentro.

            $data = $request->all();
            $client = new Client();
            $client->name = $data['name'];
            $client->email = $data['email'];
            $client->cpf = $data['CPF'];
            $client->number = $data['number'];
            $client->telephone = $data['telephone'];
            $client->rg = $data['RG'];
            $client->birth_date = $data['birth_date'];
            $client->uf = $data['UF'];
            $client->user_id = auth()->user()->id;
            $client->save();
            $request->session()->flash('success', 'Registro gravado com sucesso!');
        }catch (\Exception $e){ // caso tenha ocorrido erro

            $request->session()->flash('error', 'Ocorreu um erro ao gravar esses dados!');
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


    public function update(ClientRequest $request, Client $client)
    {

        try {
            $data = $request->all();
            $client->update($data);

            $request->session()->flash('success', 'O Registro foi alterado com sucesso!');

            } catch(\Exception $e) {
                $request->session()->flash('error', 'Ocorreu um erro ao atualizar esses dados!');

            }

           return redirect()->back();

    }


    public function destroy(Client $client)
    {
        //
    }
}
