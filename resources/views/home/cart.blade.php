@extends('layouts.partials.home.main.main')
@section('content')
    <div id="shopify-section-cart-template" class="shopify-section">
        <div class="page-width" data-section-id="cart-template" data-section-type="cart-template">
            <!--main content-->
            <div class="container-fluid  relative banner_page margin_bottom_20 ">
                <div class="row">
                    <a href="/collections/all" class="effect_img2">
                    </a>
                </div>
                <div class="">
                    <h1 class="margin_bottom_20  text-center ">Cart</h1>
                    <div class="  text-center ">
                        <!-- /snippets/breadcrumb.liquid -->
                        <ul class="breadcrumb" style="font-weight:500;">
                            <li class="">
                                <a href="/" title="Back to the frontpage">Home</a>
                            </li>
                            <li class="trail-item trail-end">Your Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container container-240">
                <div class="checkout">
                    <form action="{{ route('storePeminjaman') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <div class="shopping-cart bd-7">
                                    <div class="cmt-title text-center abs">
                                        <h3 class="page-title v2">Cart</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table cart-table">
                                            <tbody>
                                                @foreach ($wishlist as $item)
                                                    <tr class="item_cart">
                                                        <input type="hidden" name="buku_id[]" value="{{ $item->buku->id }}">
                                                        <td class="product-name flex align-center" data-title="Product">
                                                            <a href="/cart/change?line=1&amp;quantity=0"
                                                                class="d-none d-md-block btn-del"><i
                                                                    class="ion-ios-close-empty" onclick="deleteItem(event, {{ $item->buku->id }})"></i></a>
                                                            <div class="product-img">
                                                                <img src="{{ asset('storage/') . '/' . $item->buku->front_book_cover }}"
                                                                    alt="Wallnut Wall Clock - Black" class="lazyload">
                                                            </div>
                                                            <div class="product-info">
                                                                <p style="display: block;font-weight: 300;font-size: 14px;letter-spacing: 1px;margin-bottom: 5px;">{{ $item->buku->judul }}</p>
                                                            </div>
                                                            <a href="/cart/change?line=1&amp;quantity=0"
                                                                class="d-block d-md-none btn-del"><i
                                                                    class="ion-ios-close-empty"></i></a>
                                                        </td>
                                                        <td class="total-price" data-title="Price">
                                                            <p class="price"><span class="money"
                                                                    data-currency-usd="$79.00"></span></p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-cart-bottom">
                                        <a href="{{ route('home') }}" class="btn btn-update">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="cart-total bd-7">
                                    <div class="cmt-title text-center abs">
                                        <h3 class="page-title v3">Data</h3>
                                    </div>
                                    <div class="w-full px-3">
                                        <div class="mb-5">
                                            <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Tanggal Peminjaman
                                            </label>
                                            <input type="date" name="tanggal_peminjaman" id="date" class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>
                                    </div>
                                    <div class="w-full px-3">
                                        <div class="mb-5">
                                            <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Tanggal Pengembalian
                                            </label>
                                            <input type="date" name="tanggal_pengembalian" id="date" class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>
                                    </div>
                                    <div class="cart-total-bottom">
                                        <button type="submit" class="btn-back btn-checkout">Proceed to checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End container -->
                    </form>
                </div>
                <!-- End cat-box-container -->
            </div>
            <!-- end main content-->
        </div>
    </div>

    <script>
        function deleteItem(event, bookId) {
            event.preventDefault(); // Untuk mencegah perilaku default dari anchor tag

            // Hapus elemen DOM dari tabel (jika Anda ingin menghapus tampilan saja)
            const row = event.target.closest('.item_cart');
            row.remove();

            // Sekarang Anda dapat melakukan apa pun dengan bookId, seperti memperbarui UI atau variabel JavaScript
            console.log('Book ID yang dihapus:', bookId);
        }
    </script>
@endsection
