<div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">
    <a href="{{ $book->url() }}">
        <img src="{{ $book->image }}" 
            alt="{{ $book->title }} by {{ $book->author }}"
            style="max-width: 220px; max-height: 300px;">
        </img>
    </a>
</div>