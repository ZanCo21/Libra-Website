<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Libra
    </title>
    <link rel="shortcut icon" href="{{ asset('assets/home/cdn/shop/t/9/assets/logo.png?v=76281246793426370331552127529')}}" type="image/png">

    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_57x57.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="60x60"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_60x60.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_72x72.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="76x76"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_76x76.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_114x114.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_120x120.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_144x144.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_152x152.png?v=40262354487846272511552289310') }}">



    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#7fc9c4">
    <style>
        :root {
            --engoc-primary-color: #3e976c;
            --engoc-color-main1: #000000;
            --engoc-color-main2: #bdefd7;
            --engoc-color-main3: #3f976d;
            --engoc-color-main4: #bdefd6;
            --engoc-primary-font: Poppins;
        }

        /* Notifikasi responsif untuk perangkat mobile */
        @media (max-width: 768px) {
            #notification {
                position: fixed;
                bottom: 10px;
                right: 10px;
                width: auto;
                max-width: 90%;
                padding: 10px;
                font-size: 14px;
                z-index: 999;
            }
        }
        #notification {
            z-index: 999;
            position: fixed;
            bottom: 10px;
            right: 10px;
            /* display: none; */
            padding: 15px;
            border-radius: 5px;
            transition: 3s ease-in-out;
        }
        #notification .hidden{
            opacity: 0;
            transition: 3s ease-in;
        }
    </style>

    <!-- font -->
    <script type="text/javascript">
        WebFontConfig = {
            google: {
                families: [
                    'Poppins:100,200,300,400,500,600,700,800,900'
                    ,
                    'Playfair Display:100,200,300,400,500,600,700,800,900'
                    ,
                    'Mr Dafoe:100,200,300,400,500,600,700,800,900'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>


    <!-- CSS ================================================== -->
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/timber.scss.css?v=83003523055991614621582879388')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/font-awesome.min.css?v=21869632697367095781552289294')}}" rel="stylesheet"
        type="text/css" media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/simple-line-icons.css?v=49402511247700599821552289331')}}" rel="stylesheet"
        type="text/css" media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/ionicons.min.css?v=184364306120675196201552289315')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/slick.css?v=72376615944862524581552289332')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/slick-theme.css?v=25113718316443114101552289332')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/owl.carousel.min.css?v=100847393044616809951552289326')}}" rel="stylesheet"
        type="text/css" media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/owl.theme.default.min.css?v=160803198952872906341552289327')}}" rel="stylesheet"
        type="text/css" media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/jquery.fancybox.min.css?v=55675584413537998841552289317')}}" rel="stylesheet"
        type="text/css" media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/threesixty.css?v=6675712607238153051552289337')}}" rel="stylesheet" type="text/css"
        media="all">

    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/fonts.css?v=83811784241988132941552289296')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/style.css?v=99245712511931501371579249815')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/fix_style.css?v=13807369610403724911579166925')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/zoa-font.css?v=20367358950063266891552289339')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/flaticon.css?v=45077490328260288871552289294')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/themify-icons.css?v=17828378678609318721552289335')}}" rel="stylesheet"
        type="text/css" media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/style-main.css?v=151714546133175732051582877403')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/style-more.css?v=162871148462548920311579234101')}}" rel="stylesheet" type="text/css"
        media="all">
    <link href="{{ asset('assets/home/cdn/shop/t/9/assets/engo-customize.scss.css?v=122453866314721812381582879386')}}" rel="stylesheet"
        type="text/css" media="all">

    <!-- Header hook for plugins ================================================== -->
    <script>
        window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.start');
    </script>
    <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/8561000553/digital_wallets/dialog">
    {{-- <script async="async" src="checkouts/internal/preloads.js?locale=en-ID"></script>
    <script async="async" src="checkouts/internal/preloads-1.js?locale=en-ID&shop_id=8561000553" crossorigin="anonymous"> --}}
    </script>
    <script id="shopify-features" type="application/json">{"accessToken":"56c581d1ab9ef7345b29c6154b1911c1","betas":["rich-media-storefront-analytics"],"domain":"minim-demo.myshopify.com","predictiveSearch":true,"shopId":8561000553,"smart_payment_buttons_url":"https:\/\/minim-demo.myshopify.com\/cdn\/shopifycloud\/payment-sheet\/assets\/latest\/spb.en.js","dynamic_checkout_cart_url":"https:\/\/minim-demo.myshopify.com\/cdn\/shopifycloud\/payment-sheet\/assets\/latest\/dynamic-checkout-cart.en.js","locale":"en","flg4ff40b22":false}</script>
    <script>
        var Shopify = Shopify || {};
        Shopify.shop = "minim-demo.myshopify.com";
        Shopify.locale = "en";
        Shopify.currency = {
            "active": "USD",
            "rate": "1.0"
        };
        Shopify.country = "ID";
        Shopify.theme = {
            "name": "Home Page 2",
            "id": 47529328745,
            "theme_store_id": null,
            "role": "unpublished"
        };
        Shopify.theme.handle = "null";
        Shopify.theme.style = {
            "id": null,
            "handle": null
        };
        Shopify.cdnHost = "minim-demo.myshopify.com/cdn";
        Shopify.routes = Shopify.routes || {};
        Shopify.routes.root = "/";
    </script>
    <script type="module">
        ! function(o) {
            (o.Shopify = o.Shopify || {}).modules = !0
        }(window);
    </script>
    <script>
        ! function(o) {
            function n() {
                var o = [];

                function n() {
                    o.push(Array.prototype.slice.apply(arguments))
                }
                return n.q = o, n
            }
            var t = o.Shopify = o.Shopify || {};
            t.loadFeatures = n(), t.autoloadFeatures = n()
        }(window);
    </script>
    <script>
        (function() {
            function asyncLoad() {
                var urls = ["\/\/productreviews.shopifycdn.com\/embed\/loader.js?shop=minim-demo.myshopify.com",
                    "https:\/\/api.revy.io\/bundle.js?shop=minim-demo.myshopify.com",
                    "https:\/\/cdn.autoketing.org\/sdk-cdn\/currency-convert\/dist\/currency-convert-embed.js?shop=minim-demo.myshopify.com"
                ];
                for (var i = 0; i < urls.length; i++) {
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = urls[i];
                    var x = document.getElementsByTagName('script')[0];
                    x.parentNode.insertBefore(s, x);
                }
            };
            if (window.attachEvent) {
                window.attachEvent('onload', asyncLoad);
            } else {
                window.addEventListener('load', asyncLoad, false);
            }
        })();
    </script>
    <script id="__st">
        var __st = {
            "a": 8561000553,
            "offset": -14400,
            "reqid": "9bc84eb5-efa9-40b6-8bbb-46c0d3ebb610-1711544944",
            "pageurl": "minim-demo.myshopify.com\/",
            "u": "23618e064650",
            "p": "home"
        };
    </script>
    <script>
        window.ShopifyPaypalV4VisibilityTracking = true;
    </script>
    {{-- <script>
        ! function(o) {
            o.addEventListener("DOMContentLoaded", function() {
                window.Shopify = window.Shopify || {}, window.Shopify.recaptchaV3 = window.Shopify.recaptchaV3 || {
                    siteKey: "6LeHG2ApAAAAAO4rPaDW-qVpPKPOBfjbCpzJB9ey"
                };
                var t = ['form[action*="/contact"] input[name="form_type"][value="contact"]',
                    'form[action*="/comments"] input[name="form_type"][value="new_comment"]',
                    'form[action*="/account"] input[name="form_type"][value="customer_login"]',
                    'form[action*="/account"] input[name="form_type"][value="recover_customer_password"]',
                    'form[action*="/account"] input[name="form_type"][value="create_customer"]',
                    'form[action*="/contact"] input[name="form_type"][value="customer"]'
                ].join(",");

                function n(e) {
                    e = e.target;
                    null == e || null != (e = function e(t, n) {
                        if (null == t.parentElement) return null;
                        if ("FORM" != t.parentElement.tagName) return e(t.parentElement, n);
                        for (var o = t.parentElement.action, r = 0; r < n.length; r++)
                            if (-1 !== o.indexOf(n[r])) return t.parentElement;
                        return null
                    }(e, ["/contact", "/comments", "/account"])) && null != e.querySelector(t) && ((e = o
                            .createElement("script")).setAttribute("src",
                            "https://cdn.shopify.com/shopifycloud/storefront-recaptcha-v3/v0.6/index.js"), o
                        .body.appendChild(e), o.removeEventListener("focus", n, !0), o.removeEventListener(
                            "change", n, !0), o.removeEventListener("click", n, !0))
                }
                o.addEventListener("click", n, !0), o.addEventListener("change", n, !0), o.addEventListener("focus",
                    n, !0)
            })
        }(document);
    </script> --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const previewBarInjector = new Shopify.PreviewBarInjector({
                targetNode: document.body,
                iframeRoot: 'https://minim-demo.myshopify.com',
                iframeSrc: 'https://minim-demo.myshopify.com/preview_bar',
                previewToken: 'ruz669lw8fobom8b',
                themeStoreId: '',
                permanentDomain: 'minim-demo.myshopify.com',
            });
            previewBarInjector.init();
        });
    </script> --}}
    <script integrity="sha256-n5Uet9jVOXPHGd4hH4B9Y6+BxkTluaaucmYaxAjUcvY=" data-source-attribution="shopify.loadfeatures"
        defer="defer"
        src="{{ asset('assets/home/cdn/shopifycloud/shopify/assets/storefront/load_feature-9f951eb7d8d53973c719de211f807d63af81c644e5b9a6ae72661ac408d472f6.js') }}"
        crossorigin="anonymous"></script>
    <script integrity="sha256-HAs5a9TQVLlKuuHrahvWuke+s1UlxXohfHeoYv8G2D8="
        data-source-attribution="shopify.dynamic-checkout" defer="defer"
        src="{{ asset('assets/home/cdn/shopifycloud/shopify/assets/storefront/features-1c0b396bd4d054b94abae1eb6a1bd6ba47beb35525c57a217c77a862ff06d83f.js') }}"
        crossorigin="anonymous"></script>
    <script integrity="sha256-o0rXHoHYF8JV/pI5sd/RPjI3ywH41Ezq5yxQ3ds5iuM=" defer="defer"
        src="{{ asset('assets/home/cdn/shopifycloud/shopify/assets/storefront/bars/preview_bar_injector-a34ad71e81d817c255fe9239b1dfd13e3237cb01f8d44ceae72c50dddb398ae3.js') }}"
        crossorigin="anonymous"></script>


    <script>
        window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');
    </script>



    <script src="{{ asset('assets/home/cdn/shop/t/9/assets/jquery-1.12.0.min.js?v=180303338299147220221552289316')}}" type="text/javascript"></script>
    <script
        src="{{ asset('assets/home/cdn/shopifycloud/shopify/assets/themes_support/api.jquery-b0af070cfe3f5cf7c92f9e2a5da2665ee07ed2aad63bb408f8d6672f894a5996.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/home/cdn/shop/t/9/assets/modernizr-2.8.3.min.js?v=174727525422211915231552289324')}}" type="text/javascript">
    </script>
    <script
        src="{{ asset('assets/home/cdn/shopifycloud/shopify/assets/themes_support/option_selection-86cdd286ddf3be7e25d68b9fc5965d7798a3ff6228ff79af67b3f4e41d6a34be.js') }}"
        type="text/javascript"></script>


    {{-- <script>
        var amount = 100;
        window.ajax_cart = true;
        window.money_format = '<span class=money>${{ amount }} USD</span>';
        window.shop_currency = 'USD';
        window.show_multiple_currencies = true;
        window.loading_url = "//minim-demo.myshopify.com/cdn/shop/t/9/assets/loader.gif?v=9076874988191347041552289318";
        window.use_color_swatch = true;
        window.product_image_resize = true;
        window.enable_sidebar_multiple_choice = true;

        window.file_url = "//minim-demo.myshopify.com/cdn/shop/files/?24117";
        window.asset_url = "";
        window.images_size = {
            is_crop: true,
            ratio_width: 1,
            ratio_height: 1,
        };
        window.inventory_text = {
            in_stock: "In Stock",
            many_in_stock: "Translation missing: en.products.product.many_in_stock",
            out_of_stock: "Out Of Stock",
            add_to_cart: "Add To Cart",
            sold_out: "Sold Out",
            unavailable: "Unavailable"
        };

        window.sidebar_toggle = {
            show_sidebar_toggle: "Translation missing: en.general.sidebar_toggle.show_sidebar_toggle",
            hide_sidebar_toggle: "Translation missing: en.general.sidebar_toggle.hide_sidebar_toggle"
        };
    </script> --}}




    <!-- /snippets/social-meta-tags.liquid -->
    <link rel="shortcut icon" href="{{ asset('assets/home/cdn/shop/t/9/assets/logo.png?v=76281246793426370331552127529')}}"
        type="image/png">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_57x57.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="60x60"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_60x60.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_72x72.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="76x76"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_76x76.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_114x114.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_120x120.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_144x144.png?v=40262354487846272511552289310') }}">
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
        href="{{ asset('assets/home/cdn/shop/t/9/assets/icon-for-mobile_152x152.png?v=40262354487846272511552289310') }}">



    <meta property="og:type" content="website">
    <meta property="og:title" content=" Minim - Minimal &amp; Clean Furniture Store Shopify Theme">
    {{-- <meta property="og:image"
        content="http://minim-demo.myshopify.com/cdn/shop/t/9/assets/logo.png?v=76281246793426370331552289318">
    <meta property="og:image:secure_url"
        content="https://minim-demo.myshopify.com/cdn/shop/t/9/assets/logo.png?v=76281246793426370331552289318">
    <meta property="og:url" content="https://minim-demo.myshopify.com/"> --}}
    <meta property="og:site_name" content=" Minim - Minimal &amp; Clean Furniture Store Shopify Theme">
    <meta name="twitter:card" content="summary">

    <script async="" src="{{asset('assets/home/bundle.js')}}" type="text/javascript"></script>
    <link href="https://monorail-edge.shopifysvc.com" rel="dns-prefetch">
    <script>
        (function() {
            if ("sendBeacon" in navigator && "performance" in window) {
                var session_token = document.cookie.match(/_shopify_s=([^;]*)/);

                function handle_abandonment_event(e) {
                    var entries = performance.getEntries().filter(function(entry) {
                        return /monorail-edge.shopifysvc.com/.test(entry.name);
                    });
                    if (!window.abandonment_tracked && entries.length === 0) {
                        window.abandonment_tracked = true;
                        var currentMs = Date.now();
                        var navigation_start = performance.timing.navigationStart;
                        var payload = {
                            shop_id: 8561000553,
                            url: window.location.href,
                            navigation_start,
                            duration: currentMs - navigation_start,
                            session_token: session_token && session_token.length === 2 ? session_token[1] : "",
                            page_type: "index"
                        };
                        window.navigator.sendBeacon("https://monorail-edge.shopifysvc.com/v1/produce", JSON.stringify({
                            schema_id: "online_store_buyer_site_abandonment/1.1",
                            payload: payload,
                            metadata: {
                                event_created_at_ms: currentMs,
                                event_sent_at_ms: currentMs
                            }
                        }));
                    }
                }
                window.addEventListener('pagehide', handle_abandonment_event);
            }
        }());
    </script>
    {{-- <script id="web-pixels-manager-setup">
        (function e(e, n, a, t, r) {
            var o = "function" == typeof BigInt && -1 !== BigInt.toString().indexOf("[native code]") ? "modern" :
                "legacy";
            window.Shopify = window.Shopify || {};
            var i = window.Shopify;
            i.analytics = i.analytics || {};
            var s = i.analytics;
            s.replayQueue = [], s.publish = function(e, n, a) {
                return s.replayQueue.push([e, n, a]), !0
            };
            try {
                self.performance.mark("wpm:start")
            } catch (e) {}
            var l = [a, "/wpm", "/b", r, o.substring(0, 1), ".js"].join("");
            ! function(e) {
                var n = e.src,
                    a = e.async,
                    t = void 0 === a || a,
                    r = e.onload,
                    o = e.onerror,
                    i = document.createElement("script"),
                    s = document.head,
                    l = document.body;
                i.async = t, i.src = n, r && i.addEventListener("load", r), o && i.addEventListener("error", o), s ? s
                    .appendChild(i) : l ? l.appendChild(i) : console.error(
                        "Did not find a head or body element to append the script")
            }({
                src: l,
                async: !0,
                onload: function() {
                    var a = window.webPixelsManager.init(e);
                    n(a);
                    var t = window.Shopify.analytics;
                    t.replayQueue.forEach((function(e) {
                        var n = e[0],
                            t = e[1],
                            r = e[2];
                        a.publishCustomEvent(n, t, r)
                    })), t.replayQueue = [], t.publish = a.publishCustomEvent, t.visitor = a.visitor
                },
                onerror: function() {
                    var n = e.storefrontBaseUrl.replace(/\/$/, ""),
                        a = "".concat(n, "/.well-known/shopify/monorail/unstable/produce_batch"),
                        r = JSON.stringify({
                            metadata: {
                                event_sent_at_ms: (new Date).getTime()
                            },
                            events: [{
                                schema_id: "web_pixels_manager_load/2.0",
                                payload: {
                                    version: t || "latest",
                                    page_url: self.location.href,
                                    status: "failed",
                                    error_msg: "".concat(l, " has failed to load")
                                },
                                metadata: {
                                    event_created_at_ms: (new Date).getTime()
                                }
                            }]
                        });
                    try {
                        if (self.navigator.sendBeacon.bind(self.navigator)(a, r)) return !0
                    } catch (e) {}
                    var o = new XMLHttpRequest;
                    try {
                        return o.open("POST", a, !0), o.setRequestHeader("Content-Type", "text/plain"), o.send(
                            r), !0
                    } catch (e) {
                        console && console.warn && console.warn(
                            "[Web Pixels Manager] Got an unhandled error while logging a load error.")
                    }
                    return !1
                }
            })
        })({
            shopId: 8561000553,
            storefrontBaseUrl: "https://minim-demo.myshopify.com",
            cdnBaseUrl: "https://minim-demo.myshopify.com/cdn",
            surface: "storefront-renderer",
            enabledBetaFlags: [],
            webPixelsConfigList: [{
                "id": "shopify-app-pixel",
                "configuration": "{}",
                "eventPayloadVersion": "v1",
                "runtimeContext": "STRICT",
                "scriptVersion": "0575",
                "apiClientId": "shopify-pixel",
                "type": "APP",
                "purposes": ["ANALYTICS"]
            }, {
                "id": "shopify-custom-pixel",
                "eventPayloadVersion": "v1",
                "runtimeContext": "LAX",
                "scriptVersion": "0575",
                "apiClientId": "shopify-pixel",
                "type": "CUSTOM",
                "purposes": ["ANALYTICS"]
            }],
            initData: {
                "cart": null,
                "checkout": null,
                "customer": null,
                "productVariants": []
            },
        }, function pageEvents(webPixelsManagerAPI) {
            webPixelsManagerAPI.publish("page_viewed");
        }, "https://minim-demo.myshopify.com/cdn", "0.0.463", "af064dacw059a0243p359f28e4m038b1d93", );
    </script> --}}
    <script>
        window.ShopifyAnalytics = window.ShopifyAnalytics || {};
        window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
        window.ShopifyAnalytics.meta.currency = 'USD';
        var meta = {
            "page": {
                "pageType": "home"
            }
        };
        for (var attr in meta) {
            window.ShopifyAnalytics.meta[attr] = meta[attr];
        }
    </script>
    <script>
        window.ShopifyAnalytics.merchantGoogleAnalytics = function() {

        };
    </script>
    {{-- <script class="analytics">
        (function() {
            var customDocumentWrite = function(content) {
                var jquery = null;

                if (window.jQuery) {
                    jquery = window.jQuery;
                } else if (window.Checkout && window.Checkout.$) {
                    jquery = window.Checkout.$;
                }

                if (jquery) {
                    jquery('body').append(content);
                }
            };

            var hasLoggedConversion = function(token) {
                if (token) {
                    return document.cookie.indexOf('loggedConversion=' + token) !== -1;
                }
                return false;
            }

            var setCookieIfConversion = function(token) {
                if (token) {
                    var twoMonthsFromNow = new Date(Date.now());
                    twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

                    document.cookie = 'loggedConversion=' + token + '; expires=' + twoMonthsFromNow;
                }
            }

            var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
            if (trekkie.integrations) {
                return;
            }
            trekkie.methods = [
                'identify',
                'page',
                'ready',
                'track',
                'trackForm',
                'trackLink'
            ];
            trekkie.factory = function(method) {
                return function() {
                    var args = Array.prototype.slice.call(arguments);
                    args.unshift(method);
                    trekkie.push(args);
                    return trekkie;
                };
            };
            for (var i = 0; i < trekkie.methods.length; i++) {
                var key = trekkie.methods[i];
                trekkie[key] = trekkie.factory(key);
            }
            trekkie.load = function(config) {
                trekkie.config = config || {};
                trekkie.config.initialDocumentCookie = document.cookie;
                var first = document.getElementsByTagName('script')[0];
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.onerror = function(e) {
                    var scriptFallback = document.createElement('script');
                    scriptFallback.type = 'text/javascript';
                    scriptFallback.onerror = function(error) {
                        var Monorail = {
                            produce: function produce(monorailDomain, schemaId, payload) {
                                var currentMs = new Date().getTime();
                                var event = {
                                    schema_id: schemaId,
                                    payload: payload,
                                    metadata: {
                                        event_created_at_ms: currentMs,
                                        event_sent_at_ms: currentMs
                                    }
                                };
                                return Monorail.sendRequest("https://" + monorailDomain +
                                    "/v1/produce", JSON.stringify(event));
                            },
                            sendRequest: function sendRequest(endpointUrl, payload) {
                                // Try the sendBeacon API
                                if (window && window.navigator && typeof window.navigator
                                    .sendBeacon === 'function' && typeof window.Blob ===
                                    'function' && !Monorail.isIos12()) {
                                    var blobData = new window.Blob([payload], {
                                        type: 'text/plain'
                                    });

                                    if (window.navigator.sendBeacon(endpointUrl, blobData)) {
                                        return true;
                                    } // sendBeacon was not successful

                                } // XHR beacon

                                var xhr = new XMLHttpRequest();

                                try {
                                    xhr.open('POST', endpointUrl);
                                    xhr.setRequestHeader('Content-Type', 'text/plain');
                                    xhr.send(payload);
                                } catch (e) {
                                    console.log(e);
                                }

                                return false;
                            },
                            isIos12: function isIos12() {
                                return window.navigator.userAgent.lastIndexOf(
                                        'iPhone; CPU iPhone OS 12_') !== -1 || window.navigator
                                    .userAgent.lastIndexOf('iPad; CPU OS 12_') !== -1;
                            }
                        };
                        Monorail.produce('monorail-edge.shopifysvc.com',
                            'trekkie_storefront_load_errors/1.1', {
                                shop_id: 8561000553,
                                theme_id: 47529328745,
                                app_name: "storefront",
                                context_url: window.location.href,
                                source_url: "//minim-demo.myshopify.com/cdn/s/trekkie.storefront.edae546725afe9e67372986831ce229a1cb75365.min.js"
                            });

                    };
                    scriptFallback.async = true;
                    scriptFallback.src =
                        '//minim-demo.myshopify.com/cdn/s/trekkie.storefront.edae546725afe9e67372986831ce229a1cb75365.min.js';
                    first.parentNode.insertBefore(scriptFallback, first);
                };
                script.async = true;
                script.src =
                    '//minim-demo.myshopify.com/cdn/s/trekkie.storefront.edae546725afe9e67372986831ce229a1cb75365.min.js';
                first.parentNode.insertBefore(script, first);
            };
            trekkie.load({
                "Trekkie": {
                    "appName": "storefront",
                    "development": false,
                    "defaultAttributes": {
                        "shopId": 8561000553,
                        "isMerchantRequest": null,
                        "themeId": 47529328745,
                        "themeCityHash": "10594099985369522108",
                        "contentLanguage": "en",
                        "currency": "USD"
                    },
                    "isServerSideCookieWritingEnabled": true,
                    "monorailRegion": "shop_domain",
                    "enabledBetaFlags": ["bbcf04e6"]
                },
                "Session Attribution": {},
                "S2S": {
                    "facebookCapiEnabled": false,
                    "source": "trekkie-storefront-renderer"
                }
            });

            var loaded = false;
            trekkie.ready(function() {
                if (loaded) return;
                loaded = true;

                window.ShopifyAnalytics.lib = window.trekkie;


                var originalDocumentWrite = document.write;
                document.write = customDocumentWrite;
                try {
                    window.ShopifyAnalytics.merchantGoogleAnalytics.call(this);
                } catch (error) {};
                document.write = originalDocumentWrite;

                window.ShopifyAnalytics.lib.page(null, {
                    "pageType": "home"
                });

                var match = window.location.pathname.match(/checkouts\/(.+)\/(thank_you|post_purchase)/)
                var token = match ? match[1] : undefined;
                if (!hasLoggedConversion(token)) {
                    setCookieIfConversion(token);

                }
            });


            var eventsListenerScript = document.createElement('script');
            eventsListenerScript.async = true;
            eventsListenerScript.src =
                "//minim-demo.myshopify.com/cdn/shopifycloud/shopify/assets/shop_events_listener-61fa9e0a912c675e178777d2b27f6cbd482f8912a6b0aa31fa3515985a8cd626.js";
            document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);

        })();
    </script> --}}
    {{-- <script class="boomerang">
        (function() {
            if (window.BOOMR && (window.BOOMR.version || window.BOOMR.snippetExecuted)) {
                return;
            }
            window.BOOMR = window.BOOMR || {};
            window.BOOMR.snippetStart = new Date().getTime();
            window.BOOMR.snippetExecuted = true;
            window.BOOMR.snippetVersion = 12;
            window.BOOMR.application = "storefront-renderer";
            window.BOOMR.themeName = "Minim";
            window.BOOMR.themeVersion = "1.0.3";
            window.BOOMR.shopId = 8561000553;
            window.BOOMR.themeId = 47529328745;
            window.BOOMR.renderRegion = "gcp-us-central1";
            window.BOOMR.url =
                "https://minim-demo.myshopify.com/cdn/shopifycloud/boomerang/shopify-boomerang-1.0.0.min.js";
            var where = document.currentScript || document.getElementsByTagName("script")[0];
            var parentNode = where.parentNode;
            var promoted = false;
            var LOADER_TIMEOUT = 3000;

            function promote() {
                if (promoted) {
                    return;
                }
                var script = document.createElement("script");
                script.id = "boomr-scr-as";
                script.src = window.BOOMR.url;
                script.async = true;
                parentNode.appendChild(script);
                promoted = true;
            }

            function iframeLoader(wasFallback) {
                promoted = true;
                var dom, bootstrap, iframe, iframeStyle;
                var doc = document;
                var win = window;
                window.BOOMR.snippetMethod = wasFallback ? "if" : "i";
                bootstrap = function(parent, scriptId) {
                    var script = doc.createElement("script");
                    script.id = scriptId || "boomr-if-as";
                    script.src = window.BOOMR.url;
                    BOOMR_lstart = new Date().getTime();
                    parent = parent || doc.body;
                    parent.appendChild(script);
                };
                if (!window.addEventListener && window.attachEvent && navigator.userAgent.match(/MSIE [67]./)) {
                    window.BOOMR.snippetMethod = "s";
                    bootstrap(parentNode, "boomr-async");
                    return;
                }
                iframe = document.createElement("IFRAME");
                iframe.src = "about:blank";
                iframe.title = "";
                iframe.role = "presentation";
                iframe.loading = "eager";
                iframeStyle = (iframe.frameElement || iframe).style;
                iframeStyle.width = 0;
                iframeStyle.height = 0;
                iframeStyle.border = 0;
                iframeStyle.display = "none";
                parentNode.appendChild(iframe);
                try {
                    win = iframe.contentWindow;
                    doc = win.document.open();
                } catch (e) {
                    dom = document.domain;
                    iframe.src = "javascript:var d=document.open();d.domain='" + dom + "';void(0);";
                    win = iframe.contentWindow;
                    doc = win.document.open();
                }
                if (dom) {
                    doc._boomrl = function() {
                        this.domain = dom;
                        bootstrap();
                    };
                    doc.write("<body onload='document._boomrl();'>");
                } else {
                    win._boomrl = function() {
                        bootstrap();
                    };
                    if (win.addEventListener) {
                        win.addEventListener("load", win._boomrl, false);
                    } else if (win.attachEvent) {
                        win.attachEvent("onload", win._boomrl);
                    }
                }
                doc.close();
            }
            var link = document.createElement("link");
            if (link.relList &&
                typeof link.relList.supports === "function" &&
                link.relList.supports("preload") &&
                ("as" in link)) {
                window.BOOMR.snippetMethod = "p";
                link.href = window.BOOMR.url;
                link.rel = "preload";
                link.as = "script";
                link.addEventListener("load", promote);
                link.addEventListener("error", function() {
                    iframeLoader(true);
                });
                setTimeout(function() {
                    if (!promoted) {
                        iframeLoader(true);
                    }
                }, LOADER_TIMEOUT);
                BOOMR_lstart = new Date().getTime();
                parentNode.appendChild(link);
            } else {
                iframeLoader(false);
            }

            function boomerangSaveLoadTime(e) {
                window.BOOMR_onload = (e && e.timeStamp) || new Date().getTime();
            }
            if (window.addEventListener) {
                window.addEventListener("load", boomerangSaveLoadTime, false);
            } else if (window.attachEvent) {
                window.attachEvent("onload", boomerangSaveLoadTime);
            }
            if (document.addEventListener) {
                document.addEventListener("onBoomerangLoaded", function(e) {
                    e.detail.BOOMR.init({
                        ResourceTiming: {
                            enabled: true,
                            trackedResourceTypes: ["script", "img", "css"]
                        },
                    });
                    e.detail.BOOMR.t_end = new Date().getTime();
                });
            } else if (document.attachEvent) {
                document.attachEvent("onpropertychange", function(e) {
                    if (!e) e = event;
                    if (e.propertyName === "onBoomerangLoaded") {
                        e.detail.BOOMR.init({
                            ResourceTiming: {
                                enabled: true,
                                trackedResourceTypes: ["script", "img", "css"]
                            },
                        });
                        e.detail.BOOMR.t_end = new Date().getTime();
                    }
                });
            }
        })();
    </script> --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-body">

    {{-- Navbar --}}
    @include('layouts.partials.home.main.nav')
    {{-- Content --}}
    <div class="">
        @yield('content')
    </div>

    {{-- modal --}}
    {{-- login & regis --}}
    <div class="login_form_pc" id="login_form">
        <div class="content_login_form over-hidden">
            <div class="absolute btn_close_login">
                <a href="#close" title="Close (Esc)"><i class="ti-close"></i></a>
            </div>
            <div class="mn-mobile-content-tab tab-pane hidden-xs hidden-sm">
                @if (!Auth::user())
                    <div class="my-account-wrap">
                        <div class="login-form">
                            <div class="text-center icon_top"><span class="flaticon-user"></span></div>
                            <h3 class="text-center">Create an account to expedite future checkouts, track order history &
                                receive emails, discounts, & special offers</h3>
                            <form method="post" action="{{ route('login.post') }}" id="customer_login"
                                accept-charset="UTF-8" data-login-with-shop-sign-in="true"><input type="hidden"
                                    name="form_type" value="customer_login"><input type="hidden" name="utf8"
                                    value="✓">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <input type="email" class="form-control form-account" placeholder="Username*"
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-account" placeholder="Password*"
                                        name="password">
                                </div>
                                <div class="flex">
                                    <a href="#recover" id="RecoverPassword" class="btn-lostpwd space_bot_30">Lost your
                                        password?</a>
                                </div>
                                <div class="btn-button-group mg-top-30 mg-bottom-15">
                                    <button type="submit" class="ciloe-btn btn-login hover-white">LOGIN</button>
                                </div>
                            </form>
                        </div>
                        <div id="RecoverPasswordForm" class="recover account-element hidden">
                            <div class="cmt-title text-center">
                                <h3 class="recover_pw">Reset your password</h3>
                            </div>

                            <div class="page-content">
                                <p>We will send you an email to reset your password.</p>
                                <div class="form-login">
                                    <form method="post" action="/account/recover" accept-charset="UTF-8"><input
                                            type="hidden" name="form_type" value="recover_customer_password"><input
                                            type="hidden" name="utf8" value="✓">
                                        <div class="form-group">
                                            <label for="RecoverEmail">Email</label>
                                            <input type="email" class="form-control form-account" value=""
                                                name="email" id="RecoverEmail" class="input-full" autocorrect="off"
                                                autocapitalize="off">
                                        </div>
                                        <button class="ciloe-btn btn-login hover-white mgr-5">Submit</button>
                                        <button id="HideRecoverPasswordLink"
                                            class="ciloe-btn btn-login hover-white">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="spec"><span>Or</span></div>
                    <a href="#" class="login-link hidden">Back to login</a>
                    <a href="{{ route('register') }}">Back to register</a>
                @else
                <div class="my-account-wrap">
                    <div class="login-form">
                        <div class="text-center icon_top"><span class="flaticon-user"></span></div>
                        <h3 class="text-center">Thank you for using our service. If you would like to enjoy our full features, please log in again.</h3>
                    </div>
                    <div class="spec margin_bottom_20"><span>-</span></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="ciloe-btn btn-login  hover-white mgr-5">Logout</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.partials.home.main.footer')
    @include('layouts.partials.home.main.flashMessage')

    @if($errors->any())
    <div id="notification" class="flex absolute right-0 mb-6 bottom-6 p-4 mb-4 text-2xl text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="sr-only">Danger</span>
        <div>
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="font-medium">Ensure that these requirements are met:</span>
            <ul class="mt-1.5 list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var notificationContent = document.getElementById('notification');

                notificationContent.style.display = 'block';

                setTimeout(function () {
                    notificationContent.style.display = 'none';
                }, 4000);
        });
    </script>
    @endif
    @include('layouts.partials.home.main.script')
</body>
</html>
