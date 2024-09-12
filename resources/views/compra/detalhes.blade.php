<table class="table table-bordered">
    <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor</th>
    </tr>
    @foreach($lista as $item)
        <tr>
            <td>{{ $item->nome }}</td>
            <td>{{ $item->quantidade }}</td>
            <td>{{ $item->valor }}</td>
        </tr>
    @endforeach
</table>