  <div class="form-group">
  <label for="country" class="col-sm-2 control-label">State<span class="has-error">*</span></label>
  <div class="col-sm-5">
    {{ Form::select('state_id',[''=>'Select State']+ \App\Models\State::getStateDropDown($country_id),null,['id'=>'state_id',"class"=>"form-control"])
  }}
  </div>
</div>