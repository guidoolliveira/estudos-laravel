@extends('layout.master')


@section('content')
    
    <h2>Home</h2>
    <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900 hover:underline">Usuários</a>
@endsection