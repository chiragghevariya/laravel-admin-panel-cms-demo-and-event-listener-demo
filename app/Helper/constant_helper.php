<?php

	 function flashMessage($type,$message)
	 {
	 	\Session::put($type,$message);
	 }

	 function getStatusIcon($status){

	 	if ($status == 1) {
	 		return '<span class="btn btn-xs btn-success">active</span>';
	 	}else{
	 		return '<span class="btn btn-xs btn-danger">inactive</span>';
	 	}
	 }

	 function UPLOAD_FILE($r,$name,$uploadPath){

	 	// echo "<pre>";print_r($name);exit;
	 		$image = $r->file($name);
	 		// echo "<pre>";print_r($image);exit;
	 		$name = time().'.'.$image->getClientOriginalName();
            $destinationPath = $uploadPath;
            $image->move($destinationPath, $name);
            return  $name;
	 }

	 function SOCIAL_MEDIA_IMAGE_UPLOAD_PATH(){

	 	return public_path('/upload/social_media');
	 }
	 function SOCIAL_MEDIA_IMAGE_UPLOAD_URL(){

	 	return asset('public/upload/social_media');
	 }
	 function CMS_IMAGE_UPLOAD_PATH(){

	 	return public_path('/upload/cms');
	 }
	 function CMS_IMAGE_UPLOAD_URL(){

	 	return asset('public/upload/cms');
	 }
	 function CMS_CONTENT_IMAGE_UPLOAD_PATH(){

	 	return public_path('/upload/cms_content');
	 }
	 function CMS_CONTENT_IMAGE_UPLOAD_URL(){

	 	return asset('public/upload/cms_content');
	 }
	 function BANNER_IMAGE_UPLOAD_PATH(){

	 	return public_path('/upload/banner');
	 }
	 function BANNER_IMAGE_UPLOAD_URL(){

	 	return asset('public/upload/banner');
	 }
	 function NO_IMAGE_URL(){
	 	return asset('public/themes/admin/images');
	 }
	 function SITE_LOGO_IMAGE_UPLOAD_PATH(){

		return public_path('/upload/setting/logo');
	 }
	 function SITE_LOGO_IMAGE_UPLOAD_URL(){

		return asset('public/upload/setting/logo');
	 }
	 function EMAIL_LOGO_IMAGE_UPLOAD_PATH(){

		return public_path('/upload/setting/email');
	 }
	 function EMAIL_LOGO_IMAGE_UPLOAD_URL(){

		return asset('public/upload/setting/email');
	 }
	 function FAVICON_LOGO_IMAGE_UPLOAD_PATH(){

		return public_path('/upload/setting/favicon');
	 }
	 function FAVICON_LOGO_IMAGE_UPLOAD_URL(){

		return asset('public/upload/setting/favicon');
	 }
	 function HOME_PAGE_BANNER_LOGO_IMAGE_UPLOAD_PATH(){

		return public_path('/upload/setting/home_page_banner');
	 }
	 function HOME_PAGE_BANNER_LOGO_IMAGE_UPLOAD_URL(){

		return asset('public/upload/setting/home_page_banner');
	 }
	 function FRONT_CSS_PATH(){

		return asset('/public/front/css/');
	 }
	 function FRONT_JS_PATH(){

		return asset('/public/front/js/');
	 }
	 function FRONT_VENDOR_PATH(){

		return asset('/public/front/vendor/');
	 }
	 function FRONT_IMAGE_PATH(){

		return asset('/public/front/images/');
	 }
?>
