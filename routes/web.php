<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('login',function (){
    return redirect('admin/login');
});
Route::get('/tim-kiem','XaydungController@searchPage')->name('search');
//frontend xaydung
Route::get('/','XaydungController@index')->name('homePage');
Route::get('/tin-xay-dung','XaydungController@tinXaydung')->name('tinxaydung');
Route::get('/bat-dong-san','XaydungController@tinBDS')->name('tinbds');
Route::get('/{slugPage}','XaydungController@getPage');


//Pages
Route::get('/nha-xinh/{idPage}','FlexshopController@getPage');
//Bao gia tuyen dung
Route::get('/tuyen-dung','FlexshopController@listTuyendung')->name('tuyendung');
Route::get('/tuyen-dung/{slug}/','FlexshopController@sigleTuyendung')->name('singleTd');
Route::get('/bao-gia','FlexshopController@listBaogia')->name('baogia');
Route::get('/bao-gia/{slug}/','FlexshopController@sigleBaogia')->name('singleBg');
//project
Route::get('/danh-sach-du-an','FlexshopController@getListProject')->name('listProjects');
Route::get('/danh-sach-du-an/{id}/{cateSlug}','FlexshopController@cateProject')->name('cateListProject');
Route::get('/du-an/{id}/{projectSlug}','FlexshopController@singleProject')->name('postProject');
//news
Route::get('/danh-sach-tin','FlexshopController@getListNews')->name('listNews');
Route::get('/danh-sach-tin/{id}/{cateSlug}','FlexshopController@cateNews')->name('cateListNews');
Route::get('/tin-tuc/{id}/{tintSlug}','FlexshopController@singleNews')->name('postNews');
//design
Route::get('/thiet-ke-noi-that','FlexshopController@getListDesign')->name('listDesign');
Route::get('/thiet-ke-noi-that/{id}/{cateSlug}','FlexshopController@cateDesign')->name('cateListDesign');
Route::get('/noi-that/{id}/{projectSlug}','FlexshopController@singleDesign')->name('postDesign');
//product
Route::get('/danh-sach-san-pham','FlexshopController@getListProduct')->name('getListProduct');
Route::get('/danh-sach-san-pham/{id}/{cateSlug}','FlexshopController@cateProduct')->name('cateListProduct');
Route::get('/danh-sach-san-pham/{id}/{cateSlug}/list','FlexshopController@listProduct')->name('listProduct');
Route::get('/san-pham/{id}/{productSlug}','FlexshopController@singleProduct')->name('postProduct');
//Email
Route::resource('/resMail', 'EmailController',['except' => ['create','update', 'destroy']]);
//Search
Route::get('/multisearch','FlexshopController@multiSearch')->name('multiSearch');
//Contact
Route::get('/putContact','ContactController@store')->name('putContact');
Route::get('/contact','ContactController@index')->name('contactIndex');
Route::get('/lien-he','FlexshopController@lienhe')->name('contactShow');
//
Route::get('/searchProdduct','FlexshopController@searchProd')->name('searchProd');
//Comment
Route::post('/comment','CommentController@store')->name('comment.store');





//back end


Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::group(['prefix' => 'panel','middleware'=>'auth'], function () {
        //category
        Route::resource('category', 'CateController', ['except' => 'destroy']);
        Route::get('category/{idDelete}/destroy', 'CateController@destroy')->name('category.delete');
        Route::resource('categoryBDS', 'CateBDSController', ['except' => 'destroy']);
        Route::get('categoryBDS/{idDelete}/destroy', 'CateBDSController@destroy')->name('categoryBDS.delete');
        //article
        Route::resource('news', 'NewsController', ['except' => 'destroy']);
        Route::get('news/{idDelete}/destroy', 'NewsController@destroy')->name('news.delete');
        Route::resource('newsBDS', 'NewsBDSController', ['except' => 'destroy']);
        Route::get('newsBDS/{idDelete}/destroy', 'NewsBDSController@destroy')->name('newsbds.delete');
        //slider
        Route::resource('slider','SliderController',['except' => 'destroy']);
        Route::get('slider/{idDelete}/destroy','SliderController@destroy')->name('slider.delete');
        //user
        Route::resource('user', 'UserController');
        //system
        Route::resource('/system','SystemController',['except'=>['destroy','create','show','store']]);
        //Pages
        Route::resource('/pages','PagesController',['except' => ['destroy','create','show','store']]);

//        //category furniture
//        Route::resource('catefurniture', 'CateFurController', ['except' => 'destroy']);
//        Route::get('catefurniture/{idDelete}/destroy', 'CateFurController@destroy')->name('catefur.delete');
//        //category product
//        Route::resource('cateprod', 'CateProdController', ['except' => 'destroy']);
//        Route::get('cateprod/{idDelete}/destroy', 'CateProdController@destroy')->name('cateprod.delete');
//        //Furniture
//        Route::resource('furniture', 'FurnitureController', ['except' => 'destroy']);
//        Route::get('furniture/{idDelete}/destroy', 'FurnitureController@destroy')->name('furs.delete');
//        // cate News and Feng Shui
//        Route::resource('catefengshui', 'CateTtPhongthuyController', ['except' => 'destroy']);
//        Route::get('catefengshui/{idDelete}/destroy', 'CateTtPhongthuyController@destroy')->name('fengshui.delete');
//        //News and Feng shui
//        Route::resource('fengshui', 'FengshuiController', ['except' => 'destroy']);
//        Route::get('fengshui/{idDelete}/destroy', 'FengshuiController@destroy')->name('feng.delete');
//        //Prods
//        Route::resource('prods', 'ProdsController', ['except' => 'destroy']);
//        Route::get('prods/{idDelete}/destroy', 'ProdsController@destroy')->name('prods.delete');

        //partner
//        Route::resource('partner','PartnerController',['except' => 'destroy']);
//        Route::get('partner/{idDelete}/destroy','PartnerController@destroy')->name('partner.delete');
//        //tags
//        Route::resource('tags', 'TagsController', ['except' => 'destroy']);
//        Route::get('tags/{idDelete}/destroy', 'TagsController@destroy')->name('tags.delete');

        // Bao gia va tuyen dung
//        Route::resource('/batu','BagiaTuduController',['except'=>'destroy']);
//        Route::get('batu/{idDelete}/destroy', 'BagiaTuduController@destroy')->name('batu.delete');
//        Route::resource('/tuyendung','TuyendungController',['except'=>'destroy']);
//        Route::get('tuyendung/{idDelete}/destroy', 'BagiaTuduController@destroy')->name('tuyendung.delete');
//        //comment
//        Route::get('/comment','CommentController@index')->name('comment.index');
//        Route::get('/comment/{idDelete}/destroy','CommentController@destroy')->name('comment.delete');

    });
});
