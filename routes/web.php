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

Route::get('/', 'ClientController@index');

Auth::routes();
//checklogin
Route::post('/checklogin', 'LoginController@check')->name('logincheck');
//
Route::get('/home', 'BookController@getListBook')->name('home');
//client
Route::get('/Product/Category/{category_id}', 'BookController@getLbookbyCategory');
//get list book on index page
Route::get('/Product/Type/{type_id}', 'BookController@getLbookbyType');
// get Check out page
Route::get('/Checkout/Cart', 'CartController@getCart');
// add product to cart
Route::get('/Addtocart/{id}/{name}', 'CartController@AddtoCart');
//Clear cart
Route::get('/ClearCart', 'CartController@ClearCart');
// Remove cart
Route::get('/RemoveCart/{id}', 'CartController@RemoveCart');
//Update cart
Route::post('/Updatecart', 'CartController@UpdateCart');
// get book_info
Route::get('/Product/singleproduct/{book_id}', 'BookController@getBookinfo');
//showaddproduct
Route::middleware(['permison', 'auth'])->group(function () {
    Route::get('/addproduct', 'ClientController@getAddBook');
});

//updateinfo
Route::get('/info','ClientController@showinfo');
//Route::post('/info','ClientController@updateinfo')

Route::middleware(['permison', 'auth'])->group(function () {
    //index
    Route::get('/admin/dashboard', 'AdminController@index')->name('dashboard');
    //account
    Route::get('/admin/dashboard/accountmanager', 'AdminController@getAccountMNG');
    //member
    Route::get('/admin/dashboard/membermanager', 'AdminController@getMemberMNG');
    //book
    Route::get('/admin/dashboard/bookmanager', 'BookController@GetListBooks');
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
    Route::get('/admin/dashboard/typemanager', 'TypeController@getListType');
    // addlist
    Route::post('/admin/dashboard/addbooklist', 'TypeController@postBooklist');
// updatelist
    Route::post('/admin/dashboard/typemanager/updatebooklist/{id}', 'TypeController@postUpdatebooklist');
    //deletelist
    Route::get('/admin/dashboard/typemanager/deletebooklist/{id}', 'TypeController@getDeletebooklist');
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
});

// test
Route::get('/Checkout/Cartx', 'CartController@getCartx');
