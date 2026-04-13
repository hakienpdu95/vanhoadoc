@php 
$query = \App\Queries\MergedPostsQuery::latest(); 
@endphp

<div class="threads flex overflow-x-auto">
	@while ($query->have_posts())
	@php $query->the_post(); @endphp
	    <div class="box-news grid-item match-height relative flex-none basis-[210px] w-[210px] max-w-[210px] mr-[14px] mb-[7px] rounded-[6px] md:basis-[180px] md:w-[180px] md:max-w-[180px]">
	        <div class="image image-wrapper block mb-[11px] relative overflow-hidden">
	        	{!! sage_post_link_open(get_post(), 'image image-small overflow-hidden relative block', 'post-ocop-home') !!}
	                {!! sage_thumbnail('thumb-medium', [
                        'class' => 'w-full !h-full absolute top-0 left-0 object-cover'
                    ], get_post()) !!}
	            {!! sage_post_link_close() !!}
	        </div>
	        <div class="content flex flex-col gap-[10px]">
	            <p class="meta-news mt-[6px] !mb-0 text-[12px] flex"></p>
	            <h3 class="title !mt-[4px] !mb-0 cursor-pointer overflow-hidden line-clamp-3">
	            	{!! sage_post_link_open(get_post(), '!no-underline !text-white text-[16px] font-semibold leading-[1.4] mb-[8px]', 'post-ocop-home') !!}
	                	{!! get_the_title(get_post()) !!}
	                {!! sage_post_link_close() !!}
	            </h3>
	        </div>
	    </div>
	@endwhile  
</div>

@php wp_reset_postdata(); @endphp