
    <div class="col-md-8">
        <div class="card bg-dark text-white">
            <div class="card-header">
                {{ $reply->owner->name}}
                {{ $reply->created_at->diffForHumans()}}
            </div>
            <div class="card-body">
                <article>
                    <div class="body">{{ $reply->body }}</div>
                </article>
            </div>
        </div>
    </div>
