@extends('layouts.main')

@section('title', 'Novo Usuário')

@section('content')
    
<h1>Novo usuário</h1>

@include('components.validations-form')

<form action="{{ route('users.store') }}" method="post">
    @include('users._partials.form')
</form>

@endsection
