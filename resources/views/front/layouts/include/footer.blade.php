<?php 

   $socialMedia = \App\Models\SocialMedia::where('status',1)->get();
   $cmsPageParent = \App\Models\Cms::where('status',1)->where('display_on_footer',1)->get();
   $settinng = \App\Models\Setting::where('id',1)->first();
?>
    <footer>
        <div class="container footer-text">
            <div class="col-sm-4">
                @if(!$cmsPageParent->isEmpty())
                     <h4>Quick Link</h4>
                     <ul class="list-inline">
                    @foreach($cmsPageParent as $key=>$b)
                    <li>
                         <a href="{{route('cms.page',$b->slug)}}"> {{$b->name}}</a>
                    </li><br>
                    @endforeach
                    </ul>
                @endif
                
            </div>
            <div class="col-sm-4">
                <h4>Contact Us</h4>
                <ul class="list-unstyled">
                    @if($settinng->second_address !=NULL )
                    Address:<li>{{$settinng->second_address}}</li>
                    @endif
                    @if($settinng->mobile != NULL)
                    <li><i class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i><a href="tel:{{$settinng->mobile}}">Phone:{{$settinng->mobile}}</a></li>
                    @endif
                    @if($settinng->second_mobile != NULL)
                    <li><i class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i><a href="tel:{{$settinng->second_mobile}}">Second Phone:{{$settinng->second_mobile}}</a></li>
                    @endif
                    @if($settinng->email !=NULL)
                    <li><i class="livicon icon3" data-name="mail-alt" data-size="20" data-loop="true" data-c="#ccc" data-hc="#ccc"></i> Email:<span class="success">
                        <a href="mailto:{{$settinng->email}}">{{$settinng->email}}</a></span>
                    </li>
                    @endif
                    @if($settinng->second_email != NULL)
                    <li><i class="livicon icon3" data-name="mail-alt" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i>&nbsp;Second Email:<span class="success"><a href="mailto:{{$settinng->second_email}}">&nbsp;{{$settinng->second_email}}</a></span></li>
                    @endif
                </ul>
               
            </div>
            <div class="col-sm-4">
               
               @if(!$socialMedia->isEmpty())
                 <h4>Follow Us</h4>
                 <ul class="list-inline">
                @foreach($socialMedia as $key=>$b)
                <li>
                    <a href="#"> <i class="livicon" data-name="{{$b->title}}" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i>
                    </a>
                </li>
                @endforeach
                </ul>
                @endif
               
                
            </div>
        </div>
    </footer>
    <div class="copyright">
        <div class="container">
            <p>Copyright &copy; Demo site, {{date('Y')}}</p>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo FRONT_JS_PATH(); ?>/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_JS_PATH(); ?>/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_JS_PATH(); ?>/raphael.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_JS_PATH(); ?>/livicons-1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_JS_PATH(); ?>/josh_frontend.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_JS_PATH(); ?>//jquery.circliful.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_JS_PATH(); ?>/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_JS_PATH(); ?>/carousel.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_JS_PATH(); ?>/index.js"></script>
</body>

</html>