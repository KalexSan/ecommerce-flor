@extends("layout")
@section("scriptjs")
    <script>
        $(document).ready(function() {
            $(".infocompra").on("click", function(){
                console.log("Clicou");
                // ao clicar no link com a classe .infocompra, ele vai pegar o valor do atributo data-value
                let id = $(this).attr("data-value");

                $.post('{{ route("compra_detalhes") }}', { idpedido: id, _token: '{{ csrf_token() }}' }, (result) => {
                    // Função de callback que vai adicionar o conteúdo na modal
                    console.log(result);
                    $("#conteudopedido").html(result);
                });
            });
        });
    </script>
@endsection

@section("conteudo")
<div class="col-12">
    <h2>Minhas Compras</h2>
</div>
<div class="col-12">
    <table class="table table-bordered">
        <tr>
            <th>Data da Compra</th>
            <th>Situação</th>
            <th></th>
        </tr>
        @foreach($lista as $ped)
        <tr>
            <td>{{ \Carbon\Carbon::parse($ped->data_pedido)->format("d/m/Y H:i") }}</td>
            <td>{{ $ped->statusDesc() }}</td>
            <td>
                <a href="#" class="btn btn-sm btn-info infocompra" data-value="{{ $ped->id }}" data-toggle="modal" data-target="#modalcompra">
                    <i class="fas fa-shopping-basket"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<div class="modal fade" id="modalcompra">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes da Compra</h5>
            </div>
            <div class="modal-body">
                <div id="conteudopedido"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endsection