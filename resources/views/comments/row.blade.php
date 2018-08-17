<div class="d-flex justify-content-between">
    @include('users.partials.avatar', ['user' => $comment->user])
    <div class="d-flex flex-column">
        <strong><a href="{{ $comment->user->url() }}">{{ $comment->user->name }}</a> said:</strong>
        <div style="white-space: pre-wrap;">{{ $comment->body }}</div>
    </div>
    @can('delete', $comment)
        <form action="/comments/{{ $comment->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    @endcan
</div>