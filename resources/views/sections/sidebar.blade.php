{!! sage_get_sidebar_banner(1) !!}

@php 
$query = \App\Queries\MergedPostsQuery::breaking(6, ['post', 'event']); 
@endphp

@include('partials.blocks.breaking-posts', [
    'title' => 'Tin Nổi Bật',
    'query' => $query 
])

@php 
$post_trending = \App\Queries\MergedPostsQuery::latest(); 
@endphp

<div class="widget box mb-3 widget-posts blogsidebar3widget type-2">
    <div class="box-title widget-title mb-3 style_5">
        <div class="m-0 main-title">
            <span class="uppercase inner-title">Xu hướng</span>
        </div>
    </div>
    <div class="box-body widget-content">
        @while ($post_trending->have_posts())
        @php $post_trending->the_post(); @endphp
        <div class="item">
            {!! sage_post_link_open(get_post(), '!flex justify-between items-center !no-underline style_img_left mb-4', 'post-story-home') !!}
                <div class="image image-wrapper mr-3">
                    <div class="image image-medium relative overflow-hidden block no-underline">
                        {!! sage_thumbnail('thumb-medium', [
                                'class' => 'w-full min-h-full max-h-full !h-[67px] absolute top-0 left-0 object-cover'
                            ], get_post()) !!}
                    </div>
                </div>
                <div class="info-wrapper">
                    <h3 class="article-title clamp-4-lines"> {!! get_the_title(get_post()) !!} </h3>
                    <div class="meta-news hidden">
                        <span class="author-meta">Trần Như Hải Ngân</span>
                    </div>
                </div>
            {!! sage_post_link_close() !!}
        </div>
        @endwhile
    </div>
</div>

<div class="widget news-box box-category box-cate-featured box-cate-featured-vertical news-box-color inline-block w-full mb-[15px]">
    <div class="content-box-category">
        <div class="item-news full-thumb w-full bg-transparent pb-[10px] mb-[10px] border-b-0 float-left">
            <div class="match-height">
                <div class="thumb-art image image-wrapper relative overflow-hidden w-full mb-[10px]">
                    <a href="#" title="Gạo nếp hương Bảo Lạc đặc sản OCOP Cao Bằng" class="image image-medium relative block overflow-hidden">
                        <div class="gradient-background"></div>
                        <img alt="Gạo nếp hương Bảo Lạc đặc sản OCOP Cao Bằng" class="absolute w-full h-full object-cover left-0 top-0 lazy loaded" data-ll-status="loaded" src="https://doanhnghiepkinhtexanh.vn/zoom/480x288/uploads/blog/nguyenvantong/2026/03/23/nhcb-1774224103.png">
                    </a>
                    <h2 class="absolute text-white text-[22px] font-bold top-[10px] left-4 z-[1] cat">
                        <a class="!no-underline !text-white" href="https://doanhnghiepkinhtexanh.vn/c/quay-ocop" title="Quầy OCOP">Quầy OCOP</a>
                    </h2>
                </div>
                <div class="content">
                    <h3 class="title title-news">
                        <a class="!no-underline" href="https://doanhnghiepkinhtexanh.vn/gao-nep-huong-bao-lac-dac-san-ocop-cao-bang-a45866.html" title="Gạo nếp hương Bảo Lạc đặc sản OCOP Cao Bằng"> Gạo nếp hương Bảo Lạc đặc sản OCOP Cao Bằng </a>
                    </h3>
                    <div class="block description"> Gạo nếp hương Bảo Lạc - đặc sản núi rừng của tỉnh Cao Bằng - từ lâu đã trở thành... </div>
                </div>
            </div>
        </div>

        @while ($post_trending->have_posts())
        @php $post_trending->the_post(); @endphp
        <div class="sub-news-cate">
            <div class="item">
                <h3>
                    {!! sage_post_link_open(get_post()) !!}
                        {!! get_the_title(get_post()) !!}
                    {!! sage_post_link_close() !!}
                </h3>
            </div>
        </div>
        @endwhile
    </div>
</div>

<div class="widget">
    <div class="c-box p-[15px] border border-[#E5E5E5]">
        <div class="c-box__title pb-[10px]">
            <h2 class="c-box__title__name">Đọc nhiều</h2>
        </div>
        <div class="c-box__content">
            <div class="c-news-topread">
                <ul>
                    @while ($post_trending->have_posts())
                    @php $post_trending->the_post(); @endphp
                    <li>
                        <div class="c-news-topread__number">
                            <span>{{ $post_trending->current_post + 1 }}</span>
                        </div>
                        <h3 class="c-news-topread__title">
                            {!! sage_post_link_open(get_post()) !!}
                                {!! get_the_title(get_post()) !!}
                            {!! sage_post_link_close() !!}
                        </h3>
                    </li>
                    @endwhile
                </ul>
            </div>
        </div>
    </div>
</div>

@php wp_reset_postdata(); @endphp