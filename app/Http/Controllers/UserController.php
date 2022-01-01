<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $title = 'Home Page Laravel PayPal';

        return view('store.user.profile', compact('title'));
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }

    public function profileUpdate(Request $request, User $user)
    {
        $this->validate($request, $user->rulesProfile);

        $user = $user->find(auth()->user()->id);
        $user->name = $request->name;
        $user->save();

        return redirect()
                ->route('user.profile')
                ->with('success', 'Perfil atualizado com Sucesso !');
    }

    public function password()
    {
        $title = 'Atualizar Senha';

        return view('store.user.password', compact('title'));
    }

    public function passwordUpdate(Request $request, User $user)
    {
        $this->validate($request, $user->rulesPassword);

        $user = $user->find(auth()->user()->id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()
                ->route('user.password')
                ->with('success', 'Senha atualizada com Sucesso !');
    }
}
