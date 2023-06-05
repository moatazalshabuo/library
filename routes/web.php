<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartogryController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CustomuserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\lacturesController;
use App\Http\Controllers\ReperScienceController;
use App\Http\Controllers\Scientific_journalController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
  Route::middleware(["auth", 'active'])->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get("point","checkPoint")->name("point");
    Route::get("addpoint/{id}","addPoint")->name("addpoint");
  });
});

Auth::routes();
Route::get('logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(["auth", 'active']);

Route::resource('book', BooksController::class)->middleware(["auth", 'active']);

Route::get('search_book', [BooksController::class, 'show'])->name("search_book")->middleware(["auth", 'active']);
Route::get('delete_book/{delete}', [BooksController::class, 'destroy'])->name("delete_book")->middleware(["auth", 'active']);
Route::post("store/request", [BooksController::class, "store_request"])->name("request.store")->middleware("auth", "active");
Route::get("index/request", [BooksController::class, "index_request"])->name("request.index")->middleware("auth", "active");
Route::get("index/active/{id}", [BooksController::class, "active_request"])->name("request.active")->middleware("auth", "active");
Route::get("index/destroy/{id}", [BooksController::class, "destroy_request"])->name("request.destroy")->middleware("auth", "active");
Route::get("books/revew", [BooksController::class, "revew"])->name("revew.book")->middleware("auth", "active");
Route::get("books/revew/check/{id}", [BooksController::class, "revewCheck"])->name("revew.check")->middleware("auth", "active");
Route::post("books/revew/add", [BooksController::class, "revewAdd"])->name("add.revew")->middleware("auth", "active");
Route::get("books/revew-admin", [BooksController::class, "revewAdmin"])->name("revewadmin.book")->middleware("auth", "active");
Route::get("books/revew-admin/accept/{id}", [BooksController::class, "revewAccept"])->name("revewaccept.book")->middleware("auth", "active");
Route::get("books/revew-admin/unaccept/{id}", [BooksController::class, "revewUnAccept"])->name("revewunaccept.book")->middleware("auth", "active");



Route::controller(Scientific_journalController::class)->group(function () {
  Route::middleware(["auth", 'active'])->group(function () {
    Route::get('addScie/', "create")->name("addScie");
    Route::post("storeScie", "store")->name("storeScie");
    Route::get("Scie", "index")->name("Scie");
    Route::get("editScie/{id}", "edit")->name("editscie");
    Route::post("updateScie/{id}", "update")->name("updatescie");
    Route::get("search_scie", "search")->name("searchscie");
    Route::get("deleteScie/{id}", "delete")->name("deletescie");
  });
});

Route::controller(CartogryController::class)->group(function () {
  Route::middleware(["auth", 'active'])->group(function () {
    Route::post('addcat', 'insert_cat')->name('addcat');
  });
});

Route::controller(ReperScienceController::class)->group(function () {
  Route::middleware(["auth", 'active'])->group(function () {
    Route::get('peper/{id?}', "index")->name("indexPeper");
    Route::get('pepertech/', "indextech")->name("indexPepertech");
    Route::get('addpeper/', 'create')->name('add_peper');
    Route::get('addpepertech/', 'createTech')->name('add_pepertech');
    Route::post("storePeper", "store")->name("storePeper");
    Route::get("search_peper/{id?}", "search")->name("searchpeper");
    Route::get("editpeper/{id}", "edit")->name('editpeper');
    Route::post("updatepeper/{id}", "update")->name("update_peper");
    Route::get("deletepeper/{id}", "delete")->name("delete_peper");
    Route::get('peper/active/{id}', "active")->name("peperactive");
  });
});

Route::resource("depart", DepartmentController::class)->middleware(["auth", 'active']);
Route::controller(DepartmentController::class)->group(function () {
  Route::middleware(["auth", 'active'])->group(function () {

    Route::get("delete_depart/{id}", "destroy")->name("delete_depart");
    Route::get('departs/', "show")->name("departs.show");
  });
});

Route::controller(CoursesController::class)->group(function () {
  Route::middleware(["auth", 'active'])->group(function () {
    Route::get("course", "index")->name("course_index");
    Route::post("course/store", "store")->name("course_store");
    Route::get("course/delete/{id}", "destroy")->name("course_delete");
    Route::get("courses/{depart}", "show")->name("course.show");
  });
});

// Route::resource("lectures",lacturesController::class);

Route::controller(lacturesController::class)->group(function () {
  Route::prefix("lectures")->group(function () {
    Route::middleware(["auth", 'active'])->group(function () {
      Route::get("index/{code}", "index")->name("lectures.index");
      Route::get('create', "create")->name("lectures.create");
      Route::post('store', 'store')->name('lectures.store');
      // Route::get("search_peper/","search")->name("searchpeper");
      Route::get("edit/{id}", "edit")->name('lectures.edit');
      Route::post("update/{id}", "update")->name("lectures.update");
      Route::get("delete/{id}", "destroy")->name("lectures.delete");
    });
  });
});

Route::get("user/create", [CustomuserController::class, 'create'])->name("user.creater")->middleware("auth");
Route::get("user/index", [CustomuserController::class, 'index'])->name("user.indexr")->middleware("auth");
Route::post("user/store", [CustomuserController::class, 'store'])->name("user.storer")->middleware("auth");
Route::get("user/active/{id}", [CustomuserController::class, 'active'])->name("user.active")->middleware("auth");
Route::get("user/search", [CustomuserController::class, 'show'])->name("user.search")->middleware("auth");
Route::get("user/profile/{id}", [CustomuserController::class, 'profile'])->name("user.profile")->middleware("auth");
Route::post("user/update/{id}", [CustomuserController::class, 'update'])->name("user.update")->middleware("auth");

Route::get("active", function () {
  return view("active");
})->name('active');
