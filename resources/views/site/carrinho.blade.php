@extends('site/layout')

@section('title')
    Essa é a pagina do carrinho
@endsection

@section('conteudo')

@if ($mensagem = Session::get('sucesso'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> {{ $mensagem }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if ($mensagem = Session::get('aviso'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sucesso!</strong> {{ $mensagem }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if($itens->count() == 0)  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Carrinho vazio</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>


@else 

<h2>Seu carrinho possui: {{ $itens->count() }} produtos</h2>

<div class="container d-flex justify-content-center">
  <div class="row w-100">

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th></th>
          <th scope="col">Nome</th>
          <th scope="col">Preço</th>
          <th scope="col">Quantidade</th>
        </tr>
      </thead>
      <tbody>

    @foreach ($itens as $item)

    <tr>
      <td>
        <img src="{{ $item->options->image }}" alt="Imagem de {{ $item->name }}" class="img-fluid rounded-circle" style="max-width: 70px;">
      </td>
      <td>{{ $item->name }}</td>
      <td>R${{ number_format($item->price, 2, ',', '.') }}</td>
    
      {{-- Coluna de Quantidade --}}
      <td>
        <form action="{{ route('site.atualizarcarrinho') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="rowId" value="{{ $item->rowId }}">
          <input type="number" name="quantity" min="1" value="{{ $item->qty }}" style="width: 80px;">
      </td>

      {{-- Coluna de Botões (Atualizar e Deletar) --}}
      <td>
        <form action="{{ route('site.atualizarcarrinho') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="rowId" value="{{ $item->rowId }}">
          <button type="submit" class="btn btn-warning mb-2">Atualizar</button>
        </form>

        <form action="{{ route('site.removercarrinho') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="rowId" value="{{ $item->rowId }}">
          <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
      </td>

    </tr>
    
    
    
    
    @endforeach

      </tbody>
    </table>

    <h5> Valor total: {{ number_format(\Cart::total(), 2, ',', '.')}}
@endif 

    <div class="row text-center">
      <div class="col-auto">
        <a href="{{ route('site.listagem') }}" class="btn btn-lg btn-warning d-flex align-items-center">
          Continuar comprando <i class="bi bi-arrow-repeat ms-2"></i>
        </a>
      </div>
      <div class="col-auto">
        <a href="{{ route('site.limparcarrinho') }}" class="btn btn-lg btn-danger d-flex align-items-center">
          Limpar carrinho <i class="bi bi-x-circle ms-2"></i>
        </a>
      </div>
      <div class="col-auto">
        <button class="btn btn-lg btn-success d-flex align-items-center">
          Finalizar pedido <i class="bi bi-check2-circle ms-2"></i>
        </button>
      </div>
    </div>
    

  </div>
</div>

@endsection
