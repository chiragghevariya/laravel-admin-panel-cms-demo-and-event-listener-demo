<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Crypt;

class User extends Model
{
    //
    protected $table="users";
    const STATUS_ACTIVE ='1';
    const STATUS_INACTIVE ='0';

    public function right()
    {
      return $this->belongsTo('\App\Models\Right','right_id','id');
    }
    public function getUserListData($request){

    	$sql=self::with(["right"])->select("*");

      return Datatables::of($sql)
    						->addColumn('action',function($data){
    							return '<a href="'.route('admin.users.edit',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									<a href="javascript:void(0)" data-route="'.route('admin.users.destroy',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-danger delete_record"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    						})
                            ->editColumn('id',function($data){
                                return '<input type="checkbox" name="checkbox[]" class="select_checkbox_value" value="'.Crypt::encrypt($data->id).'" />';
                            })
                            ->editColumn('status',function($data){
                                return getStatusIcon($data->status);
                            })
                            ->editColumn('right_id',function($data){
                                return ($data->right !=NULL) ? $data->right->name : "None";
                            })
                            ->filter(function ($query) use ($request) {

                                if (isset($request['status']) && $request['status'] != "") {
                                    $query->where('status', $request['status']);
                                }

                            })
							->rawColumns(['id','action','status','right_id'])
    						->make(true);
    }

    public function saveUser($r,$id=NULL){

    	$errors="";
    	$input = $r->all();
    	if ($id !== NULL) {

            $id=Crypt::decrypt($id);
  			$obj = self::find($id);

        }else{

        	$obj = new self;
        }

	        $obj->name=$input['name'];
	        $obj->right_id=$input['right_id'];
	        $obj->email=$input['email'];
	        $obj->status = $input['status'];

	        $obj->save();

	       $msg = "User data save successfully done.";
            flashMessage('success',$msg);
	        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);


    }
    public function getUser($id)
    {
        $user=self::findOrfail($id);
        return $user;
    }

    public function deleteAll($r){

        $input=$r->all();
        foreach ($input['checkbox'] as $key => $c) {

            $user = $this->findOrFail(Crypt::decrypt($c));
            $user->delete();
            $msg = "User Record Deleted Successfully.";
        }
        return response()->json(['success' => 1, 'msg' => "User deleted successfully"]);
    }
}
