@extends('admin::layouts.master')

@section('content')
  
<section class="content-header">
  <h1>Manage Banner</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-left">
                <?php /*
          <a class="btn btn-danger" onclick="deleteAll('table_form','{{route('admin.banners.delete_all')}}')">Delete All</a> */ ?>
              </div>
              <a class="pull-right btn btn-primary" href="{{route('admin.banners.create')}}"><span><i class="fa fa-plus-square" aria-hidden="true"></i></span> ADD</a>
            </div>
            <div class="box-body">
              {{ Form::open([

                'id'=>'table_form',
                'class'=>'table_form',
                'name'=> 'form_data'

            ])}}
              <table class="table table-bordered table-hover" id="users-table">
                <thead>
                <tr>
                  <th><input type="checkbox" name="checkbox" id="select_all" value="1"></th>
                  <th>Name</th>
                  <th width="100">Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
               
              </table>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('javascript')
<script>
  $(function() {
      $('#users-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! route('admin.banners.any_data') !!}',
          columns: [
              { data: 'id',orderable: false,searchable: false},
              { data: 'name'},
              { data: 'image'},
              { data: 'status'},
              { data: 'action',name:'action', orderable: false, searchable: false}
          ]
      });
  });
</script>
@endsection