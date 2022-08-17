<?php

use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LangControlle;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MenuLinkController;
use App\Http\Controllers\TrafficsController;
use App\Http\Controllers\FooterLinkController;
use App\Http\Controllers\RedirectionController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ContactReplyController;
use App\Http\Controllers\NotificationsController;




Auth::routes();
Route::get('/', [ HomeController::class,'index'])->name('home');
Route::middleware(['middleware' => 'Language'])->group(function () {
	Route::get('/change-language/{lang}',[ LangControlle::class,'changeLang']);
});

Route::prefix('admin')->middleware(['auth','ActiveAccount'])->name('admin.')->group(function () {

    Route::get('/',[AdminController::class,'index'])->name('index');

    Route::middleware(['CheckRole:ADMIN'])->group(function () {

        Route::resource('announcements',AnnouncementController::class);
        Route::resource('files',FileController::class);
        Route::post('contacts/resolve',[ContactController::class,'resolve'])
                ->can('resolve',\App\Models\Contact::class)->name('contacts.resolve');
        Route::resource('contacts',ContactController::class);
        Route::resource('menus',MenuController::class);
        Route::resource('users',UserController::class);
        Route::resource('articles',ArticleController::class);
        Route::resource('pages',PageController::class);
        Route::resource('contact-replies',ContactReplyController::class);
        Route::post('faqs/order',[FaqController::class,'order'])->name('faqs.order');
        Route::resource('faqs',FaqController::class);
        Route::post('menu-links/get-type',[MenuLinkController::class,'getType'])->name('menu-links.get-type');
        Route::post('menu-links/order',[MenuLinkController::class,'order'])->name('menu-links.order');
        Route::resource('menu-links',MenuLinkController::class);
        Route::resource('categories',CategoryController::class);
        Route::resource('redirections',RedirectionController::class);
        Route::get('traffics',[TrafficsController::class,'index'])->name('traffics.index');
        Route::get('traffics/{traffic}/logs',[TrafficsController::class,'logs'])->name('traffics.logs');
        Route::get('error-reports',[TrafficsController::class,'error_reports'])->name('traffics.error-reports');
        Route::get('error-reports/{report}',[TrafficsController::class,'error_report'])->name('traffics.error-report');
        Route::post('footer-links/order',[FooterLinkController::class,'order'])->name('footer-links.order');
        Route::resource('footer-links',FooterLinkController::class);
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/',[SettingController::class,'index'])->name('index');
            Route::put('/{settings}/update',[SettingController::class,'update'])->name('update');
        });

        Route::get('editHomePage',[HomePageController::class,'editHomePage'])->name('editHomePage');
        Route::post('update-header',[HomePageController::class,'update_header'])->name('update_header');
        Route::get('delete-img/{id}',[HomePageController::class,'delete_img'])->name('delete_img');


        Route::post('update_services/{id}',[HomePageController::class,'update_services'])->name('update_services');
        Route::post('update-services-description',[HomePageController::class,'update_services_description'])->name('update_services_description');
        Route::post('create-service',[HomePageController::class,'create_service'])->name('create_service');
        Route::get('delete-service/{id}',[HomePageController::class,'delete_service'])->name('delete_service');


        Route::post('create-work',[HomePageController::class,'create_work'])->name('create_work');
        Route::post('update_Work/{id}',[HomePageController::class,'update_Work'])->name('update_Work');
        Route::get('delete-work/{id}',[HomePageController::class,'delete_work'])->name('delete_work');



        Route::post('update_why_use_awen/{id}',[HomePageController::class,'update_why_use_awen'])->name('update_why_use_awen');
        Route::post('update-why_use_awen-description',[HomePageController::class,'update_why_use_awen_description'])->name('update_why_use_awen_description');
        Route::post('create-why_use_awen',[HomePageController::class,'create_why_use_awen'])->name('create_why_use_awen');
        Route::get('delete-why_use_awen/{id}',[HomePageController::class,'delete_why_use_awen'])->name('delete_why_use_awen');

        Route::post('create_integrate_with',[HomePageController::class,'create_integrate_with'])->name('create_integrate_with');
        Route::get('delete-integrate_with/{id}',[HomePageController::class,'delete_integrate_with'])->name('delete_integrate_with');

        Route::post('create_extra_mile',[HomePageController::class,'create_extra_mile'])->name('create_extra_mile');
        Route::post('update_extra_mile/{id}',[HomePageController::class,'update_extra_mile'])->name('update_extra_mile');
        Route::get('delete_extra_mile/{id}',[HomePageController::class,'delete_extra_mile'])->name('delete_extra_mile');

        Route::post('update_Powerful_Platform',[HomePageController::class,'update_Powerful_Platform'])->name('update_Powerful_Platform');




    });

    Route::prefix('upload')->name('upload.')->group(function(){
        Route::post('/image',[HelperController::class,'upload_image'])->name('image');
        Route::post('/file',[HelperController::class,'upload_file'])->name('file');
        Route::post('/remove-file',[HelperController::class,'remove_files'])->name('remove-file');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index')->can('control', User::class);
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit')->can('control', User::class);
        Route::put('/update',[ProfileController::class,'update'])->name('update')->can('control', User::class);
        Route::put('/update-password',[ProfileController::class,'update_password'])->name('update-password')->can('control', User::class);
        Route::put('/update-email',[ProfileController::class,'update_email'])->name('update-email')->can('control', User::class);
    });

    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/',[NotificationsController::class,'index'])->name('index');
        Route::get('/ajax',[NotificationsController::class,'notifications_ajax'])->name('ajax');
        Route::post('/see',[NotificationsController::class,'notifications_see'])->name('see');
    });

});


Route::get('blocked',[HelperController::class,'blocked_user'])->name('blocked');
Route::get('robots.txt',[HelperController::class,'robots']);
Route::get('manifest.json',[HelperController::class,'manifest'])->name('manifest');
Route::get('sitemap.xml',[SiteMapController::class,'sitemap']);
Route::get('sitemaps/links','SiteMapController@custom_links');
Route::get('sitemaps/{name}/{page}/sitemap.xml',[SiteMapController::class,'viewer']);


Route::get('about',[FrontController::class,'about'])->name('about');
Route::view('contact','front.pages.contact')->name('contact');
Route::get('page/{page}',[FrontController::class,'page'])->name('page.show');
Route::get('category/{category}',[FrontController::class,'category'])->name('category.show');
Route::get('article/{article}',[FrontController::class,'article'])->name('article.show');
Route::get('blog',[FrontController::class,'blog'])->name('blog');
Route::post('contact',[FrontController::class,'contact_post'])->name('contact-post');
