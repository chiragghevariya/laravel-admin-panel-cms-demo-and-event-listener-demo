<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Crypt;

class SocialMedia extends Model
{
    //
    protected $table="social_medias";
    const STATUS_ACTIVE ='1';
    const STATUS_INACTIVE ='0';

    public function getSocialMediaListData($request){

    	$sql=self::select("*");


    	return Datatables::of($sql)
			->addColumn('action',function($data){
			return '<a href="'.route('admin.social_medias.edit',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   
				<a href="javascript:void(0)" data-route="'.route('admin.social_medias.destroy',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-danger delete_record"><i class="fa fa-trash" aria-hidden="true"></i></a>';
		})
        // ->editColumn('icon',function($data){
        //     return '<img style="height:50px;width:100px" src="'.$data->getSocialMediaImageUrl().'"/>';
        // })
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
		->rawColumns(['id','action','status','icon'])
		->make(true);
    }

    public function saveSocialMedia($r,$id=NULL){

    	$errors="";
    	$input = $r->all();
    	if ($id !== NULL) {
            $id=Crypt::decrypt($id);
  			$obj = self::find($id);	  		
        }else{
            
        	$obj = new self;
        }
        // if ($input['icon'] != NULL && $r->has('icon')) 
        // {
        //     $name=UPLOAD_FILE($r,'icon',SOCIAL_MEDIA_IMAGE_UPLOAD_PATH());
        //     $obj->icon = $name;
        // }
        $obj->title=$input['title'];
        $obj->url=$input['url'];
        $obj->status = $input['status'];
        $obj->save();

       $msg = "Social Media Data save Successfully Done.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);


    }
    public function getSocialMedia($id)
    {
        $socialMedia=self::findOrfail($id);
        return $socialMedia;
    }

    public function deleteAll($r){

        $input=$r->all();
        foreach ($input['checkbox'] as $key => $c) {
            
            $emailTemplate = $this->findOrFail(Crypt::decrypt($c));
            $emailTemplate->delete();
            $msg = "Social Media Record Deleted Successfully.";
        }
        return response()->json(['success' => 1, 'msg' => "Social Media deleted successfully"]);   
    }

    public function getSocialMediaImageUrl(){

        $imageUrl_u=NO_IMAGE_URL().'/'.'no_image.png';
        $imagePath=SOCIAL_MEDIA_IMAGE_UPLOAD_PATH().'/'.$this->icon;
        $imageUrl=SOCIAL_MEDIA_IMAGE_UPLOAD_URL().'/'.$this->icon;
        if (isset($this->icon) && !empty($this->icon) && file_exists($imagePath) ) {
            return $imageUrl;
        }else{
            $imageUrl=$imageUrl_u;
        }
        return $imageUrl;
    }
}
