<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->namespace('api')->prefix("v1")->group(function () {
    Route::get('/', 'HomeController@index')->name('api_index');
    
    Route::middleware('api.token')->group(function () {
        // Header section
        Route::group(['prefix' => 'header'], function () {
            Route::any('/header-details', 'HomeController@headerDetails')->name('api_header_details');
        });
        // Home page section
        Route::group(['prefix' => 'home'], function () {
            Route::any('/home-page-details', 'HomeController@homePageDetails')->name('api_home_page_details');
        });
        // Service page section
        Route::group(['prefix' => 'services'], function () {
            Route::any('/service-page-details', 'HomeController@servicePageDetails')->name('api_service_page_details');
        });
        // Portfolio page section
        Route::group(['prefix' => 'portfolios'], function () {
            Route::any('/portfolio-page-details', 'HomeController@portfolioPageDetails')->name('api_portfolio_page_details');
        });
        // Category wise portfolio
        Route::group(['prefix' => 'category'], function () {
            Route::any('/portfolio-list', 'HomeController@categoryPortfolioList')->name('api_portfolio_list');
        });
        // Testimonial page section
        Route::group(['prefix' => 'testimonials'], function () {
            Route::any('/testimonial-page-details', 'HomeController@testimonialPageDetails')->name('api_testimonial_page_details');
        });
        // Contact page section
        Route::group(['prefix' => 'contact'], function () {
            Route::any('/contact-page-details', 'HomeController@contactPageDetails')->name('api_contact_page_details');
        });
        // Contact form section
        Route::group(['prefix' => 'contact-us'], function () {
            Route::post('/contact', 'HomeController@contactForm')->name('api_contact');
        });
        // About page section
        Route::group(['prefix' => 'about-us'], function () {
            Route::any('/about-page-details', 'HomeController@aboutPageDetails')->name('api_about_page_details');
        });
        // Get a quote page section
        Route::group(['prefix' => 'get-a-quote'], function () {
            Route::any('/get-a-quote-page-details', 'HomeController@getAQuotePageDetails')->name('api_get_a_quote_page_details');
        });
        // Get a quote section
        Route::group(['prefix' => 'capture-quote'], function () {
            Route::post('/quote-form', 'HomeController@quoteForm')->name('api_quote_form');
        });
        // Privacy page section
        Route::group(['prefix' => 'privacy'], function () {
            Route::any('/privacy-page-details', 'HomeController@privacyPageDetails')->name('api_privacy_page_details');
        });
        // Site map page section
        Route::group(['prefix' => 'site-map'], function () {
            Route::any('/site-map-page-details', 'HomeController@siteMapPageDetails')->name('api_site_map_page_details');
        });
        // Terms page section
        Route::group(['prefix' => 'terms'], function () {
            Route::any('/terms-page-details', 'HomeController@termsPageDetails')->name('api_terms_page_details');
        });
        // Enquiry section
        Route::group(['prefix' => 'capture'], function () {
            Route::post('/enquiry', 'HomeController@enquiry')->name('api_enquiry');
        });
        // Footer section
        Route::group(['prefix' => 'footer'], function () {
            Route::any('/footer-details', 'HomeController@footerDetails')->name('api_footer_details');
        });
        Route::any('/language-change', 'HomeController@languageChange')->name('api_language_change');
    });

});
