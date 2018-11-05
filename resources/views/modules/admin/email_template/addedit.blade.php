@extends('admin::layouts.master')

@section('content')

<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Email Template</h3>
            </div>
              @if(isset($emailTemplate))
              {{ Form::model($emailTemplate,
              array(
              'id'                => 'AddEditEmailTemplate',
              'class'             => 'FromSubmit form-horizontal',
              'data-redirect_url' => route('admin.email-template.index'),
              'url'               => route('admin.email-template.update', $encryptedId),
              'method'            => 'PUT'
              ))
              }}

              @else
              {{
                Form::open([
                'id'=>'AddEditEmailTemplate',
                'class'=>'FromSubmit form-horizontal',
                'url'=>route('admin.email-template.store'),
                'data-redirect_url'=>route('admin.email-template.index'),
                'name'=>'emailTemplate'

                ])
              }}
              @endif
              <div class="alert alert-danger error_message" style="display:none">
                  Error<br>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Title <span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::text('title',null,['placeholder'=>'Enter Title','id'=>'title','class'=>'form-control'])}}
                  </div>
                </div>
                <div class="form-group box-footer">
                  <label for="from" class="col-sm-2 control-label">From <span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::email('from',null,['placeholder'=>'Enter Email','id'=>'from','class'=>'form-control'])}}
                  </div>
                </div>
                <div class="form-group box-footer">
                  <label for="subject" class="col-sm-2 control-label">Subject <span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::text('subject',null,['placeholder'=>'Enter Subject','id'=>'subject','class'=>'form-control'])}}
                  </div>
                </div>
                <div class="form-group box-footer">
                  <label for="subject" class="col-sm-2 control-label">Description <span class="has-error">*</span></label>
                  <div class="col-sm-8">
                    {{ Form::textarea('description',null,['id'=>'description','class'=>'form-control'])}}
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
                  <a href="{{route('admin.email-template.index')}}" class="btn btn-danger">Cancel</a>
                </div>
              </div>
            {{ Form::close()}}
          </div>
	 </div>

@endsection

@section('javascript')

<script type="text/javascript">
  $(document).ready(function(){


      $("#AddEditEmailTemplate1").validate({
        rules: {
           from: { required: true },
           title: { required: true },
           subject: { required: true }
        },
        messages:{
          from:{ required:'Email field is required'},
          title:{ required:'Title field is required'},
          subject:{ required:'Subject field is required'}
        },
        tooltip_options: {
           email: { placement: 'right' },
        }

    });
});
  </script>
@endsection
