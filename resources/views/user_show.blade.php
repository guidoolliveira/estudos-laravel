@extends('layout.master')

@section('content')

<h2>Usuário - {{$user->name}}</h2>

<form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este usuário?');" >
    @csrf
    <input type="hidden" name="_method" value="DELETE"> 
    <button type="submit">Deletar</button>
</form>
<a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900 hover:underline">Voltar</a>

@endsection
