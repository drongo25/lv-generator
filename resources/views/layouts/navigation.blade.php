<div class="accordion accordion-flush" id="sidebarAccordion">
    {{-- GENERATED MENU START --}}
    {{-- Группа: Web Socials --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenWebSocials">
            <button class="accordion-button {{ request()->is('web_socials*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenWebSocials">
                Web Socials
            </button>
        </h2>
        <div id="collapseGenWebSocials"
             class="accordion-collapse collapse {{ request()->is('web_socials*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-socials.*') ? 'active' : '' }}"
                       href="{{ route('web-socials.index') }}">Web Socials</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Web Settings --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenWebSettings">
            <button class="accordion-button {{ request()->is('web_settings*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenWebSettings">
                Web Settings
            </button>
        </h2>
        <div id="collapseGenWebSettings"
             class="accordion-collapse collapse {{ request()->is('web_settings*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-settings.*') ? 'active' : '' }}"
                       href="{{ route('web-settings.index') }}">Web Settings</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Web Our Teams --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenWebOurTeams">
            <button class="accordion-button {{ request()->is('web_our_teams*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenWebOurTeams">
                Web Our Teams
            </button>
        </h2>
        <div id="collapseGenWebOurTeams"
             class="accordion-collapse collapse {{ request()->is('web_our_teams*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-our-teams.*') ? 'active' : '' }}"
                       href="{{ route('web-our-teams.index') }}">Web Our Teams</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Web Our Client Feedbacks --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenWebOurClientFeedbacks">
            <button class="accordion-button {{ request()->is('web_our_client_feedbacks*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenWebOurClientFeedbacks">
                Web Our Client Feedbacks
            </button>
        </h2>
        <div id="collapseGenWebOurClientFeedbacks"
             class="accordion-collapse collapse {{ request()->is('web_our_client_feedbacks*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-our-client-feedbacks.*') ? 'active' : '' }}"
                       href="{{ route('web-our-client-feedbacks.index') }}">Web Our Client Feedbacks</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Web Gallery Categories --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenWebGalleryCategories">
            <button class="accordion-button {{ request()->is('web_gallery_categories*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenWebGalleryCategories">
                Web Gallery Categories
            </button>
        </h2>
        <div id="collapseGenWebGalleryCategories"
             class="accordion-collapse collapse {{ request()->is('web_gallery_categories*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-gallery-categories.*') ? 'active' : '' }}"
                       href="{{ route('web-gallery-categories.index') }}">Web Gallery Categories</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Web Galleries --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenWebGalleries">
            <button class="accordion-button {{ request()->is('web_galleries*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenWebGalleries">
                Web Galleries
            </button>
        </h2>
        <div id="collapseGenWebGalleries"
             class="accordion-collapse collapse {{ request()->is('web_galleries*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-galleries.*') ? 'active' : '' }}"
                       href="{{ route('web-galleries.index') }}">Web Galleries</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Web Faqs --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenWebFaqs">
            <button class="accordion-button {{ request()->is('web_faqs*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenWebFaqs">
                Web Faqs
            </button>
        </h2>
        <div id="collapseGenWebFaqs"
             class="accordion-collapse collapse {{ request()->is('web_faqs*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-faqs.*') ? 'active' : '' }}"
                       href="{{ route('web-faqs.index') }}">Web Faqs</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Web Facilities --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenWebFacilities">
            <button class="accordion-button {{ request()->is('web_facilities*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenWebFacilities">
                Web Facilities
            </button>
        </h2>
        <div id="collapseGenWebFacilities"
             class="accordion-collapse collapse {{ request()->is('web_facilities*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-facilities.*') ? 'active' : '' }}"
                       href="{{ route('web-facilities.index') }}">Web Facilities</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Web Counter Sections --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenWebCounterSections">
            <button class="accordion-button {{ request()->is('web_counter_sections*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenWebCounterSections">
                Web Counter Sections
            </button>
        </h2>
        <div id="collapseGenWebCounterSections"
             class="accordion-collapse collapse {{ request()->is('web_counter_sections*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-counter-sections.*') ? 'active' : '' }}"
                       href="{{ route('web-counter-sections.index') }}">Web Counter Sections</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Users --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenUsers">
            <button class="accordion-button {{ request()->is('users*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenUsers">
                Users
            </button>
        </h2>
        <div id="collapseGenUsers"
             class="accordion-collapse collapse {{ request()->is('users*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                       href="{{ route('users.index') }}">Users</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Transactions --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenTransactions">
            <button class="accordion-button {{ request()->is('transactions*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenTransactions">
                Transactions
            </button>
        </h2>
        <div id="collapseGenTransactions"
             class="accordion-collapse collapse {{ request()->is('transactions*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}"
                       href="{{ route('transactions.index') }}">Transactions</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Tax Managers --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenTaxManagers">
            <button class="accordion-button {{ request()->is('tax_managers*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenTaxManagers">
                Tax Managers
            </button>
        </h2>
        <div id="collapseGenTaxManagers"
             class="accordion-collapse collapse {{ request()->is('tax_managers*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('tax-managers.*') ? 'active' : '' }}"
                       href="{{ route('tax-managers.index') }}">Tax Managers</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Special Prices --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenSpecialPrices">
            <button class="accordion-button {{ request()->is('special_prices*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenSpecialPrices">
                Special Prices
            </button>
        </h2>
        <div id="collapseGenSpecialPrices"
             class="accordion-collapse collapse {{ request()->is('special_prices*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('special-prices.*') ? 'active' : '' }}"
                       href="{{ route('special-prices.index') }}">Special Prices</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Rooms --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenRooms">
            <button class="accordion-button {{ request()->is('rooms*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenRooms">
                Rooms
            </button>
        </h2>
        <div id="collapseGenRooms"
             class="accordion-collapse collapse {{ request()->is('rooms*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('rooms.*') ? 'active' : '' }}"
                       href="{{ route('rooms.index') }}">Rooms</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Room Types --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenRoomTypes">
            <button class="accordion-button {{ request()->is('room_types*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenRoomTypes">
                Room Types
            </button>
        </h2>
        <div id="collapseGenRoomTypes"
             class="accordion-collapse collapse {{ request()->is('room_types*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('room-types.*') ? 'active' : '' }}"
                       href="{{ route('room-types.index') }}">Room Types</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Room Type Pivot Amenities --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenRoomTypePivotAmenities">
            <button class="accordion-button {{ request()->is('room_type_pivot_amenities*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenRoomTypePivotAmenities">
                Room Type Pivot Amenities
            </button>
        </h2>
        <div id="collapseGenRoomTypePivotAmenities"
             class="accordion-collapse collapse {{ request()->is('room_type_pivot_amenities*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('room-type-pivot-amenities.*') ? 'active' : '' }}"
                       href="{{ route('room-type-pivot-amenities.index') }}">Room Type Pivot Amenities</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Room Type Images --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenRoomTypeImages">
            <button class="accordion-button {{ request()->is('room_type_images*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenRoomTypeImages">
                Room Type Images
            </button>
        </h2>
        <div id="collapseGenRoomTypeImages"
             class="accordion-collapse collapse {{ request()->is('room_type_images*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('room-type-images.*') ? 'active' : '' }}"
                       href="{{ route('room-type-images.index') }}">Room Type Images</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Reservations --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenReservations">
            <button class="accordion-button {{ request()->is('reservations*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenReservations">
                Reservations
            </button>
        </h2>
        <div id="collapseGenReservations"
             class="accordion-collapse collapse {{ request()->is('reservations*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('reservations.*') ? 'active' : '' }}"
                       href="{{ route('reservations.index') }}">Reservations</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Reservation Taxes --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenReservationTaxes">
            <button class="accordion-button {{ request()->is('reservation_taxes*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenReservationTaxes">
                Reservation Taxes
            </button>
        </h2>
        <div id="collapseGenReservationTaxes"
             class="accordion-collapse collapse {{ request()->is('reservation_taxes*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('reservation-taxes.*') ? 'active' : '' }}"
                       href="{{ route('reservation-taxes.index') }}">Reservation Taxes</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Reservation Paid Services --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenReservationPaidServices">
            <button class="accordion-button {{ request()->is('reservation_paid_services*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenReservationPaidServices">
                Reservation Paid Services
            </button>
        </h2>
        <div id="collapseGenReservationPaidServices"
             class="accordion-collapse collapse {{ request()->is('reservation_paid_services*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('reservation-paid-services.*') ? 'active' : '' }}"
                       href="{{ route('reservation-paid-services.index') }}">Reservation Paid Services</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Reservation Nights --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenReservationNights">
            <button class="accordion-button {{ request()->is('reservation_nights*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenReservationNights">
                Reservation Nights
            </button>
        </h2>
        <div id="collapseGenReservationNights"
             class="accordion-collapse collapse {{ request()->is('reservation_nights*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('reservation-nights.*') ? 'active' : '' }}"
                       href="{{ route('reservation-nights.index') }}">Reservation Nights</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Regular Prices --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenRegularPrices">
            <button class="accordion-button {{ request()->is('regular_prices*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenRegularPrices">
                Regular Prices
            </button>
        </h2>
        <div id="collapseGenRegularPrices"
             class="accordion-collapse collapse {{ request()->is('regular_prices*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('regular-prices.*') ? 'active' : '' }}"
                       href="{{ route('regular-prices.index') }}">Regular Prices</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Posts --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenPosts">
            <button class="accordion-button {{ request()->is('posts*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenPosts">
                Posts
            </button>
        </h2>
        <div id="collapseGenPosts"
             class="accordion-collapse collapse {{ request()->is('posts*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                       href="{{ route('posts.index') }}">Posts</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Payments --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenPayments">
            <button class="accordion-button {{ request()->is('payments*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenPayments">
                Payments
            </button>
        </h2>
        <div id="collapseGenPayments"
             class="accordion-collapse collapse {{ request()->is('payments*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('payments.*') ? 'active' : '' }}"
                       href="{{ route('payments.index') }}">Payments</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Paid Services --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenPaidServices">
            <button class="accordion-button {{ request()->is('paid_services*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenPaidServices">
                Paid Services
            </button>
        </h2>
        <div id="collapseGenPaidServices"
             class="accordion-collapse collapse {{ request()->is('paid_services*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('paid-services.*') ? 'active' : '' }}"
                       href="{{ route('paid-services.index') }}">Paid Services</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: General Settings --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenGeneralSettings">
            <button class="accordion-button {{ request()->is('general_settings*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenGeneralSettings">
                General Settings
            </button>
        </h2>
        <div id="collapseGenGeneralSettings"
             class="accordion-collapse collapse {{ request()->is('general_settings*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('general-settings.*') ? 'active' : '' }}"
                       href="{{ route('general-settings.index') }}">General Settings</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Gateways --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenGateways">
            <button class="accordion-button {{ request()->is('gateways*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenGateways">
                Gateways
            </button>
        </h2>
        <div id="collapseGenGateways"
             class="accordion-collapse collapse {{ request()->is('gateways*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('gateways.*') ? 'active' : '' }}"
                       href="{{ route('gateways.index') }}">Gateways</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Floors --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenFloors">
            <button class="accordion-button {{ request()->is('floors*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenFloors">
                Floors
            </button>
        </h2>
        <div id="collapseGenFloors"
             class="accordion-collapse collapse {{ request()->is('floors*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('floors.*') ? 'active' : '' }}"
                       href="{{ route('floors.index') }}">Floors</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Coupon Pivot Paid Services --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenCouponPivotPaidServices">
            <button class="accordion-button {{ request()->is('coupon_pivot_paid_services*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenCouponPivotPaidServices">
                Coupon Pivot Paid Services
            </button>
        </h2>
        <div id="collapseGenCouponPivotPaidServices"
             class="accordion-collapse collapse {{ request()->is('coupon_pivot_paid_services*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('coupon-pivot-paid-services.*') ? 'active' : '' }}"
                       href="{{ route('coupon-pivot-paid-services.index') }}">Coupon Pivot Paid Services</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Coupon Pivot Include Room Types --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenCouponPivotIncludeRoomTypes">
            <button class="accordion-button {{ request()->is('coupon_pivot_include_room_types*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenCouponPivotIncludeRoomTypes">
                Coupon Pivot Include Room Types
            </button>
        </h2>
        <div id="collapseGenCouponPivotIncludeRoomTypes"
             class="accordion-collapse collapse {{ request()->is('coupon_pivot_include_room_types*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('coupon-pivot-include-room-types.*') ? 'active' : '' }}"
                       href="{{ route('coupon-pivot-include-room-types.index') }}">Coupon Pivot Include Room Types</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Coupon Masters --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenCouponMasters">
            <button class="accordion-button {{ request()->is('coupon_masters*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenCouponMasters">
                Coupon Masters
            </button>
        </h2>
        <div id="collapseGenCouponMasters"
             class="accordion-collapse collapse {{ request()->is('coupon_masters*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('coupon-masters.*') ? 'active' : '' }}"
                       href="{{ route('coupon-masters.index') }}">Coupon Masters</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Applied Coupon Codes --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenAppliedCouponCodes">
            <button class="accordion-button {{ request()->is('applied_coupon_codes*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenAppliedCouponCodes">
                Applied Coupon Codes
            </button>
        </h2>
        <div id="collapseGenAppliedCouponCodes"
             class="accordion-collapse collapse {{ request()->is('applied_coupon_codes*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('applied-coupon-codes.*') ? 'active' : '' }}"
                       href="{{ route('applied-coupon-codes.index') }}">Applied Coupon Codes</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Amenities --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenAmenities">
            <button class="accordion-button {{ request()->is('amenities*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenAmenities">
                Amenities
            </button>
        </h2>
        <div id="collapseGenAmenities"
             class="accordion-collapse collapse {{ request()->is('amenities*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('amenities.*') ? 'active' : '' }}"
                       href="{{ route('amenities.index') }}">Amenities</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- Группа: Admins --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenAdmins">
            <button class="accordion-button {{ request()->is('admins*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenAdmins">
                Admins
            </button>
        </h2>
        <div id="collapseGenAdmins"
             class="accordion-collapse collapse {{ request()->is('admins*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('admins.*') ? 'active' : '' }}"
                       href="{{ route('admins.index') }}">Admins</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- GENERATED MENU END --}}

</div>

<style>
    .accordion-body .nav-link {
        padding: 0.5rem 1.25rem;
        color: #495057;
        border-bottom: 1px solid #f8f9fa;
        font-size: 0.9rem;
    }
    .accordion-body .nav-link:hover {
        background-color: #e9ecef;
    }
    .accordion-body .nav-link.active {
        background-color: #0d6efd;
        color: white;
    }
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
        box-shadow: none;
    }
    .accordion-button:focus {
        box-shadow: none;
    }
</style>
