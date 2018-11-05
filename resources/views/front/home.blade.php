@extends('front.layouts.master')
<?php /*
<link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH(); ?>/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH(); ?>/owl-carousel/owl.theme.css"> */ ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.css">
@section('content')
@if(isset($banner) && !$banner->isEmpty())
@php $last_key = $banner->reverse()->keys()->first(); @endphp
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:500px;">
  <!-- Indicators -->
    <ol class="carousel-indicators">
    @foreach($banner as $key=>$b)
      <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{ ($key == 0)?'active':'' }}"></li>
    @endforeach
    </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" style="height:500px;">
    @foreach($banner as $k=>$value)
    <div class="item {{ ($k == 0)?'active':'' }}">
      <img src="{{ $value->getBannerImageUrl() }}" alt="{{$value->name}}" style="width: 100%">
    </div>
    @endforeach
  </div>

  <!-- Left and right controls -->
    @foreach($banner as $kb=>$val)
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    @endforeach
</div>
@else
@php
  $settinng = \App\Models\Setting::where('id',1)->first();
@endphp
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:500px;">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
  <div class="carousel-inner" style="height:500px;">
    <div class="item active">
      <img src="{{ $settinng->getsettineBannerImg() }}" style="width: 100%">
    </div>
  </div>
</div>
@endif
   
   
@stop
@section('style')
@endsection
@section('javascript')
<script type="text/javascript">
</script>
@endsection