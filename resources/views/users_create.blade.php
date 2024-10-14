@extends('layout.master')

@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Cadastrar</h2>

        @if ($errors->any())
            <div class="mb-4 flex flex-col items-center">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center p-2 mb-2 text-sm text-red-600 bg-red-100 rounded-lg shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m0 3h.01M5.636 5.636A9 9 0 1118.364 18.364" />
                        </svg>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        @if (session()->has('message'))
            <div class="mb-4 flex items-center justify-center p-2 text-sm text-green-600 bg-green-100 rounded-lg shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m4-5a9 9 0 11-9 9 9 9 0 019-9z" />
                </svg>
                <span>{{ session()->get('message') }}</span>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-4 flex items-center justify-center p-2 text-sm text-red-600 bg-red-100 rounded-lg shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m0 3h.01M5.636 5.636A9 9 0 1118.364 18.364" />
                </svg>
                <span>{{ session()->get('error') }}</span>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="nome">Nome</label>
                <input type="text" name="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" placeholder="Nome">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                <input type="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" placeholder="Email">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="senha">Senha</label>
                <input type="password" name="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" placeholder="Senha">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700">Cadastrar</button>
            <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900 hover:underline">Voltar</a>
        </form>
    </div>
</div>

@endsection
