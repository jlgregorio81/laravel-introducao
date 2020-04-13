{{-- herda da view base --}}
@extends('base');

{{-- cria uma seção chamada content que será injetada
     na view base --}}
@section('content')
<h1>Visualizando Cliente</h1>
{{-- a variável $client será definida no controlador --}}
<p><strong>ID:</strong>{{ $client->id }}</p>
<p><strong>Nome:</strong>{{ $client->name }}</p>
<p><strong>Idade:</strong>{{ $client->age }}</p>

{{-- finalizana a seção --}}
@endsection