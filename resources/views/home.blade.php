@extends('layouts.partials.home.main.main')
@section('content')
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -webkit-line-clamp: 3; /* Jumlah baris yang ingin dibatasi */
        }
    </style>
    <div class="pushmenu menu-home5 box-mobile-menu">
        <div class="menu-push box-mobile-menu-inner">
            <a href="#" class="close-menu-mobile"><span class="">Close</span></a>
            <div class="tab-content">
                <div id="home" class="mn-mobile-content-tab tab-pane fade in active">
                    <div class="mobile-back-nav-wrap">
                        <a href="#" id="back-menu" class="back-menu">
                            <i class="pe-7s-angle-left"></i>
                        </a>
                        <span class="box-title">Home</span>
                    </div>
                    <ul class="nav-home5 js-menubar">
                        <li class="level1 active dropdown">
                            <a href="../index.htm">Home</a>
                            <span class="icon-sub-menu"></span>
                            <ul class="menu-level1 style1 js-open-menu delay05">
                                <li class="level2">
                                    <div class="demo-img">
                                        <a href="../index.htm?preview_theme_id=46655701097">
                                            <img src="assets/home/cdn/shop/files/home1.jpg?v=1614311256" alt=""
                                                class="img-responsive">
                                        </a>
                                        <h3 class="demo-text"><a href="../index.htm?preview_theme_id=46655701097">Home
                                                Page 1</a></h3>
                                    </div>
                                </li>
                                <li class="level2">
                                    <div class="demo-img">
                                        <a href="../index.htm?preview_theme_id=47529328745">
                                            <img src="assets/home/cdn/shop/files/home2.jpg?v=1614311256" alt=""
                                                class="img-responsive">
                                        </a>
                                        <h3 class="demo-text"><a href="../index.htm?preview_theme_id=47529328745">Home
                                                Page 2</a></h3>
                                    </div>
                                </li>
                                <li class="level2">
                                    <div class="demo-img">
                                        <a href="../index.htm?preview_theme_id=47528804457">
                                            <img src="assets/home/cdn/shop/files/home3.jpg?v=1614311256" alt=""
                                                class="img-responsive">
                                        </a>
                                        <h3 class="demo-text"><a href="../index.htm?preview_theme_id=47528804457">Home
                                                Page 3</a></h3>
                                    </div>
                                </li>
                                <li class="level2">
                                    <div class="demo-img">
                                        <a href="../index.htm?preview_theme_id=47527395433">
                                            <img src="assets/home/cdn/shop/files/home4.jpg?v=1614311256" alt=""
                                                class="img-responsive">
                                        </a>
                                        <h3 class="demo-text"><a href="../index.htm?preview_theme_id=47527395433">Home
                                                Page 4</a></h3>
                                    </div>
                                </li>
                                <li class="level2">
                                    <div class="demo-img">
                                        <a href="../index.htm?preview_theme_id=47526772841">
                                            <img src="assets/home/cdn/shop/files/home5.jpg?v=1614311256" alt=""
                                                class="img-responsive">
                                        </a>
                                        <h3 class="demo-text"><a href="../index.htm?preview_theme_id=47526772841">Home
                                                Page 5</a></h3>
                                    </div>
                                </li>
                                <li class="level2">
                                    <div class="demo-img">
                                        <a href="../index.htm?preview_theme_id=47525396585">
                                            <img src="assets/home/cdn/shop/files/home6.jpg?v=1614311256" alt=""
                                                class="img-responsive">
                                        </a>
                                        <h3 class="demo-text"><a href="../index.htm?preview_theme_id=47525396585">Home
                                                Page 6</a></h3>
                                    </div>
                                </li>
                                <li class="level2">
                                    <div class="demo-img">
                                        <a href="../index.htm?preview_theme_id=47478800489">
                                            <img src="assets/home/cdn/shop/files/home7.jpg?v=1614311256" alt=""
                                                class="img-responsive">
                                        </a>
                                        <h3 class="demo-text"><a href="../index.htm?preview_theme_id=47478800489">Home
                                                Page 7</a></h3>
                                    </div>
                                </li>
                                <li class="level2">
                                    <div class="demo-img">
                                        <a href="../index.htm?preview_theme_id=47478997097">
                                            <img src="assets/home/cdn/shop/files/home8.jpg?v=1614311256" alt=""
                                                class="img-responsive">
                                        </a>
                                        <h3 class="demo-text"><a href="../index.htm?preview_theme_id=47478997097">Home
                                                Page 8</a></h3>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="level1 active dropdown"><a href="all.html">Library</a>
                            <span class="icon-sub-menu"></span>
                            <div class="menu-level1 js-open-menu delay05">
                                <ul class="level1">
                                    <li class="level2">
                                        <a href="#">SHOP STYLE </a>
                                        <ul class="menu-level-2">
                                            <li class="level3"><a href="all-1.html?fts=0&preview_theme_id=47528804457"
                                                    title="">Full Screen</a></li>
                                            <li class="level3"><a href="all-1.html?fts=0&preview_theme_id=46655701097"
                                                    title="">Full Width</a></li>
                                            <li class="level3"><a href="all-1.html?fts=0&preview_theme_id=47526772841"
                                                    title="">Lagre (3 Cols)</a></li>
                                            <li class="level3"><a href="all-1.html?fts=0&preview_theme_id=47525396585"
                                                    title="">Medium (4 Cols)</a></li>
                                            <li class="level3"><a href="all-1.html?fts=0&preview_theme_id=47478800489"
                                                    title="">Small (5 Cols)</a></li>
                                            <li class="level3"><a href="all-1.html?fts=0&preview_theme_id=47478997097"
                                                    title="">Extra Small (6 Cols)</a></li>
                                            <li class="level3"><a href="all-1.html?fts=0&preview_theme_id=47529328745"
                                                    title="">Sidebar Left</a></li>
                                            <li class="level3"><a href="all-1.html?fts=0&preview_theme_id=47527395433"
                                                    title="">Sidebar Right</a></li>
                                        </ul>
                                    </li>
                                    <li class="level2">
                                        <a href="#">PRODUCT DETAILS </a>
                                        <ul class="menu-level-2">
                                            <li class="level3"><a href="/products/arper-round-table" title="">Buy
                                                    Together</a></li>
                                            <li class="level3"><a href="/products/takata-lemnos-clock" title="">Buy
                                                    On Amazon</a></li>
                                            <li class="level3"><a href="/products/wallnut-desk" title="">Sticky Add
                                                    To Cart</a></li>
                                            <li class="level3"><a
                                                    href="../products/wallnut-wall-clock.html?fts=0&preview_theme_id=47529328745"
                                                    title="">Terms & Agreements</a></li>
                                            <li class="level3"><a
                                                    href="../products/ottoman-chair-1.html?fts=0&preview_theme_id=47528804457"
                                                    title="">360 Degree</a></li>
                                            <li class="level3"><a
                                                    href="../products/kime-tea-caddy.html?preview_theme_id=47526772841"
                                                    title="">Out Of Stock</a></li>
                                            <li class="level3"><a href="../products/earphone-case.html"
                                                    title="">Featured Video</a></li>
                                            <li class="level3"><a
                                                    href="../products/yamanami-chair-1.html?preview_theme_id=47478997097"
                                                    title="">Select Variant</a></li>
                                        </ul>
                                    </li>
                                    <li class="level2">
                                        <a href="#">OTHER PAGES </a>
                                        <ul class="menu-level-2">
                                            <li class="level3"><a href="../index.htm" title="">Our Stores</a></li>
                                            <li class="level3"><a href="../index.htm" title="">Cart</a></li>
                                            <li class="level3"><a href="../index.htm" title="">My Account</a></li>
                                            <li class="level3"><a href="../index.htm" title="">Wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li class="level2">
                                        <a href="#"> </a>
                                        <ul class="menu-level-2">
                                        </ul>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="level1">
                            <a href="../index.htm">Page</a>
                            <span class="icon-sub-menu"></span>
                            <ul class="menu-level1 js-open-menu delay05">
                                <li class="level2"><a href="../pages/about.html?preview_theme_id=46655701097"
                                        title="About Us v1">About Us v1</a></li>
                                <li class="level2"><a href="../pages/about.html?preview_theme_id=47529328745"
                                        title="About Us v2">About Us v2</a></li>
                                <li class="level2"><a href="../pages/coming-soon.html" title="Coming Soon">Coming
                                        Soon</a></li>
                                <li class="level2"><a href="/not_found" title="404">404</a></li>
                            </ul>
                        </li>
                        <li class="level1">
                            <a href="../index.htm">Blog</a>
                            <span class="icon-sub-menu"></span>
                            <ul class="menu-level1 js-open-menu delay05">
                                <li class="level2"><a href="../blogs/news.html" title="Blog">Blog</a></li>
                                <li class="level2"><a href="../blogs/news/house-in-hamilton.html"
                                        title="Blog Single Post">Blog Single Post</a></li>
                            </ul>
                        </li>
                        <li class="level1">
                            <a href="../pages/contact.html">Contact</a>
                            <span class="icon-sub-menu"></span>
                            <ul class="menu-level1 js-open-menu delay05">
                                <li class="level2"><a href="../pages/contact.html?preview_theme_id=46655701097"
                                        title="Contact v1">Contact v1</a></li>
                                <li class="level2"><a href="../pages/contact.html?preview_theme_id=47529328745"
                                        title="Contact v2">Contact v2</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="menu1" class="mn-mobile-content-tab tab-pane fade hidden-lg">
                    <div class="my-account-wrap">
                        <div class="login-form">
                            <h3 class="text-center">LOGIN</h3>
                            <form method="post" action="/account/login" id="customer_login" accept-charset="UTF-8"
                                data-login-with-shop-sign-in="true"><input type="hidden" name="form_type"
                                    value="customer_login"><input type="hidden" name="utf8" value="✓">
                                <form method="post" class="form-customer form-login">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-account" placeholder="Username*"
                                            name="customer[email]">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-account" placeholder="Password*"
                                            name="customer[password]">
                                    </div>
                                    <div class="btn-button-group mg-top-30 mg-bottom-15">
                                        <button type="submit" class="ciloe-btn btn-login hover-white">LOGIN</button>
                                    </div>
                                </form>
                            </form>
                        </div>
                    </div>
                    <div class="spec"><span>Or</span></div>
                    <a href="{{ route('register') }}" class="register-link">Back to register</a>
                </div>
            </div>
            <div class="box-tabs-nav-wrap">
                <ul class="tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#home">
                            <div class="ciloe-icon-menu">
                                <span class="ciloe-iconbar"></span>
                            </div>
                            <span class="nav-text">Menu</span>
                        </a>
                    </li>
                    <li><a data-toggle="tab" href="#menu1"><i class="zoa-icon-user"></i><span
                                class="nav-text">Login</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form-search delay03 text-center">
        <i class="ti-close" id="close-search"></i>
        <!--   <h3 class="text-center title-font">what are<br>your looking for ?</h3> -->
        <form method="get" action="/search" role="search" class="searchform">
            <input type="text" class="form-control control-search des-font text-center" id="engo_autocomplate"
                value="" autocomplete="off" placeholder="Start typing ..." aria-label="SEARCH" name="q">
            <!--     <button class="button_search title-font" type="submit">search</button> -->
        </form>
        <div id="productSearchResults" style="display: none;">
            <ul class="search-results"></ul>
        </div>
    </div>
    <main>
        <!-- /templates/collection.liquid -->
        <div id="shopify-section-ciloe-collection-template" class="shopify-section"><!-- collection-template.liquid -->
            <div class="shop_page">
                <div class="container-fluid  relative banner_page margin_bottom_20  hidden-xs ">
                    <div class="row">
                        <a href="" class="effect_img2">
                            <img src="assets/home/cdn/shop/files/banner_hero.png" class="img-responsive">
                        </a>
                    </div>
                    <div class="absolute text_banner">

                        <h1 class="margin_bottom_20  text-center ">
                            @if (Auth::user())
                                Hello, {{ Auth::user()->userName }}
                            @else
                                Library
                            @endif
                        </h1>
                        <div class="  text-center ">
                            <!-- /snippets/breadcrumb.liquid -->
                            <ul class="breadcrumb" style="font-weight:500;">
                                <li class="">
                                    <a href="../index.htm" title="Back to the frontpage">Home</a>
                                </li>
                                <li class="trail-item trail-end">Products</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="banner_collection hidden-lg hidden-md hidden-sm container_15 border-top">
                    <h1 class="title_shop">Shop
                        <span class="right">
                            <i class=" btn_list_layout"></i>
                            <!--        -->
                            <i class=" btn_grid_layout"></i>
                            <!--        -->
                        </span>
                    </h1>
                    <!--    -->
                    <div
                        class="gr_btn_mb border-right border-left border-top border-bot inline-block full-width space_top_bot_20 margin_bottom_20">
                        <div class="column-50 btn_function border-right left text-center">
                            <div class="wrap-filter-sorting">
                                <div class="dropdown">
                                    <button class="dropdown-toggle btn_sorting btn_sorting_mb" data-click-state="0">
                                        Sort
                                        <span class="dropdown-label">Featured</span>
                                    </button>
                                    <ul class="dropdown_menu_sorting">
                                        <li><a href="manual">Featured</a></li>
                                        <li><a href="best-selling">Best Selling</a></li>
                                        <li><a href="title-ascending">Alphabetically, A-Z</a></li>
                                        <li><a href="title-descending">Alphabetically, A-Z</a></li>
                                        <li><a href="price-descending">Price, high to low</a></li>
                                        <li><a href="price-ascending">Price, low to high</a></li>
                                        <li><a href="created-ascending">Date, old to new</a></li>
                                        <li><a href="created-descending">Date, new to old</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="column-50 left text-center btn_filter_mb">
                            <a href="#" class="btn_filter">FILTER</a>
                        </div>
                    </div>
                </div>
                {{-- card peminjaman --}}
                @if ($reserveBook)
                <div class="container-fluid container_100 btn_layout_shop hidden-xs mt-4">
                    <div class="row">
                        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product_shop product-collection-grid product_full">
                            <h4 class="text-3xl mb-4">The Reserved Book</h4>
                            <div class="row">
                                @foreach ($reserveBook as $item)
                                <div class="mt-2 col-lg-2 col-md-3 col-sm-6 col-xs-6 layout_product_shop delay05 layout_pd_6c column-50">
                                    <div class="me-2 relative flex w-full flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                                        <div class="relative m-0 w-1/6 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
                                            <img src="{{ asset('storage/') . '/' . $item->buku->front_book_cover }}" alt="image" class="h-full w-full object-cover lazyload" />
                                        </div>
                                        <div class="p-6">
                                            <h6
                                                class="mb-4 block font-sans text-base font-semibold uppercase leading-relaxed tracking-normal text-pink-500 antialiased">
                                                {{ucwords($item->status_peminjaman)}}
                                            </h6>
                                            <h4
                                                class="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                                {{ $item->buku->judul }}
                                            </h4>
                                            <p class="mb-8 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased line-clamp-3">
                                                {{ $item->buku->deskripsi }}
                                            </p>
                                            @if (!Auth::user())
                                                <a href="#login_form" class="inline-block" data-iteration="{{ $loop->iteration }}">">
                                            @else
                                                <a class="inline-block" href="{{ url('home/detail/peminjaman') . '/' . $item->id }}">
                                            @endif
                                                <button
                                                    class="flex select-none items-center gap-2 rounded-lg py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-pink-500 transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                    type="button">
                                                    Learn More
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"></path>
                                                    </svg>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                {{-- card peminjaman end --}}
                <div class="space_top_50">
                    <div class="container-fluid container_100 btn_layout_shop margin_bottom_30 hidden-xs">
                        <div class="row">
                            <div class="space_bot_20 flex margin_left_right ">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 btn_function available-filter">

                                    <h4 class="">{{ $countBooks }} products <span>available</span></h4>
                                </div>
                                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs btn_function left ">
                                    <div class="wrap-filter-sorting">
                                        <div class="dropdown">
                                            {{-- <button class="dropdown-toggle text-left" data-toggle="dropdown"
                                                aria-expanded="false">
                                                Sort
                                                <span class="dropdown-label">Featured</span>
                                            </button> --}}
                                            <ul class="dropdown-menu">
                                                <li><a href="manual">Featured</a></li>
                                                <li><a href="best-selling">Best Selling</a></li>
                                                <li><a href="title-ascending">Alphabetically, A-Z</a></li>
                                                <li><a href="title-descending">Alphabetically, Z-A</a></li>
                                                <li><a href="price-descending">Price, high to low</a></li>
                                                <li><a href="price-ascending">Price, low to high</a></li>
                                                <li><a href="created-ascending">Date, old to new</a></li>
                                                <li><a href="created-descending">Date, new to old</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--      -->
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 btn_function text-center ">
                                </div>
                                <!--      -->
                                <!--      -->
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs btn_function gr_btn_product_size">
                                    <p>See: </p>
                                    <button class="products-size size_3 delay03">3</button>
                                    <button class="products-size size_4 delay03 active">4</button>
                                    <button class="products-size size_5 delay03">5</button>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4 btn_function text-center filter-button ">
                                    <h4 class="btn_filter_full" data-click-state="0">Filters</h4>
                                </div>
                            </div>
                            <div class="filter_full col-md-12 over-hidden delay05 engoj-collection-sidebar">
                                <div class="content_filter_full row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 space_bot_20">
                                        <div class="filter margin_bottom_30 space_bot_30 ">
                                            <div class="flex margin_bottom_20">
                                                <h4 class=" widget_title ">Categories</h4>
                                            </div>
                                            <ul class="filter-brand" style="max-height: 200px;overflow: auto;">
                                                <li>
                                                    <a href="{{ route('home') }}">All </a>
                                                </li>
                                                @foreach ($getCategory as $item)
                                                    <li>
                                                        <a href="{{ route('home', ['category' => $item->id]) }}">{{ $item->namaKategori }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- product content --}}
                    <div class="container-fluid container_100 content_shop ">
                        <div class="row">
                            <div
                                class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product_shop product-collection-grid product_full">
                                <div class="row">
                                    @foreach ($books as $item)
                                        <div
                                            class="col-lg-2 col-md-3 col-sm-6 col-xs-6 layout_product_shop delay05 layout_pd_6c column-4">
                                            <div class="product margin_bottom_50 engoj_grid_parent relative">
                                                <div class="img-product relative">
                                                    @if (!Auth::user())
                                                        <a href="#login_form" class="engoj_find_img" data-iteration="{{ $loop->iteration }}">
                                                        @else
                                                        <a href="{{ url('home/detail') . '/' . $item->id }}" class="engoj_find_img">
                                                    @endif
                                                    <img src="{{ asset('storage/') . '/' . $item->front_book_cover }}"
                                                        class="img-responsive-product full-width lazyload"
                                                        alt="Arper Round table">
                                                    <img src="{{ asset('storage/') . '/' . $item->back_book_cover }}"
                                                        class="img-responsive-product absolute img-product-hover full-width lazyload"
                                                        alt="Arper Round table">
                                                    </a>
                                                    <div class="product-icon text-center absolute">
                                                        <form method="post" action="/cart/add"
                                                            enctype="multipart/form-data"
                                                            class="inline-block icon-addcart margin_right_10 box-shadow">
                                                            <input type="hidden" name="id" value="21680969842793">
                                                            <button type="submit" name="add"
                                                                class="enj-add-to-cart-btn btn-default">
                                                                <i class="icon-bag"></i>
                                                            </button>
                                                        </form>
                                                        <a href="#"
                                                            class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                                            title="quickview" data-id="arper-round-table">
                                                            <i class="icon-magnifier"></i>
                                                        </a>
                                                        <button type="submit" data-BookId="{{ $item->id }}"
                                                            class="AddToWish icon-heart inline-block text-center">
                                                            <i class=""></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="info-product text-center">
                                                    <p class="price-product space_top_20">
                                                        <span class="price"><span
                                                                class="money">{{ $item->judul }}</span></span>
                                                    </p>
                                                    <h4 class="des-font capital title-product">
                                                        <a
                                                            href="/collections/all/products/arper-round-table">{{ $item->penulis }}</a>
                                                    </h4>
                                                    <div class="content_list hidden">
                                                        <div class="stock">
                                                            <a href="/collections/all/products/arper-round-table"
                                                                class="capital">in stock</a>
                                                        </div>
                                                        <div class="des_product">Kyuzo is a capsule collection of desk and
                                                            home accessories, driven by materiality and designed to provide
                                                            divisions of space...</div>
                                                        <div class="product-icon flex">
                                                            <a href="../account/login.html"
                                                                class="icon-heart inline-block maxus-product__wishlist wish text-center"
                                                                data-toggle="tooltip" data-placement="top"
                                                                data-original-title="Add to Wishlist">
                                                                <i class=""></i>
                                                            </a>
                                                            <form method="post" action="/cart/add"
                                                                enctype="multipart/form-data"
                                                                class="inline-block icon-addcart margin_right_10 box-shadow text-center">
                                                                <input type="hidden" name="id"
                                                                    value="21680969842793">
                                                                <button type="submit" name="add"
                                                                    class="enj-add-to-cart-btn btn-default">
                                                                    <i class="icon-bag"></i>
                                                                </button>
                                                            </form>
                                                            <a href="#"
                                                                class="engoj_btn_quickview icon-quickview inline-block box-shadow text-center"
                                                                title="quickview" data-id="arper-round-table">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-rating space_top_10">
                                                        <span class="shopify-product-reviews-badge"
                                                            data-id="2423347839081"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="text-center col-md-12 col-xs-12 content_pagination">
                                        <ul class="pagination text-center">
                                            @if ($books->previousPageUrl())
                                                <li><a href="{{ $books->previousPageUrl() }}"><i
                                                            class="ion-ios-arrow-back"></i></a></li>
                                            @endif

                                            @if ($books->nextPageUrl())
                                                <li><a href="{{ $books->nextPageUrl() }}"><i
                                                            class="ion-ios-arrow-forward"></i></a></li>
                                            @endif

                                            @for ($i = 1; $i <= $books->lastPage(); $i++)
                                                <li class="active">
                                                    <a class="{{ $i == $books->currentPage() ? 'active' : '' }} "
                                                        href="{{ $books->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                @media (min-width:992px) {
                    .layout_pd_list_shop:nth-child(2n+1) {
                        clear: left;
                    }

                    .layout_pd_list_shop:nth-child(6n+1) {
                        clear: none;
                    }

                    .layout_pd_6c.column-3:nth-child(6n+1) {
                        clear: none !important;
                    }

                    .layout_pd_6c.column-3:nth-child(5n+1) {
                        clear: none !important;
                    }

                    .layout_pd_6c.column-3:nth-child(3n+1) {
                        clear: left !important;
                    }

                    .layout_pd_6c.column-4:nth-child(6n+1) {
                        clear: none !important;
                    }

                    .layout_pd_6c.column-4:nth-child(5n+1) {
                        clear: none !important;
                    }

                    .layout_pd_6c.column-4:nth-child(4n+1) {
                        clear: left !important;
                    }

                    .layout_pd_6c.column-20:nth-child(6n+1) {
                        clear: none !important;
                    }

                    .layout_pd_6c.column-20:nth-child(5n+1) {
                        clear: left !important;
                    }

                    .layout_pd_6c.column-6 {
                        width: 16.6666667%;
                    }

                    .layout_pd_6c.column-6:nth-child(5n+1) {
                        clear: none !important;
                    }

                    .layout_pd_6c.column-6:nth-child(6n+1) {
                        clear: left !important;
                    }

                    .layout_pd_6c.column-3 {
                        width: 33.33333%;
                    }

                    .layout_pd_6c.column-4 {
                        width: 25%;
                    }

                    .layout_pd_6c.column-6 {
                        width: 16.6666667%;
                    }

                    .layout_pd_6c.column-50 {
                        width: 50%;
                    }

                    .layout_pd_6c.column-50:nth-child(5n+1) {
                        clear: none !important;
                    }

                    .layout_pd_6c.column-50:nth-child(2n+1) {
                        clear: left !important;
                    }
                }
            </style>
            <div class="sidebar sidebar_mb hidden-lg hidden-md hidden-sm engoj-collection-sidebar">
                <div class="margin_bottom_30">
                    <a href="#" class="close_sidebar_mb lt-2 fz-12"><i class="ti-close"></i>CLOSE</a>
                </div>
                <div class="filter margin_bottom_30 space_bot_30 ">
                    <div class="flex margin_bottom_20">
                        <h4 class=" widget_title ">Categories</h4>
                    </div>
                    <ul class="filter-brand" style="max-height: 200px;overflow: auto;">
                        <li>
                            <a href="frontpage.html" title="All">All </a>
                        </li>
                        <li>
                            <a href="decoration.html" title="Decor">Decor </a>
                        </li>
                        <li>
                            <a href="editorial.html" title="Funiter">Funiter </a>
                        </li>
                        <li>
                            <a href="trending.html" title="Interior">Interior </a>
                        </li>
                        <li>
                            <a href="life-style.html" title="Life Style">Life Style </a>
                        </li>
                    </ul>
                </div>
                <div class="filter margin_bottom_30 space_bot_30 border-bot filter-tag">
                    <div class="flex margin_bottom_20">
                        <h4 class="fz-12 widget_title lt-2">SORT BY</h4>
                    </div>
                    <ul class="filter-brand engoj-sortby">
                        <li><a href="javascript:void(0)" data-jsortby="manual">Featured</a></li>
                        <li><a href="javascript:void(0)" data-jsortby="best-selling">Best Selling</a></li>
                        <li><a href="javascript:void(0)" data-jsortby="title-ascending">Alphabetically, A-Z</a></li>
                        <li><a href="javascript:void(0)" data-jsortby="title-descending">Alphabetically, Z-A</a></li>
                        <li><a href="javascript:void(0)" data-jsortby="price-descending">Price, high to low</a></li>
                        <li><a href="javascript:void(0)" data-jsortby="price-ascending">Price, low to high</a></li>
                        <li><a href="javascript:void(0)" data-jsortby="created-ascending">Date, old to new</a></li>
                        <li><a href="javascript:void(0)" data-jsortby="created-descending">Date, new to old</a></li>
                    </ul>
                </div>
                <script>
                    Shopify.queryParams = {};
                    if (location.search.length) {
                        for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
                            aKeyValue = aCouples[i].split('=');
                            if (aKeyValue.length > 1) {
                                Shopify.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
                            }
                        }
                    }
                    $(function() {
                        $('.engoj-sortby a')
                            .bind('click', function() {
                                Shopify.queryParams.sort_by = jQuery(this).data('jsortby');
                                location.search = jQuery.param(Shopify.queryParams);
                            });
                    });
                </script>
                <div class="filter margin_bottom_30 space_bot_30 border-bot filter-tag">
                    <div class="flex margin_bottom_20">
                        <h4 class="fz-12 widget_title lt-2">COLOR</h4>
                    </div>
                    <ul>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="dc9814">
                            <a href="javascript:void(0)" title="#dc9814">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:#dc9814;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="92e5c3">
                            <a href="javascript:void(0)" title="#92e5c3">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:#92e5c3;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="14c2dc">
                            <a href="javascript:void(0)" title="#14c2dc">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:#14c2dc;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="e34848">
                            <a href="javascript:void(0)" title="#e34848">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:#e34848;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="b4b4b4">
                            <a href="javascript:void(0)" title="#b4b4b4">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:#b4b4b4;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="ffffff">
                            <a href="javascript:void(0)" title="#ffffff">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:#ffffff;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="3763e2">
                            <a href="javascript:void(0)" title="#3763e2">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:#3763e2;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="da14dc">
                            <a href="javascript:void(0)" title="#da14dc">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:#da14dc;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="80d46f">
                            <a href="javascript:void(0)" title="#80d46f">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:#80d46f;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="black">
                            <a href="javascript:void(0)" title="Black">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:Black;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="red">
                            <a href="javascript:void(0)" title="Red">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:Red;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="green">
                            <a href="javascript:void(0)" title="Green">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:Green;"></span>
                                </span>
                            </a>
                        <li class="cat-item inline-block">
                            <input class="hidden" type="checkbox" value="blue">
                            <a href="javascript:void(0)" title="Blue">
                                <span class="link_color">
                                    <span class="ciloe_filter_color" style="background:Blue;"></span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="filter space_bot_30  filter-tag">
                    <div class="flex margin_bottom_20">
                        <h4 class="fz-12 widget_title ">BY SIZE</h4>
                    </div>
                    <ul>
                        <li class="inline-block cat-item">
                            <input class="hidden" type="checkbox" value="xs">
                            <a href="javascript:void(0)" title="XS" class="filter_size">XS</a>
                        <li class="inline-block cat-item">
                            <input class="hidden" type="checkbox" value="s">
                            <a href="javascript:void(0)" title="S" class="filter_size">S</a>
                        <li class="inline-block cat-item">
                            <input class="hidden" type="checkbox" value="m">
                            <a href="javascript:void(0)" title="M" class="filter_size">M</a>
                        <li class="inline-block cat-item">
                            <input class="hidden" type="checkbox" value="l">
                            <a href="javascript:void(0)" title="L" class="filter_size">L</a>
                        <li class="inline-block cat-item">
                            <input class="hidden" type="checkbox" value="xl">
                            <a href="javascript:void(0)" title="XL" class="filter_size">XL</a>
                        </li>
                    </ul>
                </div>
                <div class="filter  space_bot_30  filter-tag">
                    <div class="flex margin_bottom_20">
                        <h4 class="fz-12 widget_title ">BY PRICE</h4>
                    </div>
                    <ul class="filter-brand">
                        <li class="cat-item">
                            <input class="hidden" type="checkbox" value="0-50">
                            <a href="javascript:void(0)" title="$0-$50">$0-$50</a>
                        <li class="cat-item">
                            <input class="hidden" type="checkbox" value="50-100">
                            <a href="javascript:void(0)" title="$50-$100">$50-$100</a>
                        <li class="cat-item">
                            <input class="hidden" type="checkbox" value="100-200">
                            <a href="javascript:void(0)" title="$100-$200">$100-$200</a>
                        <li class="cat-item">
                            <input class="hidden" type="checkbox" value="200-400">
                            <a href="javascript:void(0)" title="$200-$400">$200-$400</a>
                        <li class="cat-item">
                            <input class="hidden" type="checkbox" value="400-more-than">
                            <a href="javascript:void(0)" title="$400 more than">$400 more than</a>
                        </li>
                    </ul>
                </div>
                <div class="filter margin_bottom_30 space_bot_30 filter-tag">
                    <div class="flex margin_bottom_20">
                        <h4 class="fz-12 widget_title lt-2"></h4>
                    </div>
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <div class="fixed scroll-top">
        <a href="#" class="backtotop">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </a>
    </div>
    <div class="overlay"></div>
@endsection
