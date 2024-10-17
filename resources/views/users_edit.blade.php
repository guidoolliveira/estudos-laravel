@extends('layout.master')

@section('content')

<div class="bg-gradient-to-r from-blue-500 to-blue-300 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Editar Usuário</h2>

        @if (session()->has('message'))
            <div class="mb-4 flex items-center justify-center p-2 text-sm text-green-600 bg-green-100 rounded-lg shadow-md">
                <span>{{ session()->get('message') }}</span>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="mb-4 flex items-center justify-center p-2 text-sm text-red-600 bg-red-100 rounded-lg shadow-md">
                <span>{{ session()->get('error') }}</span>
            </div>
        @endif

        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT"> 
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="name">Nome</label>
                <input type="text" name="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500 transition duration-200" placeholder="Nome" value="{{ $user->name }}">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                <input type="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500 transition duration-200" placeholder="Email" value="{{ $user->email }}">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition duration-200">Editar</button>
            <a href="{{ route('users.index') }}" class="mt-4 text-gray-600 hover:text-gray-900 hover:underline transition duration-200">Voltar</a>
        </form>
    </div>
</div>

@endsection