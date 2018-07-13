@extends('layouts.master')
@section('title','Giỏ Hàng')
@section('content')
<section class="bread-crumb">
    <span class="crumb-border"></span>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home">
                        <a itemprop="url" href="/" ><span itemprop="title">{{ trans('master.home') }}</span></a>                        
                        <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                    </li>
                    <li><strong itemprop="title">{{ trans('master.cart') }}</strong></li>
                </ul>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="wrap_border col-lg-12">
            <span class="bordered"></span>
        </div>
    </div>
</div>
<section class="main-cart-page main-container col1-layout">
    <div class="main container hidden-xs">
        <h1 class="title-head-login"><a href="#">{{ trans('master.cart') }}</a></h1>
        <div class="col-main cart_desktop_page cart-page">
            <div class="cart page_cart cart_des_page hidden-xs-down">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pd-right cart_desktop ">
                    <div class="bg-scroll">
                        <div class="cart-thead">
                            <div class="text-left" style="width: 8%"><span>{{ trans('master.delete') }}</span></div>
                            <div class="a-center" style="width: 35%"><span>{{ trans('master.product') }}</span></div>
                            <div style="width: 20%" class="a-center"><span class="nobr">{{ trans('master.price') }}</span></div>
                            <div style="width: 14%" class="a-center">{{ trans('master.quantity') }}</div>
                            <div style="width: 20%" class="a-center">{{ trans('master.subtotal') }}</div>
                        </div>
                        <div class="cart-tbody">
                            @foreach($cart_items as $item)
                                <div class="item-cart ">
                                    <div class="remove_" style="width: 8%"><a class="button remove-item remove-item-cart" href="{{ route('removeFromCart', $item->rowId) }}"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                    <div class="content_" style="width: 15%"><a class="product-image" title="{{ $item->name }}" href="{{ route('food', $item->id) }}"><img alt="{{ $item->name }}" src="{{ $item->options->image }}" width="75" height="auto"></a></div>
                                    <div class="content_ content_s" style="width: 20%">
                                        <h3 class="product-name"> <a class="text2line" href="{{ route('food', $item->id) }}">{{ $item->name }}</a> </h3>
                                    </div>
                                    <div style="width: 20%" class="a-center"><span class="item-price"> <span class="price bold-price">{{ number_format($item->price) }}{{ trans('master.unit') }}</span></span></div>
                                    <div style="width: 14%" class="a-center">
                                        <form method="post" action="{{ route('updateCart', $item->rowId) }}">
                                            {{ csrf_field() }}
                                            <div class="input_qty_pr">
                                                <input class="reduced_pop items-count btn-minus" type="submit" value="–" name="desc">
                                                <input maxlength="12" min="1" class="input-text number-sidebar input_pop input_pop" name="quantity" size="4" value="{{ $item->qty }}" type="text" >
                                                <input class="increase_pop items-count btn-plus" type="submit" value="+" name="inc">
                                            </div>
                                        </form>
                                    </div>
                                    <div style="width: 20%" class="a-center"><span class="item-price cart-price"> <span class="price pink">{{ number_format($item->subtotal) }}{{ trans('master.unit') }}</span> </span></div>
                                </div>
                            @endforeach
                        </div>
                        <div class="btn_bottom">
                            <a href="{{ route('category.index') }}" title="{{ trans('master.shop') }}"><span>{{ trans('master.shop') }}</span></a>
                        </div>
                        <div class="btn_bottom">
                            <a href="{{ route('destroyCart') }}" title="{{ trans('master.destroyCart') }}"><span>{{ trans('master.destroyCart') }}</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 cart-collaterals cart_submit row">
                    <div class="totals">
                        <div class="totals">
                            <div class="inner">
                                <form action="{{ route('cart.store') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="total_price head-table-cart" id="shopping-cart-totals-table">
                                        <span>{{ trans('master.orderInfo') }}</span>
                                    </div>
                                    <div class="wrap_checkprice">
                                        <div class="li_table">
                                            <span class="li-left">{{ trans('master.total') }}:</span>
                                            <span class="li-right totals_price price">{{ $total }}{{ trans('master.unit') }}</span>
                                        </div>
                                        <div class="li_table">
                                            <span class="li-left">{{ trans('master.email') }}</span>
                                            <span class="li-right totals_price price pink">
                                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::check() ? $user->id : 0 }}">
                                                <input type="email" class="form-control " pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="{{ Auth::check() ? $user->email : '' }}" name="email" placeholder="{{ trans('master.email') }}" id="email" required>
                                            </span>
                                        </div>
                                        <div class="li_table">
                                            <span class="li-left">{{ trans('master.username') }}</span>
                                            <span class="li-right totals_price price pink">
                                                <input type="text" class="form-control " value="{{ Auth::check() ? $user->name : '' }}" name="name" placeholder="{{ trans('master.username') }}" id="name" required>
                                            </span>
                                        </div>
                                        <div class="li_table">
                                            <span class="li-left">{{ trans('master.address') }}</span>
                                            <span class="li-right totals_price price pink">
                                                <input type="text" class="form-control " value="{{ Auth::check() ? $user->address : '' }}" name="address" placeholder="{{ trans('master.address') }}" id="address" required>
                                            </span>
                                        </div>
                                        <div class="li_table">
                                            <span class="li-left">{{ trans('master.phone') }}</span>
                                            <span class="li-right totals_price price pink">
                                                <input type="text" class="form-control " value="{{ Auth::check() ? $user->phone : '' }}" name="phone" placeholder="{{ trans('master.phone') }}" id="phone" required>
                                            </span>
                                        </div>
                                        <div class="li_table">
                                            <span class="li-left">{{ trans('master.description') }}</span>
                                            <span class="li-right totals_price price pink">
                                                <input type="text" class="form-control " value="{{ old('description') }}" name="description" placeholder="{{ trans('master.description') }}" id="description">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="wrap_btn">
                                        <button class="button btn-proceed-checkout" title="{{ trans('master.confirmOrder') }}" type="submit"><span>{{ trans('master.confirmOrder') }}</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="contat_fone">
                            <a class="ctc" href="tel:0912775468">
                                <p>{{ trans('master.hotline') }}</p>
                                <span>{{ trans('master.myTelephone') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{ Html::script('js/check_email.js') }}
@endsection
