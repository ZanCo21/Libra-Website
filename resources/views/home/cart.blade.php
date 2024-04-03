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
                            <li class="trail-item trail-end">Your Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container container-240">
                <div class="checkout">
                    <form action="/cart" method="post" novalidate="">
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <div class="shopping-cart bd-7">
                                    <div class="cmt-title text-center abs">
                                        <h3 class="page-title v2">Cart</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table cart-table">
                                            <tbody>
                                                <tr class="item_cart">
                                                    <td class="product-name flex align-center" data-title="Product">
                                                        <a href="/cart/change?line=1&amp;quantity=0"
                                                            class="d-none d-md-block btn-del"><i
                                                                class="ion-ios-close-empty"></i></a>
                                                        <div class="product-img">
                                                            <img src="//minim-demo.myshopify.com/cdn/shop/products/1-shop-b_1_5b0b535f-425c-4530-a980-a7e07826554c_79x79.png?v=1552896989"
                                                                alt="Wallnut Wall Clock - Black">
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="/products/wallnut-wall-clock?variant=21703505608809">Wallnut
                                                                Wall Clock</a>

                                                            <small
                                                                style="display: block;font-weight: 300;font-size: 12px;letter-spacing: 1px;margin-bottom: 5px;">Black</small>
                                                        </div>
                                                        <a href="/cart/change?line=1&amp;quantity=0"
                                                            class="d-block d-md-none btn-del"><i
                                                                class="ion-ios-close-empty"></i></a>
                                                    </td>
                                                    <td class="bcart-quantity single-product-detail" data-title="Quantity">
                                                        <div class="single-product-info">
                                                            <div class="e-quantity js-qty">
                                                                <input type="text" class="qty input-text js-qty__num"
                                                                    value="1" min="1" data-id=""
                                                                    aria-label="quantity" pattern="[0-9]*" name="updates[]"
                                                                    id="">
                                                                <button type="button"
                                                                    class="quantity-right-plus btn btn-number js-qty__adjust js-qty__adjust--plus icon-fallback-text"
                                                                    data-id="" data-qty="11">
                                                                    <i class="fa fa-caret-up"></i>
                                                                </button>
                                                                <button type="button"
                                                                    class="quantity-left-minus btn btn-number js-qty__adjust js-qty__adjust--minus icon-fallback-text"
                                                                    data-id="" data-qty="0">
                                                                    <i class="fa fa-caret-down"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="total-price" data-title="Price">
                                                        <p class="price"><span class="money"
                                                                data-currency-usd="$79.00">$79.00</span></p>
                                                    </td>
                                                </tr>
                                                <tr class="item_cart">
                                                    <td class="product-name flex align-center" data-title="Product">
                                                        <a href="/cart/change?line=2&amp;quantity=0"
                                                            class="d-none d-md-block btn-del"><i
                                                                class="ion-ios-close-empty"></i></a>
                                                        <div class="product-img">
                                                            <img src="//minim-demo.myshopify.com/cdn/shop/products/12-shop_79x79.png?v=1552896812"
                                                                alt="Takata lemnos clock">
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="/products/takata-lemnos-clock?variant=21556535623785">Takata
                                                                lemnos clock</a>
                                                        </div>
                                                        <a href="/cart/change?line=2&amp;quantity=0"
                                                            class="d-block d-md-none btn-del"><i
                                                                class="ion-ios-close-empty"></i></a>
                                                    </td>
                                                    <td class="bcart-quantity single-product-detail" data-title="Quantity">
                                                        <div class="single-product-info">
                                                            <div class="e-quantity js-qty">
                                                                <input type="text" class="qty input-text js-qty__num"
                                                                    value="3" min="1" data-id=""
                                                                    aria-label="quantity" pattern="[0-9]*" name="updates[]"
                                                                    id="">
                                                                <button type="button"
                                                                    class="quantity-right-plus btn btn-number js-qty__adjust js-qty__adjust--plus icon-fallback-text"
                                                                    data-id="" data-qty="31">
                                                                    <i class="fa fa-caret-up"></i>
                                                                </button>
                                                                <button type="button"
                                                                    class="quantity-left-minus btn btn-number js-qty__adjust js-qty__adjust--minus icon-fallback-text"
                                                                    data-id="" data-qty="2">
                                                                    <i class="fa fa-caret-down"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="total-price" data-title="Price">
                                                        <p class="price"><span class="money"
                                                                data-currency-usd="$147.00">$147.00</span></p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-cart-bottom">
                                        <a href="/collections/all" class="btn btn-update ">Continue Shopping</a>
                                        <input type="submit" name="update" class="btn btn-update" value="Update Cart">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="cart-total bd-7">
                                    <div class="cmt-title text-center abs">
                                        <h3 class="page-title v3">Cart totals</h3>
                                    </div>
                                    <div class="cart-total-bottom pp-checkout align-center v-center">
                                        <h3 class="cate-title">Cart Note</h3>
                                        <div class="contact-form coupon">

                                            <div class=" medium-up--one-half ">
                                                <label for="CartSpecialInstructions"
                                                    class="cart-note cart-note_text_label small--text-center">Special
                                                    instructions for seller</label>
                                                <textarea rows="6" name="note" id="CartSpecialInstructions"
                                                    class="cart-note__input form-control note--input"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="shop_table">
                                            <tbody>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td><span id="bk-cart-subtotal-price"><span
                                                                id="revy-cart-subtotal-price"><span
                                                                    id="revy-cart-subtotal-price"><span class="money"
                                                                        data-currency-usd="$226.00">$226.00</span></span></span></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="cart-total-bottom">
                                        <a href="/checkout" class="btn-back btn-checkout">Proceed to checkout</a>
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

    {{-- side-cart --}}
    <div class="pushmenu pushmenu-left cart-box-container pushmenu-open">
        <div class="cart-list enj-minicart-ajax">
            <div class="cart-list-heading">
                <span class="close-menu-mobile js-close"></span>
                <h3 class="cart-title">your cart</h3>
                <span class="minicart-number-items enj-cartcount">4</span>
            </div>

            <div class="cart-inside">
                <ul class="list">

                    <li class="item-cart">
                        <div class="product-img-wrap">
                            <a href="/products/wallnut-wall-clock?variant=21703505608809" title="Product"><img
                                    src="//minim-demo.myshopify.com/cdn/shop/products/1-shop-b_1_5b0b535f-425c-4530-a980-a7e07826554c_70x70.png?v=1552896989"
                                    alt="Wallnut Wall Clock - Black" class="img-responsive"></a>
                        </div>
                        <div class="product-details">
                            <div class="inner-left">
                                <div class="product-name"><a
                                        href="/products/wallnut-wall-clock?variant=21703505608809">Wallnut Wall Clock -
                                        Black</a></div>
                                <div class="product-price"><span><span class="money"
                                            data-currency-usd="$79.00">$79.00</span></span></div>
                                <div class="product-qtt">
                                    QTY : 1
                                </div>
                            </div>
                        </div>
                        <a href="/cart/change?line=1&amp;quantity=0" class="btn-del"><i class="ti-close"></i></a>
                    </li>

                    <li class="item-cart">
                        <div class="product-img-wrap">
                            <a href="/products/takata-lemnos-clock?variant=21556535623785" title="Product"><img
                                    src="//minim-demo.myshopify.com/cdn/shop/products/12-shop_70x70.png?v=1552896812"
                                    alt="Takata lemnos clock" class="img-responsive"></a>
                        </div>
                        <div class="product-details">
                            <div class="inner-left">
                                <div class="product-name"><a
                                        href="/products/takata-lemnos-clock?variant=21556535623785">Takata lemnos clock</a>
                                </div>
                                <div class="product-price"><span><span class="money"
                                            data-currency-usd="$49.00">$49.00</span></span></div>
                                <div class="product-qtt">
                                    QTY : 3
                                </div>
                            </div>
                        </div>
                        <a href="/cart/change?line=2&amp;quantity=0" class="btn-del"><i class="ti-close"></i></a>
                    </li>

                </ul>
                <div class="cart-bottom">
                    <div class="cart-price">
                        <span>Total</span>
                        <span class="price-total"><span class="money" data-currency-usd="$226.00">$226.00</span></span>
                    </div>
                    <div class="cart-button">
                        <a class="ciloe-btn checkout" href="/cart" title="">View cart</a>
                        <a class="ciloe-btn checkout" href="/checkout" title="">Check out</a>
                    </div>
                </div>
            </div>

            <!-- End cart bottom -->
        </div>
    </div>

@endsection
