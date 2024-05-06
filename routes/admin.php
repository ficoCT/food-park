<?php

use App\DataTables\SocialLinkDataTable;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\AppDownloadSectionController;
use App\Http\Controllers\Admin\BannerSliderController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ClearDatabaseController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomPageBuilderController;
use App\Http\Controllers\Admin\DailyOfferController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\MenuBuilderController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ReservationTimeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TramsAndConditionController;
use App\Http\Controllers\Admin\TramsAndCondtionController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Models\AppDownloadSection;
use App\Models\BannerSlider;
use App\Models\PrivacyPolicy;
use App\Models\ReservationTime;
use App\Models\TramsAndCondtion;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    /** Profile Routes */
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

     /** Slider Routes */
     Route::resource('slider', SliderController::class);

    /** Why choose us Routes */
    Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-title.update');
    Route::resource('why-choose-us', WhyChooseUsController::class);

    /** Product Category Routes */
    Route::resource('category', CategoryController::class);

    /** Product Routes */
    Route::resource('product', ProductController::class);
});
