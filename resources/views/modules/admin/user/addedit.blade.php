@extends('admin::layouts.master')

@section('content')

<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
              @if(isset($user))
              {{ Form::model($user,
              array(
              'id'                => 'AddEditUser',
              'class'             => 'FromSubmit form-horizontal',
              'data-redirect_url' => route('admin.users.index'),
              'url'               => route('admin.users.update', $encryptedId),
              'method'            => 'PUT'
              ))
              }}

              @else
              {{
                Form::open([
                'id'=>'AddEditUser',
                'class'=>'FromSubmit form-horizontal',
                'url'=>route('admin.users.store'),
                'data-redirect_url'=>route('admin.users.index'),
                'name'=>'user'

                ])
              }}
              @endif
              <div class="box-body">
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Right <span class="has-error">*</span></label>
									<div class="col-sm-5">
										{{ Form::select('right_id',[''=>'Select right']+ \App\Models\Right::getRightDropDown(),null,['id'=>'',"class"=>"form-control"])
										}}
									</div>
								</div>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Title <span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::text('name',null,['placeholder'=>'Enter name','id'=>'name','class'=>'form-control'])}}
                  </div>
                </div>
                <div class="form-group box-footer">
                  <label for="from" class="col-sm-2 control-label">From <span class="has-error">*</span></label>
                  <div class="col-sm-5">
                    {{ Form::email('email',null,['placeholder'=>'Enter Email','id'=>'email','class'=>'form-control'])}}
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
                  <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                   <a href="{{route('admin.users.index')}}" class="btn btn-danger">Cancel</a>
                </div>
              </div>
            {{ Form::close()}}
          </div>
	 </div>

@endsection

@section('javascript')

<script type="text/javascript">
  $(document).ready(function(){

    $("#AddEditUser").validate({
        rules: {
           name: { required: true },
           email: { required: true,email:true }
        },
        messages:{
          name:{ required:'Name field is required'},
          email:{ required:'Email field is required'},
        },
        tooltip_options: {
           name: { placement: 'top' },
           email: { placement: 'top' },
        }

    });
});
  </script>
@endsection
