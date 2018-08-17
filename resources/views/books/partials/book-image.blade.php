<a href="{{ $book->url() }}">
    <img src="{{ $image ?? '/images/default-book.png' }}" 
        alt="{{ $book->title }} by {{ $book->author }}"
        style="max-width:100%;max-height:100%;">
    </img>
</a>
            
