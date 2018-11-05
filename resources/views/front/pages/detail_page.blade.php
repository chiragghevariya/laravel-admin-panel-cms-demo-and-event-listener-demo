@extends('front.layouts.master')
@section('content')
   <div class="breadcum">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('home')}}"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="#">{{$page->name}}</a>
                </li>
            </ol>
            <div class="pull-right">
                <i class="livicon icon3" data-name="users" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> {{$page->name}}
            </div>
        </div>
    </div>
   	 <div class="container">
        <!-- Slider Section Start -->
        <div class="row">
            <!-- Left Heading Section Start -->
                <h2><label>{{$page->name}}</label></h2>
            <div class="col-md-12 col-sm-12">
            	@if($page->short_description !=NULL)
            	{!!html_entity_decode($page->short_description)!!}
            	@endif
            	@if($page->long_description !=NULL)
            	{!!html_entity_decode($page->long_description)!!}
            	@endif
            </div>
           
            <!-- //Slider End -->
        </div>
        <!-- //Slider Section End -->
        <!-- Services Section Start -->
      
        <!-- // Services Section End -->
        <!-- Our Team Section Start -->
      
        <!-- //Our Team Section End -->
    </div>
@stop
@section('style')
@endsection
@section('javascript')
<script type="text/javascript">
</script>
@endsection