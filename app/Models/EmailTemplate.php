<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Crypt;

class EmailTemplate extends Model
{
    //
    protected $table="email_templates";
    const STATUS_ACTIVE ='1';
    const STATUS_INACTIVE ='0';

    public function getEmailTemplateListData($request){

    	$sql=self::select("*");


    	return Datatables::of($sql)
    						->addColumn('action',function($data){
    							return '<a href="'.route('admin.email-template.edit',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   
									<a href="javascript:void(0)" data-route="'.route('admin.email-template.destroy',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-danger delete_record"><i class="fa fa-trash" aria-hidden="true"></i></a>';
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

    public function saveEmailTemplate($r,$id=NULL){

    	$errors="";
    	$input = $r->all();
    	if ($id !== NULL) {
            $id=Crypt::decrypt($id);
  			$obj = self::find($id);	  		
            // print_r($obj);exit();
    	}else{
            
        	$obj = new self;
        }

	        $obj->title=$input['title'];
	        $obj->from=$input['from'];
	        $obj->subject=$input['subject'];
	        $obj->description =htmlspecialchars($input['description']);
	        $obj->status = $input['status'];

	        $obj->save();

	       $msg = "EmailTemplate Data save Successfully Done.";
            flashMessage('success',$msg);
	        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);


    }
    public function getEmailTemplat($id)
    {
        $emailTemplate=self::findOrfail($id);
        return $emailTemplate;
    }

    public function deleteAll($r){

        $input=$r->all();
        foreach ($input['checkbox'] as $key => $c) {
            
            $emailTemplate = $this->findOrFail(Crypt::decrypt($c));
            $emailTemplate->delete();
            $msg = "EmailTemplate Record Deleted Successfully.";
        }
        return response()->json(['success' => 1, 'msg' => "Email Template deleted successfully"]);   
    }
}
