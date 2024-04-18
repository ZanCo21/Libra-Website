<div id="shopify-section-header" class="shopify-section index-section"><!-- /sections/header.liquid -->
    <header id="header" class="header-v4 space_top_bot_20 delay05  ">
        <div class="container space_top_bot_30">
            <div class="row flex">
                <div class="hidden-lg hidden-md col-sm-4 col-xs-4">
                    <a href="#"
                        class="link-menu delay03 inline-block hidden-md hidden-lg space_top_30 btn-push-menu icon-pushmenu">
                        <svg width="26" height="16" version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewbox="0 0 66 41"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve">
                            <g>
                                <line class="st0" x1="1.5" y1="1.5" x2="64.5" y2="1.5">
                                </line>
                                <line class="st0" x1="1.5" y1="20.5" x2="64.5" y2="20.5">
                                </line>
                                <line class="st0" x1="1.5" y1="39.5" x2="64.5" y2="39.5">
                                </line>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="col-lg-5 col-md-5 hidden-sm hidden-xs flex">
                    <ul class="nav navbar-nav menu-main">
                        <li class="relative dropdown">
                            <a href="{{ route('home') }}" title="Home" class="delay03 ">Home</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 logo_header text-center">
                        <img alt=" Minim - Minimal &amp; Clean Furniture Store Shopify Theme"
                            src="{{ asset('assets/home/cdn/shop/t/9/assets/logo.png?v=76281246793426370331552127529')}}"
                            width="118px;" class="img-logo">
                </div>
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-4 text-right icon-main">
                    <a href="#" class="delay03 inline-block" id="btn-search">
                        <img src="{{ asset('assets/home/cdn/shop/t/9/assets/iconsearch.png?v=143931648200267966671552623708')}}"
                            class="img-responsive">
                    </a>
                    <a href="#login_form" class="delay03 inline-block hidden-sm hidden-xs" id="btn-login">
                        <img src="{{ asset('assets/home/cdn/shop/t/9/assets/iconlogin.png?v=17151735571898987051552623697')}}"
                            class="img-responsive">
                    </a>
                    <a href="#" class="delay03 relative inline-block text-center icon-cart" id="btn-cart">
                        <img src="{{ asset('assets/home/cdn/shop/t/9/assets/iconcar.png?v=19912236354837126781552623685')}}"
                            class="img-responsive">
                        <figure class="absolute label-cart enj-cartcount">{{ $countwishlist }}</figure>
                    </a>
                </div>
            </div>
        </div>
    </header>
</div>

{{-- wishlist --}}
{{-- modal cart --}}
<div class="pushmenu pushmenu-left cart-box-container">
    <div class="cart-list enj-minicart-ajax">
        <div class="cart-list-heading">
            <span class="close-menu-mobile js-close"></span>
            <h3 class="cart-title">your wishlist</h3>
            <span class="minicart-number-items enj-cartcount">{{ $countwishlist }}</span>
        </div>
        @if ($countwishlist !== 0)
            <div class="cart-inside">
                <ul class="list">
                    @foreach ($wishlist as $item)
                    <li class="item-cart">
                        <div class="product-img-wrap">
                            <a href="" title="Product"><img
                                    src="{{ asset('storage/') . '/' . $item->buku->front_book_cover }}"
                                    alt="Wallnut Wall Clock - Black" class="img-responsive"></a>
                        </div>
                        <div class="product-details">
                            <div class="inner-left">
                                <div class="product-name"><a
                                        href="/products/wallnut-wall-clock?variant=21703505608809">{{ $item->buku->judul }}</a></div>
                                <div class="product-qtt">
                                    QTY : 1
                                </div>
                            </div>
                        </div>
                        <a href="#" data-bookId="{{ $item->buku->id }}" class="deleteWishList btn-del"><i class="ti-close"></i></a>
                    </li>
                    @endforeach
                </ul>
                <div class="cart-bottom">
                    <div class="cart-price">
                        <span>Total</span>
                        <span class="price-total"><span id="revy-cart-subtotal-price"><span class="money"
                                    data-currency-usd="$226.00">{{ $countwishlist }}</span></span></span>
                    </div>
                    <div class="cart-button">
                        <a class="ciloe-btn checkout" href="{{ route('cart') }}" title="">View cart</a>
                    </div>
                </div>
            </div>
        @else
        <div class="empty-cart">
            <p class="fz-18">No products in the wishlist.</p>
            <div class="flex center">
                <a href="{{ route('home') }}" class="capital">start explore</a>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.deleteWishList').on('click', function(e) {
            var BookId = $(this).attr('data-BookId');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log(BookId); 
            $.ajax({
                url: "{{ url('/home/deleteWishList') }}",
                method: 'POST',
                data: {
                    _token: token,
                    buku_id: BookId,
                },
                beforeSend: function() {
                    $.LoadingOverlay("show");
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Buku berhasil dihapus dari WishList.',
                        confirmButtonText: 'OK',
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat memuat data.',
                        error,
                        confirmButtonText: 'OK'
                    });
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                },
            });
        });

        $('.AddToWish').on('click', function(e) {
            var BookId = $(this).attr('data-BookId');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log(BookId); 
            $.ajax({
                url: "{{ url('/home/storeWishList') }}",
                method: 'POST',
                data: {
                    _token: token,
                    buku_id: BookId,
                },
                beforeSend: function() {
                    $.LoadingOverlay("show");
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Buku berhasil ditambahkan kedalam WishList.',
                        confirmButtonText: 'OK',
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    if (error) {
                        var errorObj = JSON.parse(xhr.responseText);
                        var errorMessage = errorObj.error;
                    }else{
                        var errorMessage = 'Terjadi kesalahan saat memuat data.';
                    }
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: errorMessage,
                        error,
                        confirmButtonText: 'OK'
                    });
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                },
            });
        });
    });
</script>
