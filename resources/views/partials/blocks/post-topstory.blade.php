@props([
    'posts'     => \App\Queries\MergedPostsQuery::latest(6, ['book-review']),
    'perPage'   => 5,
    'autoplay'  => false,
    'interval'  => 4000,
])
<section class="section-index nma-book-hero">
    <div class="container mx-auto">
        <div class="nma-hero md:max-w-[1120px]!">
            <a class="nma-hero-image" href="https://www.storyberries.com/bedtime-stories-big-wave-coming-storybooks-online/">
                <img decoding="async" width="1011" height="1024" src="https://www.storyberries.com/wp-content/uploads/2026/02/Bedtime-stories-Big-Wave-Coming-short-stories-for-kids-about-tantrums_1-1011x1024.jpg" class="attachment-large size-large wp-post-image" alt="Bedtime stories Big Wave Coming short stories for kids about tantrums and big feelings cover" srcset="https://www.storyberries.com/wp-content/uploads/2026/02/Bedtime-stories-Big-Wave-Coming-short-stories-for-kids-about-tantrums_1-1011x1024.jpg 1011w, https://www.storyberries.com/wp-content/uploads/2026/02/Bedtime-stories-Big-Wave-Coming-short-stories-for-kids-about-tantrums_1-296x300.jpg 296w, https://www.storyberries.com/wp-content/uploads/2026/02/Bedtime-stories-Big-Wave-Coming-short-stories-for-kids-about-tantrums_1-768x778.jpg 768w, https://www.storyberries.com/wp-content/uploads/2026/02/Bedtime-stories-Big-Wave-Coming-short-stories-for-kids-about-tantrums_1.jpg 1300w" sizes="(max-width: 1011px) 100vw, 1011px" loading="eager">
            </a>
            <div class="nma-hero-text">
                <h2 class="nma-hero-title">
                    <a href="https://www.storyberries.com/bedtime-stories-big-wave-coming-storybooks-online/">Big Wave Coming</a>
                </h2>
                <div class="nma-hero-excerpt">A playful beach bedtime story where a giant wave mirrors big feelings. Perfect for learning calm breathing and emotional regulation.</div>
            </div>              
        </div>      
    </div>
</section>

<section class="section-index">
    <div class="container mx-auto">
        <div class="section-title">
            <h2>
                <a href="be-quan-sat-cho-be-1-2-3-tuoi-phat-trien-ngon-ngu-ky-nang-xa-hoi" title="Quan sát cho bé ">Quan sát cho bé </a>
            </h2>
            <a class="button-more inline-flex items-center" href="be-quan-sat-cho-be-1-2-3-tuoi-phat-trien-ngon-ngu-ky-nang-xa-hoi" title="Xem tất cả">
                <span>Xem tất cả</span>
                <svg class="ml-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path d="M16 8L9.88755 1.78545C9.81555 1.69996 9.72694 1.63053 9.62729 1.58151C9.52764 1.5325 9.4191 1.50495 9.30848 1.50061C9.19786 1.49626 9.08755 1.51521 8.98448 1.55627C8.88141 1.59733 8.7878 1.6596 8.70952 1.73919C8.63124 1.81877 8.56999 1.91395 8.52961 2.01874C8.48923 2.12353 8.47059 2.23568 8.47486 2.34815C8.47913 2.46061 8.50623 2.57097 8.55444 2.67228C8.60265 2.7736 8.67094 2.86369 8.75502 2.9369L12.8514 7.11804L0.803214 7.11804C0.590189 7.11804 0.38589 7.20408 0.235258 7.35722C0.0846259 7.51037 1.63555e-06 7.71809 1.62608e-06 7.93467C1.61661e-06 8.15125 0.0846259 8.35897 0.235258 8.51211C0.38589 8.66526 0.590189 8.7513 0.803214 8.7513L12.996 8.7513L8.75502 13.0631C8.67094 13.1363 8.60265 13.2264 8.55444 13.3277C8.50623 13.429 8.47913 13.5394 8.47486 13.6519C8.47059 13.7643 8.48923 13.8765 8.52961 13.9813C8.56999 14.0861 8.63124 14.1812 8.70952 14.2608C8.78779 14.3404 8.88141 14.4027 8.98448 14.4437C9.08755 14.4848 9.19786 14.5037 9.30848 14.4994C9.41909 14.495 9.52763 14.4675 9.62728 14.4185C9.72694 14.3695 9.81554 14.3 9.88755 14.2146L16 8Z" fill="#2B6377"></path>
                    </g>
                    <defs>
                        <clipPath>
                            <rect width="16" height="16" fill="white" transform="translate(16) rotate(90)"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </a>
        </div>

        <div class="block-products splide" data-splide-config='{ "type": "loop", "perPage": {{ $perPage }}, "breakpoints": {"640": {"perPage": "2"}},"autoplay": {{ $autoplay ? 'true' : 'false' }}, "interval": {{ $interval }}, "arrows": true, "pagination": true, "gap": "1.5rem", "lazyLoad": "nearby" }'>
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach (($posts instanceof \WP_Query ? $posts->posts : $posts) as $post)
                        <li class="splide__slide">
                            <div class="book-image item_product_main">
                                <div class="image-cut"></div>
                                {!! sage_post_link_open($post, 'image image-small relative overflow-hidden block no-underline', 'post-sub-feature-home') !!}
                                {!! sage_thumbnail('thumb-medium', [
                                    'class' => 'w-full h-full object-cover lazy loaded'
                                ], $post) !!}
                                {!! sage_post_link_close() !!}
                                <div class="book-scrolling-typo">
                                    {!! sage_post_link_open($post, '!no-underline font-semibold text-[#222b45]', 'post-story-home') !!}
                                        {!! get_the_title($post) !!}
                                    {!! sage_post_link_close() !!}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>       
        </div>
    </div>
</section>

@php wp_reset_postdata(); @endphp