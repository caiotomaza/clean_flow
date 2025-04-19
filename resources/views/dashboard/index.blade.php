@extends('layouts.app')

@section('content')
    <h1>Bem-vindo ao seu Dashboard!</h1>
    <p>Olá, {{ Auth::user()->name }}! Bem-vindo ao painel de controle.</p>
@endsection