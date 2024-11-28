@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
        @endif
    </ul>
@endif

<!-- Estilos CSS -->
<style>
    /* Todos os links e flechas clicáveis (exceto quando selecionados) ficam cinza */
    .pagination .page-item .page-link {
        color: gray;
        background-color: transparent;
        border: 1px solid gray;
    }

    /* Quando a página está ativa, o fundo fica pêssego e o número branco */
    .pagination .page-item.active .page-link {
        background-color: peachpuff;
        color: whitesmoke;
        border-color: peachpuff;
    }

    /* Links e flechas desabilitadas (cinza claro) */
    .pagination .page-item.disabled .page-link {
        color: lightgray;
        border-color: lightgray;
    }

    /* Quando o link da página ativa é selecionado, a cor do texto e fundo muda */
    .pagination .page-item.active .page-link:hover {
        background-color: #ffcc99; /* Fundo mais claro quando passa o mouse */
        color: whitesmoke;
    }
</style>
