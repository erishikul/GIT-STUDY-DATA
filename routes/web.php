<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\BannerController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\TestSeriesController;

use App\Http\Controllers\UsersController;

use App\Http\Controllers\PaymentController;

use App\Http\Controllers\PlaylistController;

use App\Http\Controllers\SubjectsController;

use App\Http\Controllers\trendingPostsController;

use App\Http\Controllers\vacancyController;

use App\Http\Controllers\pdfcontroller;

use App\Http\Controllers\LiveClassController;
use App\Http\Controllers\BlogController;



use App\Http\Controllers\settingController;


use App\Http\Controllers\GoogleIndexingController;

use Spatie\Sitemap\SitemapGenerator;


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

Route::get('/generate-sitemap', function () {
    SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
    
    return 'Sitemap generated successfully!';
});

Route::get("sitemap.xml" , function () {
    return \Illuminate\Support\Facades\Redirect::to('sitemap.xml');
     });



//index api route
// routes/web.php
//Route::post('/post-article', 'GoogleIndexingController@postArticle');

Route::post('/indexapi', [GoogleIndexingController::class, 'postArticle'])->name('postArticle');



Route::get('/', [SiteController::class, 'vacancy'])->name('vacancy');

Route::get('/home', [SiteController::class, 'index'])->name('home');



Route::get('/test_series', [SiteController::class, 'test_series'])->name('test_series');

// Route::get('/test_series/{id}/{name}', [SiteController::class, 'test_series'])->name('test_seriesBycat');

Route::get('/test_series/{id}', [SiteController::class, 'test_series_detail'])->name('test_series_detail');







// Test Start Routes







Route::get('/instructions/{id}', [SiteController::class, 'instructions'])->name('instructions');

Route::get('/declaration/{id}', [SiteController::class, 'declaration'])->name('declaration');

Route::get('/test_start/v2/{id}', [SiteController::class, 'test_start_v2'])->name('test_start_v2');

Route::get('/test/explaination/v2/{id}', [SiteController::class, 'explaination_v2'])->name('explaination');







Route::get('/test_start/{id}', [SiteController::class, 'test_start'])->name('test_start');

Route::post('/test_start/queSubmit', [SiteController::class, 'q_submit'])->name('q_submit');

Route::post('/test_start/q_change', [SiteController::class, 'q_change'])->name('q_change');



Route::get('/test_done/{id}', [SiteController::class, 'test_done'])->name('test_done');

// Route::get('/test/explaination/{id}', [SiteController::class, 'explaination'])->name('explaination');



Route::get('/quiz', [SiteController::class, 'quiz'])->name('quiz');



Route::get('/pdf', [pdfcontroller::class, 'pdfView'])->name('pdf');





// Route::post('/login/using/otp', [SiteController::class, 'loginOTP'])->name('loginOTP');



Route::get('/admin-login', [SiteController::class, 'admin_login'])->name('admin_login');

Route::post('/admin-login_post', [SiteController::class, 'login_post'])->name('admin_login_post');

// Route::get('/login', [SiteController::class, 'login'])->name('login');

// Route::get('/register', [SiteController::class, 'register'])->name('register');

// Route::post('/register_post', [SiteController::class, 'register_post'])->name('register_post');



Route::post('/login_post', [SiteController::class, 'login_post'])->name('login_post');

Route::get('/logOut', [SiteController::class, 'logOut'])->name('logOut');



Route::get('/profile', [UsersController::class, 'profile'])->name('profile');

Route::post('/profileSetting', [UsersController::class, 'profileSetting'])->name('profileSetting');



Route::post('/buy/test', [PaymentController::class, 'createOrder'])->name('buyTest');

Route::post('/buy/done', [PaymentController::class, 'updatePaymentStatus'])->name('orderDone');



Route::get('/about', [SiteController::class, 'about'])->name('about');

Route::get('/contectUs', [SiteController::class, 'contectUs'])->name('contectUs');









Route::get('/video', [SiteController::class, 'video'])->name('video');

Route::get('/comingsoon', function () {

   
    return view('web/comingSoon');
});



Route::get('/new/govt', [SiteController::class, 'govt'])->name('govt');
Route::get('/jobs', [SiteController::class, 'all_job'])->name('all_job');
Route::get('/result', [SiteController::class, 'all_result'])->name('all_result');
Route::get('/admit_card', [SiteController::class, 'all_admit_card'])->name('all_admit_card');



Route::get('/new/govt/jobs/detail/{id}/', [SiteController::class, 'vacancyDetail'])->name('vacancy_detail');


Route::group(['prefix' => 'admin/'], function () {



    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');



    // Blog  Routes

    Route::get('/blog', [BlogController::class, 'viewbloglist'])->name('admin.blog');

    Route::get('/test_series', [TestSeriesController::class, 'test_series'])->name('admin.test_series');

    Route::get('/add_blog',[BlogController::class,'AddBlog'])->name('admin.add_blog');

    // Route::get('/blog/view',[BlogController::class,'BlogView'])->name('web.blog_view');

    Route::get('/blog/{id}', [BlogController::class, 'blog_view'])->name('web.blog_view');
    // Route::get('/admin/add_blog', function () {
    //     return view('admin.blog.add_blog'); // 'example' is the name of your Blade file (without the .blade.php extension)
    // });

    
   


  


    // Route::post('/importExcel', [TestSeriesController::class, 'importExcel'])->name('admin.importExcel');



    Route::get('/test_series/ques/{id}', [TestSeriesController::class, 'test_ques'])->name('admin.test_ques');

    Route::get('/test_series/que_add/{id}', [TestSeriesController::class, 'que_add'])->name('admin.que_add');

    Route::post('/test_series/que_add_post', [TestSeriesController::class, 'que_add_post'])->name('admin.que_add_post');



    Route::get('/test_series/que_edit/{id}', [TestSeriesController::class, 'que_edit'])->name('admin.que_edit');

    Route::get('/test_series/que_delete/{id}', [TestSeriesController::class, 'que_delete'])->name('admin.que_delete');

    Route::post('/test_series/que_edit_post', [TestSeriesController::class, 'que_edit_post'])->name('admin.que_edit_post');



    // Categories Routes

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');

    Route::post('/category/add', [CategoryController::class, 'create'])->name('admin.category_create');

    Route::post('/category/edit', [CategoryController::class, 'edit'])->name('admin.category_edit');

    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category_delete');

    Route::get('/sub_category/{id}', [CategoryController::class, 'sub_category'])->name('admin.sub_category');



    Route::get('/get_subcategory', [CategoryController::class, 'get_subcategory'])->name('admin.get_subcategory');









    // Banners Routes

    Route::get('/banners', [BannerController::class, 'banners'])->name('admin.banners');

    Route::post('/banner_status/{id}', [BannerController::class, 'banner_status'])->name('admin.banner_status');

    Route::post('/banner/edit', [BannerController::class, 'edit'])->name('admin.banner_edit');



    // Users

    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');

    Route::get('/orders', [PaymentController::class, 'index'])->name('admin.orders');



    // Subjects

    Route::get('/subjects', [SubjectsController::class, 'index'])->name('admin.subjects');

    Route::post('/subject/add', [SubjectsController::class, 'create'])->name('admin.subject_create');

    Route::post('/subject/edit', [SubjectsController::class, 'edit'])->name('admin.subject_edit');

    Route::get('/subject/delete/{id}', [SubjectsController::class, 'delete'])->name('admin.subject_delete');



    //  pdf

    Route::get('/pdf', [pdfcontroller::class, 'index'])->name('admin.pdf');

    Route::post('/pdf/add', [pdfcontroller::class, 'create'])->name('admin.pdf_create');

    Route::post('/pdf/edit', [pdfcontroller::class, 'edit'])->name('admin.pdf_edit');

    Route::get('/pdf/delete/{id}', [pdfcontroller::class, 'delete'])->name('admin.admin_pdf');



    // live class



    Route::get('/live_class', [LiveClassController::class, 'index'])->name('admin.live_class');

    Route::post('/live_class/add', [LiveClassController::class, 'create'])->name('admin.live_class_create');

    Route::post('/pdf/video_edit', [LiveClassController::class, 'edit'])->name('admin.video_edit');

    Route::get('/live_class/delete/{id}', [LiveClassController::class, 'delete'])->name('admin.admin_live_class');





    // Playlist Routes

    Route::get('/playlist', [PlaylistController::class, 'playlist'])->name('admin.playlist');

    Route::get('/playlist/items/{id}', [PlaylistController::class, 'playlist_items'])->name('admin.playlist_items');







    Route::get('/playlist_create', [PlaylistController::class, 'playlist_create'])->name('admin.playlist_create');

    Route::get('/playlist_edit/{id}', [PlaylistController::class, 'playlist_edit'])->name('admin.playlist_edit');

    Route::get('/playlist_delete/{id}', [PlaylistController::class, 'playlist_delete'])->name('admin.playlist_delete');

    Route::post('/playlist_status/{id}', [PlaylistController::class, 'playlist_status'])->name('admin.playlist_status');

    Route::post('/playlist_edit_post/{id}', [PlaylistController::class, 'playlist_edit_post'])->name('admin.playlist_edit_post');

    Route::post('/playlist_create_post', [PlaylistController::class, 'playlist_create_post'])->name('admin.playlist_create_post');



    // Route::get('trending', function () {

    //     return view('admin.trending');

    // });

    // Route::get('trending', [trendingPostsController::class, 'getRecords']);

    // Route::post('trending', [trendingPostsController::class, 'create']);





    Route::get('/vacancyCreate', function () {

        return view('admin.vacancyCreate');

    })->name('vacancy_create');



    Route::get('/vacancy', [vacancyController::class, 'getVacancies'])->name('admin.vacancy');

    Route::get('/vacancyUpdate{id}', [vacancyController::class, 'getVacancyDetails'])->name('vacancyUpdate');

    Route::post('/newVacancy', [vacancyController::class, 'newVacancy'])->name('admin.PostnewVacancy');

    Route::post('/vacancy_article', [vacancyController::class, 'saveVacancyArticle'])->name('admin.VacancyArticalPost');

    Route::post('/vacancyUpdate', [vacancyController::class, 'vacancyUpdate'])->name('admin.PostVacancyUpdate');

    Route::post('/vacancyArticleUpdate', [vacancyController::class, 'vacancyArticleUpdate'])->name('admin.VacancyArticalUpdate');



});

Route::get('/git/pull', [SiteController::class, 'gitpull'])->name('admin.git_pull');



// =========================study data =========================================
Route::get('/setting', [settingController::class, 'homesetting'])->name('setting');
Route::post('/setting/post', [settingController::class, 'homesetting_post'])->name('setting_post');

