@extends('layouts.master')
@section('title', $food->name)
@section('content')
<section class="bread-crumb">
    <span class="crumb-border"></span>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb">
                    <li class="home">
                        <a itemprop="url" href="/" ><span itemprop="title">{{ trans('master.home') }}</span></a>                     
                        <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                    </li>
                    <li>
                        <a itemprop="url" href="{{ route('category.show', $food->category->id) }}"><span itemprop="title">{{ $food->category->name }}</span></a>                     
                        <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                    </li>
                    <li><strong><span itemprop="title">{{ $food->name }}</span></strong>
                    <li>
                </ul>
                @if (session()->has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="product margin-top-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 details-product">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" id="add-to-cart-form" action="{{ route('addToCart', $food->id) }}" method="post" class="form-inline">
                        {{ csrf_field() }}
                        <div class="product-detail-left product-images col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col_large_default col-lg-12 col-md-12 col-sm-12 col-xs-12 large-image">
                                    <a  href="#" class="large_image_url checkurl" data-rel="prettyPhoto[product-gallery]">
                                    <img id="img_01" class="img-responsive " alt="{{ $food->name }}" src="{{ $food->image }}"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 details-pro">
                            <h1 class="title-product" itemprop="name">{{ $food->name }}</h1>
                            <div class="price-box">
                                <div class="special-price">
                                    <span class="price product-price" >{{ \App\Helpers\Helper::showPrice($food) }}{{ trans('master.unit') }}</span>
                                    @if ($food->discount_id != config('customer.product.no_discount'))
                                        <span class="old-price"><del class="price product-price-old sale" style="display: inline;">{{ number_format($food->price) }}{{ trans('master.unit') }}</del> </span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-summary product_description margin-bottom-10">
                                <div class="rte description text3line">
                                    {{ $food->description }}
                                </div>
                            </div>
                            <div class="form-product col-lg-10 col-md-10 col-sm-12">
                                <div class="form-group form_button_details ">
                                    <div class="custom input_number_product custom-btn-number form-control">                                    
                                        <a class="btn_num num_1 button button_qty" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;" type="button">-</a>
                                        <input type="text" id="qtym" name="quantity" value="1" min="1" onkeyup="valid(this,'numbers')" onkeypress='validate(event)' class="form-control prd_quantity">
                                        <a class="btn_num num_2 button button_qty" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;" type="button">+</a>                                    
                                    </div>
                                    <button type="submit" class="btn btn-lg  btn-cart button_cart_buy_enable btn_buy add_to_cart" title="{{ trans('master.addToCart') }}">
                                    <i class="fa fa-shopping-basket hidden"></i>&nbsp;&nbsp;<span>{{ trans('master.addToCart') }}</span>
                                    </button>                                   
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ trans('master.review') }}</h4>
                            </div>
                            <form action="{{ route('review.store') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $food->id }}" name="food_id">
                                <div class="modal-body">
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rating" value="10" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4half" name="rating" value="9" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                        <input type="radio"  id="star4" name="rating" value="8" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3half" name="rating" value="7" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="6" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2half" name="rating" value="5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="4" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1half" name="rating" value="3" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="2" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        <input type="radio" id="starhalf" name="rating" value="1" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                    </fieldset>
                                    <div class="bpr-form-review-body">
                                        <textarea maxlength="1500" id="review_body" name="content" rows="5" placeholder="{{ trans('master.content' )}}"></textarea>
                                        <span class="bpr-form-message-error"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">{{ trans('master.send') }}</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('master.close') }}</button>                           
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-lg-12 margin-top-50 margin-bottom-10">
                        <div class="product-tab e-tabs not-dqtab">
                            <span class="border-dashed-tab"></span>
                            <ul class="tabs tabs-title clearfix">
                                <li class="tab-link" data-tab="tab-1">
                                    <h3><span>{{ trans('master.home') }} </span></h3>
                                </li>
                                <li class="tab-link" data-tab="tab-2" id="tab-review">
                                    <h3><span>{{ trans('master.review') }}</span></h3>
                                </li>
                            </ul>
                            <div id="tab-1" class="tab-content">
                                <div class="rte">
                                    <p>{{ $food->description }}</p>
                                    <p style="text-align: center;"><img data-thumb="large" original-height="600" original-width="800" src="{{ $food->image }}" /></p>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-content tab-review-c">
                                <div class="rte">
                                    <div id="bizweb-product-reviews" class="bizweb-product-reviews">
                                        <div>
                                            <div id="bizweb-product-reviews-sub">
                                                <div id="bizweb-product-reviews-summary" class="bizweb-product-reviews-summary">
                                                    <div itemscope="" itemtype="http://schema.org/Product">
                                                        <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="bpr-summary">
                                                            <span class="bpr-summary-average">{{ $reviews->count() }}</span>
                                                            <span> {{ trans('master.review') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (Auth::check())
                                                    <span class="product-reviews-summary-actions">
                                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="btnnewreview" style="margin-top: 0px;">{{ trans('master.review') }}</button>
                                                    </span>
                                                @else
                                                    <span class="product-reviews-summary-actions">
                                                        <div>
                                                            {{ trans('master.loginToReview')}}
                                                        </div>
                                                    </span>
                                                @endif
                                                @foreach ($reviews as $review)
                                                <div id="bpr-list" class="bizweb-product-reviews-list">
                                                    <div id="bizweb-review-11869" class="bizweb-review" itemscope="" itemtype="http://data-vocabulary.org/Review">
                                                        <div class="bizweb-review-header">
                                                            <div>
                                                                <div class="bizweb-review-header-img" style="padding: 0px !important"><img src="{{ $review->user->avatar }}" class="img-circle" style="width: 35px; height: 34px; padding: 0px !important;"></div>
                                                            </div>
                                                            <div>
                                                                <span class="bizweb-review-header-byline">{{ $review->user->email }}</span>
                                                                <div class="rating">
                                                                    @for ($i = 10; $i > $review->rate; $i--)
                                                                    @if ($i % 2 == 0) 
                                                                    <input type="radio" value="{{ $i }}" disabled/><label class="full" title="{{ $i }} stars"></label>
                                                                    @else
                                                                    <input type="radio" value="{{ $i }}" disabled/><label class="half" title="{{ $i }} stars"></label>
                                                                    @endif
                                                                    @endfor
                                                                    <input type="radio" value="{{ $review->rate }}" checked disabled /><label class="{{ $review->rate % 2 == 0 ? 'full' : 'half' }}" title="{{ $i }} stars"></label>
                                                                    @for ($i = $review->rate-1; $i > 0; $i--) 
                                                                    @if ($i % 2 == 0) 
                                                                    <input type="radio" value="{{ $i }}" disabled/><label class="full" title="{{ $i }} stars"></label>
                                                                    @else
                                                                    <input type="radio" value="{{ $i }}" disabled/><label class="half" title="{{ $i }} stars"></label>
                                                                    @endif
                                                                    @endfor
                                                                </div>
                                                                <span class="bizweb-review-header-time">   {{ $review->created_at }}</span>
                                                            </div>
                                                            @if ($review->user == Auth::user())
                                                            <div class="bizweb-review-reportreview btn-edit" data-id="{{ $review->id }}">
                                                                <i aria-hidden="true" class="fa fa-edit"></i>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="bizweb-review-content">
                                                            <p style="padding-left: 40px;" class="bizweb-review-content-body">{{ $review->content }}</p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{ Html::script('js/food_detail.js') }}
{{ Html::style('css/star.css') }}
@endsection
