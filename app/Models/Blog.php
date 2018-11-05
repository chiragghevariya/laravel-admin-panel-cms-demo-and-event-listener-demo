<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Crypt;

class Blog extends Model
{
    //
    protected $table="blogs";
    const STATUS_ACTIVE ='1';
    const STATUS_INACTIVE ='0';

    public function category(){

      return $this->belongsTo('\App\Models\BlogCategory','blog_category_id','id');

    }

    public function getBlogListData($request){

    	$sql=self::with(["category"])->select("*");


    	return Datatables::of($sql)
    						->addColumn('action',function($data){
    							return '<a href="'.route('admin.blogs.edit',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									<a href="javascript:void(0)" data-route="'.route('admin.blogs.destroy',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-danger delete_record"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    						})
                ->editColumn('id',function($data){
                    return '<input type="checkbox" name="checkbox[]" class="select_checkbox_value" value="'.Crypt::encrypt($data->id).'" />';
                })
                ->editColumn('status',function($data){
                    return getStatusIcon($data->status);
                })
                ->editColumn('category_id',function($data){
                    return !empty($data->category) ? $data->category->name : "None" ;
                })
                ->filter(function ($query) use ($request) {

                    if (isset($request['status']) && $request['status'] != "") {
                        $query->where('status', $request['status']);
                    }

                })
							->rawColumns(['id','action','status','category_id'])
    						->make(true);
    }

    public function saveBlog($r,$id=NULL){

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

            $obj->blog_category_id=$input['blog_category_id'];
            $obj->name=$input['name'];
            $obj->short_description=$input['short_description'];
            $obj->long_description=$input['long_description'];
	        $obj->status = $input['status'];

	        $obj->save();

	       $msg = "Blog save Successfully Done.";
            flashMessage('success',$msg);
	        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);


    }
    public function getBlog($id)
    {
        $blog=self::findOrfail($id);
        return $blog;
    }

    public function deleteAll($r){

        $input=$r->all();
        foreach ($input['checkbox'] as $key => $c) {

            $obj = $this->findOrFail(Crypt::decrypt($c));
            $obj->delete();
            $msg = "Blog Record Deleted Successfully.";
        }
        return response()->json(['success' => 1, 'msg' => "Blog deleted successfully"]);
    }

    public static function getCategoryDropDown(){

        return self::where('status',self::STATUS_ACTIVE)->pluck('name','id')->toArray();
    }
}
