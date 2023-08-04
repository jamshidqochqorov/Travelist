<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blade\UserController;
use App\Http\Controllers\Blade\RoleController;
use App\Http\Controllers\Blade\PermissionController;
use App\Http\Controllers\Blade\HomeController;
use App\Http\Controllers\Blade\ApiUserController;

/*
|--------------------------------------------------------------------------
| Blade (front-end) Routes
|--------------------------------------------------------------------------
|
| Here is we write all routes which are related to web pages
| like UserManagement interfaces, Diagrams and others
|
*/

// Default laravel auth routes
Auth::routes();


// Welcome page
Route::get('/', function (){
    return redirect()->route('home');
})->name('welcome');

// Web pages
Route::group(['middleware' => 'auth'],function (){

    // there should be graphics, diagrams about total conditions
    Route::get('/home', [HomeController::class,'index'])->name('home');

    //Agents
    Route::get('/agents',[AgentController::class,'index'])->name('agentIndex');
    Route::get('/agent/add',[AgentController::class,'add'])->name('agentAdd');
    Route::post('/agent/create',[AgentController::class,'create'])->name('agentCreate');
    Route::get('/agent/{id}/edit',[AgentController::class,'edit'])->name('agentEdit');
    Route::post('/agent/update/{id}',[AgentController::class,'update'])->name('agentUpdate');
    Route::delete('/agent/delete/{id}',[AgentController::class,'destroy'])->name('agentDestroy');

    //category
    Route::get('/category',[CategoryController::class,'index'])->name('categoryIndex');
    Route::get('/category/add',[CategoryController::class,'add'])->name('categoryAdd');
    Route::post('/category/create',[CategoryController::class,'create'])->name('categoryCreate');
    Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('categoryEdit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('categoryUpdate');
    Route::delete('/category/delete/{id}',[CategoryController::class,'destroy'])->name('categoryDestroy');
    //client
    Route::get('/client',[ClientController::class,'index'])->name('clientIndex');
    Route::get('/client/add',[ClientController::class,'add'])->name('clientAdd');
    Route::post('/client/create',[ClientController::class,'create'])->name('clientCreate');
    Route::get('/client/{id}/edit',[ClientController::class,'edit'])->name('clientEdit');
    Route::post('/client/update/{id}',[ClientController::class,'update'])->name('clientUpdate');
    Route::delete('/client/delete/{id}',[ClientController::class,'destroy'])->name('clientDestroy');

    //transaction
    Route::get('/transaction',[TransactionController::class,'index'])->name('transactionIndex');
    Route::get('/transaction/agent/{id}',[TransactionController::class,'history'])->name('transactionHistory');
    Route::post('/transaction/create',[TransactionController::class,'create'])->name('transactionCreate');
    Route::get('/transaction/{id}/edit',[TransactionController::class,'edit'])->name('transactionEdit');
    Route::post('/transaction/update/{id}',[TransactionController::class,'update'])->name('transactionUpdate');
    Route::delete('/transaction/delete/{id}',[TransactionController::class,'destroy'])->name('transactionDestroy');

    // Users
    Route::get('/users',[UserController::class,'index'])->name('userIndex');
    Route::get('/user/add',[UserController::class,'add'])->name('userAdd');
    Route::post('/user/create',[UserController::class,'create'])->name('userCreate');
    Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('userEdit');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('userUpdate');
    Route::delete('/user/delete/{id}',[UserController::class,'destroy'])->name('userDestroy');
    Route::get('/user/theme-set/{id}',[UserController::class,'setTheme'])->name('userSetTheme');

    // Permissions
    Route::get('/permissions',[PermissionController::class,'index'])->name('permissionIndex');
    Route::get('/permission/add',[PermissionController::class,'add'])->name('permissionAdd');
    Route::post('/permission/create',[PermissionController::class,'create'])->name('permissionCreate');
    Route::get('/permission/{id}/edit',[PermissionController::class,'edit'])->name('permissionEdit');
    Route::post('/permission/update/{id}',[PermissionController::class,'update'])->name('permissionUpdate');
    Route::delete('/permission/delete/{id}',[PermissionController::class,'destroy'])->name('permissionDestroy');

    // Roles
    Route::get('/roles',[RoleController::class,'index'])->name('roleIndex');
    Route::get('/role/add',[RoleController::class,'add'])->name('roleAdd');
    Route::post('/role/create',[RoleController::class,'create'])->name('roleCreate');
    Route::get('/role/{role_id}/edit',[RoleController::class,'edit'])->name('roleEdit');
    Route::post('/role/update/{role_id}',[RoleController::class,'update'])->name('roleUpdate');
    Route::delete('/role/delete/{id}',[RoleController::class,'destroy'])->name('roleDestroy');

    // ApiUsers
    Route::get('/api-users',[ApiUserController::class,'index'])->name('api-userIndex');
    Route::get('/api-user/add',[ApiUserController::class,'add'])->name('api-userAdd');
    Route::post('/api-user/create',[ApiUserController::class,'create'])->name('api-userCreate');
    Route::get('/api-user/show/{id}',[ApiUserController::class,'show'])->name('api-userShow');
    Route::get('/api-user/{id}/edit',[ApiUserController::class,'edit'])->name('api-userEdit');
    Route::post('/api-user/update/{id}',[ApiUserController::class,'update'])->name('api-userUpdate');
    Route::delete('/api-user/delete/{id}',[ApiUserController::class,'destroy'])->name('api-userDestroy');
    Route::delete('/api-user-token/delete/{id}',[ApiUserController::class,'destroyToken'])->name('api-tokenDestroy');
});

// Change language session condition
Route::get('/language/{lang}',function ($lang){
    $lang = strtolower($lang);
    if ($lang == 'ru' || $lang == 'uz')
    {
        session([
            'locale' => $lang
        ]);
    }
    return redirect()->back();
});

/*
|--------------------------------------------------------------------------
| This is the end of Blade (front-end) Routes
|-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\
*/
