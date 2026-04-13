<div class="before-footer">
    <section class="call-to-action text-white">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-12 sm:col-span-6">
                    <div class="flex justify-start items-center">
                        <a href="https://doanhnghiepkinhtexanh.vn/lien-he" class="icon-box-wrapper flex text-left flex-row items-center">
                            <div class="icon-box-icon">
                                <span class="elementor-icon elementor-animation-">
                                    <i class="fa-sharp fa-solid fa-envelope"></i>
                                </span>
                            </div>
                            <div class="icon-box-content">
                                <h4 class="main-title icon-box-title !mb-0">
                                    <span>Góp ý nội dung</span>
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <div class="action-content-right flex items-center justify-end flex-1">
                        <div class="title-wraper">
                            <h4 class="main-title !mb-0">Hợp tác truyền thông, quảng cáo</h4>
                        </div>
                        <a href="tel:098.110.7395" class="btn btn-primary btn-action">
                            <i class="fa-sharp-duotone fa-light fa-paper-plane mr-1"></i> 098.110.7395 </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<footer id="footer" class=" mt-10">
    <div class="footer-main px-3 py-10">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-5">

                <div class="col-span-12 sm:col-span-6">
                    <div class="flex justify-start items-center overflow-hidden header-logo relative">
                        <a title="Logo" href="{{ home_url('/') }}" class="logo-link">
                            <img id="logo-img" alt="Logo" src="{{ asset('images/logo.png') }}" loading="lazy" class="img-fluid">
                        </a>
                        <div class="flex flex-col" style="margin-top:-3px">
                            <a class="logo" href="{{ home_url('/') }}">
                                <strong class="brand-name relative">
                                    <span class="br-1">Vì</span>
                                    <span class="br-2">Gia đình</span>
                                    <span class="br-3 absolute">.com.vn</span>
                                </strong>
                            </a>
                            <div href="{{ home_url('/') }}" class="logo slg-actd absolute" style="bottom: -4px">
                                <span class="slogan-actd">quảng bá nông sản, văn hóa, du lịch...</span>
                            </div>
                        </div>                  
                    </div>
                    <p class="mt-5 sm:w-[80%]">soctrangtourism.vn là website cung cấp thông tin về du lịch Sóc Trăng, nơi giới thiệu các điểm tham quan, văn hóa, ẩm thực và trải nghiệm đặc sắc của vùng đất này. Ngoài ra còn các kiến thức liên quan đến ngành du lịch.</p>
                </div>

                {!! sage_footer_column('footer_column_1') !!}

                <div class="col-span-12 sm:col-span-3 footer-contact">
                    <h3 class="block mb-4">Liên hệ</h3>
                    <p>
                        <strong>Địa chỉ:</strong> Khu tập thể Hậu Cần, xã Phúc Thịnh, TP. Hà Nội
                    </p>
                    <p>
                        <strong>Hotline</strong> 098 110 7395
                    </p>
                    <p>
                        <strong>Email:</strong>
                        <a href="mailto:dohakien395@gmail.com">dohakien395@gmail.com</a>
                    </p>
                    <p>
                        <strong>Giờ Làm Việc:</strong>: Thứ 2 – Chủ Nhật (08:00 – 17:00)
                    </p>
                </div>
            </div>
        </div>        
    </div>
    <div class="footer-copyright">
        <div class="container mx-auto">
            <div class="text-center my-4">
                <small class="font-medium text-zinc-600"> ©
                    <script>document.write(new Date().getFullYear()) </script> Vì Gia đình <span>giữ bản quyền nội dung trên website này.</span>
                  </small>
            </div>
        </div>
    </div>
</footer>