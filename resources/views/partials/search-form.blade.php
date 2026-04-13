<form role="search" method="get" action="{{ home_url('/') }}" class="relative w-[330px] mx-auto">
    <input type="search" 
           name="s" 
           value="{{ get_search_query() }}" 
           placeholder="Tìm kiếm bài viết, sự kiện..." 
           class="w-full py-1 pl-4 pr-14 border border-gray-400 text-lg outline-none rounded-[35px] max-h-[34px]">
    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-primary-600 hover:text-primary-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 01-14 0 7 7 0 0114 0z" />
        </svg>
    </button>
</form>