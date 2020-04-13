{{-- herda da view base --}}
@extends('base')
{{-- cria uma seção chamada content que será injetada
     na view base --}}
@section('content')
<form method="POST" action="{{ route('client.update', $client->id) }}">
    @csrf
    {{-- define o método put para o formulário --}}
    @method('PUT')
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" required value="{{ $client->name }}"> <br>
    <label for="age">Idade:</label>
    <input type="number" name="age" id="age" required value="{{ $client->age }}"> <br>
    <input type="submit" name="command" value="Salvar">
    <input type="reset" value="Limpar">
</form>
{{-- finalizana a seção --}}
@endsection