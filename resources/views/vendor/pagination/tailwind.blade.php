@if ($paginator->hasPages())
    <br>
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info">
                {!! __('Showing') !!} {{ $paginator->firstItem() }} {!! __('to') !!}
                {{ $paginator->lastItem() }} {!! __('of') !!} {{ $paginator->total() }}
                {!! __('results') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="float-right">
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="paginate_button page-item previous disabled">
                            <a href="javascript:void(0);" class="page-link">&laquo; Previous</a>
                        </li>
                    @else
                        <li class="paginate_button page-item previous">
                            <a href="{{ $paginator->previousPageUrl() }}" class="page-link">&laquo; Previous</a>
                        </li>
                    @endif


                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="paginate_button page-item disabled">
                                <a href="javascript:void(0);" class="page-link">...</a>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="paginate_button page-item active">
                                        <a href="javascript:void(0);" class="page-link">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="paginate_button page-item">
                                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="paginate_button page-item next">
                            <a href="{{ $paginator->nextPageUrl() }}" class="page-link">Next &raquo;</a>
                        </li>
                    @else
                        <li class="paginate_button page-item next disabled">
                            <a href="javascript:void(0);" class="page-link">Next &raquo;</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
