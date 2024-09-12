@extends('layout')
    @section('conteudo')
        <h3>Carrinho</h3>

        @if(isset($cart) && count($cart) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Foto</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp 
                    @foreach($cart as $indice => $item)
                        <tr>
                            <td>
                                <a href="{{ route('carrinho_excluir', ['indice' => $indice]) }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                            <td>{{ $item->nome }}</td>
                            <td><img src="{{ asset($item->foto) }}" width="50"></td>
                            <td>{{ $item->valor }}</td>
                            <td>{{ $item->descricao }}</td>
                        </tr>
                        @php $total += $item->valor; @endphp
                    @endforeach
                </tbody>
                <tfooter>
                    <tr>
                        <td colspan="5">
                            Total do Carrinho: R$: {{ $total }}
                        </td>
                        
                    </tr>
                </tfooter>
            </table>

            <form method="post" action="{{ route('carrinho_finalizar') }}">
                @csrf
                <input type="submit" value="Finalizar Compra" class="btn btn-lg btn-success">
            </form>

        @else
            <div class="alert alert-warning">
                Seu carrinho está vazio
            </div>
        @endif

    @endsection