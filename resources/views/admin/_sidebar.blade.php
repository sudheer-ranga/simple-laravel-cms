<div class="list-group">
    {!! link_to_route('admin.post.index', "Posts", [], ['class' => 'list-group-item']) !!}
    {!! link_to_route('admin.post.trash.index', "Trashed Posts", [], ['class' => 'list-group-item']) !!}
    {!! link_to_route('admin.tag.index', "Tags", [], ['class' => 'list-group-item']) !!}
    {!! link_to_route('logout', "Logout", [], ['class' => 'list-group-item']) !!}
</div>