<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Crypt;

class Area extends Model
{
    //
    protected $table="areas";
    const STATUS_ACTIVE ='1';
    const STATUS_INACTIVE ='0';

    public function country(){
        return $this->belongsTo('\App\Models\Country','country_id','id');
    }
    public function state(){
        return $this->belongsTo('\App\Models\State','state_id','id');
    }
    public function city(){
        return $this->belongsTo('\App\Models\City','city_id','id');
    }
    public function getAreaListData($request){

    	$sql=self::with(["country","state"])->select("*");


    	return Datatables::of($sql)
    						->addColumn('action',function($data){
    							return '<a href="'.route('admin.areas.edit',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   
									<a href="javascript:void(0)" data-route="'.route('admin.areas.destroy',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-danger delete_record"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    						})
                            ->editColumn('id',function($data){
                                return '<input type="checkbox" name="checkbox[]" class="select_checkbox_value" value="'.Crypt::encrypt($data->id).'" />';
                            })
                            ->editColumn('status',function($data){
                                return getStatusIcon($data->status);
                            })
                            ->editColumn('country_name',function($data){
                                return ($data->country !=NULL) ? $data->country->name : "None";
                            })
                            ->editColumn('state_name',function($data){
                                return ($data->state !=NULL) ? $data->state->name : "None";
                            })
                            ->editColumn('city_name',function($data){
                                return ($data->city !=NULL) ? $data->city->name : "None";
                            })
                            ->filter(function ($query) use ($request) {
                                
                                if (isset($request['status']) && $request['status'] != "") {
                                    $query->where('status', $request['status']);
                                }
                                
                            })
							->rawColumns(['id','action','status','state_name','city_name','country_name'])
    						->make(true);
    }

    public function saveArea($r,$id=NULL){

    	$errors="";
    	$input = $r->all();
    	if ($id !== NULL) {

            $id=Crypt::decrypt($id);
  			$obj = self::find($id);	  		
            $obj->last_updated_by=\Auth::user()->id;

        }else{
            
        	$obj = new self;
            $obj->created_by=\Auth::user()->id;
        }

        $obj->country_id =$input['country_id'];
        $obj->state_id =$input['state_id'];
        $obj->city_id =$input['city_id'];
        $obj->name=$input['name'];
        $obj->status = $input['status'];
        $obj->save();

        $msg = "Area save Successfully Done.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);


    }
    public function getArea($id)
    {
        $area=self::findOrfail($id);
        return $area;
    }

    public function deleteAll($r){

        $input=$r->all();
        foreach ($input['checkbox'] as $key => $c) {
            
            $obj = $this->findOrFail(Crypt::decrypt($c));
            $obj->delete();
            $msg = "Area Record Deleted Successfully.";
        }
        return response()->json(['success' => 1, 'msg' => "Area deleted successfully"]);   
    }

    public static function getCityDropDown($state_id){

        if ($state_id !=NULL) {
            return self::where('status',self::STATUS_ACTIVE)->where('state_id',$state_id)->pluck('name','id')->toArray();
        }else{
            return '';
        }
    }

}
