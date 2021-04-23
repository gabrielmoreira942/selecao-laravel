<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        $user = auth()->user();

        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request)
    {
        $user = auth()->user();

        try {
            $data = $request->all();

            if(empty($data['password'])) {
                unset($data['password']);
                unset($data['password_confirmation']);
            } else {
                $data['password'] = Hash::make($data['password']);
            }

            $user->update($data);

            $request->session()->flash('success', 'O Registro foi alterado com sucesso!');

            } catch(\Exception $e) {
                $request->session()->flash('error', 'Ocorreu um erro ao atualizar esses dados!');

            }

           return redirect()->back();
    }

    public function destroy(Request $request)
    {
        try {
            $user = auth()->user();
            $user->delete();
            $request->session()->flash('success', 'O Registro foi excluído com sucesso!');

        } catch(\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao excluir esses dados!');
        }

       return redirect()->back();
    }
}
