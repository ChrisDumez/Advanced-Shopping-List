<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\TestController;

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

//Route::get('/t', [TestController::class, 'index']);

//User Controller


Route::get('/', [UserController::class, 'UserLoginView']);

Route::post('/user-login', [UserController::class, 'UserLogin']);

//Route::get('/user-registration', [UserController::class, 'UserRegistrationView']);

//Route::post('/user-registration', [UserController::class, 'UserRegistration']);



//Shopping List Controller

Route::get('/items-dashboard', [ShoppingListController::class, 'dashboard']);

Route::post('/add-item', [ShoppingListController::class, 'additem']);

Route::get('/delete-item/{id}', [ShoppingListController::class, 'deleteitem']);

Route::get('/change-item/{id}', [ShoppingListController::class, 'edititemView']);

Route::post('/change-item/{id}', [ShoppingListController::class, 'edititem']);

Route::get('/collected-item/{id}', [ShoppingListController::class, 'collectitemView']);

Route::post('/purchase-item/{id}', [ShoppingListController::class, 'purchaseitem']);

Route::get('/items-list', [ShoppingListController::class, 'purchaselist']);

Route::get('/delete-purchaseitem/{id}', [ShoppingListController::class, 'purchaseitemdelete']);

Route::get('/delete-purchaseitemdeleteAllView', [ShoppingListController::class, 'purchaseitemdeleteAllView']);

Route::get('/delete-purchaseitemdeleteAll', [ShoppingListController::class, 'purchaseitemdeleteAll']);

Route::get('/logout', [ShoppingListController::class, 'logout']);
