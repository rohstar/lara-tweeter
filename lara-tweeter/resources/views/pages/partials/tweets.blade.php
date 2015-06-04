<ul class="list-group">
    @foreach ($tweets as $tweet)
        <li class="list-group-item"> {{ $tweet->content }}

            <span class="badge">{{$tweet->created_at->diffForHumans()}}</span>
        </li>
    @endforeach
</ul>