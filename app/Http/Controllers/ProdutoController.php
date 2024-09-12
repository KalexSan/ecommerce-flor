<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Services\VendaService;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function index( Request $request ){

        //buscar todos produtos do banco que seia um select * from produtos
        $listaProdutos = Produto::all();
        $data['lista'] = $listaProdutos;
        
        return view("home", $data);
       
    }

    public function categoria(Request $request, $idcategoria = 0){

        $data = [];

        //estou dando um select * from categoria
        $listaCategorias = Categoria::all();
        //estou dando select * from produtos limite de 4
        $queryProduto = Produto::limit(6);

        if($idcategoria != 0){
            //estou dando select * from produtos where categoria_id = $idcategoria
            $queryProduto->where('categoria_id', $idcategoria); 
        }

        $listaProdutos = $queryProduto->get();

        $data['lista'] = $listaProdutos;
        $data['listaCategoria'] = $listaCategorias;
        $data['idcategoria'] = $idcategoria;
        return view("categoria", $data);
       
    }

    public function adicionarCarrinho(Request $request, $idproduto = 0 ){
        //Buscar o produto pelo id
        $prod = Produto::find($idproduto);

        if($prod){
            //Se o produto existir, adicionar ele no carrinho
            
            //Buscar da sessao o carrinho atual
            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session(['cart' => $carrinho]);
        } 
        return redirect()->route('home');         
    }

    public function verCarrinho(Request $request){
        //Buscar da sessao o carrinho atual
        $carrinho = session('cart', []);
        //vai mostrar o carrinho
        $data = [ 'cart' => $carrinho ];

        return view("carrinho", $data);
    }

    public function excluirCarrinho(Request $request, $indice){
        //Buscar da sessao o carrinho atual
        $carrinho = session('cart', []);
        //excluir o produto do carrinho
        if(isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }
        //atualizar o carrinho
        session(['cart' => $carrinho]);
        return redirect()->route('ver_carrinho');
        
    }

    public function finalizar(Request $request){
        //Buscar da sessao o carrinho atual
        $prods = session('cart', []);
        $vendaService = new VendaService();
        $result = $vendaService->finalizarVenda($prods, Auth::user());

        //limpar o carrinho
        if($result['status'] == 'sucesso'){
            $request->session()->forget('cart');
        }
        $request->session()->flash($result['status'], $result['message']);


        return redirect()->route('ver_carrinho');
    }

    public function historico(Request $request){
        $data = [];

        //pegar o id do usuario logado
        $idusuario = Auth::user()->id;

        //buscar todas as vendas do usuario
        $listaPedido = Pedido::where('usuario_id', $idusuario)->orderBy("data_pedido", "desc")->get();
        $data["lista"] = $listaPedido;

        return view("compra/historico", $data);
    
    }

    public function detalhes(Request $request){

        $idpedido = $request->input('idpedido');
        $listaItens = ItensPedido::join('produtos', 'produtos.id', '=', 'itens_pedidos.produto_id')->where('pedido_id', $idpedido)->get(['itens_pedidos.*', 'itens_pedidos.valor as valoritem', 'produtos.*']);
        $data = [];
        $data['lista'] = $listaItens;
        return view("compra/detalhes", $data);
        
    }
}
