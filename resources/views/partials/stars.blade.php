<span data-toggle="tooltip" data-placement="top" title="Rating: {{ $rating ?? 'Not rated yet.' }}">
    @if(is_null($rating))
        Not rated yet.
    @else
        @for($i = 0; $i < $rating; $i++)
            @if($rating - $i >= 1)
                <i class="fas fa-star"></i>
            @else
                <i class="fas fa-star-half-alt"></i>
            @endif
        @endfor
    @endif
</span>