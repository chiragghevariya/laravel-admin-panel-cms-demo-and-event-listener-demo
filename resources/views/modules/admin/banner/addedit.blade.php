@extends('admin::layouts.master')

@section('content')
  
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Add banner</h3>
            </div>
              @if(isset($banner))
              {{ Form::model($banner,
              array(
              'id'                => 'AddEditBanner',
              'class'             => 'form-horizontal',
              'data-redirect_url' => route('admin.banners.index'),
              'url'               => route('admin.banners.update', $encryptedId),
              'method'            => 'PUT',
              'enctype'           =>"multipart/form-data"
              ))
              }}
              
              @else
              {{
                Form::open([
                'id'=>'AddEditBanner',
                'class'=>' form-horizontal',
                'url'=>route('admin.banners.store'),
                'data-redirect_url'=>route('admin.banners.index'),
                'name'=>'socialMedia',
                'enctype'           =>"multipart/form-data"

                ])
              }}
              @endif
              <div class="box-body">
                <?php /*
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Cms Page <span class="has-error"></span></label>
                  <div class="col-sm-5">
                    {{ Form::select('cms_id',[''=>'Select cms page']+ \App\Models\Cms::getCmsDropDown(),null,['id'=>'',"class"=>"form-control"])
                    }}
                  </div>
                  */ ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Title <span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::text('name',null,['placeholder'=>'Enter name','id'=>'name','class'=>'form-control','required'=>'required'])}}
                  </div>
                </div>
                <div class="form-group">
                  <label for="from" class="col-sm-2 control-label">URL <span class="has-error"></span></label>
                  <div class="col-sm-5">
                    {{ Form::text('url',null,['placeholder'=>'Enter URL','id'=>'from','class'=>'form-control'])}}
                  </div>
                </div>
                <div class="form-group box-footer">
                  <label for="from" class="col-sm-2 control-label">Banner Image <span class="has-error"></span></label>
                  <div class="col-sm-5">
                    {{ Form::file('image',null,['id'=>'image','class'=>'form-control'])}}
                  </div>
                </div>
                <div class="">
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
                  <a href="{{route('admin.banners.index')}}" class="btn btn-danger">Cancel</a>
                </div>
              </div>
            {{ Form::close()}}
          </div>
   </div> 

@endsection

@section('javascript')

<script type="text/javascript">
  $(document).ready(function(){
  
    $("#AddEditBanner").validate({
        rules: {
           name: { required: true },
           url: { required: true }
        },
        messages:{
          name:{ required:'Name field is required'},
          url:{ required:'URL field is required'},
        },
        tooltip_options: {
           name: { placement: 'left' },
           url: { placement: 'left' },
        }
    
    });
});
  </script>
@endsection