<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\OfficialMessagesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PublicationsController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\Admin\TendersController as AdminTendersController;
use App\Http\Controllers\Admin\CausesController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Admin\ComplaintsController as AdminComplaintsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactMessagesController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Admin\TeamMembersController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Admin\GalleryItemsController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\NgoNoticeController;
use App\Http\Controllers\MediaCornerController;
use App\Http\Controllers\RegistrationApplicationController;
use App\Http\Controllers\Admin\RegistrationApplicationsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\PageController as FrontPageController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Routes (Protected)
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('dashboard.profile');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('dashboard.profile.update');

    // Management Sections
    Route::get('/services', [ServicesController::class, 'index'])->name('dashboard.services');
    Route::get('/messages', [DashboardController::class, 'messages'])->name('dashboard.messages');
    Route::get('/downloads', [DashboardController::class, 'downloads'])->name('dashboard.downloads');
    Route::get('/causes', [DashboardController::class, 'causes'])->name('dashboard.causes');

    // Official Messages Management
    Route::resource('official-messages', OfficialMessagesController::class)->names([
        'index' => 'admin.official-messages.index',
        'create' => 'admin.official-messages.create',
        'store' => 'admin.official-messages.store',
        'show' => 'admin.official-messages.show',
        'edit' => 'admin.official-messages.edit',
        'update' => 'admin.official-messages.update',
        'destroy' => 'admin.official-messages.destroy',
    ]);

    // News Management
    Route::resource('news', NewsController::class)->names([
        'index' => 'admin.news.index',
        'create' => 'admin.news.create',
        'store' => 'admin.news.store',
        'show' => 'admin.news.show',
        'edit' => 'admin.news.edit',        'update' => 'admin.news.update',
        'destroy' => 'admin.news.destroy',
    ]);

    // Publications Management
    Route::resource('publications', PublicationsController::class)->names([
        'index' => 'admin.publications.index',
        'create' => 'admin.publications.create',
        'store' => 'admin.publications.store',
        'show' => 'admin.publications.show',
        'edit' => 'admin.publications.edit',
        'update' => 'admin.publications.update',
        'destroy' => 'admin.publications.destroy',
    ]);

    // Tenders Management
    Route::resource('tenders', AdminTendersController::class)->names([
        'index' => 'admin.tenders.index',
        'create' => 'admin.tenders.create',
        'store' => 'admin.tenders.store',
        'show' => 'admin.tenders.show',
        'edit' => 'admin.tenders.edit',
        'update' => 'admin.tenders.update',
        'destroy' => 'admin.tenders.destroy',
    ]);

    // Causes Management
    Route::resource('causes', CausesController::class)->names([
        'index' => 'admin.causes.index',
        'create' => 'admin.causes.create',
        'store' => 'admin.causes.store',
        'show' => 'admin.causes.show',
        'edit' => 'admin.causes.edit',
        'update' => 'admin.causes.update',
        'destroy' => 'admin.causes.destroy',
    ]);

    // Complaints Management
    Route::resource('complaints', AdminComplaintsController::class)->names([
        'index' => 'admin.complaints.index',
        'create' => 'admin.complaints.create',
        'store' => 'admin.complaints.store',
        'show' => 'admin.complaints.show',
        'edit' => 'admin.complaints.edit',
        'update' => 'admin.complaints.update',
        'destroy' => 'admin.complaints.destroy',
    ]);

    // Contact Messages Management
    Route::resource('contact-messages', ContactMessagesController::class)->names([
        'index' => 'admin.contact-messages.index',
        'create' => 'admin.contact-messages.create',
        'store' => 'admin.contact-messages.store',
        'show' => 'admin.contact-messages.show',
        'edit' => 'admin.contact-messages.edit',
        'update' => 'admin.contact-messages.update',
        'destroy' => 'admin.contact-messages.destroy',
    ]);

    // Team Members Management
    Route::resource('team-members', TeamMembersController::class)->names([
        'index' => 'admin.team-members.index',
        'create' => 'admin.team-members.create',
        'store' => 'admin.team-members.store',
        'show' => 'admin.team-members.show',
        'edit' => 'admin.team-members.edit',
        'update' => 'admin.team-members.update',
        'destroy' => 'admin.team-members.destroy',
    ]);

    // Gallery Management
    Route::resource('gallery-items', GalleryItemsController::class)->names([
        'index' => 'admin.gallery-items.index',
        'create' => 'admin.gallery-items.create',
        'store' => 'admin.gallery-items.store',
        'show' => 'admin.gallery-items.show',
        'edit' => 'admin.gallery-items.edit',
        'update' => 'admin.gallery-items.update',
        'destroy' => 'admin.gallery-items.destroy',
    ]);

    // Events Management
    Route::resource('events', EventsController::class)->names([
        'index' => 'admin.events.index',
        'create' => 'admin.events.create',
        'store' => 'admin.events.store',
        'show' => 'admin.events.show',
        'edit' => 'admin.events.edit',
        'update' => 'admin.events.update',
        'destroy' => 'admin.events.destroy',
    ]);

    // NGO Notices Management
    Route::resource('ngo-notices', \App\Http\Controllers\Admin\NgoNoticesController::class)->names([
        'index' => 'admin.ngo-notices.index',
        'create' => 'admin.ngo-notices.create',
        'store' => 'admin.ngo-notices.store',
        'show' => 'admin.ngo-notices.show',
        'edit' => 'admin.ngo-notices.edit',
        'update' => 'admin.ngo-notices.update',
        'destroy' => 'admin.ngo-notices.destroy',
    ]);

    // Registration Applications Management
    Route::resource('registration-applications', RegistrationApplicationsController::class)->names([
        'index' => 'admin.registration-applications.index',
        'create' => 'admin.registration-applications.create',
        'store' => 'admin.registration-applications.store',
        'show' => 'admin.registration-applications.show',
        'edit' => 'admin.registration-applications.edit',
        'update' => 'admin.registration-applications.update',
        'destroy' => 'admin.registration-applications.destroy',
    ])->except(['create', 'store']);

    // Pages Management
    Route::resource('pages', PageController::class)->names([
        'index' => 'admin.pages.index',
        'create' => 'admin.pages.create',
        'store' => 'admin.pages.store',
        'show' => 'admin.pages.show',
        'edit' => 'admin.pages.edit',
        'update' => 'admin.pages.update',
        'destroy' => 'admin.pages.destroy',
    ]);
    
    // Page Management Additional Routes
    Route::patch('pages/{page}/toggle-status', [PageController::class, 'toggleStatus'])->name('admin.pages.toggle-status');
    Route::patch('pages/{page}/toggle-navigation', [PageController::class, 'toggleNavigation'])->name('admin.pages.toggle-navigation');
    Route::post('pages/{page}/duplicate', [PageController::class, 'duplicate'])->name('admin.pages.duplicate');
    Route::post('pages/upload-image', [PageController::class, 'uploadImage'])->name('admin.pages.upload-image');
});

Route::get('/', function () {
    $publications = \App\Models\Publication::active()->ordered()->take(3)->get();
    return view('pages.index', compact('publications'));
})->name('home');

Route::get('/introduction', function () {
    return view('pages.introduction');
})->name('introduction');

Route::get('/mediacorner', [MediaCornerController::class, 'index'])->name('mediacorner');

Route::get('/resources', function () {
    return view('pages.resources');
})->name('resources');

Route::get('/ngo_directives', function () {
    return view('pages.ngo_directives');
})->name('ngo_directives');

Route::get('/ngo_guidelines', function () {
    return view('pages.ngo_guidelines');
})->name('ngo_guidelines');

Route::get('/ngo_notices', [NgoNoticeController::class, 'index'])->name('ngo_notices');

Route::get('/ngo_registered', [RegistrationApplicationController::class, 'registeredNgos'])->name('ngo_registered');

Route::get('/ngo_required_documents', function () {
    return view('pages.ngo_required_documents');
})->name('ngo_required_documents');

Route::get('/ngo_suspended', [RegistrationApplicationController::class, 'suspendedNgos'])->name('ngo_suspended');

Route::get('/ourteam', [TeamController::class, 'index'])->name('ourteam');

Route::get('/photogallery', [GalleryController::class, 'photos'])->name('photogallery');

for ($part = 1; $part <= 11; $part++) {
    Route::get("/registration_form_part{$part}", [RegistrationApplicationController::class, 'showPart'])
        ->defaults('part', $part)
        ->name("registration_form_part{$part}");
}

Route::post('/registration/part/{part}/save', [RegistrationApplicationController::class, 'savePart'])
    ->whereNumber('part')
    ->name('registration.part.save');
Route::get('/registration/part/{part}/data', [RegistrationApplicationController::class, 'getPartData'])
    ->whereNumber('part')
    ->name('registration.part.data');

Route::get('/videogallery', [GalleryController::class, 'videos'])->name('videogallery');

Route::get('/whatwedo', function () {
    return view('pages.whatwedo');
})->name('whatwedo');

Route::get('/causes', function () {
    $causes = \App\Models\Cause::query()
        ->where('status', 'active')
        ->orderBy('order')
        ->orderBy('title')
        ->get();

    return view('pages.causes', compact('causes'));
})->name('causes');


Route::get('/complaint-cell', [ComplaintController::class, 'index'])->name('complaint_cell');
Route::post('/complaint-cell', [ComplaintController::class, 'store'])->name('complaints.store');

Route::get('/publications', [App\Http\Controllers\PublicationController::class, 'index'])->name('publications');
Route::get('/publications/download/{id}', [App\Http\Controllers\PublicationController::class, 'download'])->name('publications.download');

Route::get('/tenders', [TenderController::class, 'index'])->name('tenders');
Route::get('/tenders/download/{id}', [TenderController::class, 'download'])->name('tenders.download');

Route::get('/news-details/{id}', function ($id) {
    $news = App\Models\News::findOrFail($id);
    return view('pages.news_details', compact('news'));
})->name('news_details');

Route::get('/contact_us', [ContactController::class, 'index'])->name('contact_us');
Route::post('/contact_us', [ContactController::class, 'store'])->name('contact.store');

// Dynamic Pages Routes
Route::get('/page/{slug}', [FrontPageController::class, 'show'])->name('page.show');
Route::get('/pages', [FrontPageController::class, 'index'])->name('pages.index');
Route::get('/pages/search', [FrontPageController::class, 'search'])->name('pages.search');
