@extends('site/layout')

@section('title')
    Essa é o details
@endsection

@section('conteudo')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <img src="{{ $produto->imagem }}" class="img-fluid" alt="Imagem do Produto">
        </div>

        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <h1>{{ $produto->nome }}</h1>
            <p>{{ $produto->descricao }}</p>
            <p>Valor: R${{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p>Postado por: {{ $produto->user->firstName }}</p>
            <p>Categoria: {{ $produto->categoria->nome }}</p>
            <div class="text-center">

                <form action="{{ route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $produto->id }}">
                    <input type="hidden" name="nome" value="{{ $produto->nome }}">
                    <input type="hidden" name="preco" value="{{ $produto->preco }}">
                    <input type="number" name="quantidade" value="1" min="1">
                    <input type="hidden" name="imagem" value="{{ $produto->imagem }}">
                <button class="btn btn-warning btn-lg">Comprar</button>
            </div>
        </div>
    </div>
</div>

@endsection
