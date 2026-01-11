<section class="x-hero-section-wrapper mt-3">
    <div class="x-hero-container">
        <!-- Khối Banner Top: Slider + Banner Phụ -->
        <div class="x-hero-top-layout">
            <!-- Slider chính -->
            <div class="x-hero-main-carousel">
                <!-- Slider main container -->
                <div class="swiper x-hero-swiper-init">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img src="{{ asset('images/banner_1.png') }}" alt="Banner 1">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/banner_2.png') }}" alt="Banner 2">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/banner_3.png') }}" alt="Banner 3">

                        </div>
                    </div>

                    <!-- Các nút điều hướng -->
                    <div class="swiper-pagination x-hero-dots"></div>
                    <div class="swiper-button-prev x-hero-prev"></div>
                    <div class="swiper-button-next x-hero-next"></div>
                </div>
            </div>

            <!-- Banner phải cố định -->
            <div class="x-hero-static-aside">
                <a href="{{ url('phone/iphone-17-pro-max') }}">
                    <img src="{{ asset('images/banner_right.png') }}" alt="Banner Right">
                </a>
            </div>
        </div>

        <section class="dx-hot-section">
            <div class="dx-container">
                <div class="dx-hot-grid">
                    <!-- Sản phẩm 1 -->
                    <div class="dx-hot-card">
                        <div class="dx-card-badge">HOT</div>
                        <div class="dx-card-inner">
                            <div class="dx-card-thumb">
                                <a href="{{ url('/phone/samsung-galaxy-s24-ultra') }}">
                                    <img src="{{ asset('images/s24_ultra.png') }}" alt="S24 Ultra">
                                </a>
                            </div>
                            <div class="dx-card-desc">
                                <a href="{{ url('/phone/samsung-galaxy-s24-ultra') }}" class="dx-item-title">
                                    Galaxy <span>S24 Ultra</span>
                                </a>
                                <p class="dx-item-price">930.000 <span>won</span></p>
                                <a href="{{ url('/phone/samsung-galaxy-s24-ultra') }}" class="dx-btn-view">
                                    Chi tiết <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sản phẩm 2 -->
                    <div class="dx-hot-card">
                        <div class="dx-card-badge">HOT</div>
                        <div class="dx-card-inner">
                            <div class="dx-card-thumb">
                                <a href="{{ url('/phone/iphone-17-pro-max') }}">
                                    <img src="{{ asset('images/iphone_17.png') }}" alt="Iphone 17">
                                </a>
                            </div>
                            <div class="dx-card-desc">
                                <a href="{{ url('/phone/iphone-17-pro-max') }}" class="dx-item-title">
                                    iPhone <span>17 Pro Max</span>
                                </a>
                                <p class="dx-item-price">930.000 <span>won</span></p>
                                <a href="{{ url('/phone/iphone-17-pro-max') }}" class="dx-btn-view">
                                    Chi tiết <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sản phẩm 3 -->
                    <div class="dx-hot-card">
                        <div class="dx-card-badge">HOT</div>
                        <div class="dx-card-inner">
                            <div class="dx-card-thumb">
                                <a href="{{ url('/phone/samsung-galaxy-z-flip-7') }}">
                                    <img src="{{ asset('images/galaxyflip7.png') }}" alt="Z Flip 7">
                                </a>
                            </div>
                            <div class="dx-card-desc">
                                <a href="{{ url('/phone/samsung-galaxy-z-flip-7') }}" class="dx-item-title">
                                    Galaxy <span>Z Flip 7</span>
                                </a>
                                <p class="dx-item-price">930.000 <span>won</span></p>
                                <a href="{{ url('/phone/samsung-galaxy-z-flip-7') }}" class="dx-btn-view">
                                    Chi tiết <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@include('client.desktop.home.banner-lib')
