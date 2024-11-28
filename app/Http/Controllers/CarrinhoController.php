<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CarrinhoController extends Controller
{
    public function carrinhoLista() {
        $itens = Cart::content();
        // dd($itens);
        return view('site/carrinho', compact('itens'));
    }

    public function adicionarCarrinho(Request $request) {
        Cart::add([
            "id" => $request->id,
            "name" => $request->nome,
            "price" => $request->preco,
            "qty" => abs($request->quantidade),  // Corrigido para 'quantity'
            "options" => [
                "image" => $request->imagem
            ]
        ]);

        return redirect()->route('site.carrinho')->with("sucesso", "Produto adicionado ao carrinho com sucesso!");
    }

    public function removerCarrinho(Request $request) {
        // Certifique-se de que 'rowId' está sendo passado corretamente
        if ($request->has('rowId')) {
            Cart::remove($request->rowId);
            return redirect()->route('site.carrinho')->with("sucesso", "Produto removido do carrinho com sucesso!");
        }
    
        // Se não encontrar o rowId, redireciona com erro
        return redirect()->route('site.carrinho')->with("erro", "Erro ao remover o produto.");
    }

    public function atualizarCarrinho(Request $request) {
        // Recuperando os dados corretamente
        $quantidade = abs($request->quantity); // Recebe o valor do campo 'quantity' do formulário
        $rowId = $request->rowId;
    
        // Verificando se a quantidade é válida
        if (!is_numeric($quantidade) || $quantidade <= 0) {
            return redirect()->route('site.carrinho')->with("erro", "Quantidade inválida!");
        }
    
        // Atualizando a quantidade no carrinho
        Cart::update($rowId, $quantidade);
    
        return redirect()->route('site.carrinho')->with("sucesso", "Carrinho atualizado!");

    }

    public function limparCarrinho(Request $request) {
        Cart::destroy();
        return redirect()->route('site.carrinho')->with("aviso", "Carrinho vazio");

    }
    
    
    
}
