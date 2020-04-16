<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Crypt;
use \App\Events\SaveDataNotificationEvent;

class Banner extends Model
{
    //
    protected $table="banners";
    const STATUS_ACTIVE ='1';
    const STATUS_INACTIVE ='0';

    public function getBannerListData($request){

        $sql=self::select("*");
        return Datatables::of($sql)
              ->addColumn('action',function($data){
                  return '<a href="'.route('admin.banners.edit',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="javascript:void(0)" data-route="'.route('admin.banners.destroy',Crypt::encrypt($data->id)).'" class="btn btn-xs btn-danger delete_record"><i class="fa fa-trash" aria-hidden="true"></i></a>';
              })
              ->editColumn('image',function($data){

                  return '<img style="height:50px;width:100px" src="'.$data->getBannerImageUrl().'"/>';

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
              ->rawColumns(['id','action','status','image'])
              ->make(true);
    }

    public function saveBanner($r,$id=NULL){

        $errors="";
        $input = $r->all();
        if ($id !== NULL) {
            $id=Crypt::decrypt($id);
            $obj = self::find($id);
        }else{

            $obj = new self;
        }
        // echo "<pre>";print_r($input);exit;
        if (!empty($input['image']))
        {
            $name=UPLOAD_FILE($r,'image',BANNER_IMAGE_UPLOAD_PATH());
            $obj->image = $name;
        }
        $obj->name=$input['name'];
        $obj->url=$input['url'];
        // $obj->cms_id=$input['cms_id'];
        $obj->status = $input['status'];
        $obj->save();
        $arraData = [0=>"HI"];
        event(new SaveDataNotificationEvent($arraData));
        return redirect()->route('admin.banners.index');
    }
    public function getBanner($id)
    {
        $banner=self::findOrfail($id);
        return $banner;
    }

    public function deleteAll($r){

        $input=$r->all();
        foreach ($input['checkbox'] as $key => $c) {

            $obj = $this->findOrFail(Crypt::decrypt($c));
            $obj->delete();
            $msg = "Banner Record Deleted Successfully.";
        }
        return redirect()->route('admin.banners');
        return response()->json(['success' => 1, 'msg' => "Banner deleted successfully"]);
    }

    public function getBannerImageUrl(){

        $imageUrl_u=NO_IMAGE_URL().'/'.'no_image.png';
        $imagePath=BANNER_IMAGE_UPLOAD_PATH().'/'.$this->image;
        $imageUrl=BANNER_IMAGE_UPLOAD_URL().'/'.$this->image;
        if (isset($this->image) && !empty($this->image) && file_exists($imagePath) ) {
            return $imageUrl;
        }else{
            $imageUrl=$imageUrl_u;
        }
        return $imageUrl;
    }
}
