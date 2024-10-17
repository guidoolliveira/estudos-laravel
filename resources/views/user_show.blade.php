@extends('layout.master')

@section('content')

<div class="bg-gradient-to-r from-blue-500 to-blue-300 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Usuário - {{$user->name}}</h2>
        
        <div class="mb-4 text-center">
            <p class="text-lg font-semibold">Nome: <span class="text-gray-700">{{$user->name}}</span></p>
            <p class="text-lg font-semibold">Email: <span class="text-gray-700">{{$user->email}}</span></p>
        </div>

        <div class="flex justify-center mb-4">
            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este usuário?');">
                @csrf
                <input type="hidden" name="_method" value="DELETE"> 
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-200">Deletar</button>
            </form>
            <a href="{{ route('users.index') }}" class="ml-4 text-gray-600 hover:text-gray-900 hover:underline transition duration-200">Voltar</a>
        </div>
    </div>
</div>

@endsection