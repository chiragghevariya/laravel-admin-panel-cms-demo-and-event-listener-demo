<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'as'=>'admin.','namespace' => 'Modules\Admin\Http\Controllers'], function()
{
    Route::get('/login', 'LoginController@login')->name('login.main');
    Route::post('/login', 'LoginController@postLogin')->name('login');


  // Route::group(['middleware'=>'admin_auth'],function(){



    Route::get('/logout','LoginController@logout')->name('logout');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // EMAIL TEMPLATE ROUTES
    Route::any('email-template/get','EmailTemplateController@anyData')->name('email-template.any_data');
    Route::any('email-template/delete-all','EmailTemplateController@deleteAll')->name('email-template.delete_all');
    Route::resource('email-template','EmailTemplateController');

    // USER ROUTES
    Route::any('users/get','UserController@anyData')->name('users.any_data');
    Route::any('users/delete-all','UserController@deleteAll')->name('users.delete_all');
    Route::resource('users','UserController');

    // Social Media ROUTES
    Route::any('social_medias/get','SocialMediaController@anyData')->name('social_medias.any_data');
    Route::any('social_medias/delete-all','SocialMediaController@deleteAll')->name('social_medias.delete_all');
    Route::resource('social_medias','SocialMediaController');

     // Blog Category ROUTES
    Route::any('blog_categories/get','BlogCategoryController@anyData')->name('blog_categories.any_data');
    Route::any('blog_categories/delete-all','BlogCategoryController@deleteAll')->name('blog_categories.delete_all');
    Route::resource('blog_categories','BlogCategoryController');

    // Blog ROUTES
    Route::any('blogs/get','BlogController@anyData')->name('blogs.any_data');
    Route::any('blogs/delete-all','BlogController@deleteAll')->name('blogs.delete_all');
    Route::resource('blogs','BlogController');

    // Youtube Video ROUTES
    Route::any('youtube_videos/get','YoutubeVideoController@anyData')->name('youtube_videos.any_data');
    Route::any('youtube_videos/delete-all','YoutubeVideoController@deleteAll')->name('youtube_videos.delete_all');
    Route::resource('youtube_videos','YoutubeVideoController');

    // Country ROUTES
    Route::any('countries/get','CountryController@anyData')->name('countries.any_data');
    Route::any('countries/delete-all','CountryController@deleteAll')->name('countries.delete_all');
    Route::resource('countries','CountryController');

    // State ROUTES
    Route::any('states/get','StateController@anyData')->name('states.any_data');
    Route::any('states/delete-all','StateController@deleteAll')->name('states.delete_all');
    Route::resource('states','StateController');

    // City ROUTES
    Route::any('cities/get','CityController@anyData')->name('cities.any_data');
    Route::any('cities/delete-all','CityController@deleteAll')->name('cities.delete_all');
    Route::any('cities/get_state','CityController@getStateDropDown')->name('cities.get_state');
    Route::resource('cities','CityController');

    // Area ROUTES
    Route::any('areas/get','AreaController@anyData')->name('areas.any_data');
    Route::any('areas/delete-all','AreaController@deleteAll')->name('areas.delete_all');
    Route::any('areas/get_state','AreaController@getStateDropDown')->name('areas.get_state');
    Route::any('areas/get_city','AreaController@getCityDropDown')->name('areas.get_city');
    Route::resource('areas','AreaController');

    // Cms ROUTES
    Route::any('modules/get','ModuleController@anyData')->name('modules.any_data');
    Route::any('modules/delete-all','ModuleController@deleteAll')->name('modules.delete_all');
    Route::resource('modules','ModuleController');

    // Cms ROUTES
    Route::any('cms/get','CmsController@anyData')->name('cms.any_data');
    Route::any('cms/delete-all','CmsController@deleteAll')->name('cms.delete_all');
    Route::resource('cms','CmsController');

    // Cms Content ROUTES
    Route::any('cms_contents/get','CmsContentController@anyData')->name('cms_contents.any_data');
    Route::any('cms_contents/delete-all','CmsContentController@deleteAll')->name('cms_contents.delete_all');
    Route::resource('cms_contents','CmsContentController');

    // Right Content ROUTES
    Route::any('rights/get','RightController@anyData')->name('rights.any_data');
    Route::any('rights/delete-all','RightController@deleteAll')->name('rights.delete_all');
    Route::resource('rights','RightController');

    // Banner Content ROUTES
    Route::any('banners/get','BannerController@anyData')->name('banners.any_data');
    Route::any('banners/delete-all','BannerController@deleteAll')->name('banners.delete_all');
    Route::resource('banners','BannerController');

    // Access Controll List Content ROUTES
    Route::any('access_controll_list/get','AccessControllListController@anyData')->name('access_controll_list.any_data');
    Route::any('access_controll_list/delete-all','AccessControllListController@deleteAll')->name('access_controll_list.delete_all');
    Route::resource('access_controll_list','AccessControllListController');

    // SETTING ROUTES
    Route::resource('settings','SettingController');

  // });

});
