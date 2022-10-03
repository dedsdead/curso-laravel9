@extends('layouts.main')

@section('title', 'Editar Usuário')

@section('content')
    
<h1>Editar usuário {{ $user->name }}</h1>

@include('components.validations-form')

<form action="{{ route('users.update', $user->id) }}" method="post">
    @method('put')
    @include('users._partials.form')
</form>

@endsection
