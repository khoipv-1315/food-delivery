@extends('layouts.master')
@section('title', 'Top Food Page')
@section('content')
<section class="bread-crumb">
    <span class="crumb-border"></span>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home">
                        <a itemprop="url" href="{{ route('index') }}" ><span itemprop="title">{{ trans('master.home') }}</span></a>						
                        <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                    </li>
                    <li><strong ><span itemprop="title"> {{ trans('master.allProduct') }}</span></strong></li>
                </ul>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
            </div>
        </div>
    </div>
</section>
<div class="container margin-bottom-15">
    <div class="wrp_border_collection">
        <div class="row">
            <section class="main_container collection collection_container col-lg-12 col-md-12 col-sm-12">
                <div class="title_page_cls">
                    <h1 class="title-head-page hidden-xs title_page_cls margin-top-0">
                        {{ trans('master.allProduct') }}
                    </h1>
                    <div class="text-sm-left count_text">	
                        <span class="count_cls ">({{ trans('master.count') }} <span class="ttt">{{ $count }}</span> {{ trans('master.product') }})</span>
                    </div>
                </div>
                <div class="category-products products">
                    <div class="sortPagiBar">
                        <div class="srt">
                            <div class="wr_sort col-sm-12 col-xs-12">
                                <div class="text-sm-right">
                                    <div class="sortPagiBar text-sm-right">
                                        <div id="sort-by">
                                            <label class="left hidden-xs"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="products-view products-view-grid collection_reponsive">
                        <div class="row">
                        	@foreach ($paginate as $food)
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 product-grid-col" id="food-box">
                                    <div class="product-box grid_cls">
                                        <div class="product-thumbnail">
                                            <a class="image_link " href="#" title="{{ $food->name }}">
                                            <img src="{{ $food->image }}" alt="{{ $food->name }}" style="max-height: 220px;">
                                            </a>
                                            <div class="product-action-grid clearfix">
                                                <form action="{{ route('addToCart', $food->id) }}" method="post" class="variants form-nut-grid" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div>
                                                        <a title="xem nhanh" href="{{ route('food', $food->id) }}"  class="button_wh_40 btn_view right-to quick-view"><i class="fa fa-search-plus"></i></a>
                                                        <button class="button_wh_40 btn-cart add_to_cart" title="{{ trans('master.addToCart') }}">
                                                        <span><i class="fa fa-cart-plus"></i></span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-info a-left">
                                            <h3 class="product-name"><a class="text1line" href="{{ route('food', $food->id) }}" title="{{ $food->name }}">{{ $food->name }}</a></h3>
                                            <div class="des_product_item">
                                            	<span class="text1line"> 
                                            		{{ str_limit($food->description, 100) }}
                                                </span>
                                            </div>
                                            <div class="price-box clearfix">
                                                <span class="price product-price">{{ \App\Helpers\Helper::showPrice($food) }}{{ trans('master.unit') }}</span>
                                                @if ($food->discountFood->id != config('customer.product.no_discount')
                                                        && $food->discountFood->end_date 
                                                            >= \Illuminate\Support\Carbon::now())                                              
                                                    <span class="price product-price-old">{{ number_format($food->price) }}{{ trans('master.unit') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        {!! $paginate->links() !!}
                    </section>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
