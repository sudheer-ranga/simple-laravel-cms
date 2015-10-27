<div class="list-group">
    {!! link_to_route('frontend.post.index', "Posts", [], ['class' => 'list-group-item']) !!}
    {!! link_to_route('frontend.tag.index', "Tags", [], ['class' => 'list-group-item']) !!}

    @if(\Auth::guest())
        {!! link_to_route('login', "Log In", [], ['class' => 'list-group-item']) !!}
    @else
        {!! link_to_route('logout', "Log Out", [], ['class' => 'list-group-item']) !!}
    @endif
</div>