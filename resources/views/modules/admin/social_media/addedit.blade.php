@extends('admin::layouts.master')

@section('content')
	
<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"> Add Social Media</h3>
      </div>
        @if(isset($socialMedia))
        {{ Form::model($socialMedia,
        array(
        'id'                => 'AddEditSocialMedia',
        'class'             => 'FromSubmit form-horizontal',
        'data-redirect_url' => route('admin.social_medias.index'),
        'url'               => route('admin.social_medias.update', $encryptedId),
        'method'            => 'PUT'
        ))
        }}
        
        @else
        {{
          Form::open([
          'id'=>'AddEditSocialMedia',
          'class'=>'FromSubmit form-horizontal',
          'url'=>route('admin.social_medias.store'),
          'data-redirect_url'=>route('admin.social_medias.index'),
          'name'=>'socialMedia'

          ])
        }}
        @endif
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1" class="col-sm-2 control-label">Title <span class="has-error">*</span></label>
            <div class="col-sm-5">
              {{ Form::text('title',null,['placeholder'=>'Enter Title','id'=>'title','class'=>'form-control'])}}
            </div>
          </div>
          <div class="box-footer">
            <div class="form-group">
              <label for="from" class="col-sm-2 control-label">URL <span class="has-error"></span></label>
              <div class="col-sm-5">
                {{ Form::text('url',null,['placeholder'=>'Enter URL','id'=>'from','class'=>'form-control'])}}
              </div>
            </div>
          </div>
          <?php /*
          <div class="form-group box-footer">
            <label for="from" class="col-sm-2 control-label">Icon <span class="has-error">*</span></label>
            <div class="col-sm-5">
              {{ Form::file('icon',null,['id'=>'icon','class'=>'form-control'])}}
            </div>
          </div>
          */ ?>
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
            <a href="{{route('admin.social_medias.index')}}" class="btn btn-danger">Cancel</a>
          </div>
        </div>
      {{ Form::close()}}
    </div>
</div>	

@endsection

@section('javascript')

<script type="text/javascript">
  $(document).ready(function(){
  
    $("#AddEditSocialMedia").validate({
        rules: {
           title: { required: true },
           url: { required: true }
        },
        messages:{
          title:{ required:'Title field is required'},
          url:{ required:'URL field is required'},
        },
        tooltip_options: {
           title: { placement: 'left' },
           url: { placement: 'left' },
        }
    
    });
});
  </script>
@endsection