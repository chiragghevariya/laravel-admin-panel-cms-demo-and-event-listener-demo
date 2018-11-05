@extends('admin::layouts.master')

@section('content')

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit setting</h3>
    </div>
      @if(isset($setting))
      {{ Form::model($setting,
      array(
      'id'                => 'AddEditSetting',
      'class'             => 'FromSubmit form-horizontal',
      'data-redirect_url' => route('admin.settings.index'),
      'url'               => route('admin.settings.update', $encryptedId),
      'method'            => 'PUT'
      ))
      }}
      @endif
      <div class="box-body">
        <div class="form-group">
          <label for="site_url" class="col-sm-2 control-label">Website url <span class="has-error">*</span></label>
          <div class="col-sm-5">
            {{ Form::text('site_url',null,['placeholder'=>'Enter Website url','id'=>'site_url','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="logo_image" class="col-sm-2 control-label">Logo <span class="has-error">*</span></label>
          <div class="col-sm-5">
            {{ Form::file('logo_image',null,['id'=>'logo_image','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="favicon_image" class="col-sm-2 control-label">Favicon Logo <span class="has-error">*</span></label>
          <div class="col-sm-5">
            {{ Form::file('favicon_image',null,['id'=>'favicon_image','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="email_image" class="col-sm-2 control-label">Email Logo <span class="has-error">*</span></label>
          <div class="col-sm-5">
            {{ Form::file('email_image',null,['id'=>'email_image','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="home_page_banner_image" class="col-sm-2 control-label">Default banner <span class="has-error">*</span></label>
          <div class="col-sm-5">
            {{ Form::file('home_page_banner_image',null,['id'=>'home_page_banner_image','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="from" class="col-sm-2 control-label">Email <span class="has-error">*</span></label>
          <div class="col-sm-5">
            {{ Form::email('email',null,['placeholder'=>'Enter Email','id'=>'from','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="second_email" class="col-sm-2 control-label">Second email <span class="has-error">*</span></label>
          <div class="col-sm-5">
            {{ Form::email('second_email',null,['placeholder'=>'Enter second Email','id'=>'second_email','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="subject" class="col-sm-2 control-label">Address </label>
          <div class="col-sm-8">
            {{ Form::textarea('address',null,['id'=>'address','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="subject" class="col-sm-2 control-label">Second Address </label>
          <div class="col-sm-8">
            {{ Form::textarea('second_address',null,['id'=>'second_address','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="subject" class="col-sm-2 control-label">Mobile<span class="has-error">*</span></label>
          <div class="col-sm-8">
            {{ Form::text('mobile',null,['id'=>'mobile','class'=>'form-control'])}}
          </div>
        </div>
        <div class="form-group box-footer">
          <label for="subject" class="col-sm-2 control-label">Second Mobile<span class="has-error"></span></label>
          <div class="col-sm-8">
            {{ Form::text('second_mobile',null,['id'=>'second_mobile','class'=>'form-control'])}}
          </div>
        </div>
    </div>
   <div class="box-footer">
      <div class="col-sm-12 col-sm-offset-2">
        <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
        <a href="{{route('admin.settings.index')}}" class="btn btn-danger">Cancel</a>
      </div>
    </div>
    {{ Form::close()}}
  </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
  $(document).ready(function(){
    $("#AddEditSetting").validate({
        rules: {
           site_url: { required: true},
           //logo_image: { required: true },
           //favicon_image: { required: true },
           //email_image: { required: true },
           //home_page_banner_image: { required: true },
           email: { required: true,email:true },
           second_email: { required: true,email:true },
           mobile: { required: true}
        },
        messages:{
           site_url: { required:'Please enter Site Url'},
           //logo_image: { required: 'Please choose logo image' },
           //favicon_image: { required: 'Please choose favicon image' },
           //email_image: { required:'Please choose email image' },
           //home_page_banner_image: { required: 'Please choose default banner' },
           email: { required: 'Please enter email',email:'Please enter valid image' },
           second_email: { required: 'Please enter second email',email:'Please enter valid email' },
           mobile: { required: 'Please enter number'}
        },
        tooltip_options: {
           site_url: { placement: 'bottom' },
           //logo_image: { placement: 'bottom' },
           //favicon_image: { placement: 'bottom' },
           //email_image: { placement: 'bottom' },
           // home_page_banner_image: { placement: 'bottom' },
           email: { placement: 'bottom' },
           second_email: { placement: 'bottom' },
           mobile: { placement: 'bottom' },
        }
    });
});
</script>
@endsection
