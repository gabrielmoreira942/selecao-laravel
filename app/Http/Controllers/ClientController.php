<?php

namespace App\Http\Controllers;

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


    public function store(Request $request)
    {
        //dados do formulário
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



    }


    public function show(Client $client)
    {
        //
    }


    public function edit(Client $client)
    {
        //
    }


    public function update(Request $request, Client $client)
    {
        //
    }


    public function destroy(Client $client)
    {
        //
    }
}
