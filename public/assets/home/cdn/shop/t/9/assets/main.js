jQuery(document).ready(function ($) {
    "use strict";
    $(".counte").each(function () {
        var $this = $(this),
            countTo = $this.attr("data-count");
        $({ countNum: $this.text() }).animate(
            { countNum: countTo },
            {
                duration: 8e3,
                easing: "linear",
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                },
            }
        );
    }),
        $(".top-product-tab .product-tab-sw li").first().addClass("active"),
        $(".top-product-tab .tab-content .tab-pane")
            .first()
            .addClass("active in"),
        $(".quickview-close").on("click", function () {
            $(".quickview-wrapper").hide(),
                $(".quickview-wrapper").removeClass("open"),
                $(".quick-modal").removeClass("show");
        }),
        $(".js-vertical-menu").on("click", function () {
            $(".vertical-wrapper").slideToggle(200),
                $(this).toggleClass("active");
        }),
        $(".icon-mobile").on("click", function () {
            $(this).toggleClass("active");
        }),
        $(".js-filter-menu li .js-plus-icon").on("click", function () {
            $(this).toggleClass("minus"),
                $(this)
                    .parent()
                    .find(".filter-menu")
                    .slideToggle(function () {
                        $(this)
                            .next()
                            .stop(!0)
                            .toggleClass("open", $(this).is(":visible"));
                    });
        }),
        $(".filter .js-drop").on("click", function () {
            $(this)
                .parent()
                .find(".ion-ios-arrow-down")
                .toggleClass("ion-ios-arrow-up"),
                $(this)
                    .parent()
                    .find("ul")
                    .slideToggle(function () {
                        $(this)
                            .next()
                            .stop(!0)
                            .toggleClass("open", $(this).is(":visible"));
                    }),
                $(this)
                    .parent()
                    .find(".sidebar-product-list")
                    .slideToggle(function () {
                        $(this)
                            .next()
                            .stop(!0)
                            .toggleClass("open", $(this).is(":visible"));
                    });
        }),
        $(".checkout-page .js-drop").on("click", function () {
            $(this).toggleClass("active"),
                $(this)
                    .parent()
                    .find(".filter-content")
                    .slideToggle(function () {
                        $(this)
                            .next()
                            .stop(!0)
                            .toggleClass("open", $(this).is(":visible"));
                    });
        }),
        $(".js-close-tab").on("click", function () {
            $(this).removeClass("open"),
                $(".detail-content").removeClass("active"),
                $(".detail-tab").removeClass("open");
        }),
        $(".js-tabs a").on("click", function () {
            $(".js-close-tab").addClass("open"),
                $(".detail-tab").addClass("open"),
                $(".detail-content").addClass("active");
        }),
        $(".js-tabs > li").hasClass("active") &&
            ($(".js-close-tab").addClass("open"),
            $(".detail-tab").addClass("open"),
            $(".detail-content").addClass("active")),
        $(".js-filter-menu li .js-plus-icon").on("click", function () {
            $(".js-filter-menu > li > a").toggleClass("active"),
                $(this).toggleClass("minus"),
                $(this)
                    .parent()
                    .find(".filter-menu")
                    .slideToggle(function () {
                        $(this)
                            .next()
                            .stop(!0)
                            .toggleClass("open", $(this).is(":visible"));
                    });
        }),
        $(".js-menu").on("click", function () {
            $(this).toggleClass("active"),
                $(".js-open-menu").toggleClass("open");
        });
    var menuLeft = $(".pushmenu-left"),
        menuHome6 = $(".menu-home5"),
        nav_list = $(".icon-cart"),
        nav_click = $(".icon-pushmenu");
    nav_list.on("click", function (event) {
        event.stopPropagation(),
            $(this).toggleClass("active"),
            $(".overlay").addClass("active"),
            $("body").toggleClass("pushmenu-push-toright-cart"),
            menuLeft.toggleClass("pushmenu-open"),
            $(".container").toggleClass("canvas-container");
    }),
        nav_click.on("click", function (event) {
            event.stopPropagation(),
                $(".overlay").addClass("active"),
                $(this).toggleClass("active"),
                $("body").toggleClass("pushmenu-push-toleft"),
                menuHome6.toggleClass("pushmenu-open");
        }),
        $(".overlay").on("click", function () {
            $(this).removeClass("active"),
                $("body")
                    .removeClass("pushmenu-push-toright-cart")
                    .removeClass("pushmenu-push-toleft"),
                menuLeft.removeClass("pushmenu-open"),
                menuHome6.removeClass("pushmenu-open");
        }),
        $(".close-menu-mobile").on("click", function () {
            $(this).removeClass("active"),
                $("body").removeClass("pushmenu-push-toright-cart"),
                menuLeft.removeClass("pushmenu-open");
        }),
        $(".close-menu-mobile").on("click", function () {
            $("body").removeClass("pushmenu-push-toleft"),
                menuHome6.removeClass("pushmenu-open"),
                $(".overlay").removeClass("active");
        }),
        $(".icon-sub-menu").on("click", function (e) {
            var $this = $(this),
                thisMenu = $this.closest(".js-menubar"),
                thisMenuWrap = thisMenu.closest(".box-mobile-menu");
            thisMenu.removeClass("active");
            var text_next = $this.prev().text();
            thisMenuWrap.find(".box-title").html(text_next),
                thisMenu.find("li").removeClass("mobile-active"),
                $this
                    .parent()
                    .addClass("mobile-active")
                    .find(".menu-level1")
                    .addClass("open"),
                $this
                    .parent()
                    .closest(".menu-level1")
                    .css({ position: "static", height: "0" }),
                thisMenuWrap
                    .find(".back-menu, .box-title")
                    .css("display", "block"),
                $this.parent().find(".fami-lazy:not(.already-fix-lazy)")
                    .length &&
                    $this
                        .parent()
                        .find(".fami-lazy:not(.already-fix-lazy)")
                        .lazy({ bind: "event", delay: 0 })
                        .addClass("already-fix-lazy"),
                e.preventDefault();
        }),
        $(document).on("click", ".box-mobile-menu .back-menu", function (e) {
            var $this = $(this),
                thisMenuWrap = $this.closest(".box-mobile-menu"),
                thisMenu = thisMenuWrap.find(".js-menubar");
            thisMenu.find("li.mobile-active").each(function () {
                if (
                    (thisMenu.find("li").removeClass("mobile-active"),
                    $(this).parent().hasClass("js-menubar"))
                )
                    thisMenu.addClass("active"),
                        $(".box-mobile-menu .box-title").html("MAIN MENU"),
                        $(".back-menu").css("display", "none");
                else {
                    thisMenu.removeClass("active"),
                        $(this).parent().parent().addClass("mobile-active"),
                        $(this)
                            .parent()
                            .css({ position: "absolute", height: "auto" });
                    var text_prev = $(this)
                        .parent()
                        .parent()
                        .children("a")
                        .text();
                    $(".box-mobile-menu .box-title").html(text_prev);
                }
                e.preventDefault();
            });
        }),
        $(".js-pd-article").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: !0,
            focusOnSelect: !0,
            responsive: [{ breakpoint: 1200, settings: { slidesToShow: 2 } }],
        }),
        $(".js-click-product").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: ".js-product-slider",
            dots: !1,
            focusOnSelect: !0,
            infinite: !0,
            arrows: !1,
            vertical: !0,
            responsive: [{ breakpoint: 1367, settings: { vertical: !1 } }],
        }),
        $(".js-product-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1,
            asNavFor: ".js-click-product",
        }),
        $(".js-product-slider").on("mousedown mouseup", function () {
            $(".js-oneitem2").slick("slickGoTo", 1);
        }),
        $(".price-slider").length > 0 &&
            $(".price-slider").slider({
                min: 100,
                max: 700,
                step: 10,
                value: [100, 400],
            }),
        $(".view-mode > a").on("click", function () {
            $(this).addClass("active").siblings().removeClass("active"),
                $(this).hasClass("col2") &&
                    ($(".product-grid").addClass("product-grid-v2"),
                    $(".product-grid").removeClass("product-list")),
                $(this).hasClass("col") &&
                    $(".product-grid").removeClass(
                        "product-grid-v2 product-list"
                    ),
                $(this).hasClass("list") &&
                    $(".product-grid").addClass("product-list product-grid-v2");
        }),
        $(".calculate").on("click", function () {
            $(this).next().slideToggle(), $(this).toggleClass("active");
        }),
        $(".js-showlogin").on("click", function () {
            $(".js-openlogin").slideToggle(), $(this).toggleClass("active");
        }),
        $(".js-showcp").on("click", function () {
            $(".js-opencp").slideToggle(), $(this).toggleClass("active");
        }),
        $(".filter-collection-left > a").on("click", function (e) {
            $(".wrappage").addClass("show-filter"), e.stopPropagation();
        }),
        $(document).on("click", function (e) {
            $(e.target).is(".filter-collection-left > a") === !1 &&
                $(".wrappage").removeClass("show-filter");
        }),
        $(".close-sidebar-collection").click(function () {
            $(".wrappage").removeClass("show-filter");
        }),
        $(window).scroll(function () {
            $(this).scrollTop() > 100
                ? $(".scroll-top").addClass("active")
                : $(".scroll-top").removeClass("active");
        }),
        $(window).scroll(function () {
            $(this).scrollTop() > 20
                ? ($(".header-v2 .logo").addClass("logo-hidden"),
                  $(".header-v5 .logo-header5").addClass("logo-hidden"),
                  $(".header-v2").addClass("bg-header-v1 header-sticky-v2"),
                  $(".header-v1").addClass("bg-header-v1"),
                  $(".header-v3")
                      .removeClass("space_top_bot_20")
                      .addClass("bg-header-v1"),
                  $(".header-v4")
                      .removeClass("space_top_bot_20")
                      .addClass("fixed")
                      .addClass("bg-header-v1")
                      .addClass("full-width"),
                  $(".header-v5")
                      .removeClass("space_top_bot_20")
                      .addClass("bg-header-v1"),
                  $(".header-v6")
                      .removeClass("space_top_bot_20")
                      .addClass("fixed")
                      .addClass("bg-header-v1")
                      .addClass("full-width"),
                  $(".header-v7")
                      .removeClass("space_top_bot_0")
                      .addClass("fixed")
                      .addClass("bg-header-v1")
                      .addClass("full-width"),
                  $(".form_search_mobile").addClass("hidden"),
                  $(".promo_info_single_product").addClass("active"))
                : ($(".header-v2 .logo").removeClass("logo-hidden"),
                  $(".header-v5 .logo-header5").removeClass("logo-hidden"),
                  $(".header-v2").removeClass("bg-header-v1 header-sticky-v2"),
                  $(".header-v1").removeClass("bg-header-v1"),
                  $(".header-v3")
                      .addClass("space_top_bot_20")
                      .removeClass("bg-header-v1"),
                  $(".header-v4")
                      .addClass("space_top_bot_20")
                      .removeClass("fixed")
                      .removeClass("bg-header-v1")
                      .removeClass("full-width"),
                  $(".header-v5")
                      .addClass("space_top_bot_20")
                      .removeClass("bg-header-v1"),
                  $(".header-v6")
                      .addClass("space_top_bot_20")
                      .removeClass("fixed")
                      .removeClass("bg-header-v1")
                      .removeClass("full-width"),
                  $(".header-v7")
                      .addClass("space_top_bot_0")
                      .removeClass("fixed")
                      .removeClass("bg-header-v1")
                      .removeClass("full-width"),
                  $(".form_search_mobile").removeClass("hidden"),
                  $(".promo_info_single_product").removeClass("active"));
        }),
        $(".backtotop").on("click", function () {
            return $("html, body").animate({ scrollTop: 0 }, 600), !1;
        }),
        // $(".js-owl-team").owlCarousel({
        //     margin: 30,
        //     autoplay: !1,
        //     autoplayTimeout: 3e3,
        //     loop: !0,
        //     dots: !0,
        //     nav: !0,
        //     navText: [
        //         "<span class='fa fa-angle-left'></span>",
        //         "<span class='fa fa-angle-right'></span>",
        //     ],
        //     responsive: {
        //         0: { items: 1 },
        //         480: { items: 2 },
        //         1024: { items: 3 },
        //         1200: { items: 4, margin: 40 },
        //     },
        // }),
        // $(".js-owl-cate2").owlCarousel({
        //     margin: 30,
        //     autoplay: !1,
        //     autoplayTimeout: 3e3,
        //     loop: !0,
        //     dots: !0,
        //     nav: !1,
        //     responsive: {
        //         0: { items: 1 },
        //         480: { items: 2 },
        //         1024: { items: 3 },
        //         1200: { items: 3 },
        //         1600: { items: 3, margin: 40 },
        //     },
        // }),
        // $(".js-owl-brand").owlCarousel({
        //     margin: 30,
        //     autoplay: !1,
        //     autoplayTimeout: 3e3,
        //     loop: !0,
        //     dots: !1,
        //     nav: !0,
        //     navText: [
        //         "<span class='fa fa-angle-left'></span>",
        //         "<span class='fa fa-angle-right'></span>",
        //     ],
        //     responsive: {
        //         0: { items: 1 },
        //         480: { items: 3 },
        //         1024: { items: 5 },
        //         1200: { items: 7 },
        //     },
        // }),
        // $(".js-owl-brand2").owlCarousel({
        //     margin: 30,
        //     autoplay: !1,
        //     autoplayTimeout: 3e3,
        //     loop: !0,
        //     dots: !1,
        //     nav: !0,
        //     navText: [
        //         "<span class='fa fa-angle-left'></span>",
        //         "<span class='fa fa-angle-right'></span>",
        //     ],
        //     responsive: {
        //         0: { items: 1 },
        //         480: { items: 3 },
        //         1024: { items: 4 },
        //         1200: { items: 6 },
        //     },
        // }),
        // $(".js-owl-brand2 .owl-nav > div").on("click", function () {
        //     $(this).addClass("active").siblings().removeClass("active");
        // }),
        // $(".js-owl-product").owlCarousel({
        //     margin: 30,
        //     autoplay: !0,
        //     autoplayTimeout: 3e3,
        //     loop: !0,
        //     dots: !1,
        //     nav: !0,
        //     navText: [
        //         "<span class='fa fa-angle-left'></span>",
        //         "<span class='fa fa-angle-right'></span>",
        //     ],
        //     responsive: {
        //         0: { items: 1 },
        //         480: { items: 2 },
        //         1024: { items: 2 },
        //         1200: { items: 3 },
        //     },
        // }),
        // $(".js-owl-product2").owlCarousel({
        //     margin: 30,
        //     autoplay: !1,
        //     autoplayTimeout: 3e3,
        //     loop: !0,
        //     dots: !1,
        //     nav: !0,
        //     navText: [
        //         "<span class='fa fa-angle-left'></span>",
        //         "<span class='fa fa-angle-right'></span>",
        //     ],
        //     responsive: {
        //         0: { items: 1 },
        //         480: { items: 2 },
        //         1200: { items: 3 },
        //         1600: { items: 3, margin: 40 },
        //     },
        // }),
        // $(".js-owl-product2 .owl-nav > div").on("click", function () {
        //     $(this).addClass("active").siblings().removeClass("active");
        // }),
        // $(".js-owl-blog").owlCarousel({
        //     margin: 30,
        //     autoplay: !1,
        //     autoplayTimeout: 3e3,
        //     loop: !0,
        //     dots: !0,
        //     nav: !0,
        //     navText: [
        //         "<span class='fa fa-angle-left'></span>",
        //         "<span class='fa fa-angle-right'></span>",
        //     ],
        //     responsive: {
        //         0: { items: 1 },
        //         480: { items: 2 },
        //         1200: { items: 3 },
        //         1600: { items: 3, margin: 40 },
        //     },
        // }),
        // $(".js-owl-blog .owl-nav > div").on("click", function () {
        //     $(this).addClass("active").siblings().removeClass("active");
        // }),
        // $(".js-quickview-slide  .slick-arrow").on("click", function () {
        //     $(this).addClass("active");
        // }),
        // $(".js-owl-post").owlCarousel({
        //     nav: !0,
        //     navText: [
        //         "<span class='fa fa-angle-left'></span>",
        //         "<span class='fa fa-angle-right'></span>",
        //     ],
        //     items: 1,
        //     dots: !1,
        // }),
        // $(".js-owl-quote").owlCarousel({
        //     nav: !1,
        //     items: 1,
        //     dots: !0,
        //     singleItem: !0,
        // }),
        // $(".js-oneitem").owlCarousel({
        //     nav: !1,
        //     items: 1,
        //     dots: !0,
        //     singleItem: !0,
        // }),
        // $(".js-owl-instagram").owlCarousel({
        //     margin: 0,
        //     autoplay: !0,
        //     autoplayTimeout: 3e3,
        //     loop: !0,
        //     nav: !1,
        //     navText: ["", ""],
        //     dots: !1,
        //     responsive: {
        //         0: { items: 1 },
        //         480: { items: 2 },
        //         1e3: { items: 5 },
        //     },
        // }),
        $(".js-multiple-row2").slick({
            dots: !0,
            arrows: !1,
            slidesPerRow: 4,
            rows: 2,
            responsive: [
                { breakpoint: 1025, settings: { slidesPerRow: 3 } },
                { breakpoint: 813, settings: { slidesPerRow: 2 } },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: !0,
                        prevArrow:
                            '<span class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
                        nextArrow:
                            '<span class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
                        infinite: !0,
                        dots: !1,
                        slidesPerRow: 1,
                        rows: 1,
                    },
                },
            ],
        }),
        $(".js-multiple-row").slick({
            dots: !0,
            arrows: !1,
            slidesPerRow: 3,
            rows: 2,
            responsive: [
                { breakpoint: 1025, settings: { slidesPerRow: 3 } },
                { breakpoint: 813, settings: { slidesPerRow: 2 } },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: !0,
                        prevArrow:
                            '<span class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
                        nextArrow:
                            '<span class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
                        infinite: !0,
                        dots: !1,
                        slidesPerRow: 1,
                        rows: 1,
                    },
                },
            ],
        }),
        $(".js-multiple-row3").slick({
            dots: !0,
            arrows: !1,
            slidesPerRow: 2,
            rows: 2,
            responsive: [
                { breakpoint: 1025, settings: { slidesPerRow: 2 } },
                { breakpoint: 813, settings: { slidesPerRow: 1 } },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: !0,
                        prevArrow:
                            '<span class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
                        nextArrow:
                            '<span class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
                        infinite: !0,
                        dots: !1,
                        slidesPerRow: 1,
                        rows: 1,
                    },
                },
            ],
        });
    var $status = $(".pagingInfo"),
        $slickElement = $(".js-slider-collectionf");
    $slickElement.on(
        "init reInit afterChange",
        function (event, slick, currentSlide, nextSlide) {
            var i2 = (currentSlide || 0) + 1;
            $status.text("0" + i2);
        }
    ),
        $(".js-slider-collectionf").on(
            "afterChange",
            function (event, slick, currentSlide) {
                $(".slick-active").append('<div class="pagingInfo"');
            }
        ),
        $(".js-slider-collectionf").slick({
            autoplay: !0,
            dots: !0,
            centerMode: !0,
            infinite: !0,
            centerMode: !0,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1,
            appendDots: $(".post-fade"),
            dotsClass: "custom_paging",
            customPaging: function (slider, i2) {
                var thumb = $(slider.$slides[i2]).data();
                return '<a class="dots"></a>';
            },
        });
    var $status = $(".pagingInfo"),
        $slickElement = $(".js-slider-home4");
    $slickElement.on(
        "init reInit afterChange",
        function (event, slick, currentSlide, nextSlide) {
            var i2 = (currentSlide || 0) + 1;
            $status.text("0" + i2);
        }
    ),
        $(".js-slider-home4").on(
            "afterChange",
            function (event, slick, currentSlide) {
                $(".slick-active").append('<div class="pagingInfo"');
            }
        ),
        $(".js-slider-home4").slick({
            autoplay: !0,
            dots: !0,
            infinite: !0,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1,
            appendDots: $(".post-fade"),
            dotsClass: "custom_paging",
            customPaging: function (slider, i2) {
                var thumb = $(slider.$slides[i2]).data();
                return '<a class="dots"></a>';
            },
        }),
        $(".js-slider-collectiond").slick({
            autoplay: !0,
            dots: !0,
            infinite: !0,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1,
            appendDots: $(".post-fade"),
            dotsClass: "custom_paging",
            customPaging: function (slider, i2) {
                var thumb = $(slider.$slides[i2]).data();
                return '<a class="dots"></a>';
            },
        }),
        $(".js-slider-3items").slick({
            autoplay: !1,
            infinite: !1,
            arrows: !1,
            dots: !0,
        }),
        $(".js-single-post").slick({
            autoplay: !1,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: !0,
            arrows: !1,
            dots: !0,
        }),
        $(".js-quickview-slide").slick({
            autoplay: !1,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: !0,
            arrows: !0,
            prevArrow:
                '<span class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            nextArrow:
                '<span class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
            dots: !0,
        }),
        $(".js-slider-home2").slick({
            autoplay: !1,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: !1,
            arrows: !0,
            prevArrow:
                '<span class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            nextArrow:
                '<span class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
        }),
        // $(".js-owl-test").owlCarousel({
        //     items: 1,
        //     singleItem: !0,
        //     nav: !0,
        //     navText: [
        //         "<span class='fa fa-angle-left'></span>",
        //         "<span class='fa fa-angle-right'></span>",
        //     ],
        //     dots: !1,
        // }),
        $(".slide-scroll").on("click", function () {
            return (
                $("html, body").animate(
                    { scrollTop: $("section#contenthome2").offset().top },
                    "slow"
                ),
                !1
            );
        });
    var handleScrollTop = function (e) {
        e.preventDefault(), $("html, body").animate({ scrollTop: 0 }, 250);
    };
    $("footer > .scroll-top").on("click", function (e) {
        handleScrollTop(e);
    }),
        $(".backto.vow-top").on("click", function (e) {
            handleScrollTop(e);
        }),
        $(function () {
            var $header = $(".entry-content"),
                $half = parseInt($(".img-cal").height()) / 2,
                $window = $(window)
                    .on("resize", function () {
                        var height = $header.height() - $half;
                        $header.height(height);
                    })
                    .trigger("resize");
        }),
        $(function () {
            var $el, $ps, $up, $p, totalHeight;
            $(".entry-content .btn-show").click(function () {
                return (
                    (totalHeight = 0),
                    ($el = $(this)),
                    ($p = $el.parent()),
                    ($up = $p.parent()),
                    ($ps = $up.find(".e-text")),
                    $ps.each(function () {
                        totalHeight += $(this).outerHeight();
                    }),
                    $up
                        .css({
                            height: $up.height(),
                            "max-height": 9999,
                            "margin-bottom": 30,
                        })
                        .animate({ height: totalHeight }),
                    $up.removeClass("active"),
                    $p.fadeOut(),
                    !1
                );
            });
        }),
        $(window).scroll(function () {
            if ($(".header-ontop").length > 0 && $(window).width() > 767) {
                var ht = $("#header").height(),
                    st = $(window).scrollTop();
                st > ht
                    ? $(".header-ontop").addClass("fixed-ontop")
                    : $(".header-ontop").removeClass("fixed-ontop");
            }
            if (
                $(".header-ontop-mobile").length > 0 &&
                $(window).width() > 320
            ) {
                var ht = $("#header").height(),
                    st = $(window).scrollTop();
                st > ht
                    ? $(".header-ontop-mobile").addClass("fixed-ontop")
                    : $(".header-ontop-mobile").removeClass("fixed-ontop");
            }
        }),
        $(".js-slider-home-classic").slick({
            dots: !0,
            infinite: !0,
            autoplay: !0,
            fade: !0,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            customPaging: function (slider, i2) {
                var thumb = $(slider.$slides[i2]).data();
                return "<a>0" + (i2 + 1) + "</a>";
            },
        }),
        $(".js-slider-home-clean").slick({
            dots: !0,
            infinite: !0,
            autoplay: !0,
            fade: !0,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
        }),
        $(".slick-product-top-sale").slick({
            dots: !0,
            infinite: !1,
            autoplay: !1,
            fade: !1,
            speed: 500,
            slidesToShow: 5,
            slidesToScroll: 1,
            customPaging: function (slider, i2) {
                var thumb = $(slider.$slides[i2]).data();
                return "<a></a>";
            },
            responsive: [
                { breakpoint: 1400, settings: { slidesToShow: 4 } },
                { breakpoint: 1300, settings: { slidesToShow: 3 } },
                { breakpoint: 1200, settings: { slidesToShow: 2 } },
                { breakpoint: 768, settings: { slidesToShow: 2 } },
            ],
        }),
        $(".slick-product-best-sellers").slick({
            dots: !0,
            infinite: !0,
            autoplay: !0,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                { breakpoint: 1024, settings: { slidesToShow: 3 } },
                { breakpoint: 768, settings: { slidesToShow: 2 } },
                { breakpoint: 480, settings: { slidesToShow: 1 } },
            ],
        }),
        $(".slick-Testimonal").slick({
            dots: !1,
            infinite: !0,
            autoplay: !0,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
        }),
        $(".slick-Testimonal2").slick({
            dots: !0,
            infinite: !0,
            autoplay: !0,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            customPaging: function (slider, i2) {
                var thumb = $(slider.$slides[i2]).data();
                return "<a>0" + (i2 + 1) + "</a>";
            },
        }),
        $(".slick-Testimonal3").slick({
            dots: !1,
            infinite: !0,
            autoplay: !0,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            customPaging: function (slider, i2) {
                var thumb = $(slider.$slides[i2]).data();
                return "<a>0" + (i2 + 1) + "</a>";
            },
            responsive: [
                { breakpoint: 1400, settings: { slidesToShow: 3 } },
                { breakpoint: 1208, settings: { slidesToShow: 3 } },
                { breakpoint: 768, settings: { slidesToShow: 2 } },
                { breakpoint: 568, settings: { slidesToShow: 1 } },
            ],
        }),
        $(".slick-Testimonal4").slick({
            dots: !0,
            infinite: !0,
            autoplay: !0,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
        }),
        $(".slick-brand").slick({
            dots: !1,
            infinite: !0,
            autoplay: !0,
            speed: 500,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                { breakpoint: 1400, settings: { slidesToShow: 4 } },
                { breakpoint: 1208, settings: { slidesToShow: 3 } },
                { breakpoint: 768, settings: { slidesToShow: 2 } },
            ],
        }),
        $(".slick-testimonial").slick({
            dots: !0,
            infinite: !0,
            autoplay: !0,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
        }),
        $(".slick-team").slick({
            dots: !0,
            infinite: !0,
            autoplay: !0,
            speed: 500,
            infinite: !0,
            arrows: !1,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                { breakpoint: 1400, settings: { slidesToShow: 4 } },
                { breakpoint: 1208, settings: { slidesToShow: 4 } },
                { breakpoint: 768, settings: { slidesToShow: 3 } },
                { breakpoint: 568, settings: { slidesToShow: 2 } },
            ],
        }),
        $(function () {
            $(".loader").slice(0, 8).show(),
                $("#loadMore").on("click", function (e) {
                    e.preventDefault(),
                        $(".loader:hidden").slice(0, 5).slideDown(),
                        $(".loader:hidden").length == 0 &&
                            $("#load").fadeOut("slow");
                });
        }),
        $(".js-slider-blog").slick({
            dots: !1,
            infinite: !0,
            autoplay: !1,
            speed: 500,
            slidesToScroll: 1,
            slidesToShow: 3,
            responsive: [
                { breakpoint: 991, settings: { slidesToShow: 2 } },
                { breakpoint: 567, settings: { slidesToShow: 1 } },
            ],
        }),
        $(".js-slider-blog2").slick({
            dots: !1,
            infinite: !0,
            autoplay: !1,
            speed: 500,
            slidesToScroll: 1,
            slidesToShow: 2,
            responsive: [
                { breakpoint: 991, settings: { slidesToShow: 2 } },
                { breakpoint: 567, settings: { slidesToShow: 1 } },
            ],
        }),
        $(".js-slider-home-modern").slick({
            dots: !0,
            infinite: !0,
            autoplay: !1,
            speed: 500,
            fade: !0,
        }),
        $(".register-link").on("click", function () {
            $(".login-form").addClass("hidden"),
                $(".register-form").removeClass("hidden"),
                $(".register-link").addClass("hidden"),
                $(".login-link").removeClass("hidden"),
                $("#RecoverPasswordForm").addClass("hidden");
        }),
        $(".login-link").on("click", function () {
            $(".login-form").removeClass("hidden"),
                $(".register-form").addClass("hidden"),
                $(".login-link").addClass("hidden"),
                $(".register-link").removeClass("hidden");
        }),
        $("#btn-search .icon-magnifier").on("click", function () {
            $(".form-search").css("right", "0");
        }),
        $("#btn-search").on("click", function () {
            $(".form-search").css("right", "0");
        }),
        $(".btn-search").on("click", function () {
            $(".form-search").css("right", "0");
        }),
        $("#close-search").on("click", function () {
            $(".form-search").css("right", "-1920px");
        }),
        $(".slick-top-collection").slick({
            dots: !0,
            infinite: !1,
            autoplay: !1,
            speed: 500,
            slidesToScroll: 1,
            slidesToShow: 3,
            customPaging: function (slider, i2) {
                var thumb = $(slider.$slides[i2]).data();
                return "<a></a>";
            },
            responsive: [
                { breakpoint: 991, settings: { slidesToShow: 2 } },
                { breakpoint: 567, settings: { slidesToShow: 1 } },
            ],
        }),
        $(".btn_filter_full").on("click", function () {
            $(this).attr("data-click-state") == 0
                ? ($(this).attr("data-click-state", 1),
                  $(".btn_filter_full").addClass("active"),
                  $(".filter_full").addClass("h_100"))
                : ($(this).attr("data-click-state", 0),
                  $(".btn_filter_full").removeClass("active"),
                  $(".filter_full").removeClass("h_100"));
        }),
        $(".btn_sorting_mb").on("click", function () {
            $(this).attr("data-click-state") == 0
                ? ($(this).attr("data-click-state", 1),
                  $(".dropdown_menu_sorting").addClass("active"))
                : ($(this).attr("data-click-state", 0),
                  $(".dropdown_menu_sorting").removeClass("active"));
        }),
        $(".size_3").on("click", function () {
            $(this).addClass("active"),
                $(".layout_product_shop")
                    .addClass("column-3")
                    .removeClass("column-4")
                    .removeClass("column-30")
                    .removeClass("column-20")
                    .removeClass("column-6")
                    .removeClass("column-50")
                    .removeClass("layout_pd_list_shop"),
                $(".size_4").removeClass("active"),
                $(".size_5").removeClass("active"),
                $(".size_6").removeClass("active");
        }),
        $(".size_4").on("click", function () {
            $(this).addClass("active"),
                $(".layout_product_shop")
                    .addClass("column-4")
                    .removeClass("column-3")
                    .removeClass("column-20")
                    .removeClass("column-6")
                    .removeClass("column-50")
                    .removeClass("layout_pd_list_shop"),
                $(".size_3").removeClass("active"),
                $(".size_5").removeClass("active"),
                $(".size_6").removeClass("active");
        }),
        $(".size_5").on("click", function () {
            $(this).addClass("active"),
                $(".layout_product_shop")
                    .addClass("column-20")
                    .removeClass("column-4")
                    .removeClass("column-30")
                    .removeClass("column-3")
                    .removeClass("column-6")
                    .removeClass("column-50")
                    .removeClass("layout_pd_list_shop"),
                $(".size_4").removeClass("active"),
                $(".size_3").removeClass("active"),
                $(".size_6").removeClass("active");
        }),
        $(".size_6").on("click", function () {
            $(this).addClass("active"),
                $(".layout_product_shop")
                    .addClass("column-6")
                    .removeClass("column-4")
                    .removeClass("column-30")
                    .removeClass("column-20")
                    .removeClass("column-3")
                    .removeClass("column-50")
                    .removeClass("layout_pd_list_shop"),
                $(".size_4").removeClass("active"),
                $(".size_5").removeClass("active"),
                $(".size_3").removeClass("active");
        }),
        $(".btn_list_layout").on("click", function () {
            $(this).addClass("active"),
                $(".btn_grid_layout").removeClass("active"),
                $(".layout_product_shop")
                    .addClass("column-50")
                    .addClass("layout_pd_list_shop")
                    .removeClass("column-4")
                    .removeClass("column-30")
                    .removeClass("column-3")
                    .removeClass("column-6")
                    .removeClass("column-20");
        }),
        $(".btn_grid_layout").on("click", function () {
            $(this).addClass("active"),
                $(".btn_list_layout").removeClass("active"),
                $(".layout_product_shop")
                    .removeClass("column-50")
                    .removeClass("layout_pd_list_shop")
                    .removeClass("column-30")
                    .removeClass("column-3")
                    .removeClass("column-6")
                    .removeClass("column-20");
        }),
        $(".close_promo_pd").on("click", function () {
            $(".promo_info_single_product").addClass("hidden");
        }),
        $(".btn_size_guide").on("click", function () {
            $(".content_size_guide").addClass("active"),
                $(".overlay").addClass("active");
        }),
        $(".overlay").on("click", function () {
            $(".content_size_guide").removeClass("active"),
                $(".overlay").removeClass("active"),
                $(".sidebar_mb").removeClass("active");
        }),
        $(".close_size_guide").on("click", function () {
            $(".content_size_guide").removeClass("active"),
                $(".overlay").removeClass("active");
        }),
        $("#btn-login .zoa-icon-user").on("click", function () {
            $(".login_form_pc").addClass("active");
        }),
        $("#btn-login").on("click", function () {
            $(".login_form_pc").addClass("active");
        }),
        $('[data-iteration]').on('click', function() {
            var iteration = $(this).data('iteration');
            $(".login_form_pc").addClass("active");
        });
        $(".btn_close_login").on("click", function () {
            $(".login_form_pc").removeClass("active");
        }),
        $("#RecoverPassword").on("click", function () {
            $(".login-form").addClass("hidden"),
                $("#RecoverPasswordForm").removeClass("hidden");
        }),
        $("#HideRecoverPasswordLink").on("click", function () {
            $(".login-form").removeClass("hidden"),
                $("#RecoverPasswordForm").addClass("hidden");
        }),
        $(".js_relate_article").slick({
            dots: !1,
            infinite: !1,
            autoplay: !1,
            speed: 500,
            slidesToScroll: 1,
            slidesToShow: 3,
            responsive: [
                { breakpoint: 991, settings: { slidesToShow: 2 } },
                { breakpoint: 567, settings: { slidesToShow: 1 } },
            ],
        });
    var acc = document.getElementsByClassName("accordion"),
        i;
    for (i = 0; i < acc.length; i++)
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            panel.style.maxHeight
                ? (panel.style.maxHeight = null)
                : (panel.style.maxHeight = panel.scrollHeight + "px");
        });
    $(".btn_filter_mb").on("click", function () {
        $(".sidebar_mb").addClass("active"), $(".overlay").addClass("active");
    }),
        $(".close_sidebar_mb").on("click", function () {
            $(".sidebar_mb").removeClass("active"),
                $(".overlay").removeClass("active");
        }),
        $(window).load(function () {
            $(".shopify-payment-button__button").addClass("btn-disabled");
        });
});
//# sourceMappingURL=/cdn/shop/t/9/assets/main.js.map?v=16252065884123715631582858574
