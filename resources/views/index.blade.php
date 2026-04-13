@extends('layouts.app')

@section('content')
    @include('partials.blocks.post-topstory')

    <div class="mx-5"></div>
    
    <section class="section section_container creator-section bg-[#01152f] p-5 clear-both ml-auto mr-auto rounded-[8px] mb-5">
        <div class="top-creators flex">
            <div class="logo-wrapper max-w-[200px] flex-none mt-0 mx-auto mb-4">
                <a href="" class="relative">
                    <div class="logo-title absolute left-[20px] font-bold text-white whitespace-nowrap z-2">VIETNAM GUIDE</div>
                    <svg width="221" height="85" viewBox="0 0 221 85" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.51 73.41c-.3-1.866-1.76-2.957-3.606-2.957-2.258 0-3.925 1.691-3.925 4.483 0 2.79 1.658 4.483 3.925 4.483 1.918 0 3.32-1.202 3.605-2.928l-1.33-.004c-.225 1.116-1.163 1.73-2.266 1.73-1.496 0-2.625-1.146-2.625-3.281 0-2.118 1.125-3.282 2.629-3.282 1.112 0 2.045.627 2.263 1.756h1.33zm2.747 2.003c0-1.044.66-1.64 1.568-1.64.878 0 1.402.558 1.402 1.516v4.01H15.5v-4.163c0-1.632-.895-2.467-2.242-2.467-1.018 0-1.632.443-1.938 1.15h-.081v-3.247H9.983v8.727h1.274v-3.886zm5.944 3.886h1.274v-6.545h-1.274v6.545zm.644-7.555c.439 0 .805-.341.805-.759 0-.417-.366-.762-.805-.762-.444 0-.806.345-.806.762 0 .418.362.759.806.759zm4.25 7.7c1.082 0 1.691-.55 1.934-1.04h.051v.895h1.245v-4.346c0-1.905-1.5-2.284-2.54-2.284-1.185 0-2.276.477-2.702 1.67l1.198.273c.187-.465.664-.912 1.52-.912.823 0 1.245.43 1.245 1.172v.03c0 .464-.477.456-1.653.592-1.24.145-2.51.469-2.51 1.956 0 1.287.967 1.994 2.211 1.994zm.276-1.023c-.72 0-1.24-.323-1.24-.954 0-.682.605-.925 1.343-1.023.413-.055 1.393-.166 1.576-.35v.845c0 .775-.618 1.483-1.679 1.483zm12.731-4.07c-.264-1.018-1.06-1.682-2.476-1.682-1.478 0-2.527.78-2.527 1.939 0 .928.563 1.546 1.79 1.82l1.108.242c.63.14.925.422.925.831 0 .507-.541.903-1.377.903-.762 0-1.253-.328-1.406-.971l-1.231.187c.213 1.16 1.176 1.811 2.646 1.811 1.58 0 2.676-.84 2.676-2.024 0-.924-.588-1.495-1.79-1.772l-1.04-.24c-.72-.17-1.03-.412-1.026-.856-.005-.502.54-.86 1.265-.86.793 0 1.16.439 1.308.877l1.155-.204zm4.35 5.08c1.428 0 2.438-.703 2.727-1.768l-1.206-.217c-.23.618-.784.933-1.508.933-1.091 0-1.824-.708-1.858-1.969h4.653v-.452c0-2.365-1.415-3.29-2.898-3.29-1.823 0-3.025 1.39-3.025 3.401 0 2.033 1.185 3.362 3.115 3.362zm-1.84-3.975c.05-.93.724-1.735 1.759-1.735.989 0 1.636.733 1.64 1.735h-3.4zm2.22-3.606v-.409c.447-.068.894-.31.89-.869.004-.695-.678-1.133-1.965-1.133l-.038.703c.503 0 .9.119.895.426.004.255-.222.383-.822.413l.034.87h1.005zm7.018 7.45h1.274v-2.323l.635-.635 2.224 2.957h1.564l-2.83-3.737 2.651-2.808h-1.525l-2.608 2.77h-.111v-4.952H46.85v8.727zm6.68 0h1.273v-6.546H53.53v6.545zm.643-7.556c.439 0 .805-.341.805-.759 0-.417-.366-.762-.805-.762-.443 0-.806.345-.806.762 0 .418.363.759.806.759zm5.166 7.687c1.427 0 2.437-.703 2.727-1.768l-1.206-.217c-.23.618-.784.933-1.508.933-1.091 0-1.824-.708-1.858-1.969h4.653v-.452c0-2.365-1.415-3.29-2.898-3.29-1.824 0-3.025 1.39-3.025 3.401 0 2.033 1.184 3.362 3.115 3.362zm-1.841-3.975c.05-.93.724-1.735 1.76-1.735.988 0 1.636.733 1.64 1.735h-3.4zm-.503-3.486h1.261l.955-.844.946.844h1.253l-1.735-1.479h-.95l-1.73 1.479zm3.959-.946h.933l1.257-1.556h-1.3l-.89 1.556zm3.88 4.389c0-1.044.64-1.64 1.526-1.64.865 0 1.39.566 1.39 1.516v4.01h1.274v-4.163c0-1.62-.89-2.467-2.229-2.467-.984 0-1.628.456-1.93 1.15h-.081v-1.065H63.56v6.545h1.274v-3.886zm12.13-2.66H75.62v-1.567h-1.274v1.568h-.959v1.023h.96v3.865c-.005 1.189.903 1.764 1.908 1.743.405-.005.678-.081.827-.137l-.23-1.052c-.085.017-.243.055-.447.055-.414 0-.785-.136-.785-.874v-3.6h1.343v-1.023zm2.824 2.66c0-1.044.66-1.64 1.568-1.64.878 0 1.402.558 1.402 1.516v4.01h1.274v-4.163c0-1.632-.895-2.467-2.241-2.467-1.019 0-1.632.443-1.94 1.15h-.08v-3.247h-1.257v8.727h1.274v-3.886zm12.183-2.974c-.004.805-.043 1.214-.801 1.304v-.99h-1.278v3.832c.004 1.112-.823 1.64-1.539 1.64-.788 0-1.334-.57-1.334-1.461v-4.01h-1.274v4.163c0 1.624.89 2.468 2.148 2.468.984 0 1.653-.52 1.956-1.22h.068V79.3h1.253v-4.815c1.334-.098 1.739-.793 1.743-2.045h-.942zm-4.031-.559h1.018l1.321-1.964h-1.342l-.997 1.964zm8.366 7.551c1.547 0 2.548-.929 2.689-2.203h-1.24c-.162.708-.712 1.125-1.44 1.125-1.079 0-1.773-.899-1.773-2.326 0-1.402.707-2.284 1.772-2.284.81 0 1.305.51 1.44 1.125h1.24c-.135-1.322-1.213-2.2-2.7-2.2-1.846 0-3.04 1.39-3.04 3.388 0 1.973 1.151 3.375 3.052 3.375zm12.827-6.677h-1.368l-1.654 5.037h-.068l-1.657-5.037h-1.368l2.378 6.545h1.363l2.374-6.545zm6.434-.456c0 .643-.076 1.125-.464 1.338-.533-.618-1.308-.967-2.25-.967-1.845 0-3.051 1.35-3.051 3.387 0 2.025 1.206 3.375 3.051 3.375 1.845 0 3.051-1.35 3.051-3.375 0-.669-.132-1.265-.371-1.76.725-.31 1.019-1.014 1.019-1.998h-.985zm-2.71 6.064c-1.206 0-1.768-1.053-1.768-2.31 0-1.253.562-2.318 1.768-2.318 1.198 0 1.76 1.065 1.76 2.318 0 1.257-.562 2.31-1.76 2.31zm-.528-6.482h1.018l1.321-1.964h-1.342l-.997 1.964zm5.079 7.42h1.274v-6.546h-1.274v6.545zm.644-7.556c.439 0 .805-.341.805-.759 0-.417-.366-.762-.805-.762-.443 0-.806.345-.806.762 0 .418.363.759.806.759zm8.277 7.687c1.547 0 2.549-.929 2.689-2.203h-1.24c-.162.708-.711 1.125-1.44 1.125-1.078 0-1.773-.899-1.773-2.326 0-1.402.708-2.284 1.773-2.284.81 0 1.304.51 1.44 1.125h1.24c-.136-1.322-1.214-2.2-2.701-2.2-1.845 0-3.039 1.39-3.039 3.388 0 1.973 1.151 3.375 3.051 3.375zm6.809 0c1.845 0 3.051-1.35 3.051-3.375 0-2.037-1.206-3.387-3.051-3.387-1.845 0-3.051 1.35-3.051 3.387 0 2.025 1.206 3.375 3.051 3.375zm.004-1.07c-1.206 0-1.768-1.052-1.768-2.309 0-1.253.562-2.318 1.768-2.318 1.198 0 1.76 1.065 1.76 2.318 0 1.257-.562 2.31-1.76 2.31zm-.882-6.391l.878-1.142.874 1.142h1.154v-.064l-1.5-1.807h-1.061l-1.495 1.807v.064h1.15zm.878 9.588c.439 0 .805-.341.805-.759 0-.417-.366-.763-.805-.763-.443 0-.805.346-.805.763 0 .418.362.759.805.759zm5.748-6.145c0-1.044.639-1.64 1.525-1.64.865 0 1.389.566 1.389 1.516v4.01h1.274v-4.163c0-1.62-.89-2.467-2.228-2.467-.985 0-1.628.456-1.931 1.15h-.081v-1.065h-1.223v6.545h1.275v-3.886zm8.642 6.477c1.666 0 2.953-.763 2.953-2.446v-6.69h-1.249v1.06h-.094c-.225-.404-.677-1.145-1.896-1.145-1.581 0-2.744 1.248-2.744 3.332 0 2.088 1.189 3.2 2.736 3.2 1.201 0 1.666-.677 1.896-1.095h.081v1.287c0 1.027-.703 1.47-1.671 1.47-1.061 0-1.474-.532-1.7-.907l-1.095.451c.345.801 1.219 1.483 2.783 1.483zm-.013-3.746c-1.138 0-1.73-.873-1.73-2.16 0-1.257.579-2.233 1.73-2.233 1.112 0 1.709.908 1.709 2.233 0 1.35-.61 2.16-1.709 2.16zm10.301 1.283c1.193 0 1.662-.729 1.892-1.146h.106v1.018h1.245v-7.07h.873v-.881h-.873v-.776h-1.275v.776h-1.768v.882h1.768v1.585h-.076c-.23-.405-.665-1.146-1.884-1.146-1.581 0-2.744 1.248-2.744 3.37 0 2.118 1.146 3.388 2.736 3.388zm.281-1.087c-1.138 0-1.73-1-1.73-2.313 0-1.3.579-2.276 1.73-2.276 1.112 0 1.709.908 1.709 2.276 0 1.376-.61 2.314-1.709 2.314zm7.537 1.091c1.845 0 3.051-1.35 3.051-3.375 0-2.037-1.206-3.387-3.051-3.387-1.845 0-3.051 1.35-3.051 3.387 0 2.025 1.206 3.375 3.051 3.375zm.004-1.07c-1.206 0-1.768-1.052-1.768-2.309 0-1.253.562-2.318 1.768-2.318 1.198 0 1.76 1.065 1.76 2.318 0 1.257-.562 2.31-1.76 2.31zm.461-7.849h-.951l-1.717 1.48h1.253l.95-.845.946.844h1.257l-1.738-1.479zm-3.103-1.03h-1.308l1.27 1.563h.916l-.878-1.564zm8.386 5.931c0-1.044.639-1.64 1.525-1.64.865 0 1.389.566 1.389 1.516v4.01h1.275v-4.163c0-1.62-.891-2.467-2.229-2.467-.984 0-1.628.456-1.931 1.15h-.08v-1.065h-1.223v6.545h1.274v-3.886zm8.642 6.477c1.666 0 2.953-.763 2.953-2.446v-6.69h-1.249v1.06h-.094c-.225-.404-.677-1.145-1.896-1.145-1.581 0-2.744 1.248-2.744 3.332 0 2.088 1.189 3.2 2.736 3.2 1.201 0 1.666-.677 1.896-1.095h.081v1.287c0 1.027-.703 1.47-1.671 1.47-1.061 0-1.474-.532-1.7-.907l-1.095.451c.345.801 1.219 1.483 2.783 1.483zm-.013-3.746c-1.138 0-1.73-.873-1.73-2.16 0-1.257.579-2.233 1.73-2.233 1.112 0 1.709.908 1.709 2.233 0 1.35-.61 2.16-1.709 2.16z" fill="#EDEEF2"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M200.301 67.3a8 8 0 1 0 .002 16 8 8 0 0 0-.002-16zm1.666 12.398a26.4 26.4 0 0 1-.986.37c-.245.086-.53.129-.854.129-.499 0-.887-.122-1.163-.365a1.18 1.18 0 0 1-.414-.926c0-.146.01-.295.031-.446.021-.152.054-.323.099-.514l.515-1.82c.046-.175.085-.341.116-.496.031-.156.046-.298.046-.428 0-.232-.048-.395-.143-.486-.097-.092-.279-.136-.551-.136-.133 0-.269.02-.41.06a6.076 6.076 0 0 0-.358.12l.136-.56c.338-.138.661-.256.969-.354.308-.099.599-.147.873-.147.495 0 .877.12 1.146.359.268.239.403.55.403.931 0 .08-.01.22-.028.418-.018.2-.053.382-.103.55l-.513 1.815a5.171 5.171 0 0 0-.113.498 2.644 2.644 0 0 0-.049.424c0 .241.053.406.162.493.107.087.294.131.56.131.125 0 .265-.022.424-.065.157-.044.27-.082.342-.115l-.137.56zm-.954-7.034c.336 0 .624-.111.863-.333.239-.222.359-.492.359-.808 0-.315-.12-.586-.359-.81a1.213 1.213 0 0 0-.863-.337c-.336 0-.626.112-.867.337a1.075 1.075 0 0 0-.361.81c0 .315.121.586.361.808.241.222.531.333.867.333z" fill="#EDEEF2"></path>
                        <circle cx="31" cy="31" r="31" fill="url(#paint0_linear)"></circle>
                        <path d="M219.5 48.068H85.066l-9.47 11.7" stroke="url(#paint2_linear)"></path>
                        <defs>
                            <linearGradient id="paint0_linear" x1="86.104" y1="33.44" x2="28.984" y2="-24.528" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2AF598"></stop>
                                <stop offset="1" stop-color="#0049FD"></stop>
                            </linearGradient>
                            <linearGradient id="paint1_linear" x1="300.311" y1="31.72" x2="291.945" y2="-24.154" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2AF598"></stop>
                                <stop offset="1" stop-color="#0049FD"></stop>
                            </linearGradient>
                            <linearGradient id="paint2_linear" x1="76" y1="60" x2="220" y2="48" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2AF598"></stop>
                                <stop offset="1" stop-color="#0049FD" stop-opacity="0"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </a>
            </div>
            <div class="creators flex flex-auto overflow-x-auto flex-nowrap">
                <a href="#" class="creator m-0 mr-[25px] mb-[10px] w-[80px] flex-none">
                    <div style="background-image: url('{{ Vite::asset('resources/images/hanoi.png') }}')" class="creator-avata rounded-[50%] w-[56px] h-[56px] relative bg-[#fff] bg-no-repeat bg-center bg-cover">
                        <div class="rank absolute bottom-[-15px] left-[-3px] text-[30px] font-black text-white leading-none [-webkit-text-stroke:1px_#007bff]">#1</div>
                    </div>
                    <p class="creator-name text-white text-[13px] mt-[8px] mb-0 truncate">OCOP Hà Nội</p>
                </a>
                <a href="#" class="creator m-0 mr-[25px] mb-[10px] w-[80px] flex-none">
                    <div style="background-image: url('{{ Vite::asset('resources/images/vietnam.png') }}')" class="creator-avata rounded-[50%] w-[56px] h-[56px] relative bg-[#fff] bg-no-repeat bg-center bg-cover">
                        <div class="rank absolute bottom-[-15px] left-[-3px] text-[30px] font-black text-white leading-none [-webkit-text-stroke:1px_#007bff]">#2</div>
                    </div>
                    <p class="creator-name text-white text-[13px] mt-[8px] mb-0 truncate">OCOP Bắc Ninh</p>
                </a>
                <a href="#" class="creator m-0 mr-[25px] mb-[10px] w-[80px] flex-none">
                    <div style="background-image: url('{{ Vite::asset('resources/images/hatinh.png') }}')" class="creator-avata rounded-[50%] w-[56px] h-[56px] relative bg-[#fff] bg-no-repeat bg-center bg-cover">
                        <div class="rank absolute bottom-[-15px] left-[-3px] text-[30px] font-black text-white leading-none [-webkit-text-stroke:1px_#007bff]">#3</div>
                    </div>
                    <p class="creator-name text-white text-[13px] mt-[8px] mb-0 truncate">OCOP Hà Tĩnh</p>
                </a>
                <a href="#" class="creator m-0 mr-[25px] mb-[10px] w-[80px] flex-none">
                    <div style="background-image: url('{{ Vite::asset('resources/images/cantho.png') }}')" class="creator-avata rounded-[50%] w-[56px] h-[56px] relative bg-[#fff] bg-no-repeat bg-center bg-cover">
                        <div class="rank absolute bottom-[-15px] left-[-3px] text-[30px] font-black text-white leading-none [-webkit-text-stroke:1px_#007bff]">#4</div>
                    </div>
                    <p class="creator-name text-white text-[13px] mt-[8px] mb-0 truncate">OCOP Cần Thơ</p>
                </a>
                <a href="#" class="creator m-0 mr-[25px] mb-[10px] w-[80px] flex-none">
                    <div style="background-image: url('{{ Vite::asset('resources/images/quangninh.png') }}')" class="creator-avata rounded-[50%] w-[56px] h-[56px] relative bg-[#fff] bg-no-repeat bg-center bg-cover">
                        <div class="rank absolute bottom-[-15px] left-[-3px] text-[30px] font-black text-white leading-none [-webkit-text-stroke:1px_#007bff]">#5</div>
                    </div>
                    <p class="creator-name text-white text-[13px] mt-[8px] mb-0 truncate">OCOP Quảng Ninh</p>
                </a>
            </div>
        </div>
        <div class="latest-threads-header mt-6 pt-[26px] pb-[24px] border-t border-[#032a5e] flex items-center justify-between">
            <h3 class="section-heading text-white text-[18px] font-semibold !mb-0 mr-[60px]">Review nông sản mới nhất</h3>
            <a href="#" class="btn button-gradient-2 !text-white !no-underline font-medium leading-[18px] bg-[linear-gradient(94.95deg,#2af598_-43.99%,#0049fd_106.14%)] border-none py-[6px] px-[15px] whitespace-nowrap rounded-md">+ Gửi sản phẩm review</a>
        </div>
        @include('partials.blocks.box-ocop-news')
    </section>

    {{ sage_prefetch_link_posts($wp_query->posts ?? []) }}

    @php global $wp_query; $query = $wp_query; @endphp

    @include('partials.content-listing', ['query' => $query])

    @php
        $total_posts = $query->found_posts ?? 0;
    @endphp

    @if ($total_posts >= 3)
        <!-- LOAD MORE BUTTON -->
        <div class="text-center mt-12">
            <button id="load-more-btn"
                    class="px-12 py-4 bg-[#6697a1] hover:bg-[#55868f] text-white font-medium rounded-2xl transition-all flex items-center gap-3 mx-auto disabled:opacity-70"
                    data-offset="3"
                    data-ajaxurl="{{ admin_url('admin-ajax.php') }}"
                    data-nonce="{{ wp_create_nonce('load_more_nonce') }}">
                <span class="btn-text">Xem thêm 3 bài viết</span>
                <span class="loading hidden">
                    <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                </span>
            </button>
        </div>
    @endif
@endsection

@section('sidebar')
    @include('sections.sidebar')
@endsection