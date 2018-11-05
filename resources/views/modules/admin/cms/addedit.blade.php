@extends('admin::layouts.master')
@section('content')
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Cms</h3>
            </div>
              @if(isset($cms))
                {{ Form::model($cms,
                array(
                'id'                => 'AddEditCms',
                'class'             => 'FromSubmit form-horizontal',
                'data-redirect_url' => route('admin.cms.index'),
                'url'               => route('admin.cms.update', $encryptedId),
                'method'            => 'PUT'
                ))
                }}
              @else
                {{
                  Form::open([
                  'id'=>'AddEditCms',
                  'class'=>'FromSubmit form-horizontal',
                  'url'=>route('admin.cms.store'),
                  'data-redirect_url'=>route('admin.cms.index'),
                  'name'=>'cms'

                  ])
                }}
              @endif
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Parent Title <span class="has-error"></span></label>
                  <div class="col-sm-5">
                    {{ Form::select('parent_id',[''=>'Select parent category']+ \App\Models\Cms::getCmsDropDown(),null,['id'=>'',"class"=>"form-control"])
                    }}
                  </div>
                </div>
                <div class="form-group box-footer">
                  <label for="" class="col-sm-2 control-label">Module Title<span class="has-error"></span></label>
                  <div class="col-sm-5">
                    {{ Form::select('module_id',[''=>'Select module category']+ \App\Models\Module::getModuleDropDown(),null,['id'=>'',"class"=>"form-control"])
                    }}
                  </div>
                </div>
                <div class="form-group box-footer">
                  <label for="exampleInputName" class="col-sm-2 control-label">Name <span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::text('name',null,['placeholder'=>'Enter Name','id'=>'name','class'=>'form-control','required'=>'required'])}}
                  </div>
                </div>
                <div class="form-group box-footer">
                  <label for="exampleInputName" class="col-sm-2 control-label">Secondary Title <span class="has-error"></span></label>
                  <div class="col-sm-5">
                    {{ Form::text('secondary_title',null,['placeholder'=>'Enter secondary Name','id'=>'secondary_title','class'=>'form-control'])}}
                  </div>
                </div>
                <div class="form-group box-footer">
                  <label for="from" class="col-sm-2 control-label">Image <span class="has-error"></span></label>
                  <div class="col-sm-5">
                    {{ Form::file('image',null,['id'=>'image','class'=>'form-control'])}}
                  </div>
                </div>
                 <div class="form-group box-footer">
                  <label for="subject" class="col-sm-2 control-label">Short Description <span class="has-error"></span></label>
                  <div class="col-sm-8">
                    {{ Form::textarea('short_description',null,['id'=>'short_description','class'=>'form-control'])}}
                  </div>
                </div>
                 <div class="form-group box-footer">
                  <label for="subject" class="col-sm-2 control-label">Long Description <span class="has-error"></span></label>
                  <div class="col-sm-8">
                    {{ Form::textarea('long_description',null,['id'=>'long_description','class'=>'form-control'])}}
                  </div>
                </div>
                
                <div class="box-footer">
                   <div class="form-group">
                    <label for="subject" class="col-sm-2 control-label">Display On Header <span class="has-error"></span></label>
                      <div class="col-sm-5">
                        <div class="checkbox">
                          <label class="radio-inline">
                           {{ Form::radio('display_on_header',1,['id'=>'','class'=>''])}}
                            Active
                          </label>
                          <label class="radio-inline">
                          {{ Form::radio('display_on_header',0,['id'=>'','class'=>''])}}
                           InActive
                          </label>
                        </div>
                      </div>
                   </div> 
                </div>
                <div class="box-footer">
                   <div class="form-group">
                    <label for="subject" class="col-sm-2 control-label">Display On Footer <span class="has-error"></span></label>
                      <div class="col-sm-5">
                        <div class="checkbox">
                          <label class="radio-inline">
                            {{ Form::radio('display_on_footer',1,['id'=>'','class'=>''])}}
                             Active
                          </label>
                          <label class="radio-inline">
                           {{ Form::radio('display_on_footer',0,['id'=>'','class'=>''])}}
                            InActive
                          </label>
                        </div>
                      </div>
                   </div> 
                </div>

                <div class="box-footer">
                   <div class="form-group">
                    <label for="subject" class="col-sm-2 control-label">Status <span class="has-error"></span></label>
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
                  <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                  <a href="{{route('admin.cms.index')}}" class="btn btn-danger">Cancel</a>
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
  
    $("#AddEditCms").validate({
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