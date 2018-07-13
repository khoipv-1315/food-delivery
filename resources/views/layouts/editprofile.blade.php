@extends('layouts.master')
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
                    <li>
                        <a itemprop="url" href="{{ route('showProfile') }}" ><span itemprop="title">{{ trans('master.account') }}</span></a>
                        <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                    </li>
                    <li><strong itemprop="title">{{ trans('master.editAccount') }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="address margin-top-20">
    <div class="container page_address">
        <div class="row">
            <div class="col-xs-12 col-lg-12 adr_title">
                <h1 class="title-head">{{ trans('master.profile') }}<a class="f-right back_account" href="{{ route('showProfile') }}" alt=""><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;{{ trans('master.profilePage') }}</a></h1>
            </div>
            <div class="col-sm-12 col-lg-12 col-address">
                <div class="row">
                    <div id="add_address" class="col-md-12 form-list" style="margin-top:30px;">
                        <form accept-charset="UTF-8" name="Form" action="{{ route('editProfile') }}" id="customer_address" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="clearfix row">
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset class="form-group">
                                        <label>{{ trans('master.username') }}</label>                                       
                                        <input type="text" class="form-control req" name="name" placeholder="Nhập tên của bạn" value="{{ old('name') !== null ? old('name') : $user->name }}" required>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset class="form-group">
                                        <label>{{ trans('master.email') }}</label>                                       
                                        <input type="email" class="form-control" name="email"  placeholder="Nhập email của bạn" value="{{ old('email') !== null ? old('email') : $user->email }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset class="form-group">
                                        <label>{{ trans('master.address') }}</label>
                                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ của bạn" value="{{ old('address') !== null ? old('address') : $user->address }}">
                                        @if ($errors->has('address'))                                        
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset class="form-group">
                                        <label>{{ trans('master.phone')}}</label>
                                        <input type="text" class="form-control req" name="phone" placeholder="Nhập số điện thoại của bạn" value="{{ old('phone') !== null ? old('phone') : $user->phone }}">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset class="form-group">
                                        <label>{{ trans('master.avatar')}}</label>
                                        <input type="file" name="avatar" style="border: 0px; padding: 0px">
                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="form-group clearfix col-xs-12">
                                    <div class="col-sm-12" style="margin: 20px 15px;">
                                        <div class="row">                                       
                                            <button class="btn-bg-addresss btn btn-lg btn-primary" type="submit" id="click_accept"><span>{{ trans('master.edit') }}</span></button>
                                            <a href="{{ route('showProfile') }}">
                                                <button class="btn-bg-addresss btn btn-lg btn-dark btn-outline article-readmore" type="button">
                                                    {{ trans('master.back') }}
                                                </button> 
                                            </a>                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
