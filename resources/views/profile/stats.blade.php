<div class="card my-4">
        <div class="card-header">Stats</div>

        <div class="card-body">
            <div class="container">
                <strong>Books:</strong> {{ $user->books()->count() }}
                <br>
                <strong>Current Books:</strong> {{ $user->books()->current()->count() }}
                <br>
                <strong>Queued Books:</strong> {{ $user->books()->queued()->count() }}
                <br>
                <strong>Completed Books:</strong> {{ $user->books()->completed()->count() }}
            </div>
        </div>
    </div>