@if ($paginator->hasPages())
    <div class="paging">
       
        @if ($paginator->onFirstPage())
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M13.9802 5.31999L10.7702 8.52999L8.80023 10.49C7.97023 11.32 7.97023 12.67 8.80023 13.5L13.9802 18.68C14.6602 19.36 15.8202 18.87 15.8202 17.92V12.31V6.07999C15.8202 5.11999 14.6602 4.63999 13.9802 5.31999Z"
                            fill="#BCBCBC" />
                </svg>
            </div>
        @else
            <div>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M13.9802 5.31999L10.7702 8.52999L8.80023 10.49C7.97023 11.32 7.97023 12.67 8.80023 13.5L13.9802 18.68C14.6602 19.36 15.8202 18.87 15.8202 17.92V12.31V6.07999C15.8202 5.11999 14.6602 4.63999 13.9802 5.31999Z"
                                fill="#BCBCBC" />
                    </svg>
                </a>
            </div>
        @endif

        @foreach ($elements as $element)
           
            @if (is_string($element))
                <div class="disabled">{{ $element }}</div>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="active my-active">{{ $page }}</div>
                    @else
                        <div><a href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <div>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M15.1997 10.4899L13.2297 8.51993L10.0197 5.30993C9.33969 4.63993 8.17969 5.11993 8.17969 6.07993V12.3099V17.9199C8.17969 18.8799 9.33969 19.3599 10.0197 18.6799L15.1997 13.4999C16.0297 12.6799 16.0297 11.3199 15.1997 10.4899Z"
                                fill="#BCBCBC" />
                    </svg>
                </a>
            </div>
        @else
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15.1997 10.4899L13.2297 8.51993L10.0197 5.30993C9.33969 4.63993 8.17969 5.11993 8.17969 6.07993V12.3099V17.9199C8.17969 18.8799 9.33969 19.3599 10.0197 18.6799L15.1997 13.4999C16.0297 12.6799 16.0297 11.3199 15.1997 10.4899Z"
                            fill="#BCBCBC" />
                </svg>
            </div>
        @endif
</div>
@endif 