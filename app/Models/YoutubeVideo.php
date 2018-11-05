<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Crypt;

class YoutubeVideo extends Model
{
    //
    protected $table="youtube_videos";
    const STATUS_ACTIVE ='1';
    const STATUS_INACTIVE ='0';

    public function getVideoUrl()
    {
        return $this->video_iframe;
    }

    /**
     * Get Banner Video URL function
     *
     * @return void
     * @author 
     **/
    public function getVideoThumbUrl()
    {
        return 'https://img.youtube.com/vi/'.basename($this->url).'/default.jpg';
    }

    public function getYoutubeVideoListData($request){

    	$sql=self::select("*");


    	return Datatables::of($sql)
    						->addColumn('action',function($data){
    							return '<a href="'.route('admin.youtube_videos.edit',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   
									<a href="javascript:void(0)" data-route="'.route('admin.youtube_videos.destroy',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-danger delete_record"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    						})
                            ->editColumn('id',function($data){
                                return '<input type="checkbox" name="checkbox[]" class="select_checkbox_value" value="'.Crypt::encrypt($data->id).'" />';
                            })
                            ->editColumn('url',function($data){
                                return '<a href="'.$data->url.'" target="_blank" title="'.$data->name.'" ><img  style="height:70px" src="'.$data->getVideoThumbUrl().'" /></a>';
                            })
                            ->editColumn('status',function($data){
                                return getStatusIcon($data->status);
                            })
                            ->filter(function ($query) use ($request) {
                                
                                if (isset($request['status']) && $request['status'] != "") {
                                    $query->where('status', $request['status']);
                                }
                                
                            })
							->rawColumns(['id','action','status','url'])
    						->make(true);
    }

    public function saveYoutubeVideo($r,$id=NULL){

    	$errors="";
    	$input = $r->all();
    	if ($id !== NULL) {

            $id=Crypt::decrypt($id);
  			$obj = self::find($id);	  		

        }else{
            
        	$obj = new self;
            $obj->created_by=\Auth::user()->id;
        }

	        $obj->name=$input['name'];
	        $obj->url=$input['url'];
	        $obj->status = $input['status'];

	        $obj->save();

	       $msg = "Youtube Video save Successfully Done.";
            flashMessage('success',$msg);
	        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);


    }
    public function getYoutubeVideo($id)
    {
        $youtubeVideo=self::findOrfail($id);
        return $youtubeVideo;
    }

    public function deleteAll($r){

        $input=$r->all();
        foreach ($input['checkbox'] as $key => $c) {
            
            $obj = $this->findOrFail(Crypt::decrypt($c));
            $obj->delete();
            $msg = "Youtube Record Deleted Successfully.";
        }
        return response()->json(['success' => 1, 'msg' => "Email Template deleted successfully"]);   
    }
}
