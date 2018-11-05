<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Crypt;

class Cms extends Model
{
    //
    protected $table="cms";
    const STATUS_ACTIVE ='1';
    const STATUS_INACTIVE ='0';

    public function getCmsListData($request){

    	$sql=self::select("*");


    	return Datatables::of($sql)
    						->addColumn('action',function($data){
    							return '<a href="'.route('admin.cms.edit',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   
									<a href="javascript:void(0)" data-route="'.route('admin.cms.destroy',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-danger delete_record"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    						})
                            ->editColumn('id',function($data){
                                return '<input type="checkbox" name="checkbox[]" class="select_checkbox_value" value="'.Crypt::encrypt($data->id).'" />';
                            })
                            ->editColumn('status',function($data){
                                return getStatusIcon($data->status);
                            })
                            ->filter(function ($query) use ($request) {
                                
                                if (isset($request['status']) && $request['status'] != "") {
                                    $query->where('status', $request['status']);
                                }
                                
                            })
							->rawColumns(['id','action','status'])
    						->make(true);
    }

    public function saveCms($r,$id=NULL){

// echo "<pre>";print_r($_FILES);exit;
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
        if ($r->has('image')) 
        {
            $name=UPLOAD_FILE($r,'image',CMS_IMAGE_UPLOAD_PATH());
            $obj->image = $name;
        }
        $obj->parent_id=$input['parent_id'];
        $obj->module_id=$input['module_id'];
        $obj->name=$input['name'];
        $obj->slug =str_replace(' ','-',strtolower($input['name']));
        $obj->short_description=htmlspecialchars($input['short_description']);
        $obj->long_description=htmlspecialchars($input['long_description']);
        $obj->status = $input['status'];
        $obj->secondary_title=$input['secondary_title'];
        $obj->display_on_header=$input['display_on_header'];
        $obj->display_on_footer=$input['display_on_footer'];
        $obj->save();

        $msg = "Cms save Successfully Done.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);


    }
    public function getCms($id)
    {
        $cms=self::findOrfail($id);
        return $cms;
    }

    public function deleteAll($r){

        $input=$r->all();
        foreach ($input['checkbox'] as $key => $c) {
            
            $obj = $this->findOrFail(Crypt::decrypt($c));
            $obj->delete();
            $msg = "Cms Record Deleted Successfully.";
        }
        return response()->json(['success' => 1, 'msg' => "Cms deleted successfully"]);   
    }

    public static function getCmsDropDown(){
        return self::where('status',self::STATUS_ACTIVE)->pluck('name','id')->toArray();
    }
    public static function getCmsParentDropDown(){

        return self::where('status',self::STATUS_ACTIVE)
                    ->where('parent_id','!=','id')
                    ->pluck('name','id')->toArray();
    }
}
