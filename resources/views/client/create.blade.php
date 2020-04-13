{{-- herda da view base --}}
@extends('base')

{{-- cria uma seção chamada content que será injetada
     na view base --}}
@section('content')
<form method="POST" action="{{ route('client.store') }}">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name"> <br>
    @error('name')
    <div style="color:red">{{ $message }}</div>
    @enderror
    <label for="age">Idade:</label>
    <input type="text" name="age" id="age"> <br>
    @error('age')
    <div style="color:red">{{ $message }}</div>
    @enderror
    <input type="submit" name="command" value="Salvar">
    <input type="reset" value="Limpar">
</form>

{{-- se houver erros, então --}}
@if ($errors->any())
<h2>Erros</h2>
<ul>
    {{-- itera todos os erros --}}
    @foreach ($errors->all() as $e)
    {{-- exibe a mensagem --}}
    <li>{{$e}}</li>
    @endforeach
</ul>
@endif
{{-- finalizana a seção --}}
@endsection