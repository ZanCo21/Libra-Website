@extends('layouts.partials.home.main.main')
@section('content')
    <style>
        .txt-center {
            text-align: center;
        }

        .hide {
            display: none;
        }

        .clear {
            float: none;
            clear: both;
        }

        .rating {
            width: auto;
            unicode-bidi: bidi-override;
            direction: rtl;
            float: left;
            text-align: center;
            position: relative;
        }

        .rating>label {
            float: right;
            display: inline;
            padding: 0;
            margin: 0;
            position: relative;
            width: 1.1em;
            cursor: pointer;
            color: #000;
        }

        .rating>label:hover,
        .rating>label:hover~label,
        .rating>input.radio-btn:checked~label {
            color: transparent;
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before,
        .rating>input.radio-btn:checked~label:before,
        .rating>input.radio-btn:checked~label:before {
            content: "\2605";
            position: absolute;
            left: 0;
            color: #FFD700;
        }

        .ratingDua {
            width: auto;
            unicode-bidi: bidi-override;
            direction: rtl;
            float: left;
            text-align: center;
            position: relative;
        }

        .ratingDua>label {
            float: right;
            display: inline;
            padding: 0;
            margin: 0;
            position: relative;
            width: 1.1em;
            cursor: pointer;
            color: #000;
        }

        .ratingDua #star5Dua:checked~label,
        .ratingDua #star4Dua:checked~label,
        .ratingDua #star3Dua:checked~label,
        .ratingDua #star2Dua:checked~label,
        .ratingDua #star1Dua:checked~label,
        .ratingDua>label:hover,
        .ratingDua>label:hover~label,
        .ratingDua>input.radio-btn:checked~label {
            color: transparent;
        }

        .ratingDua>label:hover:before,
        .ratingDua>label:hover~label:before,
        .ratingDua>input.radio-btn:checked~label:before {
            content: "\2605";
            position: absolute;
            left: 0;
            color: #FFD700;
        }
    </style>
    <main>
        <!-- /templates/product.liquid -->
        <div id="shopify-section-product-template" class="shopify-section">
            <div class="space_top_50 engoj-bundle-product" style="background:#f9f9f9">
                <div class="container space_bot_20">
                    <!-- /snippets/breadcrumb.liquid -->
                    <ul class="breadcrumb" style="font-weight:500;">
                        <li class="">
                            <a href="../index.htm" title="Back to the frontpage">Home</a>
                        </li>
                        <li class="active"><a>{{ $book->judul }}</a></li>
                    </ul>
                </div>
                <div class="container ">
                    <div class="single-product-detail product-bundle product-aff">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="flex product-img-slide">
                                    <div class="product-images">
                                        <div class="main-img js-product-slider" style="width: 80%;   object-fit: fill; ">
                                            <img src="{{ asset('storage/') . '/' . $book->front_book_cover }}"
                                                alt="Earphone Case"
                                                class="engoj_img_main img-responsive-detail full-width lazyload">

                                            <img src="{{ asset('storage/') . '/' . $book->back_book_cover }}"
                                                alt="Earphone Case"
                                                class="engoj_img_main img-responsive-detail full-width lazyload">
                                        </div>
                                    </div>
                                    <div class="multiple-img-list-ver2 js-click-product">
                                        <div class="product-col">
                                            <div class="engoj_img_variant img">
                                                <img src="{{ asset('storage/') . '/' . $book->front_book_cover }}"
                                                    alt="Earphone Case" class="img-reponsive-product v">
                                            </div>
                                        </div>

                                        <div class="product-col">
                                            <div class="engoj_img_variant img">
                                                <img src="{{ asset('storage/') . '/' . $book->back_book_cover }}"
                                                    alt="Earphone Case" class="img-reponsive-product lazyload">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="single-flex">
                                    <div class="single-product-info product-info product-grid-v2 s-50">
                                        <h2 class="product-title"><a>{{ $book->judul }}</a></h2>
                                        <div class="flex">
                                            <div class="column-60">
                                                <span class=""><span class="money"></span></span>
                                            </div>
                                            <div class="product-rating column-40">
                                                <span class="spr-badge" id="spr_badge_2426722123881" data-rating="4.0">
                                                    <span class="spr-starrating spr-badge-starrating flex items-center">
                                                        <div class="ratingDua">
                                                            @for ($i = 5; $i >= 1; $i--)
                                                                <input id="star{{$i}}KeseluruhanDetail" name="starKeseluruhanDetail" type="radio" value="{{$i}}"
                                                                    class="radio-btn hide" {{ floor($averageRating) == $i ? 'checked' : '' }} />
                                                                <label for="star{{$i}}KeseluruhanDetail" style="pointer-events: none;">☆</label>
                                                            @endfor
                                                        </div>
                                                        <span class="ms-1">{{ $averageRating }}</span>
                                                    </span>
                                                    <span class="spr-badge-caption">{{ $countReview }} reviews</span>
                                                </span>
                                            </div>
                                        </div>

                                        <p class="mb-2">Deskripsi :</p>
                                        <div class="product-description">
                                            <span>{!! html_entity_decode($book->deskripsi) !!}</span>
                                        </div>
                                        <br>
                                        <div class="single-product-button-group">
                                            <form action="/cart/add" method="post" enctype="multipart/form-data"
                                                class="product-form product-form-product-template product-form--hide-variant-labels"
                                                data-section="product-template">
                                                <select name="id" id="productSelect"
                                                    class="engoj-except-select2 product-single__variants">
                                                    <option selected="selected" data-sku="" value="21703421853801">
                                                        Default Title - <span class="">Deskripsi</span></option>
                                                </select>
                                                <div class="e-btn cart-qtt">
                                                    <button type="submit" id="AddToCart"
                                                        class="btn-add-cart product-form__cart-submit--small me-4 rounded-lg">
                                                        Book Now
                                                    </button>
                                                    <button type="submit" data-BookId="{{ $book->id }}"
                                                        class="AddToWish btn-add-cart product-form__cart-submit--small rounded-lg">
                                                        Add To Wishlist
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="product-sku fz-12" style="font-weight:600;">
                                            <label>SKU :</label>
                                            <span> </span>
                                        </div>
                                        <div class="product-tags fz-12" style="font-weight:600;">
                                            <label>Categories :</label>
                                            @foreach ($categoryBook as $item)
                                            <a href="#">{{ $item->namaKategori }},</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="single-product-tab ver3 margin_bottom_50">
                        <div class="cmt-title text-center abs">
                            <ul class="nav nav-tabs v3 text-center ">
                                <li class="active"><a class=" " data-toggle="tab" href="#desc">Description</a>
                                </li>
                                <li><a class=" " data-toggle="tab" href="#review">Review</a></li>
                            </ul>
                        </div>
                        <div class="tab-content ">
                            <div id="desc" class="tab-pane fade in active">
                                <span>{!! html_entity_decode($book->deskripsi) !!}</span>
                            </div>
                            <div id="review" class="tab-pane fade  ">
                                <div class="entry-inside v3">
                                    <div class="spr-container">
                                        <div class="spr-header">
                                            <h2 class="spr-header-title">Customer Reviews</h2>
                                            <div class="spr-summary rte flex items-center text-center">
                                                <span class="spr-starrating spr-summary-starrating"
                                                    aria-label="5.0 of 5 stars" role="img">
                                                    <div class="ratingDua">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <input id="star{{$i}}Keseluruhan" name="starKeseluruhan" type="radio" value="{{$i}}"
                                                                class="radio-btn hide" {{ floor($averageRating) == $i ? 'checked' : '' }} />
                                                            <label for="star{{$i}}Keseluruhan" style="pointer-events: none;">☆</label>
                                                        @endfor
                                                        <div class="clear"></div>
                                                    </div>
                                                </span>
                                                <span class="ms-2 me-4">
                                                    <strong>{{ $averageRating }}</strong>
                                                </span>
                                                <span class="spr-summary-caption"><span
                                                        class="spr-summary-actions-togglereviews">
                                                        Based on {{ $countReview }} reviews</span>
                                                </span>
                                                <span class="spr-summary-actions ml-auto">
                                                    <button
                                                        class="btn-writeReview hover:text-green-600 spr-summary-actions-newreview">Write
                                                        a review</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="spr-content">
                                            {{-- ini form review --}}
                                            <div id="formReview" class="spr-form hidden" style="">
                                                <form method="post" class="new-review-form">
                                                    {{-- <input type="hidden" name="review[rating]"><input type="hidden"
                                                        name="rating"> --}}
                                                    <h3 class="spr-form-title mb-6">Write a review</h3>
                                                    <fieldset class="spr-form-review mb-6">
                                                        <div>
                                                            <label class="spr-form-label"
                                                                for="review[rating]">Rating</label>
                                                        </div>
                                                        <div class="ratingDua mb-2">
                                                            <input id="star5" name="star" type="radio"
                                                                value="5" class="radio-btn hide" />
                                                            <label for="star5">☆</label>
                                                            <input id="star4" name="star" type="radio"
                                                                value="4" class="radio-btn hide" />
                                                            <label for="star4">☆</label>
                                                            <input id="star3" name="star" type="radio"
                                                                value="3" class="radio-btn hide" />
                                                            <label for="star3">☆</label>
                                                            <input id="star2" name="star" type="radio"
                                                                value="2" class="radio-btn hide" />
                                                            <label for="star2">☆</label>
                                                            <input id="star1" name="star" type="radio"
                                                                value="1" class="radio-btn hide" />
                                                            <label for="star1">☆</label>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="spr-form-contact">
                                                        <div class="spr-form-review-body">
                                                            <label class="spr-form-label" for="review_body_2426722123881">
                                                                Body of Review
                                                                <span role="status" aria-live="polite"
                                                                    aria-atomic="true">
                                                                    <span
                                                                        class="spr-form-review-body-charactersremaining">(1500)</span>
                                                                    <span class="visuallyhidden">characters
                                                                        remaining</span>
                                                                </span>
                                                            </label>
                                                            <div class="spr-form-input">
                                                                <textarea class="spr-form-input spr-form-input-textarea" name="ulasan" rows="10"
                                                                    placeholder="Write your comments here"></textarea>
                                                                <script>
                                                                    function sprUpdateCount(e) {
                                                                        var $el = SPR.$(e.currentTarget);
                                                                        SPR.$(".spr-form-review-body-charactersremaining").html('(' + (1500 - $el.val().length) + ')');
                                                                    }
                                                                    SPR.$("textarea[data-product-id=2426722123881]").keyup(sprUpdateCount).trigger("keyup");
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="spr-form-actions">
                                                        <input type="submit" data-BookId="{{ $book->id }}"
                                                            class="btn-submitReview spr-button spr-button-primary button button-primary btn btn-primary"
                                                            value="Submit Review">
                                                    </fieldset>
                                                </form>
                                            </div>
                                            {{-- ini content review nya --}}
                                            @foreach ($review as $item)
                                                <div class="spr-review" id="spr-review-206325459">
                                                    <div class="ratingDua">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <input id="star{{ $i }}Dua_{{ $item->id }}"
                                                                name="star{{ $item->id }}" type="radio"
                                                                value="{{ $i }}" class="radio-btn hide"
                                                                {{ $item->rating == $i ? 'checked' : '' }} />
                                                            <label for="star{{ $i }}Dua_{{ $item->id }}"
                                                                style="pointer-events: none;">☆</label>
                                                        @endfor
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="spr-review-header">
                                                        <br>
                                                        <span class="spr-review-header-byline"><strong>{{ $item->user->userName }}</strong>
                                                            on
                                                            <strong class="formatDate">{{ $item->created_at }}</strong></span>
                                                    </div>
                                                    <div class="spr-review-content">
                                                        <p class="spr-review-content-body">{{ $item->ulasan }}</p>
                                                    </div>
                                                    <div class="spr-review-footer rte">
                                                        <a href="#" class="spr-review-reportreview"
                                                            onclick="SPR.reportReview(206325459);return false"
                                                            id="report_206325459"
                                                            data-msg="This review has been reported">Report as
                                                            Inappropriate</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BOX TITLE -->


            <div class="bestseller container">
                <div class="ecome-heading style5v3 spc5v3 text-center center flex-column">
                    <h3>Related Products</h3>
                    <p class="line"></p>
                </div>
                <div class="owl-carousel owl-theme owl-cate v2 js-owl-cate2">
                    @foreach ($relatedBooks as $item)
                        <div class="product margin_bottom_50 engoj_grid_parent relative"
                            style="margin-left: 15px; margin-right: 15px;">
                            <div class="img-product relative">
                                <img src="{{ asset('storage/') . '/' . $item->front_book_cover }}"
                                    class="img-responsive-Related full-width-detail lazyload" alt="Ottoman Chair">
                                <img src="{{ asset('storage/') . '/' . $item->back_book_cover }}"
                                    class="img-responsive-Related absolute img-product-hover full-width-detail lazyload"
                                    alt="Ottoman Chair">
                                <div class="product-icon text-center absolute">
                                    <form method="post" action="/cart/add" enctype="multipart/form-data"
                                        class="inline-block icon-addcart margin_right_10 box-shadow">
                                        <input type="hidden" name="id" value="21747541409897">
                                        <button type="submit" name="add" class="enj-add-to-cart-btn btn-default">
                                            <i class="icon-bag"></i>
                                        </button>
                                    </form>
                                    <a href="#" class="engoj_btn_quickview icon-quickview inline-block box-shadow"
                                        title="quickview" data-id="ottoman-chair-1">
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
                                    <span class="price"><span class="money">{{ $item->judul }}</span></span>
                                </p>
                                <h4 class="des-font capital title-product">
                                    <a href="/collections/all/products/arper-round-table">{{ $item->penulis }}</a>
                                </h4>
                                <div class="product-rating space_top_10">
                                    <span class="shopify-product-reviews-badge" data-id="2430652121193"></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="overlay"></div>

            <script>
                jQuery(document).ready(function($) {
                    $('.btn-writeReview').on('click', function(e) {
                        var formReview = $('div[id="formReview"]');
                        if (formReview.hasClass('hidden')) {
                            formReview.removeClass('hidden');
                        } else {
                            formReview.addClass('hidden');
                        }
                    });

                    $('.btn-submitReview').on('click', function(e) {
                        e.preventDefault();

                        var form = $(this).closest('form');
                        var BookId = $(this).attr('data-BookId');
                        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                        var rating = $('input[name="star"]:checked').val();


                        $.ajax({
                            url: "{{ url('/home/storeUlasan') }}",
                            method: 'POST',
                            data: {
                                _token: token,
                                buku_id: BookId,
                                rating: rating,
                                ulasan: form.find('textarea[name="ulasan"]').val()
                            },
                            beforeSend: function() {
                                $.LoadingOverlay("show");
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Ulasan berhasil ditambahkan.',
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

                });
                document.addEventListener('DOMContentLoaded', function() {
                    var dateCells = document.querySelectorAll('.formatDate');
                    dateCells.forEach(function(cell) {
                        var originalDate = cell.textContent.trim();
                        var formattedDate = new Date(originalDate).toLocaleDateString('en-US', {
                            day: 'numeric',
                            month: 'short',
                            year: 'numeric'
                        });
                        cell.textContent = formattedDate;
                    });
                });

                function formatDateString(dateString) {
                    var dateObj = new Date(dateString);
                    return dateObj.toLocaleDateString('en-US', {
                        day: 'numeric',
                        month: 'short',
                        year: 'numeric'
                    });
                }
            </script>
            <script>
                jQuery(document).ready(function($) {
                    $('.js-product-360-2426722123881').ThreeSixty({
                        totalFrames: 4, // Total no. of image you have for 360 slider
                        endFrame: 4, // end frame for the auto spin animation
                        currentFrame: 1, // This the start frame for auto spin
                        imgList: '.threesixty_images', // selector for image list
                        progress: '.spinner', // selector to show the loading progress
                        imgArray: ["\n\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/6-shop.png?v=1552895782",
                            "\n\n\n\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/1-shop-b.png?v=1552895782",
                            "\n\n\n\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/10-shop.png?v=1552895782",
                            "\n\n\n\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/11-shop.png?v=1552895782",
                            "\n\n\n"
                        ], // path of the image assets
                        filePrefix: '', // file prefix if any
                        ext: '.jpg', // extention for the assets
                        // responsive: true,
                        navigation: true

                    });
                });
            </script>
            <script
                src="{{ asset('assets/home/cdn/shopifycloud/shopify/assets/themes_support/option_selection-86cdd286ddf3be7e25d68b9fc5965d7798a3ff6228ff79af67b3f4e41d6a34be.js') }}"
                type="text/javascript"></script>

            <script>
                var selectCallback = function(variant, selector) {
                    // BEGIN SWATCHES
                    if (variant) {
                        var form = jQuery('#' + selector.domIdPrefix).closest('form');
                        for (var i = 0, length = variant.options.length; i < length; i++) {
                            var radioButton = form.find('.swatch[data-option-index="' + i + '"] :radio[value="' + variant
                                .options[i] + '"]');
                            if (radioButton.size()) {
                                radioButton.get(0).checked = true;
                            }
                        }
                    }
                    // END SWATCHES


                    if (variant) {
                        $('.engoj-variant-sku').text(variant.sku);
                    } else {
                        $('.engoj-variant-sku').empty();
                    }


                    var quantity = 1,
                        totalPrice;
                    if (variant) {
                        if (variant.available) {
                            // Selected a valid variant that is available.
                            $('#AddToCart').removeClass('disabled').removeAttr('disabled').val('Add To Cart').fadeTo(200, 1);
                            $('#AddToCart span').html('Add To Cart');
                        } else {
                            // Variant is sold out.
                            $('#AddToCart').val('Sold Out').addClass('disabled').attr('disabled', 'disabled').fadeTo(200, 0.5);
                            $('#AddToCart span').html('Sold Out');
                        }
                        quantity = parseInt($('#Quantity').val(), 10);
                        totalPrice = variant.price * quantity;

                        if (variant.compare_at_price > variant.price) {
                            $('.enj-product-price').html('</span><span class="price engoj_price_main f-24">' + Shopify
                                .formatMoney(variant.price, window.money_format) + '</span>' + '<span class="price old">' +
                                Shopify.formatMoney(variant.compare_at_price, window.money_format));
                        } else {
                            $('.enj-product-price').html('<span class="price engoj_price_main">' + Shopify.formatMoney(variant
                                .price, window.money_format) + '</span>');
                        }


                    } else {
                        // variant doesn't exist.
                        $('#AddToCart').val('Unavailable').addClass('disabled').attr('disabled', 'disabled').fadeTo(200, 0.5);
                    }

                    /*begin variant image*/
                    if (variant && variant.featured_image) {
                        var originalImage = jQuery(".slick-active .engoj_img_main");
                        var newImage = variant.featured_image;
                        var element = originalImage[0];
                        Shopify.Image.switchImage(newImage, element, function(newImageSizedSrc, newImage, element) {
                            var $el = $(element);
                            $el.attr('src', newImageSizedSrc);
                            $(".engoj_img_variant:eq(0)").trigger('click');
                        });
                    }
                    /*end of variant image*/
                }

                jQuery(function($) {
                    new Shopify.OptionSelectors('productSelect', {
                        product: {
                            "id": 2426722123881,
                            "title": "Earphone Case",
                            "handle": "earphone-case",
                            "description": "\u003cspan\u003eKyuzo is a capsule collection of desk and home accessories, driven by materiality and designed to provide divisions of space through subtle hierarchies.\u003c\/span\u003e",
                            "published_at": "2019-03-08T20:51:13-05:00",
                            "created_at": "2019-03-08T20:52:01-05:00",
                            "vendor": "Minim",
                            "type": "",
                            "tags": ["#14c2dc", "#92e5c3", "#b4b4b4", "#dc9814", "#e34848", "$0-$50", "blue", "M",
                                "red", "XL"
                            ],
                            "price": 2900,
                            "price_min": 2900,
                            "price_max": 2900,
                            "available": true,
                            "price_varies": false,
                            "compare_at_price": null,
                            "compare_at_price_min": 0,
                            "compare_at_price_max": 0,
                            "compare_at_price_varies": false,
                            "variants": [{
                                "id": 21703421853801,
                                "title": "Default Title",
                                "option1": "Default Title",
                                "option2": null,
                                "option3": null,
                                "sku": "",
                                "requires_shipping": true,
                                "taxable": true,
                                "featured_image": null,
                                "available": true,
                                "name": "Earphone Case",
                                "public_title": null,
                                "options": ["Default Title"],
                                "price": 2900,
                                "weight": 0,
                                "compare_at_price": null,
                                "inventory_management": null,
                                "barcode": "",
                                "requires_selling_plan": false,
                                "selling_plan_allocations": [],
                                "quantity_rule": {
                                    "min": 1,
                                    "max": null,
                                    "increment": 1
                                }
                            }],
                            "images": ["\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/6-shop.png?v=1552895782",
                                "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/1-shop-b.png?v=1552895782",
                                "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/10-shop.png?v=1552895782",
                                "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/11-shop.png?v=1552895782"
                            ],
                            "featured_image": "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/6-shop.png?v=1552895782",
                            "options": ["Title"],
                            "media": [{
                                "alt": null,
                                "id": 1408699891817,
                                "position": 1,
                                "preview_image": {
                                    "aspect_ratio": 1.0,
                                    "height": 600,
                                    "width": 600,
                                    "src": "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/6-shop.png?v=1552895782"
                                },
                                "aspect_ratio": 1.0,
                                "height": 600,
                                "media_type": "image",
                                "src": "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/6-shop.png?v=1552895782",
                                "width": 600
                            }, {
                                "alt": null,
                                "id": 1408699727977,
                                "position": 2,
                                "preview_image": {
                                    "aspect_ratio": 1.0,
                                    "height": 600,
                                    "width": 600,
                                    "src": "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/1-shop-b.png?v=1552895782"
                                },
                                "aspect_ratio": 1.0,
                                "height": 600,
                                "media_type": "image",
                                "src": "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/1-shop-b.png?v=1552895782",
                                "width": 600
                            }, {
                                "alt": null,
                                "id": 1408699924585,
                                "position": 3,
                                "preview_image": {
                                    "aspect_ratio": 1.0,
                                    "height": 600,
                                    "width": 600,
                                    "src": "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/10-shop.png?v=1552895782"
                                },
                                "aspect_ratio": 1.0,
                                "height": 600,
                                "media_type": "image",
                                "src": "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/10-shop.png?v=1552895782",
                                "width": 600
                            }, {
                                "alt": null,
                                "id": 1408700088425,
                                "position": 4,
                                "preview_image": {
                                    "aspect_ratio": 1.0,
                                    "height": 600,
                                    "width": 600,
                                    "src": "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/11-shop.png?v=1552895782"
                                },
                                "aspect_ratio": 1.0,
                                "height": 600,
                                "media_type": "image",
                                "src": "\/\/minim-demo.myshopify.com\/cdn\/shop\/products\/11-shop.png?v=1552895782",
                                "width": 600
                            }],
                            "requires_selling_plan": false,
                            "selling_plan_groups": [],
                            "content": "\u003cspan\u003eKyuzo is a capsule collection of desk and home accessories, driven by materiality and designed to provide divisions of space through subtle hierarchies.\u003c\/span\u003e"
                        },
                        onVariantSelected: selectCallback,
                        enableHistoryState: true
                    });

                    // Add label if only one product option and it isn't 'Title'. Could be 'Size'.


                    // Hide selectors if we only have 1 variant and its title contains 'Default'.

                    $('.selector-wrapper').hide();

                });
            </script>



            <script>
                $(window).load(function() {
                    $('.shopify-payment-button__button').addClass('btn-disabled');
                });
                $('#product-cart__agree-product-template').change(function() {

                    if ($(this).is(":checked")) {
                        $('.shopify-payment-button button').removeClass("btn-disabled");
                    } else {
                        $('.shopify-payment-button button').addClass("btn-disabled");
                    }
                });
            </script>

        </div>

    </main>
@endsection
