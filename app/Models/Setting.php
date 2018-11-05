<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Crypt;

class Setting extends Model
{
    //
    protected $table="settings";
    const STATUS_ACTIVE ='1';
    const STATUS_INACTIVE ='0';

    public function saveSetting($r,$id=NULL){

    	$errors="";
    	$input = $r->all();
    	if ($id !== NULL)
      {
          $id=Crypt::decrypt($id);
    			$obj = self::find($id);
    	}
      else
      {
  	       $obj = new self;
      }
      if ($r->has('logo_image'))
      {
          $name_logo=UPLOAD_FILE($r,'logo_image',SITE_LOGO_IMAGE_UPLOAD_PATH());
          $obj->logo_image = $name_logo;
      }
      if ($r->has('email_image'))
      {
          $name_email=UPLOAD_FILE($r,'email_image',EMAIL_LOGO_IMAGE_UPLOAD_PATH());
          $obj->email_image = $name_email;
      }
      if ($r->has('favicon_image'))
      {
          $name_favicon=UPLOAD_FILE($r,'favicon_image',FAVICON_LOGO_IMAGE_UPLOAD_PATH());
          $obj->favicon_image = $name_favicon;
      }
      if ($r->has('home_page_banner_image'))
      {
          $home_page_banner_image=UPLOAD_FILE($r,'home_page_banner_image',HOME_PAGE_BANNER_LOGO_IMAGE_UPLOAD_PATH());
          $obj->home_page_banner_image = $home_page_banner_image;
      }
      $obj->site_url= $input['site_url'];
      $obj->email= $input['email'];
      $obj->second_email= $input['second_email'];
      $obj->address= $input['address'];
      $obj->second_address= $input['second_address'];
      $obj->mobile= $input['mobile'];
      $obj->second_mobile= $input['second_mobile'];

      $obj->save();

      $msg = "Setting updated Successfully Done.";
      flashMessage('success',$msg);
      return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);
      
  }
  public function getSetting($id)
  {
      $setting=self::findOrfail($id);
      return $setting;
  }
  public function getSettingImageUrl(){

      $imageUrl_u=NO_IMAGE_URL().'/'.'no_image.png';
      $imagePath=SITE_LOGO_IMAGE_UPLOAD_PATH().'/'.$this->logo_image;
      $imageUrl=SITE_LOGO_IMAGE_UPLOAD_URL().'/'.$this->logo_image;
      if (isset($this->logo_image) && !empty($this->logo_image) && file_exists($imagePath) ) {
          return $imageUrl;
      }else{
          $imageUrl=$imageUrl_u;
      }
      return $imageUrl;
  }
  public function getsettineBannerImg(){

      $imageUrl_u=NO_IMAGE_URL().'/'.'no_image.png';
      $imagePath=HOME_PAGE_BANNER_LOGO_IMAGE_UPLOAD_PATH().'/'.$this->home_page_banner_image;
      $imageUrl=HOME_PAGE_BANNER_LOGO_IMAGE_UPLOAD_URL().'/'.$this->home_page_banner_image;
      if (isset($this->home_page_banner_image) && !empty($this->home_page_banner_image) && file_exists($imagePath) ) {
          return $imageUrl;
      }else{
          $imageUrl=$imageUrl_u;
      }
      return $imageUrl;
  }
}
