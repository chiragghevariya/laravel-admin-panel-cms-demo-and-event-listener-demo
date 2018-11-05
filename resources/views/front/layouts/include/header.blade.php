@php 
    $settinng = \App\Models\Setting::where('id',1)->first();
    $socialMedia = \App\Models\SocialMedia::where('status',1)->get();
    $cmsPageParent = \App\Models\Cms::where('status',1)->whereNull('parent_id')->where('display_on_header',1)->get();
@endphp
<header>
    <div class="icon-section">
        <div class="container">
            <ul class="list-inline">
                @if(!$socialMedia->isEmpty())
                    @foreach($socialMedia as $key=>$b)
                    <li>
                        <a href="#"> <i class="livicon" data-name="{{$b->title}}" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    @endforeach
                @endif
                <li class="pull-right">
                    <ul class="list-inline icon-position">
                        <li>
                            <a href="mailto:{{$settinng->email}}"><i class="livicon" data-name="mail" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                            <label class="hidden-xs"><a href="mailto:" class="text-white">{{$settinng->email}}</a></label>
                        </li>
                        <li>
                            <a href="tel:{{$settinng->mobile}}"><i class="livicon" data-name="phone" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                            <label class="hidden-xs"><a href="tel:" class="text-white">{{ $settinng->mobile }}</a></label>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-default container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                <span><a href="#"> <i class="livicon" data-name="responsive-menu" data-size="25" data-loop="true" data-c="#757b87" data-hc="#ccc"></i>
                </a></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{$settinng->getSettingImageUrl()}}" width="70" height="70" class="logo_position" style="border-radius: 50px;border: solid 1px #ccc">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{(last(request()->segments()) == '')?'active':''}}"><a href="{{route('home')}}"> Home</a>
                </li>
                @if(!$cmsPageParent->isEmpty())
                    @foreach($cmsPageParent as $key=>$b)
                        @php $submenu = \App\Models\Cms::where('status',1)->where('parent_id',$b->id)->where('display_on_header',1)->get(); @endphp
                        @if(!$submenu->isEmpty())
                            <li class="dropdown {{(last(request()->segments()) == $b->slug)?'active':''}}"><a href="{{ route('cms.page',$b->slug) }}" class="dropdown-toggle" > {{$b->name}}</a>
                                @foreach($submenu as $s=>$val)
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{route('cms.page',$val->slug)}}">{{ $val->name }}</a>
                                        </li>
                                    </ul>
                                @endforeach
                        @else
                            <li class="{{(last(request()->segments()) == $b->slug)?'active':''}}"><a href="{{ route('cms.page',$b->slug) }}" class="dropdown-toggle"> {{$b->name}}</a>
                        @endif

                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </nav>
</header>
