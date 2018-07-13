var Bizweb = Bizweb || {};
Bizweb.store = 'pasteur.bizwebvietnam.net';
Bizweb.id = '244304';
Bizweb.theme = {
    "id": 577104,
    "role": "main",
    "name": "Pasteur_011117"
};
Bizweb.template = 'index';
(function() {
    function asyncLoad() {
        var urls = ["//productreviews.bizwebapps.vn/assets/js/productreviews.min.js?store=pasteur.bizwebvietnam.net", "https://sociallogin.bizwebapps.vn/sociallogin/script.js?store=pasteur.bizwebvietnam.net"];
        for (var i = 0; i < urls.length; i++) {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = urls[i];
            s.src = urls[i];
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        }
    }
    window.attachEvent ? window.attachEvent('onload', asyncLoad) : window.addEventListener('load', asyncLoad, false);
})();

(function() {
    var log = document.createElement('script');
    log.type = 'text/javascript';
    log.async = true;
    log.src = 'http://stats.bizweb.vn/delivery/244304.js?lang=vi';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(log, s);
})();
(function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
        'http://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-MS77Z9');
Bizweb.updateCartFromForm = function(cart, cart_summary_id, cart_count_id) {
    if ((typeof cart_summary_id) === 'string') {
        var cart_summary = jQuery(cart_summary_id);
        if (cart_summary.length) {
            // Start from scratch.
            cart_summary.empty();
            // Pull it all out.        
            jQuery.each(cart, function(key, value) {
                if (key === 'items') {

                    var table = jQuery(cart_summary_id);
                    if (value.length) {
                        jQuery('<ul class="list-item-cart"></ul>').appendTo(table);
                        jQuery.each(value, function(i, item) {

                            var src = item.image;
                            if (src == null) {
                                src = "http://bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif";
                            }
                            var buttonQty = "";
                            if (item.quantity == '1') {
                                buttonQty = 'disabled';
                            } else {
                                buttonQty = '';
                            }
                            jQuery('<li class="item productid-' + item.variant_id + '"><div class="wrap_item"><a class="product-image" href="' + item.url + '" title="' + item.name + '">' +
                                '<img alt="' + item.name + '" src="' + src + '"width="' + '80' + '"\></a>' +
                                '<div class="detail-item"><div class="product-details"> <span class="quaty item_quanty_count">' + item.quantity + '</span><a href="javascript:;" data-id="' + item.variant_id + '" title="Xóa" class="remove-item-cart fa fa-times">&nbsp;</a>' +
                                '<p class="product-name"> <a class="text2line" href="' + item.url + '" title="' + item.name + '">' + item.name + '</a></p></div>' +
                                '<div class="product-details-bottom"><span class="price">' + Bizweb.formatMoney(item.price, "₫") + '</span>' +
                                '</div></div></li>').appendTo(table.children('.list-item-cart'));
                        });
                        jQuery('<div class="wrap_total"><div class="top-subtotal">Tổng cộng: <span class="price">' + Bizweb.formatMoney(cart.total_price, "₫") + '</span></div></div>').appendTo(table);
                        jQuery('<div class="wrap_button"><div class="actions"><a href="/checkout" class="btn btn-gray btn-checkout"><span>Tiến hành thanh toán</span></a></div></div>').appendTo(table);
                    } else {
                        jQuery('<div class="no-item"><p>Không có sản phẩm nào trong giỏ hàng.</p></div>').appendTo(table);

                    }
                }
            });
        }
    }
    updateCartDesc(cart);
    var numInput = document.querySelector('#cart-sidebar input.input-text');
    if (numInput != null) {
        // Listen for input event on numInput.
        numInput.addEventListener('input', function() {
            // Let's match only digits.
            var num = this.value.match(/^\d+$/);
            if (num == 0) {
                // If we have no match, value will be empty.
                this.value = 1;
            }
            if (num === null) {
                // If we have no match, value will be empty.
                this.value = "";
            }
        }, false)
    }
}

Bizweb.updateCartPageForm = function(cart, cart_summary_id, cart_count_id) {
    if ((typeof cart_summary_id) === 'string') {
        var cart_summary = jQuery(cart_summary_id);
        if (cart_summary.length) {
            // Start from scratch.
            cart_summary.empty();
            // Pull it all out.        
            jQuery.each(cart, function(key, value) {
                if (key === 'items') {
                    var table = jQuery(cart_summary_id);
                    if (value.length) {

                        var pageCart = '<div class="cart page_cart cart_des_page hidden-xs-down">' +
                            '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pd-right cart_desktop "><form action="/cart" method="post" novalidate><div class="bg-scroll"><div class="cart-thead">' +
                            '<div class="text-left" style="width: 8%"><span>Xoá<span></div><div class="text-left" style="width: 35%"><span>Sản phẩm<span></div><div style="width: 20%" class="a-center"><span class="nobr">Giá</span></div><div style="width: 14%" class="a-center">Số lượng</div><div style="width: 20%" class="a-center">Thành tiền</div></div>' +
                            '<div class="cart-tbody"></div>' +
                            '<div class="btn_bottom" onclick="window.location.href=\'/collections/all\'"><a href=\"/collections/all\" class="button btn-continue" title="Tiếp tục mua hàng"><span><span>Tiếp tục mua hàng</span></span></a></div>' +
                            '</div></form></div></div>';
                        var pageCartCheckout = '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 cart-collaterals cart_submit row"><div class="totals"><div class="totals"><div class="inner">' +
                            '<div class="total_price head-table-cart" id="shopping-cart-totals-table"><span>Thông tin thanh toán</span></div>' +
                            '<div class="wrap_checkprice"><div class="li_table shopping-cart-table-total"><span class="li-left">Giá sản phẩm</span><span class="li-right totals_price price pink">' + Bizweb.formatMoney(cart.total_price, "₫") + '</span></div>' +
                            '<div class="li_table"><span class="li-left">Vận chuyển</span><span class="li-right">Tính khi thanh toán</span></div>' +
                            '<div class="li_table shopping-cart-table-total"><span class="li-left li_text">Tổng tiền thanh toán</span><span class="li-right totals_price price">' + Bizweb.formatMoney(cart.total_price, "₫") + '</span></div>' +
                            '</div>' +
                            '<div class="wrap_btn"><a class="button btn-proceed-checkout" title="Thanh toán ngay" type="button" onclick="window.location.href=\'/checkout\'"><span>Thanh toán ngay</span></a></div>' +
                            '</div></div>' +
                            '<div class="contat_fone"><a class="ctc" href="tel:0912775468"><p>Hotline hỗ trợ (8h - 21h)</p><span>0912775468</span></a></div>' +
                            '</div></div>';
                        jQuery(pageCart).appendTo(table);
                        jQuery.each(value, function(i, item) {
                            var buttonQty = "";
                            if (item.quantity == '1') {
                                buttonQty = 'disabled';
                            } else {
                                buttonQty = '';
                            }
                            var link_img1 = Bizweb.resizeImage(item.image, 'compact');
                            if (link_img1 == "null" || link_img1 == '' || link_img1 == null) {
                                link_img1 = 'https://bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif';
                            }
                            var title_cut = item.title;
                            var pageCartItem = '<div class="item-cart productid-' + item.variant_id + '">' +
                                '<div class="remove_" style="width: 8%"><a class="button remove-item remove-item-cart" title="Xoá sản phẩm" href="javascript:;" data-id="' + item.variant_id + '"><i class="fa fa-times" aria-hidden="true"></i></a></div>' +
                                '<div class="content_" style="width: 15%" class="image border-right-none"><a class="product-image" title="' + item.name + '" href="' + item.url + '"><img width="75" height="auto" alt="' + item.name + '" src="' + link_img1 + '"></a></div>' +
                                '<div class="content_ content_s" style="width: 20%"><h3 class="product-name"> <a class="text2line" href="' + item.url + '">' + title_cut.slice(0, 40) + '</a> </h3><span class="variant-title">' + item.variant_title + '</span>' +
                                '</div><div style="width: 20%" class="a-center"><span class="item-price"> <span class="price bold-price">' + Bizweb.formatMoney(item.price, "₫") + '</span></span></div>' +
                                '<div style="width: 14%" class="a-center"><div class="input_qty_pr">' +
                                '<input class="variantID" type="hidden" name="variantId" value="' + item.variant_id + '">' +
                                '<button onClick="var result = document.getElementById(\'qtyItem' + item.variant_id + '\'); var qtyItem' + item.variant_id + ' = result.value; if( !isNaN( qtyItem' + item.variant_id + ' ) &amp;&amp; qtyItem' + item.variant_id + ' &gt; 1 ) result.value--;return false;" ' + buttonQty + ' class="reduced_pop items-count btn-minus" type="button">–</button>' +
                                '<input type="text" maxlength="12" min="0" class="input-text number-sidebar input_pop input_pop qtyItem' + item.variant_id + '" id="qtyItem' + item.variant_id + '" name="Lines" id="updates_' + item.variant_id + '" size="4" value="' + item.quantity + '">' +
                                '<button onClick="var result = document.getElementById(\'qtyItem' + item.variant_id + '\'); var qtyItem' + item.variant_id + ' = result.value; if( !isNaN( qtyItem' + item.variant_id + ' )) result.value++;return false;" class="increase_pop items-count btn-plus" type="button">+</button>' +
                                '</div></div>' +
                                '<div style="width: 20%" class="a-center"><span class="item-price cart-price"> <span class="price pink">' + Bizweb.formatMoney(item.price * item.quantity, "₫") + '</span> </span></div>' +
                                '</div>';
                            jQuery(pageCartItem).appendTo(table.find('.cart-tbody'));
                            if (item.variant_title == 'Default Title') {
                                $('.variant-title').hide();
                            }
                        });
                        jQuery(pageCartCheckout).appendTo(table.children('.cart'));
                    } else {
                        jQuery('<p>Không có sản phẩm nào trong giỏ hàng. Quay lại <a href="index.html">cửa hàng</a> để tiếp tục mua sắm.</p>').appendTo(table);
                        jQuery('.bg-cart-page').css('min-height', 'auto');
                    }
                }
            });
        }
    }
    updateCartDesc(cart);
    jQuery('#wait').hide();
    var numInput = document.querySelector('.item-cart input.input-text');
    if (numInput != null) {
        // Listen for input event on numInput.
        numInput.addEventListener('input', function() {
            // Let's match only digits.
            var num = this.value.match(/^\d+$/);
            if (num == 0) {
                // If we have no match, value will be empty.
                this.value = 1;
            }
            if (num === null) {
                // If we have no match, value will be empty.
                this.value = "";
            }
        }, false)
    }
}
Bizweb.updateCartPopupForm = function(cart, cart_summary_id, cart_count_id) {

    if ((typeof cart_summary_id) === 'string') {
        var cart_summary = jQuery(cart_summary_id);
        if (cart_summary.length) {
            // Start from scratch.
            cart_summary.empty();
            // Pull it all out.        
            jQuery.each(cart, function(key, value) {
                if (key === 'items') {
                    var table = jQuery(cart_summary_id);
                    if (value.length) {
                        jQuery.each(value, function(i, item) {
                            var src = item.image;
                            if (src == null) {
                                src = "http://bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif";
                            }
                            var buttonQty = "";
                            if (item.quantity == '1') {
                                buttonQty = 'disabled';
                            } else {
                                buttonQty = '';
                            }
                            var pageCartItem = '<div class="item-popup productid-' + item.variant_id + '">' +
                                '<div style="width: 46%;" class="text-left"><div class="item-image">' +
                                '<a class="product-image" href="' + item.url + '" title="' + item.name + '"><img alt="' + item.name + '" src="' + src + '"width="' + '90' + '"\></a>' +
                                '</div><div class="item-info"><p class="item-name"><a class="text2line" href="' + item.url + '" title="' + item.name + '">' + item.title + '</a></p>' +
                                '<span class="variant-title-popup">' + item.variant_title + '</span>' +
                                '<a href="javascript:;" class="remove-item-cart" title="Xóa" data-id="' + item.variant_id + '"><i class="fa fa-close"></i>Xoá sản phẩm</a>' +
                                '<p class="addpass" style="color:#fff;margin:0px;">' + item.variant_id + '</p></div></div>' +
                                '<div style="width: 18%;" class="text-center"><div class="item-price"><span class="price">' + Bizweb.formatMoney(item.price, "₫") + '</span>' +
                                '</div></div><div style="width: 18%;" class="text-center"><div class="qty_thuongdq"><input class="variantID" type="hidden" name="variantId" value="' + item.variant_id + '">' +
                                '<button onClick="var result = document.getElementById(\'qtyItem' + item.variant_id + '\'); var qtyItem' + item.variant_id + ' = result.value; if( !isNaN( qtyItem' + item.variant_id + ' ) &amp;&amp; qtyItem' + item.variant_id + ' &gt; 1 ) result.value--;return false;" ' + buttonQty + ' class="num1 reduced items-count btn-minus" type="button"><i class="fa fa-minus"></i></button>' +
                                '<input type="text" maxlength="12" min="0" class="input-text number-sidebar qtyItem' + item.variant_id + '" id="qtyItem' + item.variant_id + '" name="Lines" id="updates_' + item.variant_id + '" size="4" value="' + item.quantity + '">' +
                                '<button onClick="var result = document.getElementById(\'qtyItem' + item.variant_id + '\'); var qtyItem' + item.variant_id + ' = result.value; if( !isNaN( qtyItem' + item.variant_id + ' )) result.value++;return false;" class="num2 increase items-count btn-plus" type="button"><i class="fa fa-plus"></i></button></div></div>' +
                                '<div style="width: 18%;" class="text-center"><span class="cart-price"> <span class="price">' + Bizweb.formatMoney(item.price * item.quantity, "₫") + '</span> </span></div>' +
                                '</div>';
                            jQuery(pageCartItem).appendTo(table);
                            if (item.variant_title == 'Default Title') {
                                $('.variant-title-popup').hide();
                            }
                            $('.link_product').text();
                        });
                    }
                }
            });
        }
    }
    jQuery('.total-price').html(Bizweb.formatMoney(cart.total_price, "₫"));
    updateCartDesc(cart);
}
Bizweb.updateCartPageFormMobile = function(cart, cart_summary_id, cart_count_id) {
    if ((typeof cart_summary_id) === 'string') {
        var cart_summary = jQuery(cart_summary_id);
        if (cart_summary.length) {
            // Start from scratch.
            cart_summary.empty();
            // Pull it all out.        
            jQuery.each(cart, function(key, value) {
                if (key === 'items') {

                    var table = jQuery(cart_summary_id);
                    if (value.length) {
                        jQuery('<div class="cart_page_mobile content-product-list"></div>').appendTo(table);
                        jQuery.each(value, function(i, item) {
                            if (item.image != null) {
                                var src = Bizweb.resizeImage(item.image, 'small');
                            } else {
                                var src = "https://bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif";
                            }
                            jQuery('<div class="item-product item productid-' + item.variant_id + ' "><div class="item-product-cart-mobile"><a href="' + item.url + '">	<a class="product-images1" href="' + item.url + '"  title="' + item.name + '"><img width="80" height="150" alt="" src="' + src + '" alt="' + item.name + '"></a></a></div>' +
                                '<div class="title-product-cart-mobile"><h3><a class="text2line" href="' + item.url + '" title="' + item.name + '">' + item.name + '</a></h3><p>Giá: <span>' + Bizweb.formatMoney(item.price, "₫") + '</span></p></div>' +
                                '<div class="select-item-qty-mobile"><div class="txt_center">' +
                                '<input class="variantID" type="hidden" name="variantId" value="' + item.variant_id + '"><button onClick="var result = document.getElementById(\'qtyMobile' + item.variant_id + '\'); var qtyMobile' + item.variant_id + ' = result.value; if( !isNaN( qtyMobile' + item.variant_id + ' ) &amp;&amp; qtyMobile' + item.variant_id + ' &gt; 0 ) result.value--;return false;" class="reduced items-count btn-minus" type="button">–</button><input type="text" maxlength="12" min="0" class="input-text number-sidebar qtyMobile' + item.variant_id + '" id="qtyMobile' + item.variant_id + '" name="Lines" id="updates_' + item.variant_id + '" size="4" value="' + item.quantity + '"><button onClick="var result = document.getElementById(\'qtyMobile' + item.variant_id + '\'); var qtyMobile' + item.variant_id + ' = result.value; if( !isNaN( qtyMobile' + item.variant_id + ' )) result.value++;return false;" class="increase items-count btn-plus" type="button">+</button></div>' +
                                '<a class="button remove-item remove-item-cart" href="javascript:;" data-id="' + item.variant_id + '">Xoá</a></div>').appendTo(table.children('.content-product-list'));

                        });

                        jQuery('<div class="header-cart-price" style=""><div class="title-cart a-center"><span class="total_mobile a-center">Tổng tiền: <span class=" totals_price_mobile">' + Bizweb.formatMoney(cart.total_price, "₫") + '</span><span></div>' +
                            '<div class="checkout"><button class="btn-proceed-checkout-mobile" title="Thanh toán ngay" type="button" onclick="window.location.href=\'/checkout\'">' +
                            '<span>Thanh toán ngay</span></button>' +
                            '<button class="btn btn-white contin" title="Tiếp tục mua hàng" type="button" onclick="window.location.href=\'/collections/all\'"><span>Tiếp tục mua hàng</span></button>' +
                            '</div></div>').appendTo(table);
                    }

                }
            });
        }
    }
    updateCartDesc(cart);
}



function updateCartDesc(data) {
    var $cartPrice = Bizweb.formatMoney(data.total_price, "₫"),
        $cartMobile = $('#header .cart-mobile .quantity-product'),
        $cartDesktop = $('.count_item_pr'),
        $cartDesktopList = $('.cart-counter-list'),
        $cartPopup = $('.cart-popup-count');

    switch (data.item_count) {
        case 0:
            $cartMobile.text('0');
            $cartDesktop.text('0');
            $cartDesktopList.text('0');
            $cartPopup.text('0');

            break;
        case 1:
            $cartMobile.text('1');
            $cartDesktop.text('1');
            $cartDesktopList.text('1');
            $cartPopup.text('1');

            break;
        default:
            $cartMobile.text(data.item_count);
            $cartDesktop.text(data.item_count);
            $cartDesktopList.text(data.item_count);
            $cartPopup.text(data.item_count);

            break;
    }
    $('.top-cart-content .top-subtotal .price, aside.sidebar .block-cart .subtotal .price, .popup-total .total-price').html($cartPrice);
    $('.popup-total .total-price').html($cartPrice);
    $('.shopping-cart-table-total .totals_price').html($cartPrice);
    $('.header-cart-price .totals_price_mobile').html($cartPrice);
    $('.cartCount').html(data.item_count);
}

Bizweb.onCartUpdate = function(cart) {
    Bizweb.updateCartFromForm(cart, '.mini-products-list');
    Bizweb.updateCartPopupForm(cart, '#popup-cart-desktop .tbody-popup');

};
Bizweb.onCartUpdateClick = function(cart, variantId) {
    jQuery.each(cart, function(key, value) {
        if (key === 'items') {
            jQuery.each(value, function(i, item) {
                if (item.variant_id == variantId) {
                    $('.productid-' + variantId).find('.cart-price span.price').html(Bizweb.formatMoney(item.price * item.quantity, "₫"));
                    $('.productid-' + variantId).find('.items-count').prop("disabled", false);
                    $('.productid-' + variantId).find('.number-sidebar').prop("disabled", false);
                    $('.productid-' + variantId + ' .number-sidebar').val(item.quantity);
                    $('.productid-' + variantId + ' .item_quanty_count').text(item.quantity);
                    if (item.quantity == '1') {
                        $('.productid-' + variantId).find('.items-count.btn-minus').prop("disabled", true);
                    }
                }
            });
        }
    });
    updateCartDesc(cart);
}
Bizweb.onCartRemoveClick = function(cart, variantId) {
    jQuery.each(cart, function(key, value) {
        if (key === 'items') {
            jQuery.each(value, function(i, item) {
                if (item.variant_id == variantId) {
                    $('.productid-' + variantId).remove();
                }
            });
        }
    });
    updateCartDesc(cart);
}
$(window).ready(function() {
    $.ajax({
        type: 'GET',
        url: '/cart.js',
        async: false,
        cache: false,
        dataType: 'json',
        success: function(cart) {
            Bizweb.updateCartFromForm(cart, '.mini-products-list');
            Bizweb.updateCartPopupForm(cart, '#popup-cart-desktop .tbody-popup');

        }
    });
});
Bizweb.doNotTriggerClickOnThumb = false;

function changeImageQuickView(img, selector) {
    var src = $(img).attr("src");
    src = src.replace("_compact", "");
    $(selector).attr("src", src);
}

function validate(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}
var selectCallbackQuickView = function(variant, selector) {
    $('#quick-view-product form').show();
    var productItem = jQuery('.quick-view-product .product-item'),
        addToCart = productItem.find('.button_cart_buy_enable'),
        productPrice = productItem.find('.price'),
        comparePrice = productItem.find('.old-price'),
        status = productItem.find('.soluong'),
        totalPrice = productItem.find('.total-price span');
    if (variant && variant.available) {

        var form = jQuery('#' + selector.domIdPrefix).closest('form');
        for (var i = 0, length = variant.options.length; i < length; i++) {
            var radioButton = form.find('.swatch[data-option-index="' + i + '"] :radio[value="' + variant.options[i] + '"]');
            if (radioButton.size()) {
                radioButton.get(0).checked = true;
            }
        }

        addToCart.removeClass('disabled').removeAttr('disabled');
        $(addToCart).text("Thêm vào giỏ hàng");
        status.text('Còn hàng');
        if (variant.price < 1) {
            $("#quick-view-product .price").html('Liên hệ');
            $("#quick-view-product del, #quick-view-product .quantity_wanted_p").hide();
            $("#quick-view-product .prices .old-price").hide();
            addToCart.addClass('disabled').attr('disabled', 'disabled');
            $(addToCart).text("Hết hàng");
        } else {
            productPrice.html(Bizweb.formatMoney(variant.price, "₫"));
            if (variant.compare_at_price > variant.price) {
                comparePrice.html(Bizweb.formatMoney(variant.compare_at_price, "₫")).show();
                productPrice.addClass('on-sale');
            } else {
                comparePrice.hide();
                productPrice.removeClass('on-sale');
            }

            $(".quantity_wanted_p").show();


        }



        updatePricingQuickView();

        /*begin variant image*/
        if (variant && variant.featured_image) {

            var originalImage = $("#product-featured-image-quickview");
            var newImage = variant.featured_image;
            var element = originalImage[0];
            Bizweb.Image.switchImage(newImage, element, function(newImageSizedSrc, newImage, element) {
                $('#thumblist_quickview img').each(function() {
                    var parentThumbImg = $(this).parent();
                    var productImage = $(this).parent().data("image");
                    if (newImageSizedSrc.includes(productImage)) {
                        $(this).parent().trigger('click');
                        return false;
                    }
                });

            });
            $('#product-featured-image-quickview').attr('src', variant.featured_image.src);
        }
    } else {
        addToCart.addClass('disabled').attr('disabled', 'disabled');
        $(addToCart).text("Hết hàng");
        status.text('Hết hàng');
        $(".quantity_wanted_p").show();
        if (variant) {
            if (variant.price < 1) {

                $("#quick-view-product .price").html('Liên hệ');
                $("#quick-view-product del").hide();
                $("#quick-view-product .quantity_wanted_p").hide();
                $("#quick-view-product .prices .old-price").hide();

                comparePrice.hide();
                productPrice.removeClass('on-sale');
                addToCart.addClass('disabled').attr('disabled', 'disabled');
                $(addToCart).text("Hết hàng");
            } else {
                if (variant.compare_at_price > variant.price) {
                    comparePrice.html(Bizweb.formatMoney(variant.compare_at_price, "₫")).show();
                    productPrice.addClass('on-sale');
                } else {
                    comparePrice.hide();
                    productPrice.removeClass('on-sale');
                    $("#quick-view-product .prices .old-price").html('');
                    $(addToCart).text("Hết hàng");
                }
                $("#quick-view-product .price").html(Bizweb.formatMoney(variant.price, "₫"));
                $("#quick-view-product del ").hide();
                $("#quick-view-product .prices .old-price").show();

                addToCart.addClass('disabled').attr('disabled', 'disabled');
                $(addToCart).text("Hết hàng");
            }
        } else {
            $("#quick-view-product .price").html('Liên hệ');
            $("#quick-view-product del").hide();
            $("#quick-view-product .quantity_wanted_p").hide();
            $("#quick-view-product .prices .old-price").hide();
            comparePrice.hide();
            productPrice.removeClass('on-sale');
            addToCart.addClass('disabled').attr('disabled', 'disabled');
            $(addToCart).text("Hết hàng");
        }
    }
    /*begin variant image*/
    if (variant && variant.featured_image) {

        var originalImage = $("#product-featured-image-quickview");
        var newImage = variant.featured_image;
        var element = originalImage[0];
        Bizweb.Image.switchImage(newImage, element, function(newImageSizedSrc, newImage, element) {
            $('#thumblist_quickview img').each(function() {
                var parentThumbImg = $(this).parent();
                var productImage = $(this).parent().data("image");
                if (newImageSizedSrc.includes(productImage)) {
                    $(this).parent().trigger('click');
                    return false;
                }
            });

        });
        $('#product-featured-image-quickview').attr('src', variant.featured_image.src);
    }
};
$(document).ready(function($) {
    awe_backtotop();
    awe_owl();
    awe_category();
    awe_menumobile();
});
$(window).on("load resize", function(e) {
    setTimeout(function() {
        awe_resizeimage();
        getHeight();
    }, 1000);
    setTimeout(function() {
        getHeight();
    }, 3000);
    setTimeout(function() {
        getHeight();
    }, 4000);
    setTimeout(function() {
        getHeight();
    }, 5000);
});
$(document).on('click', '.overlay, .close-popup, .btn-continue, .fancybox-close', function() {
    awe_hidePopup('.awe-popup');
    setTimeout(function() {
        $('.loading').removeClass('loaded-content');
    }, 500);
    return false;
})

function awe_resizeimage() {
    $('.product-box .product-thumbnail a img').each(function() {
        var t1 = (this.naturalHeight / this.naturalWidth);
        var t2 = ($(this).parent().height() / $(this).parent().width());
        if (t1 <= t2) {
            $(this).addClass('bethua');
        }
        var m1 = $(this).height();
        var m2 = $(this).parent().height();
        if (m1 <= m2) {
            $(this).css('padding-top', (m2 - m1) / 2 + 'px');
        }
    })
}
window.awe_resizeimage = awe_resizeimage;

function callbackW() {
    iWishCheck();
    iWishCheckInCollection();
    $(".iWishAdd").click(function() {
        var iWishvId = iWish$(this).parents('form').find("[name='id']").val();
        if (typeof iWishvId === 'undefined') {
            iWishvId = iWish$(this).parents('form').find("[name='variantId']").val();
        };
        var iWishpId = iWish$(this).attr('data-product');
        if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
            iWishvId = iWish$(this).attr('data-variant');
        }
        if (typeof iWishvId === 'undefined' || typeof iWishpId === 'undefined') {
            return false;
        }
        if (iwish_cid == 0) {
            iWishGotoStoreLogin();
        } else {
            var postObj = {
                actionx: 'add',
                cust: iwish_cid,
                pid: iWishpId,
                vid: iWishvId
            };
            iWish$.post(iWishLink, postObj, function(data) {
                if (iWishFindAndGetVal('#iwish_post_result', data) == undefined) return;
                var result = (iWishFindAndGetVal('#iwish_post_result', data).toString().toLowerCase() === 'true');
                var redirect = parseInt(iWishFindAndGetVal('#iwish_post_redirect', data), 10);
                if (result) {
                    if (Bizweb.template == "product") {
                        iWish$('.iWishAdd').addClass('iWishHidden'), iWish$('.iWishAdded').removeClass('iWishHidden');
                        if (redirect == 2) {
                            iWishSubmit(iWishLink, {
                                cust: iwish_cid
                            });
                        }
                    } else if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
                        iWish$.each(iWish$('.iWishAdd'), function() {
                            var _item = $(this);
                            if (_item.attr('data-variant') == iWishvId) {
                                _item.addClass('iWishHidden'), _item.parent().find('.iWishAdded').removeClass('iWishHidden');
                            }
                        });
                    }
                }
            }, 'html');
        }
        return false;
    });
    $(".iWishAdded").click(function() {
        var iWishvId = iWish$(this).parents('form').find("[name='id']").val();
        if (typeof iWishvId === 'undefined') {
            iWishvId = iWish$(this).parents('form').find("[name='variantId']").val();
        };
        var iWishpId = iWish$(this).attr('data-product');
        if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
            iWishvId = iWish$(this).attr('data-variant');
        }
        if (typeof iWishvId === 'undefined' || typeof iWishpId === 'undefined') {
            return false;
        }
        if (iwish_cid == 0) {
            iWishGotoStoreLogin();
        } else {
            var postObj = {
                actionx: 'remove',
                cust: iwish_cid,
                pid: iWishpId,
                vid: iWishvId
            };
            iWish$.post(iWishLink, postObj, function(data) {
                if (iWishFindAndGetVal('#iwish_post_result', data) == undefined) return;
                var result = (iWishFindAndGetVal('#iwish_post_result', data).toString().toLowerCase() === 'true');
                var redirect = parseInt(iWishFindAndGetVal('#iwish_post_redirect', data), 10);
                if (result) {
                    if (Bizweb.template == "product") {
                        iWish$('.iWishAdd').removeClass('iWishHidden'), iWish$('.iWishAdded').addClass('iWishHidden');
                    } else if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
                        iWish$.each(iWish$('.iWishAdd'), function() {
                            var _item = $(this);
                            if (_item.attr('data-variant') == iWishvId) {
                                _item.removeClass('iWishHidden'), _item.parent().find('.iWishAdded').addClass('iWishHidden');
                            }
                        });
                    }
                }
            }, 'html');
        }
        return false;
    });

}
window.callbackW = callbackW;

function awe_currency(str) {
    str = str.replace('$', '');
    str = str.replace('.00', '');
    str = str.replace('.', 'xxx');
    str = str.replace(',', '.');
    str = str.replace('xxx', ',');
    return str;
}
window.awe_currency = awe_currency;



/*UPdate OfficeWorld*/
$(window).bind('load resize scroll', function() {
    var wDH = $(window).height();
    var heightSetmenu = $('.list_menu, .wrap_page .col-right').height();
    $('.ul_content_right_1, .ul_content_right_2, .wrap_page .col-left').css('min-height', heightSetmenu);
});
/*Check so nho hon 1*/
function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
}

function isNumeric(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}


function getHeight(eh) {
    var wDH = $(window).height();
    var heightSetmenu = $('.wrap_page .col-right').height();
    $('.wrap_page .col-left').css('min-height', heightSetmenu);
}



$(document).ready(function() {

    var wDW = $(window).width();
    /*Footer*/
    if (wDW > 767) {
        $('.toggle-mn').show();

    } else {
        $('.footer-widget > .cliked').click(function() {
            $(this).next('ul').slideToggle("fast");
            $(this).next('div').slideToggle("fast");
        });
    }
    if (wDW < 991) {
        $(".filter-group li span label").click(function() {
            $('.dqdt-sidebar').removeClass('openf');
            $('.open-filters').removeClass('openf');
            $('.opacity_filter').removeClass('opacity_filter_true');
        });
        $('.opacity_filter').click(function(e) {
            $('.dqdt-sidebar').removeClass('openf');
            $('.open-filters').removeClass('openf');
            $('.opacity_filter').removeClass('opacity_filter_true');
        });
    }

    if (wDW > 992 && wDW < 1199) {
        $('.li_text').text('Tá»•ng tiá»n');
    } else {
        $('.li_text').text('Tá»•ng tiá»n thanh toÃ¡n');
    }



    /*Click tab danh muc*/
    var $this = $('.tab_link_module');
    $this.find('.head-tabs').first().addClass('active');
    $this.find('.content-tab').first().show();
    $this.find('.head-tabs').on('click', function() {
        if (!$(this).hasClass('active')) {
            $this.find('.head-tabs').removeClass('active');
            var $src_tab = $(this).attr("data-src");
            $this.find($src_tab).addClass("active");
            $this.find(".content-tab").hide();
            var $selected_tab = $(this).attr("href");
            $this.find($selected_tab).show();
        }
        return false;
    })
    $(".tab_link_module .button_show_tab").click(function() {
        $('.link_tab_check_click').slideToggle('down');
    });
    if (wDW < 992) {
        var title_first = $('.link_tab_check_click li:first-child >a').text();
        $('.title_check_tabs').text(title_first);
        $this.find('.head-tabs').on('click', function() {
            $('.link_tab_check_click').slideToggle('up');
            var title_tabs = $(this).text();
            $('.title_check_tabs').text(title_tabs);
        })
    }




    /*Chá»n setmenu Äáº·t hÃ ng*/

    $(".input_group .set_click").click(function() {
        $('.ul_set').slideToggle('down');
    });
    $(".input_group .ul_set > li").click(function() {
        var text = $(this).text();
        $(".input_group .set_click").attr('value', text).attr('placeholder', text);
        $('.ul_set').slideToggle('up');
    });

});

$(".button_drop_down").click(function() {
    $('html, body').animate({
        scrollTop: $("#gioithieu").offset().top
    }, 2000);
});




/*Show hide Recoverpass*/
$('.recv-text #rcv-pass').click(function() {
    $('.recover').slideToggle('500');
});


/*Show searchbar*/
$('.header_search').on('hover, mouseover', function() {
    $('.st-default-search-input').focus();
});
$('.showsearchfromtop').click(function(event) {
    $('.searchfromtop').slideToggle("fast");
    $('.login_and_register').hide();
});
$('.hidesearchfromtop').click(function(event) {
    $('.searchfromtop').slideToggle("up");
});

var wDH = $(window).height();
if (wDH < 1199) {
    $('.use_ico_register').click(function() {
        $('.login_and_register').slideToggle("fast");
        $('.searchfromtop').hide();
    });
}

/*Repcomment*/

$(".reply").click(function() {
    $(this).closest('div').find('.form-comment-input').focus();
});


/*End*/

/*Open filter*/
$('.open-filters').click(function(e) {
    e.stopPropagation();
    $(this).toggleClass('openf');
    $('.opacity_filter').toggleClass('opacity_filter_true');
    $('.dqdt-sidebar').toggleClass('openf');
});

/*Menu mobile*/
$('.menu-bar').click(function(e) {
    e.stopPropagation();
    $('.menu_mobile').toggleClass('open_sidebar_menu');
    $('.opacity_menu').toggleClass('open_opacity');
});
$('.opacity_menu').click(function(e) {
    $('.menu_mobile').removeClass('open_sidebar_menu');
    $('.opacity_menu').removeClass('open_opacity');
});
$('.ct-mobile li .ti-plus').click(function() {
    $(this).closest('li').find('> .sub-menu').slideToggle("fast");
    $(this).closest('i').toggleClass('show_open hide_close');
    return false;
});

function validate(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

/*Double click go to link menu*/

$('.ul_menu li:has(ul)').doubleTapToGo();




/********************************************************
# SHOW NOITICE
********************************************************/
function awe_showNoitice(selector) {
    $(selector).animate({
        right: '0'
    }, 500);
    setTimeout(function() {
        $(selector).animate({
            right: '-300px'
        }, 500);
    }, 3500);
}
window.awe_showNoitice = awe_showNoitice;

/********************************************************
# SHOW LOADING
********************************************************/
function awe_showLoading(selector) {
    var loading = $('.loader').html();
    $(selector).addClass("loading").append(loading);
}
window.awe_showLoading = awe_showLoading;

/********************************************************
# HIDE LOADING
********************************************************/
function awe_hideLoading(selector) {
    $(selector).removeClass("loading");
    $(selector + ' .loading-icon').remove();
}
window.awe_hideLoading = awe_hideLoading;

/********************************************************
# SHOW POPUP
********************************************************/
function awe_showPopup(selector) {
    $(selector).addClass('active');
}
window.awe_showPopup = awe_showPopup;

/********************************************************
# HIDE POPUP
********************************************************/
function awe_hidePopup(selector) {
    $(selector).removeClass('active');
}
window.awe_hidePopup = awe_hidePopup;

/********************************************************
# CONVERT VIETNAMESE
********************************************************/
function awe_convertVietnamese(str) {
    str = str.toLowerCase();
    str = str.replace(/Ã |Ã¡|áº¡|áº£|Ã£|Ã¢|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g, "a");
    str = str.replace(/Ã¨|Ã©|áº¹|áº»|áº½|Ãª|á»|áº¿|á»‡|á»ƒ|á»…/g, "e");
    str = str.replace(/Ã¬|Ã­|á»‹|á»‰|Ä©/g, "i");
    str = str.replace(/Ã²|Ã³|á»|á»|Ãµ|Ã´|á»“|á»‘|á»™|á»•|á»—|Æ¡|á»|á»›|á»£|á»Ÿ|á»¡/g, "o");
    str = str.replace(/Ã¹|Ãº|á»¥|á»§|Å©|Æ°|á»«|á»©|á»±|á»­|á»¯/g, "u");
    str = str.replace(/á»³|Ã½|á»µ|á»·|á»¹/g, "y");
    str = str.replace(/Ä‘/g, "d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
    str = str.replace(/-+-/g, "-");
    str = str.replace(/^\-+|\-+$/g, "");
    return str;
}
window.awe_convertVietnamese = awe_convertVietnamese;

/********************************************************
# RESIDE IMAGE PRODUCT BOX
********************************************************/
function awe_resizeimage() {

}
window.awe_resizeimage = awe_resizeimage;

/********************************************************
# SIDEBAR CATEOGRY
********************************************************/
function awe_category() {
    $('.nav-category .fa-angle-down').click(function(e) {
        $(this).parent().toggleClass('active');
    });
}
window.awe_category = awe_category;

/********************************************************
# MENU MOBILE
********************************************************/
function awe_menumobile() {
    $('.menu-bar').click(function(e) {
        e.preventDefault();
        $('#nav').toggleClass('open');
    });
    $('#nav .fa').click(function(e) {
        e.preventDefault();
        $(this).parent().parent().toggleClass('open');
    });
}
window.awe_menumobile = awe_menumobile;

/********************************************************
# ACCORDION
********************************************************/
function awe_accordion() {
    $('.accordion .nav-link').click(function(e) {
        e.preventDefault;
        $(this).parent().toggleClass('active');
    })
}
window.awe_accordion = awe_accordion;

/********************************************************
# OWL CAROUSEL
********************************************************/
function awe_owl() {
    $('.owl-carousel:not(.not-dqowl)').each(function() {
        var xs_item = $(this).attr('data-xs-items');
        var md_item = $(this).attr('data-md-items');
        var lg_item = $(this).attr('data-lg-items');
        var sm_item = $(this).attr('data-sm-items');
        var margin = $(this).attr('data-margin');
        var dot = $(this).attr('data-dot');
        var nav = $(this).attr('data-nav');
        var play = $(this).attr('data-play');
        var loop = $(this).attr('data-loop');
        if (typeof margin !== typeof undefined && margin !== false) {} else {
            margin = 30;
        }
        if (typeof xs_item !== typeof undefined && xs_item !== false) {} else {
            xs_item = 1;
        }
        if (typeof sm_item !== typeof undefined && sm_item !== false) {

        } else {
            sm_item = 3;
        }
        if (typeof md_item !== typeof undefined && md_item !== false) {} else {
            md_item = 3;
        }
        if (typeof lg_item !== typeof undefined && lg_item !== false) {} else {
            lg_item = 3;
        }
        if (typeof dot !== typeof undefined && dot !== true) {
            dot = true;
        } else {
            dot = false;
        }
        $(this).owlCarousel({
            loop: loop,
            margin: Number(margin),
            responsiveClass: true,
            dots: dot,
            nav: nav,
            autoplay: play,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: Number(xs_item)
                },
                600: {
                    items: Number(sm_item)
                },
                1000: {
                    items: Number(md_item)
                },
                1200: {
                    items: Number(lg_item)
                }
            }
        })
    })
}
window.awe_owl = awe_owl;




/********************************************************
# BACKTOTOP
********************************************************/
function awe_backtotop() {
    /* Back to top */
    if ($('#back-to-top').length) {
        var scrollTrigger = 200, // px
            backToTop = function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function() {
            backToTop();
        });
        $('#back-to-top').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
}
window.awe_backtotop = awe_backtotop;

/********************************************************
# TAB
********************************************************/
/********************************************************
# Tab
********************************************************/
$(".e-tabs:not(.not-dqtab)").each(function() {
    $(this).find('.tabs-title li:first-child').addClass('current');
    $(this).find('.tab-content').first().addClass('current');

    $(this).find('.tabs-title li').click(function() {
        var tab_id = $(this).attr('data-tab');

        var url = $(this).attr('data-url');
        $(this).closest('.e-tabs').find('.tab-viewall').attr('href', url);

        $(this).closest('.e-tabs').find('.tabs-title li').removeClass('current');
        $(this).closest('.e-tabs').find('.tab-content').removeClass('current');

        $(this).addClass('current');
        $(this).closest('.e-tabs').find("#" + tab_id).addClass('current');
    });
});
/*Check so nho hon 1*/
function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
}

function isNumeric(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

/********************************************************
# DROPDOWN
********************************************************/
$('.dropdown-toggle').click(function() {
    $(this).parent().toggleClass('open');
});
$('.btn-close').click(function() {
    $(this).parents('.dropdown').toggleClass('open');
});
$('body').click(function(event) {
    if (!$(event.target).closest('.dropdown').length) {
        $('.dropdown').removeClass('open');
    };
});
