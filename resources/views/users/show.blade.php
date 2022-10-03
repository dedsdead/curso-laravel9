@extends('layouts.main')

@section('title', 'Info Usuário')

@section('content')
    
<h1>Informações do {{ $user->name }}</h1>

<ul>
    <li>
        Email - {{$user->email}}
    </li>
    <li>    
        Criado em - {{ $user->created_at }}
    </li>
</ul>

<form action="{{ route('users.destroy', $user->id) }}" method="post">
    @method('delete')
    @csrf
    <button type="submit">Deletar</button>
</form>

@endsection
