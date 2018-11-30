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
use App\bt_role;
use App\Http\Controllers\Recommend;

//Route::get('/', 'ClientController@index');

Auth::routes();
//checklogin
Route::post('/checklogin', 'LoginController@check')->name('logincheck');
//
Route::get('/', 'BookController@getListBook');
Route::get('/home', 'BookController@getListBook')->name('home');
//client
Route::get('/Product/Category/{category_id}', 'BookController@getLbookbyCategory');
Route::get('/Product/Category/{category_id}?order=price', 'BookController@getLbookbyCategory');
Route::get('/Product/Category/{category_id}?order=name', 'BookController@getLbookbyCategory');
//get list book on index page
Route::get('/Product/Type/{type_id}', 'BookController@getLbookbyType');
Route::get('/Product/Type/{type_id}?order=price', 'BookController@getLbookbyType');
Route::get('/Product/Type/{type_id}?order=price', 'BookController@getLbookbyType');
// get Check out page
Route::get('/Checkout/Cart', 'CartController@getCart');
Route::get('/Checkout', 'CartController@getPCheckout');
// add product to cart
Route::get('/Addtocart/{id}', 'CartController@AddtoCart');
//Clear cart
Route::get('/ClearCart', 'CartController@ClearCart');
// Remove cart
Route::get('/RemoveCart/{id}', 'CartController@RemoveCart');
//Update cart
Route::post('/Updatecart', 'CartController@UpdateCart');
// get book_info
Route::get('/Product/singleproduct/{book_id}', 'BookController@getBookinfo');
//Search
Route::get('/Product/Search/{keyword}','BookController@SearchBook');
Route::post('/Product/comment/{id}','CommentController@postComment');
Route::get('/Product/comment/{id}','CommentController@getComment');
Route::post('/Product/rating/{book_id}','RatingController@postRating');
Route::get('/Userinfo/{id}','UserController@getUserinfo');
Route::post('/Product/checkout/{memberid}','CartController@checkout');
//showaddproduct
Route::get('/Product/uploadbook','BookController@getUploadbook');
Route::post('/Product/uploadbook', 'BookController@postAddBookFU');
Route::middleware(['permison2', 'auth'])->group(function () {
    Route::get('/addproduct', 'ClientController@getAddBook');
    Route::post('/addproduct', 'ClientController@postAddBook');
    Route::get('/Product/uploadbook','BookController@getUploadbook');
    Route::post('/Product/uploadbook', 'BookController@postAddBookFU');

});

//updateinfo
// get user info in client
Route::get('/info/{id}','UserController@getUserinfo');
// get update user info in client
Route::post('/info/{id}','UserController@updateinfo');

Route::middleware(['permison', 'auth'])->group(function () {
    //index
    Route::get('/admin/dashboard', 'AdminController@index')->name('dashboard');
    //account
    Route::get('/admin/dashboard/accountmanager','AccountController@getAccount');
    Route::get('/admin/dashboard/accountmanager/delete/{id}','AccountController@getDeleteAccount');
    Route::post('/admin/dashboard/accountmanager/update/{id}','AccountController@postUpdateAccount');
    //member
    Route::get('/admin/dashboard/membermanager', 'UserController@getUser');
    Route::get('/admin/dashboard/membermanager/delete/{id}', 'UserController@getDeleteUser');
    //book
    Route::get('/admin/dashboard/bookmanager', 'BookController@GetListBooks');
    Route::get('/admin/dashboard/nonacceptbook', 'BookController@GetListNonacceptBooks');
    //Acceptbook
    Route::get('/admin/dashboard/bookaccept/{id}','AjaxController@Acceptbook');
    //addbook
    Route::get('/admin/dashboard/bookmanager/addbook', 'BookController@getAddBook');
    Route::post('/admin/dashboard/bookmanager/addbook', 'BookController@postAddBook');
    //updatebook
    Route::get('/admin/dashboard/bookmanager/updatebook/{id}', 'BookController@getUpdateBook');
    Route::post('/admin/dashboard/bookmanager/updatebook/{id}', 'BookController@postUpdateBook');
    //bookdetail
    Route::get('/admin/dashboard/bookmanager/bookdetail/{id}', 'BookController@getbookDetail');
    //delete book
    Route::get('/admin/dashboard/bookmanager/deletebook/{id}', 'BookController@getDeletebook');
    //type
    Route::get('/admin/dashboard/typemanager', 'CategoryController@getListType');
    // addCategory
    Route::post('/admin/dashboard/addbooklist', 'CategoryController@postCategoryList');
// updateCategory
    Route::post('/admin/dashboard/typemanager/updatebooklist/{id}', 'CategoryController@postUpdatebookCategory');
    //deleteCategory
    Route::get('/admin/dashboard/typemanager/deletebooklist/{id}', 'CategoryController@getDeletebookCategory');
    // addtype
    Route::get('/admin/dashboard/addbooktype', 'TypeController@getAddbooktype');
    Route::post('/admin/dashboard/addbooktype', 'TypeController@postBooktype');
    // updatetype
    Route::post('/admin/dashboard/typemanager/updatebooktype/{id}', 'TypeController@postUpdatebooktype');
    //deletetype
    Route::get('/admin/dashboard/typemanager/deletebooktype/{id}', 'TypeController@getDeletebooktype');
    //bill
    Route::get('/admin/dashboard/billmanager', 'BillController@getBillmanager');
    //update bill
    Route::post('/admin/dashboard/billmanager/updatebill/{id}', 'BillController@getupdateBillmanager');
    //delete bill
    Route::get('/admin/dashboard/billmanager/deletebill/{id}', 'BillController@getDeleteBill');
    //thong ke
    Route::get('/admin/dashboard/viewmanager', 'AdminController@getViewMNG');
    Route::get('/admin/ajax/category/{id}/{typeid}','AjaxController@getBooktype');
    Route::get('/admin/ajax/category/{id}','AjaxController@getBooktypeadd');
    //slide
    //slide manage
    Route::get('/admin/dashboard/slidemanager','SlideController@getSlide');
    //add slide
    Route::get('/admin/dashboard/slidemanager/addslide','SlideController@getAddslide');
    Route::post('/admin/dashboard/slidemanager/addslide','SlideController@Addslide');
    //delete slide
    Route::get('/admin/dashboard/slidemanager/deleteslide/{id}','SlideController@DeleteSlide');
    //update
    Route::get('/admin/dashboard/slidemanager/updateslide/{id}','SlideController@getUpdateSlide');
    Route::post('/admin/dashboard/slidemanager/updateslide/{id}','SlideController@updateSlide');
    //Ative Slide
    Route::get('/admin/dashboard/slidemanager/activeslide/{id}','SlideController@ActiveSlide');
    //crawller
    Route::get('/CrawlCate','CrawlController@CrawlCate');
    Route::get('/CrawlAllBook','CrawlController@Crawlallbook');
    Route::get('/CrawlBook/{Typeid}','CrawlController@getBook');
    Route::get('/CrawType','CrawlController@getType');
});
// test
Route::get('/ML/{userid}',function ()
{
    $x = new Recommend();
    $listRaw = $x->recomemded(1,'bt_rates','member_id','book_id','book_rating');
    dd($listRaw);
});

Route::get('/x','BookController@updatef');
