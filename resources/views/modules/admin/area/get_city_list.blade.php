  <div class="form-group">
  <label for="country" class="col-sm-2 control-label">City<span class="has-error">*</span></label>
  <div class="col-sm-5">
    {{ Form::select('city_id',[''=>'Select City']+ \App\Models\City::getCityDropDown($state_id),null,['id'=>'city_id',"class"=>"form-control"])
  }}
  </div>
</div>