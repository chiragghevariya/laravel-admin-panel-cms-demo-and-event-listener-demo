@extends('admin::layouts.master')
@section('content')
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Area</h3>
            </div>
              @if(isset($area))
                {{ Form::model($area,
                array(
                'id'                => 'AddEditArea',
                'class'             => 'FromSubmit form-horizontal',
                'data-redirect_url' => route('admin.areas.index'),
                'url'               => route('admin.areas.update', $encryptedId),
                'method'            => 'PUT'
                ))
                }}
              @else
                {{
                  Form::open([
                  'id'=>'AddEditArea',
                  'class'=>'FromSubmit form-horizontal',
                  'url'=>route('admin.areas.store'),
                  'data-redirect_url'=>route('admin.areas.index'),
                  'name'=>'cms'

                  ])
                }}
              @endif
              <div class="box-body">
                <div class="form-group">
                  <label for="country" class="col-sm-2 control-label">Country<span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::select('country_id',[''=>'Select country']+ \App\Models\Country::getCountryDropDown(),null,['id'=>'country_id',"class"=>"form-control"])
                  }}
                  </div>
                </div>
                <div class="div_state"></div>
                <div class="div_city"></div>
                <div class="form-group box-footer">
                  <label for="exampleInputName" class="col-sm-2 control-label">Name <span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::text('name',null,['placeholder'=>'Enter Name','id'=>'name','class'=>'form-control'])}}
                  </div>
                </div>
                <div class="box-footer">
                  <div class="form-group">
                      <label for="subject" class="col-sm-2 control-label">Status <span class="has-error">*</span></label>
                    <div class="col-sm-5">
                      <div class="checkbox">
                        <label class="radio-inline">
                          {{ Form::radio('status',1,['id'=>'','class'=>''])}}
                          Active
                        </label>
                        <label class="radio-inline">
                          {{ Form::radio('status',0,['id'=>'','class'=>''])}}
                          InActive
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <div class="col-sm-12 col-sm-offset-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('admin.areas.index')}}" class="btn btn-danger">Cancel</a>
                </div>
              </div>
            {{ Form::close()}}
          </div>
	 </div>	
@endsection
@section('javascript')
  <script type="text/javascript">
    $(document).ready(function(){

      
      function GET_STATE_DIV(){

        var country_id = $("#country_id").val();

         @if(isset($area->state_id))
          var state_id = "{{$area->state_id}}";
          @else
          var state_id = "";
         @endif

        $.ajax({

          type:"POST",
          url:"{{route('admin.areas.get_state')}}",
          data:{"country_id":country_id,"_token": "{{ csrf_token() }}"},
          success:function(data){

            $(".div_state").html(data);
            $("#state_id option[value='"+state_id+"']").prop("selected",true);
            GET_CITY_DIV();
          }

        })

      }
      function GET_CITY_DIV(){

        var state_id = $("#state_id").val();

         @if(isset($area->city_id))
          var city_id = "{{$area->city_id}}";
          @else
          var city_id = "";
         @endif

        $.ajax({

          type:"POST",
          url:"{{route('admin.areas.get_city')}}",
          data:{"state_id":state_id,"_token": "{{ csrf_token() }}"},
          success:function(data){

            $(".div_city").html(data);
            $("#city_id option[value='"+city_id+"']").prop("selected",true);
          }

        })

      }
      $(document).on("change","#country_id",function(){

          GET_STATE_DIV();
      })
      $(document).on("change","#state_id",function(){

          GET_CITY_DIV();
      })
      GET_STATE_DIV();
    })
  </script>
@endsection