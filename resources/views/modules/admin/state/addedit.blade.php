@extends('admin::layouts.master')
@section('content')
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add State</h3>
            </div>
              @if(isset($state))
                {{ Form::model($state,
                array(
                'id'                => 'AddEditState',
                'class'             => 'FromSubmit form-horizontal',
                'data-redirect_url' => route('admin.states.index'),
                'url'               => route('admin.states.update', $encryptedId),
                'method'            => 'PUT'
                ))
                }}
              @else
                {{
                  Form::open([
                  'id'=>'AddEditState',
                  'class'=>'FromSubmit form-horizontal',
                  'url'=>route('admin.states.store'),
                  'data-redirect_url'=>route('admin.states.index'),
                  'name'=>'cms'

                  ])
                }}
              @endif
              <div class="box-body">
                <div class="form-group">
                  <label for="country" class="col-sm-2 control-label">Country<span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::select('country_id',[''=>'Select country']+ \App\Models\Country::getCountryDropDown(),null,['id'=>'',"class"=>"form-control"])
                  }}
                  </div>
                </div>
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
                  <a href="{{route('admin.states.index')}}" class="btn btn-danger">Cancel</a>
                </div>
              </div>
            {{ Form::close()}}
          </div>
	 </div>	
@endsection
@section('javascript')
 <script>
        var editor = CKEDITOR.replace( 'short_description', {
            
        });
        CKEDITOR.config.allowedContent = true;
    </script>
    <script>
        var editor = CKEDITOR.replace( 'long_description', {
            
        });
        CKEDITOR.config.allowedContent = true;
    </script>
<script type="text/javascript">
  $(document).ready(function(){
  
    $("#AddEditState").validate({
        rules: {
           name: { required: true }
        },
        messages:{
          name:{ required:'Name field is required'},
        },
        tooltip_options: {
           name: { placement: 'top' },
        }
    
    });
});
  </script>
@endsection