<div class="col-sm-12">
    <h4>
        {!! link_to_route('admin.post.show', $post->title, [$post->slug]) !!}
    </h4>
    <p>{!! $post->description !!}</p>
</div><!-- /.col -->