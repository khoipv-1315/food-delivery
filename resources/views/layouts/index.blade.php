@extends('layouts.master')
@section('title','Home Page')
@section('content')
<section class="awe-section-1">
    <div class="slide_index">
        {{-- slider --}}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="home-slider owl-carousel" data-dot="false" data-nav='true' data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>
                    <div class="item">
                        <a href="#" class="clearfix">
                        <img src="{{ asset('images/background.jpg') }}" alt="New Collection" style="height: 472px; width: 1286px;">
                        </a>	
                    </div>
                    <div class="item">
                        <a href="#" class="clearfix">
                        <img src="{{ asset('images/slider_1.jpg') }}" alt="New Collection">
                        </a>	
                    </div>
                </div>
            </div>
        </div>
        <span class="button_drop_down"><img src="{{ asset('images/button_goto.png')}}" alt="Đi tiếp"></span>
    </div>
</section>
<section class="awe-section-2">
    <section class="section_service_first">
        <div class="container">
            <div class="row">
                <div class="wrap_srv">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="content_wrap">
                            <div class="thumb">
                                <img src="{{ asset('images/send.png') }}" alt="Giao hàng 12/24">
                            </div>
                            <div class="content">
                                <p class="title_">Giao hàng 12/24</p>
                                <span class="descript">Những bữa sáng ngon lành để bắt đầu ngày mới</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="content_wrap">
                            <div class="thumb">
                                <img src="{{ asset('images/women.png') }}" alt="Đặt bàn trực tuyến">
                            </div>
                            <div class="content">
                                <p class="title_">Đặt món trực tuyến</p>
                                <span class="descript">Chúng tôi luôn sẵn sàng hỗ trợ bạn, liên hệ để được hỗ trợ</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="content_wrap">
                            <div class="thumb">
                                <img src="{{ asset('images/tag.png') }}" alt="Voucher giảm giá">
                            </div>
                            <div class="content">
                                <p class="title_">Giá rẻ bất ngờ</p>
                                <span class="descript">Thường xuyên giảm giá hợp lý dành cho mọi khách hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<section class="awe-section-3">
    <section id="gioithieu" class="section_info_site">
        <div class="container">
            <div class="row">
                <div class="wrap_if">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="modul left">
                            <div class="title_">
                                <span class="mini_title">Đến với</span>
                                <h2 class="large_title">Chúng tôi</h2>
                            </div>
                            <div class="des_">
                                <span>Bep Me Un luôn chào đón quý khách, phục vụ tận tình, món ăn giao tận nhà</span>
                            </div>
                            <span class="mr_view"><a class="button_more" href="{{ route('category.index') }}" title="Xem thêm">view more</a></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="modul right">
                            <div class="row">
                                <div class="padding col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="image_list left">
                                        <span><img src="{{ asset('images/banner_left_1.png') }}" alt="Utt"></span>
                                        <span><img src="{{ asset('images/banner_left_1.png') }}" alt="Utt"></span>
                                    </div>
                                </div>
                                <div class="padding col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="image_list right">
                                        <span><img src="{{ asset('images/banner_right_1.png') }}" alt="Utt"></span>
                                        <span><img src="{{ asset('images/banner_right_2.png') }}" alt="Utt"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<section class="awe-section-4">
    <section class="section_popular_product">
        <div class="wrap_img">
            <div class="container">
                <div class="row">
                    <div class="title_ ab">
                        <span class="mini_title">Món ngon</span>
                        <h2 class="large_title">Nổi bật</h2>
                    </div>
                    <div class="wrap_owl_popular col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #382013;">
                        <div class="owl_s o_position">
                            <div class="owl_main_popular owl-carousel owl-theme" data-dot="true" data-nav="false" data-lg-items="3" data-md-items="3" data-xs-items="1" data-sm-items="2" data-margin="0">
                                @foreach ($top_foods as $top_food)
                                    <div class="item popular_item">
                                        <div class="owl_item_product">
                                            <div class="product-box">
                                                <div class="product-thumbnail ">
                                                    <a class="image_link " href="{{ route('food', $top_food->id) }}" title="{{ $top_food->name }}">
                                                    <img src="{{ $top_food->image }}" alt="{{ $top_food->name }}" style="max-width: 360px; max-height: 270px; min-width: 360px; min-height: 270px;">
                                                    </a>
                                                    <div class="product-action-grid clearfix">
                                                        <form action="" method="post" class="variants form-nut-grid" enctype="multipart/form-data">
                                                            <div>
                                                                <a href="{{ route('food', $top_food->id) }}" class="button_wh_40 btn_view right-to quick-view"><i class="icon-magnifier-add icons"></i></a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="product-info a-left">
                                                    <h3 class="product-name"><a class="text1line" href="{{ route('food', $top_food->id) }}" title="{{ $top_food->name }}">{{ $top_food->name }}</a></h3>
                                                    <div class="des_product_item"><span class="text1line"> {{ str_limit($top_food->description, config('customer.product.index_limit')) }}
                                                        </span>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <span class="price product-price">{{ \App\Helpers\Helper::showPrice($top_food) }}{{ trans('master.unit') }}</span>
                                                        @if ($top_food->discountFood->id != config('customer.product.no_discount')
                                                                && $top_food->discountFood->end_date 
                                                                    >= \Illuminate\Support\Carbon::now())                                               
                                                            <span class="price product-price-old">{{ number_format($top_food->price) }}{{ trans('master.unit') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<section class="awe-section-5">
    <section class="section_menu_set">
        <div class="container">
            <div class="row">
                <div class="title_ rl">
                    <h2 class="large_title">Menu Chính</h2>
                </div>
            </div>
        </div>
        <div class="tab_link_module">
        <div class="tabs-container tab_border">
            <span class="hidden-md hidden-lg button_show_tab"><i class="fa fa-navicon"></i></span>
            <span class="hidden-md hidden-lg title_check_tabs"></span>
            <div class="clearfix">
                <ul class="ul_link link_tab_check_click container">
                    @foreach ($categories as $category)
                        <li class="li_tab">
                            <a href="#content-tabb{{ ++$loop->index }}" class="head-tabs head-tab{{ $loop->index }}" data-src=".head-tab{{ $loop->index }}">{{ $category->name }}</a>
                        </li>
                    @endforeach   
                </ul>
            </div>
        </div>
        <div class="tabs-content container">
        @foreach ($categories as $category)
            <div id="content-tabb{{ ++$loop->index }}" class="content-tab content-tab-proindex" style="display:none">
                <div class="clearfix wrap_item_list row">
                    @foreach ($category->foods as $food)
                    <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6">
                        <div class="wrp_item_small">
                            <div class="product-box product-list-small">
                                <div class="product-info a-left">
                                    <div class="info_left a-left">
                                        <h3 class="product-name"><a class="text1line" href="{{ route('food', $food->id) }}" title="{{ $food->name }}">{{ $food->name }}</a></h3>
                                        <div class="reviews-product-list-small hidden">
                                            <div class="bizweb-product-reviews-badge" data-id="7913086"></div>
                                        </div>
                                        <div class="des_product_item"><span class="text1line"> {{ str_limit($food->description, config('customer.product.index_limit')) }}</span></div>
                                    </div>
                                    <div class="info_right a-right">
                                        <div class="price-box clearfix">
                                            <span class="price product-price">{{ \App\Helpers\Helper::showPrice($food) }}{{ trans('master.unit') }}</span>
                                            @if ($food->discount_id != config('customer.product.no_discount'))
                                            
                                                <span class="price product-price-old">{{ number_format($food->price) }}{{ trans('master.unit') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 a-center">
                            <a href="{{ route('category.index') }}" title="Xem thêm món" class="view_more_cls">{{ trans('master.viewMore') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</section>
<section class="awe-section-7">
    <section class="section_guest_blog section_open_store">
        <div class="container">
            <div class="row">
                <div class="wrap_module_guest_blog">
                    <div class="col-magrin-bottom col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="wrap_modul_open" style="background-color: #20120a">
                            <div class="wrap_border">
                                <div class="title_open">
                                    <span class="mini_title">Thời gian</span>
                                    <p class="large_title">Mở cửa</p>
                                </div>
                                <div class="time_">
                                    <p>THỨ 2 - THỨ 7</p>
                                    <span>Từ 8:00 - 12:00 (Sáng)</span>
                                    <span>Từ 13:00 - 18:00 (Chiều)</span>
                                    <span>Từ 18:00 - 22:00 (Tối)</span>
                                </div>
                                <div class="time_">
                                    <p>Chủ nhật</p>
                                    <span>Từ 8:00 - 12:00 (Sáng)</span>
                                    <span>Từ 13:00 - 18:00 (Chiều)</span>
                                    <span>Từ 18:00 - 20:00 (Tối)</span>
                                </div>
                                <div class="phone_">
                                    <a title ="Liên hệ ngay" href="tel:01628083267">01628083267</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-margin col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="title_">
                            <h2 class="title_lagre"><a href="#" title="Tin tức nhà hàng">Tin tức quán</a></h2>
                        </div>
                        <div class="blog_">
                            <div class="wrap_blog">
                                <article class="blog_item_module">
                                    <div class="blog_item_thumbnail" onclick="location.href='https://Utt.bizwebvietnam.net/mach-ban-cach-chon-nuoc-cham-chuan-gu-cho-mon-nhat';">
                                        <div class="img1">
                                            <a href="#" title="Mách bạn cách chọn nước chấm chuẩn gu cho món Nhật">
                                            <img src="http://bizweb.dktcdn.net/thumb/large/100/244/304/articles/food.jpg?v=1502675599563" alt="Mách bạn cách chọn nước chấm chuẩn gu cho món Nhật">
                                            </a>
                                        </div>
                                    </div>
                                    <h3 class="blog-item-name"><a class="text1line" title="Mách bạn cách chọn nước chấm chuẩn gu cho món Nhật" href="#">Mách bạn cách chọn nước chấm chu...</a></h3>
                                    <span class="post-time">
                                    14/08/2017
                                    </span>
                                    <p class="blog-item-summary text3line"> Cũng giống như thói quen trong mỗi bữa ăn của người Việt, bát nước chấm cũng không thể nào thiếu trong ẩm thực Nhật Bản. Tuy nhiên, đa dạng hơn...</p>
                                    <div class="ft_blog">
                                        <a class="more_ a-left" href="#" title="Đọc tiếp Mách bạn cách chọn nước chấm chuẩn gu cho món Nhật">Đọc tiếp</a>
                                        <span class="postby_ a-right">Viết bởi: <span class="author">Đào Quý Thương</span></span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-margin col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="title_">
                            <h2 class="title_lagre"><a href="#" title="Tin tức video">Tin tức video</a></h2>
                        </div>
                        <div class="blog_">
                            <div class="wrap_blog blog_videos">
                                <article class="blog_item_module">
                                    <div class="blog_item_thumbnail" onclick="location.href='https://Utt.bizwebvietnam.net/thuyen-sushi-dep-mat-thu-hut-moi-anh-nhin-ngot-ngao-khi-thuong-thuc';">
                                        <div class="img1 _hasvideo">
                                            <span class="play_icon"><i class="fa fa-play"></i></span>
                                            <a href="#" title="Thuyền sushi đẹp mắt thu hút mọi ánh nhìn ngọt ngào khi thưởng thức">
                                            <img src="http://bizweb.dktcdn.net/thumb/large/100/244/304/articles/img-3384-tatami-700x400.jpg?v=1502674998133" alt="Thuyền sushi đẹp mắt thu hút mọi ánh nhìn ngọt ngào khi thưởng thức">
                                            </a>
                                        </div>
                                    </div>
                                    <h3 class="blog-item-name"><a class="text1line" title="Thuyền sushi đẹp mắt thu hút mọi ánh nhìn ngọt ngào khi thưởng thức" href="https://Utt.bizwebvietnam.net/thuyen-sushi-dep-mat-thu-hut-moi-anh-nhin-ngot-ngao-khi-thuong-thuc">Thuyền sushi đẹp mắt thu hút mọi ánh ...</a></h3>
                                    <span class="post-time">
                                    14/08/2017
                                    </span>
                                </article>
                                <article class="blog_item_module">
                                    <div class="blog_item_thumbnail" onclick="location.href='https://Utt.bizwebvietnam.net/thuyen-sushi-dep-mat-thu-hut-moi-anh-nhin-ngot-ngao-khi-thuong-thuc';">
                                        <div class="img1 _hasvideo">
                                            <span class="play_icon"><i class="fa fa-play"></i></span>
                                            <a href="#" title="Thuyền sushi đẹp mắt thu hút mọi ánh nhìn ngọt ngào khi thưởng thức">
                                            <img src="http://bizweb.dktcdn.net/thumb/large/100/244/304/articles/img-3384-tatami-700x400.jpg?v=1502674998133" alt="Thuyền sushi đẹp mắt thu hút mọi ánh nhìn ngọt ngào khi thưởng thức">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog_item_thumbnail" onclick="location.href='https://Utt.bizwebvietnam.net/thuyen-sushi-dep-mat-thu-hut-moi-anh-nhin-ngot-ngao-khi-thuong-thuc';">
                                        <div class="img1 _hasvideo">
                                            <span class="play_icon"><i class="fa fa-play"></i></span>
                                            <a href="#" title="Thuyền sushi đẹp mắt thu hút mọi ánh nhìn ngọt ngào khi thưởng thức">
                                            <img src="http://bizweb.dktcdn.net/thumb/large/100/244/304/articles/img-3384-tatami-700x400.jpg?v=1502674998133" alt="Thuyền sushi đẹp mắt thu hút mọi ánh nhìn ngọt ngào khi thưởng thức">
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<div class="bizweb-product-reviews-module"></div>
@endsection
