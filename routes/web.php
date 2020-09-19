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

//Route::get('/', array('as'=> '/','uses'=> 'AuthController@login'));

Route::any('/','AuthController@login')->name('home');

Route::any('login','AuthController@login')->name('login');


//Route::post('login', array('as' => 'login','uses' => 'AuthController@login'));
//Route::get('login', array('as' => 'login','uses' => 'AuthController@login'));


Route::group(['middleware' => 'auth'], function () {
	
Route::get('/admin/print/invoice/{id}','PdfController@printInvoice')->name('print.invoice');	
	
	

Route::any('/user/dashboard','SalesUserController@index')->name('sales.home');
Route::any('/sub-admin/dashboard','SubAdminController@index')->name('sub-admin.home');
Route::any('/admin/dashboard','AdminController@index')->name('admin.home');

Route::any('/raw/material/dashboard','RawUserController@index')->name('raw.home');
Route::any('/production/dashboard','ProductionUserController@index')->name('production.home');

//Profile

Route::any('/change/password','AdminController@changePassword')->name('change.password');


Route::any('logout','HomeController@logoutUser')->name('logout');

//delete
Route::get('/delete/record','HomeController@deleteRecord')->name('delete.record');


//Website User list
Route::get('/subadmin/list','AdminController@subAdminUserList')->name('subadmin.user.list');
Route::get('/sales/user/list','AdminController@salesUserList')->name('sales.user.list');

Route::get('/raw/material/user/list','AdminController@rawUserList')->name('raw.user.list');
Route::get('/production/user/list','AdminController@productionUserList')->name('production.user.list');

Route::get('/all/user/list','AdminController@allUserList')->name('all.user.list');

Route::any('/create/user','AdminController@createUser')->name('create.user');


Route::get('/user/edit/{id}','AdminController@editUser')->name('user.edit');
Route::post('/user/edit/{id}','AdminController@editUser')->name('user.edit');

Route::get('/activity/list','ActivityController@list')->name('activity.list');

Route::get('/user/activity/list','ActivityController@userlist')->name('user.activity.list');
Route::get('/product/activity/list','ActivityController@productlist')->name('product.activity.list');
Route::get('/order/activity/list','ActivityController@orderlist')->name('order.activity.list');



//Company
Route::get('/company','CompanyController@companyList')->name('admin.company.list');
Route::post('/company','CompanyController@companyList')->name('admin.company.list');
Route::get('/create/company','CompanyController@createCompany')->name('admin.company.create');
Route::post('/create/company','CompanyController@createCompany')->name('admin.company.create');
Route::get('/edit/company/{id}', 'CompanyController@editCompany')->name('admin.company.edit');
Route::post('/edit/company/{id}', 'CompanyController@editCompany')->name('admin.company.edit');
Route::get('/delete/company/{id}','CompanyController@deleteCompany')->name('admin.company.delete');

//plant

Route::get('/plant','CompanyController@plantList')->name('admin.plant.list');

Route::get('/plant/detail','CompanyController@getPlant')->name('plant.detail');

Route::post('/plant/create','CompanyController@createPlant')->name('admin.plant.create');
Route::post('/plant/edit/{id}','CompanyController@editPlant')->name('admin.plant.edit');
Route::get('/plant/delete/{id}','CompanyController@deletePlant')->name('admin.plant.delete');



//Customers
Route::get('/customer','CustomerController@customerList')->name('admin.customer.list');

Route::get('/customer/active','CustomerController@activeCustomer')->name('admin.active.customer.list');
Route::get('/customer/archive','CustomerController@archiveCustomer')->name('admin.archive.customer.list');


Route::post('/customer','CustomerController@customerList')->name('admin.customer.list');
Route::get('/create/customer','CustomerController@createCustomer')->name('admin.customer.create');
Route::post('/create/customer','CustomerController@createCustomer')->name('admin.customer.create');
Route::get('/edit/customer/{id}', 'CustomerController@editCustomer')->name('admin.customer.edit');
Route::post('/edit/customer/{id}', 'CustomerController@editCustomer')->name('admin.customer.edit');

Route::get('/view/customer/{id}', 'CustomerController@viewCustomer')->name('admin.customer.view');
Route::post('/view/customer/{id}', 'CustomerController@viewCustomer')->name('admin.customer.view');

Route::get('/order/create', 'OrderController@createOrder')->name('admin.order.create');
Route::post('/order/create', 'OrderController@createOrder')->name('admin.order.create');

Route::get('/order/list', 'OrderController@listOrder')->name('admin.order.list');
Route::post('/order/list', 'OrderController@listOrder')->name('admin.order.list');
Route::get('/order/detail/{id}','OrderController@showOrderDetail')->name('admin.order.detail');

Route::post('/order/edit/{id}','OrderController@editOrder')->name('admin.order.edit');
Route::get('/order/edit/{id}','OrderController@editOrder')->name('admin.order.edit');

Route::post('admin/order/status/update','OrderController@editOrderStatus')->name('order.status.update');


Route::get('/delete/customer/{id}','CustomerController@deleteCustomer')->name('admin.customer.delete');
Route::get('selectState',array('as'=>'selectState','uses'=>'AjaxController@selectState'));



//Attribute
Route::get('/attribute','AttributeController@showAttribute')->name('admin.attribute.list');
Route::post('/attribute','AttributeController@showAttribute')->name('admin.attribute.list');
Route::get('/create/attribute','AttributeController@createAttribute')->name('admin.attribute.create');
Route::post('/create/attribute','AttributeController@createAttribute')->name('admin.attribute.create');
Route::get('/edit/attribute/{id}', 'AttributeController@editAttribute')->name('admin.attribute.edit');
Route::post('/edit/attribute/{id}', 'AttributeController@editAttribute')->name('admin.attribute.edit');
Route::get('/delete/attribute/{id}','AttributeController@deleteAttribute')->name('admin.attribute.delete');




//Option
Route::get('/option','OptionController@showOption')->name('admin.option.list');
Route::get('/create/option','OptionController@createOption')->name('admin.option.create');
Route::post('/create/option','OptionController@createOption')->name('admin.option.create');
Route::get('/edit/option/{id}', 'OptionController@editOption')->name('admin.option.edit');
Route::post('/edit/option/{id}', 'OptionController@editOption')->name('admin.option.edit');
Route::get('/delete/option/{id}','OptionController@deleteOption')->name('admin.option.delete');
// for ajax // option_id to all option value
Route::get('/option/list','AjaxController@selectOptionList')->name('admin.get.option.value');


//Product
Route::get('/product','ProductController@showProduct')->name('admin.product.list');
Route::post('/product','ProductController@showProduct')->name('admin.product.list');
Route::get('/create/product','ProductController@createProduct')->name('admin.product.create');
Route::post('/create/product','ProductController@createProduct')->name('admin.product.create');
Route::get('/edit/product/{id}', 'ProductController@editProduct')->name('admin.product.edit');
Route::post('/edit/product/{id}', 'ProductController@editProduct')->name('admin.product.edit');
Route::get('/delete/product/{id}','ProductController@deleteProduct')->name('admin.product.delete');


Route::get('/get/product','ProductController@getProduct')->name('admin.get.product');
Route::get('/get/subproduct','ProductController@getSubProduct')->name('admin.get.subproduct');
Route::get('/get/customer','CustomerController@getCustomer')->name('admin.get.customer');



//Category
Route::get('/category','CategoryController@showCategory')->name('admin.category.list');
Route::get('/create/category','CategoryController@createCategory')->name('admin.category.create');
Route::post('/create/category','CategoryController@createCategory')->name('admin.category.create');
Route::get('/edit/category/{id}', 'CategoryController@editCategory')->name('admin.category.edit');
Route::post('/edit/category/{id}', 'CategoryController@editCategory')->name('admin.category.edit');
Route::get('/delete/category/{id}','CategoryController@deleteCategory')->name('admin.category.delete');


//Material Catalog
//Option
Route::get('/material/option','MaterialOptionController@showOption')->name('admin.material.option.list');
Route::get('/create/material/option','MaterialOptionController@createOption')->name('admin.material.option.create');
Route::post('/create/material/option','MaterialOptionController@createOption')->name('admin.material.option.create');
Route::get('/edit/material/option/{id}', 'MaterialOptionController@editOption')->name('admin.material.option.edit');
Route::post('/edit/material/option/{id}', 'MaterialOptionController@editOption')->name('admin.material.option.edit');
Route::get('/delete/material/option/{id}','MaterialOptionController@deleteOption')->name('admin.material.option.delete');
// for ajax // option_id to all option value
Route::get('/option/material/list','MaterialAjaxController@selectOptionList')->name('admin.material.get.option.value');


//Product
Route::get('/material/product','MaterialProductController@showProduct')->name('admin.material.product.list');
Route::post('/material/product','MaterialProductController@showProduct')->name('admin.material.product.list');
Route::get('/create/material/product','MaterialProductController@createProduct')->name('admin.material.product.create');
Route::post('/create/material/product','MaterialProductController@createProduct')->name('admin.material.product.create');
Route::get('/edit/material/product/{id}', 'MaterialProductController@editProduct')->name('admin.material.product.edit');
Route::post('/edit/material/product/{id}', 'MaterialProductController@editProduct')->name('admin.material.product.edit');
Route::get('/delete/material/product/{id}','MaterialProductController@deleteProduct')->name('admin.material.product.delete');



//Category
Route::get('/material//category','MaterialCategoryController@showCategory')->name('admin.material.category.list');
Route::get('/create/material/category','MaterialCategoryController@createCategory')->name('admin.material.category.create');
Route::post('/create/material/category','MaterialCategoryController@createCategory')->name('admin.material.category.create');
Route::get('/edit/material/category/{id}', 'MaterialCategoryController@editCategory')->name('admin.material.category.edit');
Route::post('/edit/material/category/{id}', 'MaterialCategoryController@editCategory')->name('admin.material.category.edit');
Route::get('/delete/material/category/{id}','MaterialCategoryController@deleteCategory')->name('admin.material.category.delete');

//end of material catalog


//sales user routes
Route::get('/sales/order/list','SalesUserController@orderList')->name('sales.order.list');
Route::get('/sales/order/create','SalesUserController@createOrder')->name('sales.order.create');
Route::post('/sales/order/create','SalesUserController@createOrder')->name('sales.order.create');
Route::post('/sales/order/edit/{id}','SalesUserController@editOrder')->name('sales.order.edit');


//sales user routes end



//order status

Route::get('/order/status/list','OrderStatusController@OrderStatusList')->name('order.status.list');

Route::post('/order/status/create','OrderStatusController@createOrderStatus')->name('order.status.create');
Route::post('/order/status/edit/{id}','OrderStatusController@editOrderStatus')->name('order.status.edit');
Route::get('/order/status/delete/{id}','OrderStatusController@deleteOrderStatus')->name('order.status.delete');

	
});
