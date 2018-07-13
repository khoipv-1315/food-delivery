@extends('layouts.master')
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
                    <li><strong itemprop="title">{{ trans('master.home') }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <h1 class="title-head-login"><a href="#">{{ trans('master.login') }}</a></h1>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 ">
            <div class="page-login wrap_page row">
                <div class="col-right col-lg-12 col-md-12 col-sm-12 col-xs-12" id="login">
                    <div class="wrap_lg">
                        <h4 class="title-head title-head-login"><span>{{ trans('master.login') }}</span></h4>
                        <form accept-charset='UTF-8' action='{{ route('postLogin') }}' id='customer_login' method='post'>
                        {{ csrf_field() }}
                        <div class="form-signup clearfix">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <fieldset class="form-group">
                                        <input type="email" class="form-control form-control-lg" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="{{ old('email') }}" name="email" id="customer_email" placeholder="{{ trans('master.email') }}" required>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input type="password" class="form-control form-control-lg" value="" name="password" id="customer_password" placeholder="{{ trans('master.password') }}" required>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xs-12 text-xs-left" style="padding: 0">
                                <span class="recv-text"> <a id="#">{{ trans('master.forgetPassword') }}</a></span>
                                <button type="submit" value="{{ trans('master.login') }}" class="btn button-50 btn-50-blue">{{ trans('login') }}</button>
                                <span class="bf_af"><a href="{{ route('getRegister') }}">{{ trans('master.or') }} {{ trans('master.register') }}</a></span>
                                <div class="social_login">
                                    <div class="login-width-social">
                                        <div id="social_login_widget"></div>
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
</div>
@endsection
