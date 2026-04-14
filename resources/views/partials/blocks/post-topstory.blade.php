@php
    $query = \App\Queries\MergedPostsQuery::featured(1, ['post']); 
    $sub_feature = \App\Queries\MergedPostsQuery::latest(6, ['book-review']); 
@endphp
<section class="wrapper-topstory">
    <div class="news-box tin_host_home w-full pb-0">
        <div class="tieudiem main">
            @while ($query->have_posts())
            @php $query->the_post(); @endphp
            <div class="box-news-larger flex flex-wrap relative mb-5 item-news full-thumb article-topstory">
                <div class="thumb-art w-full grow-0 shrink-0 basis-full">
                    <div class="image image-wrapper overflow-hidden relative">
                        {!! sage_post_link_open(get_post(), 'image image-medium relative overflow-hidden block no-underline', 'post-story-home') !!}
                            {!! sage_thumbnail('thumb-medium', [
                                'class' => 'w-full !h-full absolute top-0 left-0 object-cover lazy loaded'
                            ], get_post()) !!}
                        {!! sage_post_link_close() !!}
                    </div>
                </div>
                <div class="content text-center bg-white relative ml-auto mr-auto z-2">
                    <h3 class="title title-news mb-3 pt-0 mt-0">
                        {!! sage_post_link_open(get_post(), '!no-underline font-semibold text-[#222b45]', 'post-story-home') !!}
                            {!! get_the_title(get_post()) !!}
                        {!! sage_post_link_close() !!}
                    </h3>
                    @if (sage_excerpt(get_post()))
                        <p class="snippet font-light">
                            {!! sage_excerpt(get_post()) !!}
                        </p>
                    @endif
                </div>
            </div>
            @endwhile  

            <div class="sub-news-top w-full h-auto pl-0 clear-both">
                <div class="list-sub-feature grid sm:grid-cols-3 grid-cols-1 gap-3">
                    @while ($sub_feature->have_posts())
                    @php $sub_feature->the_post(); @endphp
                    <div class="item group">
                        <div class="box-news relative mb-5">
                            <div class="image image-wrapper overflow-hidden relative block mb-3">
                                {!! sage_post_link_open(get_post(), 'image image-small relative overflow-hidden block no-underline', 'post-sub-feature-home') !!}
                                    {!! sage_thumbnail('thumb-medium', [
                                        'class' => 'w-full !h-full absolute top-0 left-0 object-cover lazy loaded'
                                    ], get_post()) !!}
                                {!! sage_post_link_close() !!}
                            </div>
                            <div class="content flex flex-col gap-2">
                                <h3 class="title m-0 !mb-0">
                                    {!! sage_post_link_open(get_post(), '!no-underline font-semibold text-[#222b45]', 'post-story-home') !!}
                                        {!! get_the_title(get_post()) !!}
                                    {!! sage_post_link_close() !!}
                                </h3>
                            </div>
                        </div>
                    </div>
                    @endwhile
                </div>
            </div>
        </div>
    </div>
</section>

<section class="wrapper-books">
    <div class="container">
        @while ($sub_feature->have_posts())
        @php $sub_feature->the_post(); @endphp
        <div class="book-image w-[216px]">
            <div class="image-cut"></div>
            {!! sage_post_link_open(get_post(), 'image image-small relative overflow-hidden block no-underline', 'post-sub-feature-home') !!}
            {!! sage_thumbnail('thumb-medium', [
                'class' => 'w-full h-full object-cover lazy loaded'
            ], get_post()) !!}
            {!! sage_post_link_close() !!}
            <div class="book-scrolling-typo">
                {!! sage_post_link_open(get_post(), '!no-underline font-semibold text-[#222b45]', 'post-story-home') !!}
                    {!! get_the_title(get_post()) !!}
                {!! sage_post_link_close() !!}
            </div>
        </div>
        @endwhile
    </div>
</section>
@php wp_reset_postdata(); @endphp