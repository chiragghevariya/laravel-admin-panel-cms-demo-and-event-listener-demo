@extends('admin::layouts.master')
@section('content')
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Module</h3>
            </div>
              @if(isset($module))
                {{ Form::model($module,
                array(
                'id'                => 'AddEditModule_1',
                'class'             => 'FromSubmit form-horizontal',
                'data-redirect_url' => route('admin.modules.index'),
                'url'               => route('admin.modules.update', $encryptedId),
                'method'            => 'PUT'
                ))
                }}
              @else
                {{
                  Form::open([
                  'id'=>'AddEditModule_1',
                  'class'=>'FromSubmit form-horizontal',
                  'url'=>route('admin.modules.store'),
                  'data-redirect_url'=>route('admin.modules.index'),
                  'name'=>'Module'

                  ])
                }}
              @endif

              @if($errors->any())
                @foreach($errors->all() as $a)
                {{$a}}
                @endforeach
              @endif
              <div class="alert alert-danger error_message col-sm-3 pull-right" style="display:none">Error</div>
              <div class="box-body">

                <div class="form-group">
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
                  <a href="{{route('admin.modules.index')}}" class="btn btn-danger">Cancel</a>
                </div>
              </div>
            {{ Form::close()}}
          </div>
	 </div>
@endsection
@section('javascript')
<script type="text/javascript">
  $(document).ready(function(){

    $("#AddEditModule").validate({
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
