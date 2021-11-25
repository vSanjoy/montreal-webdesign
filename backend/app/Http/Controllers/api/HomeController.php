<?php
/*
    # Company Name      : Vishi Prem Workz
    # Author            :
    # Created Date      :
    # Class name        : HomeController
    # Purpose           : API responses
*/

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App;
use Auth;
use Response;
use Validator;
use Hash;
use App\Jobs\SendVerificationCode;
use App\Models\Cms;
use App\Http\Resources\CmsResource;
use App\Models\WebsiteSetting;
use App\Http\Resources\WebsiteSettingResource;
use App\Models\Service;
use App\Http\Resources\ServiceResource;
use App\Models\Portfolio;
use App\Http\Resources\PortfolioResource;
use App\Models\PortfolioCategory;
use App\Http\Resources\PortfolioCategoryResource;
use App\Models\PortfolioCategoryMapping;
use App\Models\Testimonial;
use App\Http\Resources\TestimonialResource;
use App\Models\Enquiry;
use App\Models\Quote;

class HomeController extends Controller
{
    /*
        * Function Name : __construct
        * Purpose       : It sets some public variables for being accessed throughout this
        *                   controller
        * Author        : 
        * Created Date  : 02-06-2021
        * Modified date :
        * Input Params  : Void
        * Return Value  : Mixed
    */
    public function __construct(Request $request) {
        // \App::setLocale($request->lang);
    }

    /*
        * Function name : index
        * Purpose       : 
        * Author        : 
        * Created Date  : 02-06-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Landing api
    */
    public function index() {
        return  Response::json(generateResponseBody('MWD-0001#welcome', 'Api for Montreal Webdesign'), 200);
    }

    /*
        * Function name : headerDetails
        * Purpose       : Api to get header details
        * Author        : 
        * Created Date  : 02-06-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns data in json format like logo and other pages
    */
    public function headerDetails() {
        $siteSetting            = WebsiteSetting::where('id', 1)->first();
        $data['site_settings']  = new WebsiteSettingResource($siteSetting);
        $services               = Service::where(['status' => '1'])->whereNull('deleted_at')->orderBy('sort', 'ASC')->get();
        $data['services']       = ServiceResource::collection($services);

        return  Response::json(generateResponseBody('MWD-0002#header_details', $data, true), 200);
    }
    
    /*
        * Function name : homePageDetails
        * Purpose       : To get details for home page
        * Author        : 
        * Created Date  : 02-06-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns home page data
    */
    public function homePageDetails(Request $request) {
        $cmsPages               = Cms::whereIn('id', [1,2])->get();
        $data['cmsPages']       = CmsResource::collection($cmsPages);
        $services               = Service::where(['is_featured' => 'Y', 'status' => '1'])
                                        ->whereNull('deleted_at')
                                        ->orderBy('sort', 'asc')
                                        ->get();
        $data['services']       = ServiceResource::collection($services);
        $portfolios             = Portfolio::where(['is_featured' => 'Y', 'status' => '1'])
                                            ->whereNull('deleted_at')
                                            ->orderBy('sort','ASC')
                                            ->get();
        $data['portfolios']     = PortfolioResource::collection($portfolios);
        $siteSetting            = WebsiteSetting::where('id', 1)->first();
        $data['site_settings']  = new WebsiteSettingResource($siteSetting);

        return Response::json(generateResponseBody('MWD-0003#home_page_details', $data, true), 200);
    }

    /*
        * Function name : servicePageDetails
        * Purpose       : To get the service page details
        * Author        : 
        * Created Date  : 09-06-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns service page data
    */
    public function servicePageDetails() {
        $cmsPages           = Cms::where('id', 3)->first();
        $data['cmsPage']    = new CmsResource($cmsPages);
        $services           = Service::where(['status' => '1'])->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
        $data['services']   = ServiceResource::collection($services);
        
        return Response::json(generateResponseBody('MWD-0004#service_page_details', $data, true), 200);
    }

    /*
        * Function name : portfolioPageDetails
        * Purpose       : To get the portfolio page details
        * Author        : 
        * Created Date  : 10-06-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns portfolio page data
    */
    public function portfolioPageDetails() {
        $cmsPages           = Cms::where('id', 4)->first();
        $data['cmsPage']    = new CmsResource($cmsPages);
        $message            = trans('custom_api.error_no_records_found');
        $portfolioCategories= PortfolioCategory::where(['status' => '1'])->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
        $data['portfolioCategories']= PortfolioCategoryResource::collection($portfolioCategories);

        $allPortfolioList   = Portfolio::select('id','title','site_link','short_title','roles','image')
                                            ->where(['status' => '1'])
                                            ->whereNull('deleted_at')
                                            ->orderBy('sort','ASC')
                                            ->get();
        $allPortfolio = $allPortfolioIndexWise = [];
        if ($allPortfolioList != null) {
            $k = 1; $p = 0;
            foreach ($allPortfolioList as $keyPortfolio => $valPortfolio) {
                $allPortfolio[$p]['id']             = $valPortfolio->id;
                $allPortfolio[$p]['title']          = $valPortfolio->title;
                $allPortfolio[$p]['site_link']      = $valPortfolio->site_link;
                $allPortfolio[$p]['short_title']    = $valPortfolio->short_title;
                $allPortfolio[$p]['roles']          = $valPortfolio->roles;
                $allPortfolio[$p]['image']          = $valPortfolio->image;                
                $i = 1;
                if ($k % 9 == 0) {
                    array_push($allPortfolioIndexWise, $allPortfolio);
                    $allPortfolio = [];
                    $p = 0;
                } else {
                    $p++;
                }
                $k++;
            }
        }
        // All portfolio pused
        if (count($allPortfolio)) {
            array_push($allPortfolioIndexWise, $allPortfolio);
            $message = '';
        }

        $data['portfolio']['image_source']      = 'portfolio/';
        $data['allPortfolio']['list']           = $allPortfolioIndexWise;
        $data['portfolioMessage']['details']    = $message;

        return Response::json(generateResponseBody('MWD-0005#portfolio_page_details', $data, true), 200);
    }

    /*
        * Function name : categoryPortfolioList
        * Purpose       : To get the category wise portfolio page
        * Author        : 
        * Created Date  : 10-06-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns category wise portfolio data
    */
    public function categoryPortfolioList(Request $request) {
        $categoryId         = $request->input('category_id') ?? null;
        $portfolioIds       = $categoryPortfolio  = $categoryPortfolioIndexWise = [];
        $message            = trans('custom_api.error_no_records_found');
        if ($categoryId != null) {
            $portfolioCategoryDetails   = PortfolioCategory::where(['id' => $categoryId, 'status' => '1'])
                                                            ->whereNull('deleted_at')
                                                            ->first();
            $data['portfolioCategoryDetails']= new PortfolioCategoryResource($portfolioCategoryDetails);
            
            $portfolioIds = [];
            $portfoliocategoryMappings = PortfolioCategoryMapping::select('portfolio_id')->where(['category_id' => $categoryId])->get();
            if ($portfoliocategoryMappings->count()) {
                foreach ($portfoliocategoryMappings as $valPortfolio) {
                    $portfolioIds[] = $valPortfolio->portfolio_id;
                }
            }
            if ($portfolioIds) {
                $portfolioList   = Portfolio::select('id','title','site_link','short_title','roles','image')
                                            ->where(['status' => '1'])
                                            ->whereIn('id', $portfolioIds)
                                            ->whereNull('deleted_at')
                                            ->orderBy('sort','ASC')
                                            ->get();        
                if ($portfolioList != null) {
                    $k = 1; $p = 0;
                    foreach ($portfolioList as $keyPortfolio => $valPortfolio) {
                        $categoryPortfolio[$p]['id']            = $valPortfolio->id;
                        $categoryPortfolio[$p]['title']         = $valPortfolio->title;
                        $categoryPortfolio[$p]['site_link']     = $valPortfolio->site_link;
                        $categoryPortfolio[$p]['short_title']   = $valPortfolio->short_title;
                        $categoryPortfolio[$p]['roles']         = $valPortfolio->roles;
                        $categoryPortfolio[$p]['image']         = $valPortfolio->image;                
                        
                        if ($k % 9 == 0) {
                            array_push($categoryPortfolioIndexWise, $categoryPortfolio);
                            $categoryPortfolio = [];
                            $p = 0;
                        } else {
                            $p++;
                        }
                        $k++;
                    }
                }
                // Category portfolio pused
                if (count($categoryPortfolio)) {
                    array_push($categoryPortfolioIndexWise, $categoryPortfolio);
                    $message = '';
                }    
            }
        }

        $data['portfolio']['image_source']      = 'portfolio/';
        $data['categoryPortfolio']['list']      = $categoryPortfolioIndexWise;
        $data['portfolioMessage']['details']    = $message;
        
        return Response::json(generateResponseBody('MWD-0006#category_portfolio_list', $data, true), 200);
    }

    /*
        * Function name : testimonialPageDetails
        * Purpose       : To get the testimonial page details
        * Author        : 
        * Created Date  : 11-06-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns testimonial page data
    */
    public function testimonialPageDetails() {
        $cmsPages               = Cms::where('id', 5)->first();
        $data['cmsPage']        = new CmsResource($cmsPages);
        $testimonials           = Testimonial::where(['status' => '1'])->whereNull('deleted_at')->orderBy('sort', 'desc')->get();
        $data['testimonials']   = TestimonialResource::collection($testimonials);
        
        return Response::json(generateResponseBody('MWD-0007#testimonial_page_details', $data, true), 200);
    }

    /*
        * Function name : contactPageDetails
        * Purpose       : Api to get contact details
        * Author        : 
        * Created Date  : 14-06-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns data in json format for contact page
    */
    public function contactPageDetails() {
        $cmsPages               = Cms::where('id', 6)->first();
        $data['cmsPage']        = new CmsResource($cmsPages);
        $siteSetting            = WebsiteSetting::where('id', 1)->first();
        $data['site_settings']  = new WebsiteSettingResource($siteSetting);
        
        return Response::json(generateResponseBody('MWD-0008#contact_page_details', $data, true), 200);
    }

    /*
        * Function name : contactForm
        * Purpose       : To submit the contact form
        * Author        : 
        * Created Date  : 08-07-2021
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns success or false
    */
    public function contactForm(Request $request) {
        if ($request->isMethod('POST')) {
            $details['name']    = $request->name ?? null;
            $details['email']   = $request->email ?? null;
            $details['message'] = $request->message ?? null;

            $requestLanguage    =  $request->lang ?? App::getLocale();
            App::setLocale($requestLanguage);
            
            $siteSetting = getSiteSettings();
            // Mail for contact form
            \Mail::send('emails.api.contact_details_to_admin',
            [
                'details'       => $details,
                'siteSetting'   => $siteSetting,
            ], function ($m) use ($details, $siteSetting) {
                $m->from($siteSetting->from_email, $siteSetting->website_title);
                $m->to($siteSetting->to_email, $siteSetting->website_title)->subject(trans('custom_api.subject_contact_form').' - '.$siteSetting->website_title);
            });

            $responseCode = 200;
            
        } else {
            $responseCode = 400;
        }       
        
        return response()->json(generateResponseBody('MWD-0009#contact_form_details', 'Contact', true), $responseCode);
    }

    /*
        * Function name : aboutPageDetails
        * Purpose       : To get the about page details
        * Author        : 
        * Created Date  : 12-07-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns about page data
    */
    public function aboutPageDetails() {
        $cmsPages           = Cms::where('id', 2)->first();
        $data['cmsPage']    = new CmsResource($cmsPages);
        
        return Response::json(generateResponseBody('MWD-0010#about_page_details', $data, true), 200);
    }

    /*
        * Function name : getAQuotePageDetails
        * Purpose       : To get the quote page details
        * Author        : 
        * Created Date  : 09-07-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns quote page data
    */
    public function getAQuotePageDetails() {
        $cmsPages               = Cms::where('id', 9)->first();
        $data['cmsPage']        = new CmsResource($cmsPages);
        
        return response()->json(generateResponseBody('MWD-0011#get_a_quote_page_details', $data, true), 200);
    }

    /*
        * Function name : quoteForm
        * Purpose       : To submit the quote form
        * Author        : 
        * Created Date  : 09-07-2021
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns success or false
    */
    public function quoteForm(Request $request) {
        if ($request->isMethod('POST')) {
            $requestLanguage    =  $request->lang ?? App::getLocale();
            App::setLocale($requestLanguage);

            $details                                            = new Quote;
            $details->name                                      = $request->name ?? null;
            $details->business_name                             = $request->business_name ?? null;
            $details->how_many_employees                        = $request->how_many_employees ?? null;
            $details->phone_number                              = $request->phone_number ?? null;
            $details->email                                     = $request->email ?? null;
            $details->city                                      = $request->city ?? null;
            $details->hear_about_us                             = $request->hear_about_us ?? null;
            $details->website_description                       = $request->website_description ?? null;
            $details->static_website_html_non_flash             = $request->static_website_html_non_flash == true ? 'Y' : 'N';
            $details->dynamic_website_flash_website_animated    = $request->dynamic_website_flash_website_animated == true ? 'Y' : 'N';
            $details->static_website_with_flash_intro           = $request->static_website_with_flash_intro == true ? 'Y' : 'N';
            $details->logo_creation                             = $request->logo_creation == true ? 'Y' : 'N';
            $details->domain_name_registration                  = $request->domain_name_registration == true ? 'Y' : 'N';
            $details->website_maintenance                       = $request->website_maintenance == true ? 'Y' : 'N';
            $details->website_hosting                           = $request->website_hosting == true ? 'Y' : 'N';
            $details->search_engine_submission                  = $request->search_engine_submission == true ? 'Y' : 'N';
            $details->english_language_website                  = $request->english_language_website == true ? 'Y' : 'N';
            $details->french_language_website                   = $request->french_language_website == true ? 'Y' : 'N';
            $details->bilingual_language_website                = $request->bilingual_language_website == true ? 'Y' : 'N';
            $details->number_of_english_pages                   = $request->number_of_english_pages ?? 0;
            $details->number_of_english_graphics                = $request->number_of_english_graphics ?? 0;
            $details->number_of_french_pages                    = $request->number_of_french_pages ?? 0;
            $details->number_of_french_graphics                 = $request->number_of_french_graphics ?? 0;
            $details->day                                       = $request->day ?? null;
            $details->month                                     = $request->month ?? null;
            $details->year                                      = $request->year ?? null;
            $details->budget                                    = $request->budget ?? null;

            if ($details->save()) {
                $siteSetting = getSiteSettings();
                // Mail for quote form
                \Mail::send('emails.api.quote_details_to_admin',
                [
                    'details'       => $details,
                    'siteSetting'   => $siteSetting,
                ], function ($m) use ($details, $siteSetting) {
                    $m->from($siteSetting->from_email, $siteSetting->website_title);
                    $m->to($siteSetting->to_email, $siteSetting->website_title)->subject(trans('custom_api.subject_quote_form').' - '.$siteSetting->website_title);
                });

                $responseCode = 200;
            } else {
                $responseCode = 400;
            }
        } else {
            $responseCode = 400;
        }
        
        return response()->json(generateResponseBody('MWD-0012#quote_form_details', 'Quote', true), $responseCode);
    }

    /*
        * Function name : privacyPageDetails
        * Purpose       : To get the privacy page details
        * Author        : 
        * Created Date  : 12-07-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns privacy page data
    */
    public function privacyPageDetails() {
        $cmsPages           = Cms::where('id', 7)->first();
        $data['cmsPage']    = new CmsResource($cmsPages);

        return Response::json(generateResponseBody('MWD-0013#privacy_page_details', $data, true), 200);
    }

    /*
        * Function name : termsPageDetails
        * Purpose       : Api to get terms details
        * Author        : 
        * Created Date  : 12-07-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns data in json format for terms page
    */
    public function termsPageDetails() {
        $cmsPages           = Cms::where('id', 10)->first();
        $data['cmsPage']    = new CmsResource($cmsPages);
        
        return Response::json(generateResponseBody('MWD-0014#terms_page_details', $data, true), 200);
    }

    /*
        * Function name : siteMapPageDetails
        * Purpose       : To get the site map page details
        * Author        : 
        * Created Date  : 12-07-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns site map page data
    */
    public function siteMapPageDetails() {
        $cmsPages           = Cms::where('id', 8)->first();
        $data['cmsPage']    = new CmsResource($cmsPages);
        
        return Response::json(generateResponseBody('MWD-0015#site_map_page_details', $data, true), 200);
    }    

    /*
        * Function name : enquiry
        * Purpose       : To submit the registration form
        * Author        : 
        * Created Date  : 08-06-2021
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns success or false
    */
    public function enquiry(Request $request) {
        if ($request->isMethod('POST')) {
            $details                = new Enquiry;
            $details->name          = $request->name ?? null;
            $details->phone_number  = $request->phone_number ?? null;
            $details->email         = $request->email ?? null;
            $details->message       = $request->message ?? null;
            
            if ($details->save()) {
                $requestLanguage =  $request->lang ?? App::getLocale();
                App::setLocale($requestLanguage);

                $siteSetting = getSiteSettings();                                    
                // Mail for reset password link
                \Mail::send('emails.api.enquiry_details_to_admin',
                [
                    'details'       => $details,
                    'siteSetting'   => $siteSetting,
                ], function ($m) use ($details, $siteSetting) {
                    $m->from($siteSetting->from_email, $siteSetting->website_title);
                    $m->to($siteSetting->to_email, $siteSetting->website_title)->subject(trans('custom_api.subject_enquiry_form').' - '.$siteSetting->website_title);
                });

                $responseCode = 200;
            } else {
                $responseCode = 400;
            }
        } else {
            $responseCode = 400;
        }       
        
        return Response::json(generateResponseBody('MWD-0016#enquiry_form_details', 'Enquiry', true), $responseCode);
    }

    /*
        * Function name : footerDetails
        * Purpose       : Api to get footer details
        * Author        : 
        * Created Date  : 02-06-2021
        * Modified Date : 
        * Input Params  : 
        * Return Value  : Returns data in json format like logo and other pages
    */
    public function footerDetails() {
        $cmsDetails             = Cms::where(['id' => 1])->first();
        $data['cms_details']    = new CmsResource($cmsDetails);
        $siteSetting            = WebsiteSetting::where('id', 1)->first();
        $data['site_settings']  = new WebsiteSettingResource($siteSetting);
        $services               = Service::where(['status' => '1'])->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
        $data['services']       = ServiceResource::collection($services);
        
        return Response::json(generateResponseBody('MWD-0017#footer_details', $data, true), 200);
    }

    /*
        * Function name : languageChange
        * Purpose       : To change language
        * Author        :
        * Created Date  : 12-07-2021
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : 
    */
    public function languageChange(Request $request) {
        if ($request->lang == "en" || $request->lang == "ar") {
            \App::setLocale($request->lang);
            return Response::json(generateResponseBody('MWD-LC-0018#language_change', trans('custom_api.message_successfully_updated')));
        }else{
            return Response::json(generateResponseBody('MWD-LC-0019#language_change', trans('custom_api.error_something_went_wrong'), false, 400));
        }
    }
}