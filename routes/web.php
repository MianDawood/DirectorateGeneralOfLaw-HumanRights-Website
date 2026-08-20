<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\OfficialMessagesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsEventsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PublicationsController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\Admin\TendersController as AdminTendersController;
use App\Http\Controllers\Admin\CausesController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Admin\ComplaintsController as AdminComplaintsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactMessagesController;
use App\Http\Controllers\Admin\NewsletterSubscriptionsController;
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
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\HeaderCampaignController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\ProvincialDepartmentsController;
use App\Http\Controllers\Admin\OrgStructurePositionsController;
use App\Http\Controllers\Admin\PageContentsController;
use App\Http\Controllers\Admin\IntroductionsController;
use App\Http\Controllers\Admin\VisionMissionsController;
use App\Http\Controllers\Admin\WhatWeDosController;
use App\Http\Controllers\Admin\NgoDirectivesController;
use App\Http\Controllers\Admin\NgoGuidelinesController;
use App\Http\Controllers\Admin\NgoRequiredDocumentsController;
use App\Http\Controllers\Admin\WhatWeDoActivitiesController;
use App\Http\Controllers\PageController as FrontPageController;
use App\Http\Controllers\SearchController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

// Dashboard Routes (Protected)
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('dashboard.profile');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('dashboard.profile.update');

    // Management Sections
    Route::get('/services', [ServicesController::class, 'index'])->name('dashboard.services');
    Route::get('/site-settings', [SiteSettingsController::class, 'index'])->name('admin.site-settings.index');
    Route::put('/site-settings', [SiteSettingsController::class, 'update'])->name('admin.site-settings.update');
    Route::get('/site-settings/homepage', [SiteSettingsController::class, 'editHomePage'])->name('admin.site-settings.homepage.edit');
    Route::put('/site-settings/homepage', [SiteSettingsController::class, 'updateHomePage'])->name('admin.site-settings.homepage.update');
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

    // Partners Management
    Route::resource('partners', PartnersController::class)->names([
        'index' => 'admin.partners.index',
        'create' => 'admin.partners.create',
        'store' => 'admin.partners.store',
        'show' => 'admin.partners.show',
        'edit' => 'admin.partners.edit',
        'update' => 'admin.partners.update',
        'destroy' => 'admin.partners.destroy',
    ]);

    // Provincial Departments Management
    Route::resource('provincial-departments', ProvincialDepartmentsController::class)
        ->except(['show'])
        ->parameters(['provincial-departments' => 'department'])
        ->names([
            'index' => 'admin.provincial-departments.index',
            'create' => 'admin.provincial-departments.create',
            'store' => 'admin.provincial-departments.store',
            'edit' => 'admin.provincial-departments.edit',
            'update' => 'admin.provincial-departments.update',
            'destroy' => 'admin.provincial-departments.destroy',
        ]);

    // Organizational Structure Management
    Route::resource('org-structure-positions', OrgStructurePositionsController::class)
        ->except(['show'])
        ->parameters(['org-structure-positions' => 'position'])
        ->names([
            'index' => 'admin.org-structure-positions.index',
            'create' => 'admin.org-structure-positions.create',
            'store' => 'admin.org-structure-positions.store',
            'edit' => 'admin.org-structure-positions.edit',
            'update' => 'admin.org-structure-positions.update',
            'destroy' => 'admin.org-structure-positions.destroy',
        ]);

    // News Management
    Route::resource('news', NewsController::class)->except(['index'])->names([
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

    Route::get('publications/export', [PublicationsController::class, 'export'])->name('admin.publications.export');

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

    // Newsletter Subscriptions Management
    Route::resource('newsletter-subscriptions', NewsletterSubscriptionsController::class)
        ->only(['index', 'destroy'])
        ->parameters(['newsletter-subscriptions' => 'subscription'])
        ->names([
            'index' => 'admin.newsletter-subscriptions.index',
            'destroy' => 'admin.newsletter-subscriptions.destroy',
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
    Route::resource('events', EventsController::class)->except(['index'])->names([
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

    Route::get('registration-applications/export', [RegistrationApplicationsController::class, 'export'])
        ->name('admin.registration-applications.export');

    // Strategic NGO registers
    Route::get('ngos/registered', [\App\Http\Controllers\Admin\RegisteredNgosController::class, 'index'])->name('admin.ngos.registered.index');
    Route::get('ngos/registered/export', [\App\Http\Controllers\Admin\RegisteredNgosController::class, 'export'])->name('admin.ngos.registered.export');

    Route::get('ngos/suspended', [\App\Http\Controllers\Admin\SuspendedNgosController::class, 'index'])->name('admin.ngos.suspended.index');
    Route::get('ngos/suspended/export', [\App\Http\Controllers\Admin\SuspendedNgosController::class, 'export'])->name('admin.ngos.suspended.export');

    Route::get('ngos/expired', [\App\Http\Controllers\Admin\ExpiredNgosController::class, 'index'])->name('admin.ngos.expired.index');
    Route::get('ngos/expired/export', [\App\Http\Controllers\Admin\ExpiredNgosController::class, 'export'])->name('admin.ngos.expired.export');

    Route::get('ngos/renewals', [\App\Http\Controllers\Admin\NgoRenewalsController::class, 'index'])->name('admin.ngos.renewals.index');
    Route::post('ngos/renewals/{ngo}/renew', [\App\Http\Controllers\Admin\NgoRenewalsController::class, 'renew'])->name('admin.ngos.renewals.renew');

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

    // Header Campaigns Management
    Route::resource('header-campaigns', HeaderCampaignController::class)->except(['show'])->names([
        'index' => 'admin.header-campaigns.index',
        'create' => 'admin.header-campaigns.create',
        'store' => 'admin.header-campaigns.store',
        'edit' => 'admin.header-campaigns.edit',
        'update' => 'admin.header-campaigns.update',
        'destroy' => 'admin.header-campaigns.destroy',
    ]);

    // Introduction Page Management
    Route::get('introductions', [IntroductionsController::class, 'edit'])->name('admin.introductions.edit');
    Route::put('introductions', [IntroductionsController::class, 'update'])->name('admin.introductions.update');
    Route::delete('introductions/head/{head}', [IntroductionsController::class, 'destroyHead'])->name('admin.introductions.head.destroy');

    // Vision & Mission Page Management
    Route::get('vision-missions', [VisionMissionsController::class, 'edit'])->name('admin.vision-missions.edit');
    Route::put('vision-missions', [VisionMissionsController::class, 'update'])->name('admin.vision-missions.update');

    // What We Do Page Management
    Route::get('what-we-dos', [WhatWeDosController::class, 'edit'])->name('admin.what-we-dos.edit');
    Route::put('what-we-dos', [WhatWeDosController::class, 'update'])->name('admin.what-we-dos.update');

Route::delete('/what-we-dos/activity/{activity}', [WhatWeDosController::class, 'destroyActivity'])
    ->name('admin.what-we-dos.activity.destroy');

    // NGO Directives Page Management
    Route::get('ngo-directives', [NgoDirectivesController::class, 'edit'])->name('admin.ngo-directives.edit');
    Route::put('ngo-directives', [NgoDirectivesController::class, 'update'])->name('admin.ngo-directives.update');

    // NGO Guidelines Page Management
    Route::get('ngo-guidelines', [NgoGuidelinesController::class, 'edit'])->name('admin.ngo-guidelines.edit');
    Route::put('ngo-guidelines', [NgoGuidelinesController::class, 'update'])->name('admin.ngo-guidelines.update');
    Route::delete('ngo-guidelines/{guideline}', [NgoGuidelinesController::class, 'destroy'])->name('admin.ngo-guidelines.destroy');

    // NGO Required Documents Page Management
    Route::get('ngo-required-documents', [NgoRequiredDocumentsController::class, 'edit'])->name('admin.ngo-required-documents.edit');
    Route::put('ngo-required-documents', [NgoRequiredDocumentsController::class, 'update'])->name('admin.ngo-required-documents.update');
    Route::delete('ngo-required-documents/{document}', [NgoRequiredDocumentsController::class, 'destroy'])->name('admin.ngo-required-documents.destroy');

    // News & Events (unified)
    Route::get('news-events', [NewsEventsController::class, 'index'])->name('admin.news-events.index');
    Route::get('news-events/export', [NewsEventsController::class, 'export'])->name('admin.news-events.export');

    // Event Categories (JSON CRUD used by the Manage Subjects modal in the event form)
    Route::get('event-categories', [CategoriesController::class, 'index'])->name('admin.event-categories.index');
    Route::post('event-categories', [CategoriesController::class, 'store'])->name('admin.event-categories.store');
    Route::put('event-categories/{category}', [CategoriesController::class, 'update'])->name('admin.event-categories.update');
    Route::delete('event-categories/{category}', [CategoriesController::class, 'destroy'])->name('admin.event-categories.destroy');

    // Publication Categories (JSON CRUD used by the Manage Categories modal in the publication form)
    Route::get('publication-categories', [CategoriesController::class, 'index'])->defaults('type', 'publication')->name('admin.publication-categories.index');
    Route::post('publication-categories', [CategoriesController::class, 'store'])->defaults('type', 'publication')->name('admin.publication-categories.store');
    Route::put('publication-categories/{category}', [CategoriesController::class, 'update'])->defaults('type', 'publication')->name('admin.publication-categories.update');
    Route::delete('publication-categories/{category}', [CategoriesController::class, 'destroy'])->defaults('type', 'publication')->name('admin.publication-categories.destroy');

    // Old Page Contents (remove)
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/introduction', function () {
    return view('pages.introduction');
})->name('introduction');

Route::get('/vision-mission', function () {
    return view('pages.vision_mission');
})->name('vision_mission');

Route::get('/organizational-structure', function () {
    $positions = \App\Models\OrgStructurePosition::active()->ordered()->get();

    return view('pages.org_structure', compact('positions'));
})->name('org_structure');

Route::get('/mediacorner', [MediaCornerController::class, 'index'])->name('mediacorner');

Route::get('/events/{event}', [\App\Http\Controllers\EventController::class, 'show'])->name('events.show');

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

Route::get('/ngo/{id}', [RegistrationApplicationController::class, 'show'])->name('ngo.detail');

Route::get('/ngo_required_documents', function () {
    return view('pages.ngo_required_documents');
})->name('ngo_required_documents');

Route::get('/track-complaint', [ComplaintController::class, 'track'])->name('track.complaint');

Route::get('/verify-ngo', function () {
    return view('pages.verify-ngo');
})->name('verify.ngo');

Route::get('/ngo_suspended', [RegistrationApplicationController::class, 'suspendedNgos'])->name('ngo_suspended');

Route::get('/ourteam', [TeamController::class, 'index'])->name('ourteam');

Route::get('/partners/{partner}', function (\App\Models\Partner $partner) {
    return view('pages.partner_detail', compact('partner'));
})->name('partners.show');

Route::get('/photogallery', [GalleryController::class, 'photos'])->name('photogallery');

for ($part = 1; $part <= 10; $part++) {
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
    $news = App\Models\News::with('images')->findOrFail($id);
    return view('pages.news_details', compact('news'));
})->name('news_details');

Route::get('/contact_us', [ContactController::class, 'index'])->name('contact_us');
Route::post('/contact_us', [ContactController::class, 'store'])->name('contact.store');
Route::post('/newsletter', [ContactController::class, 'newsletter'])->name('newsletter.subscribe');

// Dynamic Pages Routes
Route::get('/page/{slug}', [FrontPageController::class, 'show'])->name('page.show');
Route::get('/pages', [FrontPageController::class, 'index'])->name('pages.index');
Route::get('/pages/search', [FrontPageController::class, 'search'])->name('pages.search');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Certificate Verification
Route::get('/verify-certificate/{registration_no?}', [\App\Http\Controllers\VerificationController::class, 'verifyNgo'])->name('verify.certificate');

Route::get('/certificate/design-preview', function () {
    $dummyData = [
        'application' => (object) [
            'registration_no' => 'KP-DGLHR-999',
            'certificate_issue_date' => now(),
        ],
        'ngoName' => 'PARTICIPATORY RURAL DEVELOPMENT SOCIETY (PRDS)',
        'qrCodeImage' => 'data:image/png;base64,...', // placeholder
        'signatureImage' => null,
        // 'logoSrc' => 'data:image/jpeg;base64,...',
    ];
    return view('pdf.ngo_certificate', $dummyData);
});
