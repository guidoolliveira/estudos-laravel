<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;


class UserController extends Controller
{
    public readonly User $user;

    public function __construct(){
        $this->user = new User();
    }
    public function index()
    {
        $users = $this->user->all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateUser $request)
    {
        // var_dump("oi");
        $created = $this->user->create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>password_hash($request->input('password'), PASSWORD_DEFAULT),
        ]);
        if($created){
            return redirect()->back()->with('message', 'Sucesso ao Cadastrar');
        } 

        return redirect()->back()->with('error', 'Erro ao Cadastar');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // var_dump("oi");
        $updated = $this->user->where('id', $id)->update($request->except('_token', '_method'));
        if($updated){
            return redirect()->back()->with('message', 'Sucesso ao Editar');
        } 

        return redirect()->back()->with('error', 'Erro ao Editar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->where('id', $id)->delete();
        return redirect()->route('users.index')->with('message', 'Usuário Deletado');
    }
}
