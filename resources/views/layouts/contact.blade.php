@extends('layouts.master')
@section('title','Liên hệ')
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
                    <li><strong itemprop="title">{{ trans('master.contact') }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="margin-top-20 margin-bottom-40">
    <div class="container">
        <h1 class="title-head-login"><a href="#">{{ trans('master.contact') }}</a></h1>
        <div class="row">
            <div class="section_maps col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="box-maps">
                    <div class="iFrameMap">
                        <div class="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.872290271968!2d105.8071388499183!3d21.03779539277828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab145dccbea5%3A0x5db3c457d7e46fd1!2zNDQyIMSQ4buZaSBD4bqlbiwgQ-G7kW5nIFbhu4ssIEJhIMSQw6xuaCwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1512402595849" width="550" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="page-login page_cotact contact_main">
                    <h2 class="title-head-contact a-left"><span>{{ trans('master.detailInfo') }}</span></h2>
                    <div class="contact_">
                        <span class="f_title">{{ trans('master.address') }}: <span>{{ trans('master.myAddress') }}</span></span>
                        <span class="f_title">{{ trans('master.phone') }}: 
                        <a href="tel:1900 6750">{{ trans('master.myTelephone') }}</a>
                        </span>
                        <span class="f_title">{{trans('master.email') }}: <a href="#">{{ trans('master.myEmail') }}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
