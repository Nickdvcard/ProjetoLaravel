@extends('site/layout')

@section('title')
    Essa é a home
@endsection

@section('conteudo')

<div class="container d-flex justify-content-center">
  <div class="row w-100">

    @foreach ($produtos as $produto)
      <div class="col-12 col-md-4 text-center my-2">
        <div class="card">
          <img src="{{ $produto->imagem }}" class="card-img-top" alt="Card image">
          <div class="card-body">
            <h5 class="card-title">{{ $produto->nome }}</h5>
            <p>{{ Str::limit($produto->descricao, 20) }}</p>

            @can('verProduto', $produto)
            <a href="{{ route('site.details', $produto->slug) }}" class="btn btn-danger">
              <i class="bi bi-eye-fill"></i>
            </a>
            @else

            @endcan

          </div>
        </div>
      </div>
    @endforeach

  </div>
</div>

<!-- Paginação -->
<div class="container d-flex justify-content-center mt-4">
  <div class="row">
    {{ $produtos->links('custom/pagination') }}
  </div>
</div>

@endsection
