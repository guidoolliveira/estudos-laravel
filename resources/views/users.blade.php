@extends('layout.master')

@section('content')


<div class="flex justify-end mb-4">
    <a href="{{ route('users.create') }}" class="bg-blue-600 text-white mt-5 mr-5 px-6 py-2 rounded-lg shadow-lg hover:bg-blue-500 transition duration-200">Cadastrar</a>
</div>

<hr>

<h2 class="text-2xl font-bold mb-4 ml-4 mt-2">Usuários</h2>
@if (session()->has('message'))
                <div class="mb-4 flex justify-center p-2 text-sm text-green-600 bg-green-100 rounded">
                    {{ session()->get('message') }}
                </div>
            @endif
<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Nome</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Ações</th>
            </tr>
        </thead>

        <tbody class="text-gray-600 text-sm font-light"> 
            @foreach ($users as $user)
            <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                <td class="py-3 px-6">{{$user->name}}</td>
                <td class="py-3 px-6">{{$user->email}}</td>
                <td class="py-3 px-6">
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="text-blue-600 hover:underline">Editar</a>
                    <span> | </span>
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="text-blue-600 hover:underline">Ver</a>
                </td>
            </tr>  
            @endforeach
        </tbody>
    </table>
</div>

@endsection


