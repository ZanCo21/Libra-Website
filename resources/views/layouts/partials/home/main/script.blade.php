  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/fastclick.js?v=180948248748138531451552289293')}}" type="text/javascript">
  </script>

  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/jquery.currencies.min.js?v=130900459728287867761552289317')}}"
      type="text/javascript"></script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/timber.js?v=105042971690881028541579082505')}}" type="text/javascript">
  </script>
  <script></script>
  <script src="{{ asset('assets/home/ajax/libs/waypoints/2.0.3/waypoints.min.js')}}"></script>
  <script>
      jQuery(document).ready(function($) {
          $('.counte').counterUp({
              delay: 10,
              time: 2000
          });
      });
  </script>
  <script>
      jQuery(function() {
          jQuery('.swatch :radio').change(function() {
              var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
              var optionValue = jQuery(this).val();
              jQuery(this)
                  .closest('form')
                  .find('.single-option-selector')
                  .eq(optionIndex)
                  .val(optionValue)
                  .trigger('change');
          });
      });
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/handlebars.min.js?v=127319619962785791401552289301')}}" type="text/javascript">
  </script>

  <!-- /snippets/ajax-cart-template.liquid -->
  <script id="CartTemplate" type="text/template">
    
      <form action="/cart" method="post" novalidate class=" ajaxcart" style="height:100%">
      
          <div class="cart-list-heading">
                <span class="close-menu-mobile js-close"></span>
                <h3 class="cart-title">your cart</h3>
                <span class="minicart-number-items relative"><span class="absolute"></span></span>
            </div>
        <div class="cart-inside">
        <ul class="list">
          <li class="item-cart" data-line="">
            
              <div class="product-img-wrap">
                  <a href="">
                    <img src="" alt="" class="img-responsive">
                  </a>
              </div> 
              <!-- .product-mini__img -->
              <div class="product-details">
                  <div class="inner-left">
                    <div class="product-name"><a href="" tabindex="0"></a>
                          <span class="ajaxcart__product-meta"></span>
                              <span class="ajaxcart__product-meta"></span>
                        </div>
                    <div class="product-price"></div>
                    <div class="product-qtt">QTY :</div>
                 </div>
              </div>
              <a href="/cart/change?line=amp;quantity=0" class="btn-del"><i class="ti-close"></i></a>
              <!-- .product-mini__body -->
              <!-- .product-mini__button -->
            <!-- .product-mini -->
          </li>
        </ul>
        <div class="cart-bottom">
          <div class="cart-price">
                <span>Total</span>
                <span class="price-total"></span>
            </div>
            <div class="cart-button">
                <a href="/cart" class="ciloe-btn checkout">View cart</a>
                <a href="/checkout" class="ciloe-btn checkout">Check out</a>
            </div>
        </div>
        </div>
       </form>   
    </script>
  <script id="AjaxQty" type="text/template">
      <div class="ajaxcart__qty">
        <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--minus icon-fallback-text" data-id="" data-qty="">
          <span class="icon icon-minus" aria-hidden="true"></span>
          <span class="fallback-text">&minus;</span>
        </button>
        <input type="text" class="ajaxcart__qty-num" value="" min="0" data-id="" aria-label="quantity" pattern="[0-9]*">
        <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--plus icon-fallback-text" data-id="" data-qty="">
          <span class="icon icon-plus" aria-hidden="true"></span>
          <span class="fallback-text">+</span>
        </button>
      </div>
    </script>
  <script id="JsQty" type="text/template">
      <div class="e-quantity js-qty">
          <input type="text" class="qty input-text js-qty__num" value="1" min="1" data-id="" aria-label="quantity" pattern="[0-9]*" name="" id="">
          <button type="button" class="quantity-right-plus btn btn-number js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="" data-qty="">
              <i class="fa fa-caret-up"></i></a>
            </button>
            <button type="button" class="quantity-left-minus btn btn-number js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="" data-qty="">
              <i class="fa fa-caret-down"></i></a>
            </button>
      </div>
    </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/ajax-cart.js')}}" type="text/javascript">
  </script>
  <script>
      var ajaxCartConfig = {
          cartContainer: '.enj-minicart-ajax',
          addToCartSelector: '.enj-add-to-cart-btn',
          cartCountSelector: '.enj-cartcount',
          cartCostSelector: '#CartCost',
      };
      jQuery(function($) {
          ajaxCart.init(ajaxCartConfig);
      });

      jQuery('body').on('ajaxCart.afterCartLoad', function(evt, cart) {
          // Bind to 'ajaxCart.afterCartLoad' to run any javascript after the cart has loaded in the DOM
          /*   timber.RightDrawer.open(); */
      });
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/bootstrap.min.js?v=73724390286584561281552289287')}}" type="text/javascript">
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/slick.js?v=134789227280932036561552289333')}}" type="text/javascript"></script>
  {{-- <script src="{{ asset('assets/home/cdn/shop/t/9/assets/owl.carousel.min.js?v=75813715580695946121552289326"
      type="text/javascript"></script> --}}
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/jquery.fancybox.min.js?v=78522239389571045111552289317')}}"
      type="text/javascript"></script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/masonry.pkgd.min.js?v=159304155817357176911552289320')}}"
      type="text/javascript"></script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/instafeed.min.js?v=90032470946696484961552289314')}}" type="text/javascript">
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/countdown.js?v=174878216071923293231552289291')}}" type="text/javascript">
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/jquery.counterup.min.js?v=72741712870112733821552289317')}}"
      type="text/javascript"></script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/threesixty.min.js?v=28852475680982028401552289337')}}" type="text/javascript">
  </script>
  <!--  scroll  -->
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/TimelineLite.min.js?v=42048888694529575801552289283')}}"
      type="text/javascript"></script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/TweenMax.min.js?v=27540525881839043641552289283')}}" type="text/javascript">
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/jquery.superscrollorama.js?v=18040553548099191701552289318')}}"
      type="text/javascript"></script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/function-scroll.js?v=46778163406334545241552289296')}}" type="text/javascript">
  </script>
  <!--  endscroll  -->
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/main.js')}}" type="text/javascript"></script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/engo-plugins.js?v=5333408240286433941552289292')}}" type="text/javascript">
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/quickview.js?v=113209095033172657521552644784')}}" type="text/javascript">
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/collection.js?v=173766977713674313801552289359')}}" type="text/javascript">
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/engo-scripts.js?v=11610719864608057671552289359')}}" type="text/javascript">
  </script>
  <script src="{{ asset('assets/home/cdn/shop/t/9/assets/engo-autocomplate.js?v=28882077903315741191579141657')}}"
      type="text/javascript"></script>
  <div id="quick-view" class="hidden-label br-product-popup hidden">
      <div class="quickview-wrapper">
          <div class="quick-modal show">
              <div class="content" id="quickview-content">
                  <a href="javascript:void(0)" class=" close-window close-btn quickview-close"></a>
                  <div class="single-product-detail">
                      <div class="row">
                          <div class="col-md-6 col-sm-6">
                              <div class="product-media thumbnai-left">
                                  <div class="featured-image product-single-photos br-product__media br-product-slide-vertical-image pb-0"
                                      style="margin-bottom: 5px;"></div>
                                  <div class="more-views owl-carousel-play pt-5 ">
                                      <div class="owl-carousel" data-items="4" data-dots="false" data-lazyload="true"
                                          data-nav="false" data-autoheight="false"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-6">
                              <div class="single-flex">
                                  <div class="single-product-info product-info product-grid-v2 s-50 js-price-wrapper">
                                      <p class="product-cate"></p>
                                      <div class="product-rating">
                                          <span class="shopify-product-reviews-badge" data-id=""></span>
                                      </div>
                                      <h3 class="product-title"><a>&nbsp;</a></h3>
                                      <div class="details clearfix">
                                          <form action="/cart/add" method="post" class="variants CartContainer">
                                              <div class="product-price">
                                                  <span class="price f-24"></span>
                                                  <span class="price old compare-price mr-10"></span>
                                              </div>
                                              <p class="product-desc"></p>
                                              <select name='id' style="display:none;"
                                                  class="engoj-except-select2 product-single__variants">
                                              </select>
                                              <div class="single-product-button-group v2">
                                                  <div class="e-btn cart-qtt">
                                                      <div class="e-quantity">
                                                          <input type="text" name="quantity" value="1"
                                                              class="qty input-text product_quantity_number js-number">
                                                          <button
                                                              class='qtyminus quantity-left-minus btn btn-number js-minus '
                                                              data-field='quantity'><i
                                                                  class="fa fa-caret-down"></i></button>
                                                          <button
                                                              class='qtyplus quantity-right-plus btn btn-number js-plus'
                                                              data-field='quantity'><i
                                                                  class="fa fa-caret-up"></i></button>
                                                      </div>
                                                      <button type="button" class="btn-addToCart  btn-add-cart">Add To
                                                          Cart<p class="icon-bg icon-cart v2"></p></button>
                                                  </div>
                                                  <div class="total-price product-price">
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <style>
      .single-product-detail .single-product-info .action .quantity {
          float: initial;
      }
  </style>
  <script type="text/javascript">
      Shopify.doNotTriggerClickOnThumb = false;
  </script>
  <div class="quickview-product tshopify-popup"></div>
  <div class="loading tshopify-popup">
      <div class="overlay"></div>
      <div class="loader" title="0">
          <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px"
              viewbox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
              <path opacity="0.2" fill="#000"
                  d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
                                                   s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
                                                   c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z">
              </path>
              <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
                                     C22.32,8.481,24.301,9.057,26.013,10.047z">
                  <animatetransform attributetype="xml" attributename="transform" type="rotate" from="0 20 20"
                      to="360 20 20" dur="0.5s" repeatcount="indefinite"></animatetransform>
              </path>
          </svg>
      </div>
  </div>
  <div class="error-popup engo-popup engoc_hide_mobile">
      <div class="overlay"></div>
      <div class="popup-inner content">
          <div class="error-message"></div>
      </div>
  </div>
  <div class="product-popup engo-popup engoc_hide_mobile">
      <div class="overlay"></div>
      <div class="content box-shadow v2">
          <a href="javascript:void(0)" class="close-window fr">
              <i class="fa fa-close"></i>
          </a>
          <div class="mini-product-item row">
              <div class="col-md-3 col-sm-3 product-image f-left">
                  <img alt="img" src="{{ asset('assets/home/cdn/shop/t/9/assets/favicon.png?v=29885537522503330011552289293')}}"
                      style="max-width:120px; height:auto">
              </div>
              <div class="col-md-9 col-sm-9 f-left">
                  <div class="product-info-ver2 f-left">
                      <p class="product-name"></p>
                      <p class="success-message">Added to cart successfully!</p>

                  </div>
                  <div class="actions mt-24">
                      <button class="cart-btn btn-viewcart mr-10 continue-shopping"
                          onclick="javascript:void(0)">Continue shopping</button>
                      <button class="cart-btn e-checkout " onclick="window.location='/cart'">Go to cart</button>
                  </div>
              </div>
          </div>

      </div>
  </div>
  <script>
      $(document).on('click', '.overlay, .continue-shopping, .close-window', function() {
          $(".engo-popup").removeClass("active");
      });
  </script>
  <script>
      // (c) Copyright 2016 Caroline Schnapp. All Rights Reserved. Contact: mllegeorgesand@gmail.com
      // See https://docs.shopify.com/themes/customization/navigation/link-product-options-in-menus
      var Shopify = Shopify || {};
      Shopify.optionsMap = {};
      Shopify.updateOptionsInSelector = function(selectorIndex) {
          switch (selectorIndex) {
              case 0:
                  var key = 'root';
                  var selector = jQuery('.single-option-selector:eq(0)');
                  break;
              case 1:
                  var key = jQuery('.single-option-selector:eq(0)').val();
                  var selector = jQuery('.single-option-selector:eq(1)');
                  break;
              case 2:
                  var key = jQuery('.single-option-selector:eq(0)').val();
                  key += ' / ' + jQuery('.single-option-selector:eq(1)').val();
                  var selector = jQuery('.single-option-selector:eq(2)');
          }
          var initialValue = selector.val();
          selector.empty();
          var availableOptions = Shopify.optionsMap[key];
          for (var i = 0; i < availableOptions.length; i++) {
              var option = availableOptions[i];
              var newOption = jQuery('<option></option>').val(option).html(option);
              selector.append(newOption);
          }
          jQuery('.swatch[data-option-index="' + selectorIndex + '"] .swatch-element').each(function() {
              if (jQuery.inArray($(this).attr('data-value'), availableOptions) !== -1) {
                  $(this).removeClass('soldout').show().find(':radio').removeAttr('disabled', 'disabled')
                      .removeAttr('checked');
              } else {
                  $(this).addClass('soldout').hide().find(':radio').removeAttr('checked').attr('disabled',
                      'disabled');
              }
          });
          if (jQuery.inArray(initialValue, availableOptions) !== -1) {
              selector.val(initialValue);
          }
          selector.trigger('change');
      };
      Shopify.linkOptionSelectors = function(product) {
          // Building our mapping object.
          for (var i = 0; i < product.variants.length; i++) {
              var variant = product.variants[i];
              if (variant.available) {
                  // Gathering values for the 1st drop-down.
                  Shopify.optionsMap['root'] = Shopify.optionsMap['root'] || [];
                  Shopify.optionsMap['root'].push(variant.option1);
                  Shopify.optionsMap['root'] = Shopify.uniq(Shopify.optionsMap['root']);
                  // Gathering values for the 2nd drop-down.
                  if (product.options.length > 1) {
                      var key = variant.option1;
                      Shopify.optionsMap[key] = Shopify.optionsMap[key] || [];
                      Shopify.optionsMap[key].push(variant.option2);
                      Shopify.optionsMap[key] = Shopify.uniq(Shopify.optionsMap[key]);
                  }
                  // Gathering values for the 3rd drop-down.
                  if (product.options.length === 3) {
                      var key = variant.option1 + ' / ' + variant.option2;
                      Shopify.optionsMap[key] = Shopify.optionsMap[key] || [];
                      Shopify.optionsMap[key].push(variant.option3);
                      Shopify.optionsMap[key] = Shopify.uniq(Shopify.optionsMap[key]);
                  }
              }
          }
          // Update options right away.
          Shopify.updateOptionsInSelector(0);
          if (product.options.length > 1) Shopify.updateOptionsInSelector(1);
          if (product.options.length === 3) Shopify.updateOptionsInSelector(2);
          // When there is an update in the first dropdown.
          jQuery(".single-option-selector:eq(0)").change(function() {
              Shopify.updateOptionsInSelector(1);
              if (product.options.length === 3) Shopify.updateOptionsInSelector(2);
              return true;
          });
          // When there is an update in the second dropdown.
          jQuery(".single-option-selector:eq(1)").change(function() {
              if (product.options.length === 3) Shopify.updateOptionsInSelector(2);
              return true;
          });
      };
  </script>

    {{-- LazyLoad --}}
    <script src="{{ asset('assets/js/lazysizes.min.js') }}" async=""></script>