@extends('base')
@section('content')

<table border="1">
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Idade</th>
        <th colspan="3">Comandos</th>
    </tr>
    @isset($clients)
    @foreach ($clients as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->name }}</td>
        <td>{{ $c->age }}</td>
        <td><button><a href="{{ route('client.show', $c->id) }}">Mostrar</a></button>
        <td><button><a href="{{ route('client.edit', $c->id) }}">Editar</a></button>
        <td>
            <form method="post" action="{{ route('client.destroy', $c->id) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Excluir ">
            </form>
        </td>
    </tr>
    @endforeach
    @endisset
    @empty($clients)
    <tr>
        <td colspan="6">NÃO EXISTEM DADOS!</td>
    </tr>
    @endempty
</table>
@endsection



{{-- <td>
    <form method="post" action="{{ route('client.destroy', $c->id) }}">
@csrf
@method('DELETE')
<input type="submit" value="Excluir ">
</form>
</td> --}}