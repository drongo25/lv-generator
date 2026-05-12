<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// {{-- GENERATED ROUTES START --}}
// {{-- GENERATED ROUTES END --}}
// admins
Route::resource('admins', \App\Http\Controllers\AdminController::class);

// amenities
Route::resource('amenities', \App\Http\Controllers\AmenityController::class);

// applied_coupon_codes
Route::resource('applied-coupon-codes', \App\Http\Controllers\AppliedCouponCodeController::class);

// coupon_masters
Route::resource('coupon-masters', \App\Http\Controllers\CouponMasterController::class);

// coupon_pivot_include_room_type
Route::resource('coupon-pivot-include-room-types', \App\Http\Controllers\CouponPivotIncludeRoomTypeController::class);

// coupon_pivot_paid_service
Route::resource('coupon-pivot-paid-services', \App\Http\Controllers\CouponPivotPaidServiceController::class);

// floors
Route::resource('floors', \App\Http\Controllers\FloorController::class);

// gateways
Route::resource('gateways', \App\Http\Controllers\GatewayController::class);

// general_settings
Route::resource('general-settings', \App\Http\Controllers\GeneralSettingController::class);

// paid_services
Route::resource('paid-services', \App\Http\Controllers\PaidServiceController::class);

// payments
Route::resource('payments', \App\Http\Controllers\PaymentController::class);

// posts
Route::resource('posts', \App\Http\Controllers\PostController::class);

// regular_prices
Route::resource('regular-prices', \App\Http\Controllers\RegularPriceController::class);

// reservation_nights
Route::resource('reservation-nights', \App\Http\Controllers\ReservationNightController::class);

// reservation_paid_services
Route::resource('reservation-paid-services', \App\Http\Controllers\ReservationPaidServiceController::class);

// reservation_taxes
Route::resource('reservation-taxes', \App\Http\Controllers\ReservationTaxController::class);

// reservations
Route::resource('reservations', \App\Http\Controllers\ReservationController::class);

// room_type_images
Route::resource('room-type-images', \App\Http\Controllers\RoomTypeImageController::class);

// room_type_pivot_amenity
Route::resource('room-type-pivot-amenities', \App\Http\Controllers\RoomTypePivotAmenityController::class);

// room_types
Route::resource('room-types', \App\Http\Controllers\RoomTypeController::class);

// rooms
Route::resource('rooms', \App\Http\Controllers\RoomController::class);

// special_prices
Route::resource('special-prices', \App\Http\Controllers\SpecialPriceController::class);

// tax_managers
Route::resource('tax-managers', \App\Http\Controllers\TaxManagerController::class);

// transactions
Route::resource('transactions', \App\Http\Controllers\TransactionController::class);

// users
Route::resource('users', \App\Http\Controllers\UserController::class);

// web_counter_sections
Route::resource('web-counter-sections', \App\Http\Controllers\WebCounterSectionController::class);

// web_facilities
Route::resource('web-facilities', \App\Http\Controllers\WebFacilityController::class);

// web_faqs
Route::resource('web-faqs', \App\Http\Controllers\WebFaqController::class);

// web_galleries
Route::resource('web-galleries', \App\Http\Controllers\WebGalleryController::class);

// web_gallery_categories
Route::resource('web-gallery-categories', \App\Http\Controllers\WebGalleryCategoryController::class);

// web_our_client_feedbacks
Route::resource('web-our-client-feedbacks', \App\Http\Controllers\WebOurClientFeedbackController::class);

// web_our_teams
Route::resource('web-our-teams', \App\Http\Controllers\WebOurTeamController::class);

// web_settings
Route::resource('web-settings', \App\Http\Controllers\WebSettingController::class);

// web_socials
Route::resource('web-socials', \App\Http\Controllers\WebSocialController::class);
