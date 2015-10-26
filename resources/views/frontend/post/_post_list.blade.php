<div class="col-sm-12">
    <h4>
        {!! link_to_route('frontend.post.show', $post->title, [$post->slug]) !!}
    </h4>
    <p>{!! $post->description !!}</p>
</div><!-- /.col -->