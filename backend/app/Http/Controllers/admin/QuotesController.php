<?php
/*****************************************************/
# Company Name      :
# Author            :
# Created Date      :
# Page/Class name   : QuotesController
# Purpose           : Contact Management
/*****************************************************/

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Traits\GeneralMethods;
use App\Models\Quote;
use DataTables;
use Excel;
use App\Exports\EnquiriesExport;

class QuotesController extends Controller
{
    use GeneralMethods;
    public $controllerName  = 'Quotes';
    public $management;
    public $modelName       = 'Quote';
    public $breadcrumb;
    public $routePrefix     = 'admin';
    public $pageRoute       = 'quote';
    public $listUrl         = 'quote.list';
    public $listRequestUrl  = 'quote.ajax-list-request';
    public $viewUrl         = 'quote.view';
    public $deleteUrl       = 'quote.delete';
    public $viewFolderPath  = 'admin.quote';
    public $model           = 'Quote';

    /*
        * Function Name : __construct
        * Purpose       : It sets some public variables for being accessed throughout this
        *                   controller and its related view pages
        * Author        :
        * Created Date  :
        * Modified date :
        * Input Params  : Void
        * Return Value  : Mixed
    */
    public function __construct($data = null) {
        parent::__construct();

        $this->management   = trans('custom_admin.label_menu_quote');
        $this->model        = new Quote();

        // Assign breadcrumb
        $this->assignBreadcrumb();
        
        // Variables assign for view page
        $this->assignShareVariables();
    }

    /*
        * Function name : list
        * Purpose       : This function is for the listing and searching
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns to the list page
    */
    public function list(Request $request) {
        $data = [
            'pageTitle'     => trans('custom_admin.label_quote_list'),
            'panelTitle'    => trans('custom_admin.label_quote_list'),
            'pageType'      => 'LISTPAGE'
        ];

        try {
            // Start :: Manage restriction
            $data['isAllow'] = false;
            $restrictions   = checkingAllowRouteToUser($this->pageRoute.'.');
            if ($restrictions['is_super_admin']) {
                $data['isAllow'] = true;
            }
            $data['allowedRoutes']  = $restrictions['allow_routes'];
            // End :: Manage restriction

            return view($this->viewFolderPath.'.list', $data);
        } catch (Exception $e) {
            $this->generateToastMessage('error', trans('custom_admin.error_something_went_wrong'), false);
            return redirect()->route($this->routePrefix.'.dashboard');
        } catch (\Throwable $e) {
            $this->generateToastMessage('error', $e->getMessage(), false);
            return redirect()->route($this->routePrefix.'.dashboard');
        }
    }

    /*
        * Function name : ajaxListRequest
        * Purpose       : This function is for the reutrn ajax data
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns quote data
    */
    public function ajaxListRequest(Request $request) {
        $data = [
            'pageTitle'     => trans('custom_admin.label_quote_list'),
            'panelTitle'    => trans('custom_admin.label_quote_list'),
        ];
        
        try {
            if ($request->ajax()) {
                $data = $this->model->orderBy('id', 'desc')->get();

                // Start :: Manage restriction
                $isAllow = false;
                $restrictions   = checkingAllowRouteToUser($this->pageRoute.'.');
                if ($restrictions['is_super_admin']) {
                    $isAllow = true;
                }
                $allowedRoutes  = $restrictions['allow_routes'];
                // End :: Manage restriction

                return Datatables::of($data, $isAllow, $allowedRoutes)
                        ->addIndexColumn()
                        ->addColumn('created_at', function ($row) {
                            return changeDateFormat($row->created_at);
                        })
                        ->addColumn('action', function ($row) use ($isAllow, $allowedRoutes) {
                            $btn = '';
                            if ($isAllow || in_array($this->viewUrl, $allowedRoutes)) {
                                $viewLink = route($this->routePrefix.'.'.$this->viewUrl, customEncryptionDecryption($row->id));

                                $btn .= '<a href="javascript: void(0);" data-microtip-position="top" role="tooltip" class="btn btn-warning btn-circle btn-circle-sm btn-circle-sm-eye click-to-open" aria-label="'.trans('custom_admin.label_view').'" data-id="'.customEncryptionDecryption($row->id).'"><i class="fa fa-eye"></i></a>';
                            }
                            if ($isAllow || in_array($this->deleteUrl, $allowedRoutes)) {
                                $btn .= ' <a href="javascript: void(0);" data-microtip-position="top" role="tooltip" class="btn btn-danger btn-circle btn-circle-sm delete" aria-label="'.trans('custom_admin.label_delete').'" data-action-type="delete" data-id="'.customEncryptionDecryption($row->id).'"><i class="fa fa-trash"></i></a>';
                            }
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view($this->viewFolderPath.'.list');
        } catch (Exception $e) {
            $this->generateToastMessage('error', $e->getMessage(), false);
            return '';
        } catch (\Throwable $e) {
            $this->generateToastMessage('error', $e->getMessage(), false);
            return '';
        }
    }

    /*
        * Function name : view
        * Purpose       : This function is to view details
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request, $id = null
        * Return Value  : Returns json
    */
    public function view(Request $request, $id = null) {
        $title      = trans('custom_admin.message_error');
        $message    = '<tr><td colspan="2">'.trans("custom_admin.message_no_records_found").'</td></tr>';
        $type       = 'error';

        try {
            if ($request->ajax()) {
                $id = customEncryptionDecryption($id, 'decrypt');
                if ($id != null) {
                    $details = $this->model->where('id', $id)->first();
                    if ($details != null) {
                        $staticWebsiteHtmlNonFlash = $dynamicWebsiteFlashWebsiteAnimated = $staticWebsiteWithFlashIntro = $logoCreation = $domainNameRegistration = $websiteMaintenance = $websiteHosting = $searchEngineSubmission = $englishLanguageWebsite = $frenchLanguageWebsite = $bilingualLanguageWebsite = 'No';

                        if ($details->static_website_html_non_flash == 'Y') {
                            $staticWebsiteHtmlNonFlash = 'Yes';
                        }
                        if ($details->dynamic_website_flash_website_animated == 'Y') {
                            $dynamicWebsiteFlashWebsiteAnimated = 'Yes';
                        }
                        if ($details->static_website_with_flash_intro == 'Y') {
                            $staticWebsiteWithFlashIntro = 'Yes';
                        }
                        if ($details->logo_creation == 'Y') {
                            $logoCreation = 'Yes';
                        }
                        if ($details->domain_name_registration == 'Y') {
                            $domainNameRegistration = 'Yes';
                        }
                        if ($details->website_maintenance == 'Y') {
                            $websiteMaintenance = 'Yes';
                        }
                        if ($details->website_hosting == 'Y') {
                            $websiteHosting = 'Yes';
                        }
                        if ($details->search_engine_submission == 'Y') {
                            $searchEngineSubmission = 'Yes';
                        }
                        if ($details->english_language_website == 'Y') {
                            $englishLanguageWebsite = 'Yes';
                        }
                        if ($details->french_language_website == 'Y') {
                            $frenchLanguageWebsite = 'Yes';
                        }
                        if ($details->bilingual_language_website == 'Y') {
                            $bilingualLanguageWebsite = 'Yes';
                        }

                        $title      = trans('custom_admin.message_success');
                        $type       = 'success';
                        $message    = '<tr><td>'.trans('custom_admin.label_name').'</td><td>'.$details->name.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_business_name').'</td><td>'.$details->business_name.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_how_many_emplyees').'</td><td>'.$details->how_many_employees.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_phone_number').'</td><td>'.$details->phone_number.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_email').'</td><td>'.$details->email.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_city').'</td><td>'.$details->city.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_hear_about_us').'</td><td>'.$details->hear_about_us.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_briefly_describe_your_website').'</td><td>'.$details->website_description.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_static_website_html_non_flash').'</td><td>'.$staticWebsiteHtmlNonFlash.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_dynamic_website_flash_website_animated').'</td><td>'.$dynamicWebsiteFlashWebsiteAnimated.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_static_website_with_flash_intro').'</td><td>'.$staticWebsiteWithFlashIntro.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_logo_creation').'</td><td>'.$logoCreation.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_domain_name_registration').'</td><td>'.$domainNameRegistration.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_website_maintenance').'</td><td>'.$websiteMaintenance.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_website_hosting').'</td><td>'.$websiteHosting.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_search_engine_submission').'</td><td>'.$searchEngineSubmission.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_english_language_website').'</td><td>'.$englishLanguageWebsite.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_french_language_website').'</td><td>'.$frenchLanguageWebsite.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_bilingual_website').'</td><td>'.$bilingualLanguageWebsite.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_number_of_english_pages_to_create').'</td><td>'.$details->number_of_english_pages.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_number_of_english_graphics_to_create').'</td><td>'.$details->number_of_english_graphics.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_number_of_french_pages_to_create').'</td><td>'.$details->number_of_french_pages.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_number_of_french_graphics_to_create').'</td><td>'.$details->number_of_french_graphics.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_target_launch_date').'</td><td>'.$details->day.'/'.$details->month.'/'.$details->year.'</td></tr>';
                        $message    .= '<tr><td>'.trans('custom_admin.label_budget').'</td><td>'.$details->budget.'</td></tr>';
                    }
                }
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
        } catch (\Throwable $e) {
            $message = $e->getMessage();
        }
        return response()->json(['title' => $title, 'message' => $message, 'type' => $type]);
    }

    /*
        * Function name : delete
        * Purpose       : This function is to delete record
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request, $id = null
        * Return Value  : Returns json
    */
    public function delete(Request $request, $id = null) {
        $title      = trans('custom_admin.message_error');
        $message    = trans('custom_admin.error_something_went_wrong');
        $type       = 'error';

        try {
            if ($request->ajax()) {
                $id = customEncryptionDecryption($id, 'decrypt');
                if ($id != null) {
                    $details = $this->model->where('id', $id)->first();
                    if ($details != null) {
                        $delete = $details->delete();
                        if ($delete) {
                            $title      = trans('custom_admin.message_success');
                            $message    = trans('custom_admin.success_data_deleted_successfully');
                            $type       = 'success';
                        } else {
                            $message    = trans('custom_admin.error_took_place_while_deleting');
                        }
                    } else {
                        $message = trans('custom_admin.error_invalid');
                    }
                }
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
        } catch (\Throwable $e) {
            $message = $e->getMessage();
        }
        return response()->json(['title' => $title, 'message' => $message, 'type' => $type]);
    }

    /*
        * Function name : bulkActions
        * Purpose       : This function is to delete record, active/inactive
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns json
    */
    public function bulkActions(Request $request) {
        $title      = trans('custom_admin.message_error');
        $message    = trans('custom_admin.error_something_went_wrong');
        $type       = 'error';

        try {
            if ($request->ajax()) {
                $selectedIds    = $request->selectedIds;
                $actionType     = $request->actionType;
                if (count($selectedIds) > 0) {
                    $this->model->whereIn('id', $selectedIds)->delete();

                    $title      = trans('custom_admin.message_success');
                    $message    = trans('custom_admin.success_data_deleted_successfully');
                    $type       = 'success';
                } else {
                    $message = trans('custom_admin.error_invalid');
                }
            }
        } catch (Exception $e) { 
            $message = $e->getMessage();
        } catch (\Throwable $e) {
            $message = $e->getMessage();
        }
        return response()->json(['title' => $title, 'message' => $message, 'type' => $type]);
    }
    
    /*
        * Function name : export
        * Purpose       : This function is to export records
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns json
    */
    public function export(Request $request) {
        $title      = trans('custom_admin.message_error');
        $message    = trans('custom_admin.error_something_went_wrong');
        $type       = 'error';

        try {
            return Excel::download(new QuotesExport, 'quote_'.time().'.xlsx');
        } catch (Exception $e) { 
            $message = $e->getMessage();
        } catch (\Throwable $e) {
            $message = $e->getMessage();
        }
        return response()->json(['title' => $title, 'message' => $message, 'type' => $type]);
    }

}
