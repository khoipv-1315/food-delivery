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
                    <li><strong itemprop="title">{{ trans('master.404') }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-404">
                <h1 class="title-section-page">{{ trans('master.404Error') }}</h1>
                <p>{{ trans('master.404ErrorContent') }}</p>
                <a href="/" class="btn btn-style btn-lg btn-dark">{{ trans('master.redirect') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
