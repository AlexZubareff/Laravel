<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController as UserCommentController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\SourceController as SourceController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\Admin\NewsCommentController as AdminNewsCommentController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('newWelcome');
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])
/*    ->where('id', '\d+')*/
    ->name('news.show');
Route::get('/category', [CategoryNewsController::class, 'showCategoryList'])
    ->name('categoryList');
Route::get('/source', [SourceController::class,'index'])
    ->name('source');
Route::get('/category/{category}', [CategoryNewsController::class, 'showCategoryNews'])
    ->name('categoryNews');
Route::post('/news/comment', [UserCommentController::class, 'addComment'])
    ->name('userComment');
Route::post('/news/comment/download', [UserCommentController::class, 'downloadComment'])
    ->name('userComment.download');
Route::post('/news/comment/store', [UserCommentController::class, 'storeComment'])
    ->name('userComment.store');


Route::group(['middleware'=> 'auth'], function() {
    Route::group(['prefix' => 'account', 'as' => 'account'], function () {
        Route::get('/', AccountController::class)
        ->name('index');
        // loguot
        Route::get('logout', function () {
           Auth::logout();
           return redirect()->route('login');
        })->name('logout');
    });
// Admin routs
    Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=> 'admin.check'], function (){
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('comments', AdminNewsCommentController::class);
        Route::resource('sources', AdminSourceController::class);
        Route::resource('user', AdminUserController::class);
    });

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
