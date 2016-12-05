<?php
use App\DocName;
use App\DocPage;
// MarkDown
use League\CommonMark\CommonMarkConverter;


Route::get('doc/{doc_name_slug}/{doc_page_slug}','DocPageController@getDocSinglePage')->name('getDocSinglePage');

Route::get('/', function () {
	return view('welcome');
});

Route::group(['middleware'=>'auth' , 'prefix'=>'admin'],function(){
	Route::resource('/doc_names','DocNameController',['except' =>['show']]);
	Route::get('/doc_names/trashed','DocNameController@trashedIndex')->name('doc_names.trashed');
	Route::delete('/doc_names/forceDelete/{id}','DocNameController@forceDelete')->name('doc_names.forceDelete');
	Route::put('/doc_names/restore/{id}','DocNameController@restore')->name('doc_names.restore');
	Route::put('clearDocNamesOfTrashed','DocNameController@clearTrashed')->name('doc_names.clearTrashed');

	Route::resource('/doc_pages','DocPageController',['except' => ['index','create']]);
	Route::get('/doc_pages/pages/{id}','DocPageController@getDocPages')->name('doc_pages.index');
	Route::get('/doc_pages/create/{id}','DocPageController@CreateDocPage')->name('doc_pages.create');
	Route::put('/doc_pages/restore/{id}','DocPageController@restore')->name('doc_pages.restore');
	Route::put('/doc_pages/forceDelete/{id}','DocPageController@forceDelete')->name('doc_pages.forceDelete');
	Route::put('clearPagesTrashed/{id}','DocPageController@clearTrashed')->name('doc_pages.clearTrashed');
	Route::get('/doc_pages/edit/{id}/{doc_name_id}','DocPageController@editDocPage')->name('doc_pages.editDocPage');
	Route::get('/doc_pages/trashed/{id}','DocPageController@trashedIndex')->name('doc_pages.trashed');
});


// Route::get('/{doc_name}/{page_slug}');

Route::auth();



/**
 * Header Nav Menu
 */
Menu::make('headerNavLeft', function($menu){
	$menu->add('Home','');
	$menu->add('Docs',['route'=>'doc_names.index']);

});

Menu::make('headerNavRight', function($menu){
	$menu->add('Login','login');
	$menu->add('Register','register');
});

Menu::make('FooterMenu', function($menu){
	  $menu->add('Home');
	  $menu->add('About',    'about');
	  $menu->add('services', 'services');
	  $menu->add('Contact',  'contact');
});
