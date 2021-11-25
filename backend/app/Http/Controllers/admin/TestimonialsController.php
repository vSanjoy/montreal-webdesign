<?php
/*
    # Company Name      : Vishi Prem Workz
    # Author            :
    # Created Date      :
    # Class name        : TestimonialsController
    # Purpose           : Testimonial Management
*/

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Traits\GeneralMethods;
use App\Models\Testimonial;
use DataTables;

class TestimonialsController extends Controller
{
    use GeneralMethods;
    public $controllerName  = 'Testimonials';
    public $management;
    public $modelName       = 'Testimonial';
    public $breadcrumb;
    public $routePrefix     = 'admin';
    public $pageRoute       = 'testimonial';
    public $listUrl         = 'testimonial.list';
    public $listRequestUrl  = 'testimonial.ajax-list-request';
    public $addUrl          = 'testimonial.add';
    public $editUrl         = 'testimonial.edit';
    public $statusUrl       = 'testimonial.change-status';
    public $deleteUrl       = 'testimonial.delete';
    public $sortUrl         = 'testimonial.sort';
    public $viewFolderPath  = 'admin.testimonial';
    public $model           = 'Testimonial';

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
    public function __construct() {
        parent::__construct();

        $this->management  = trans('custom_admin.label_menu_testimonial');
        $this->model       = new Testimonial();

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
            'pageTitle'     => trans('custom_admin.label_testimonial_list'),
            'panelTitle'    => trans('custom_admin.label_testimonial_list'),
            'pageType'      => 'LISTPAGE'
        ];

        try {
            // Start :: Manage restriction
            $data['isAllow'] = false;
            $restrictions   = checkingAllowRouteToUser($this->pageRoute.'.');
            if ($restrictions['is_super_admin']) {
                $data['isAllow'] = true;
            }
            $data['allowedRoutes'] = $restrictions['allow_routes'];
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
        * Purpose       : This function is for the return ajax data
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns testimonial data
    */
    public function ajaxListRequest(Request $request) {
        $data['pageTitle'] = trans('custom_admin.label_testimonial_list');
        $data['panelTitle']= trans('custom_admin.label_testimonial_list');

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
                        ->addColumn('image', function ($row) use ($isAllow, $allowedRoutes) {
                            $image = asset('images/'.config('global.NO_IMAGE'));
                            if ($row->image != null && file_exists(public_path('images/uploads/'.$this->pageRoute.'/'.$row->image))) {
                                $image = asset('images/uploads/'.$this->pageRoute.'/'.$row->image);
                                if (file_exists(public_path('images/uploads/'.$this->pageRoute.'/thumbs/'.$row->image))) {
                                    $image = asset('images/uploads/'.$this->pageRoute.'/thumbs/'.$row->image);
                                }
                            }
                            return $image;
                        })
                        ->addColumn('author', function ($row) {
                            return $row->author;
                        })
                        ->addColumn('designation', function ($row) {
                            return $row->designation;
                        })
                        ->addColumn('updated_at', function ($row) {
                            return changeDateFormat($row->updated_at);
                        })
                        ->addColumn('status', function ($row) use ($isAllow, $allowedRoutes) {
                            if ($isAllow || in_array($this->statusUrl, $allowedRoutes)) {
                                if ($row->status == '1') {
                                    $status = ' <a href="javascript:void(0)" data-microtip-position="top" role="" aria-label="'.trans('custom_admin.label_active').'" data-id="'.customEncryptionDecryption($row->id).'" data-action-type="inactive" class="custom_font status"><span class="badge badge-pill badge-success">'.trans('custom_admin.label_active').'</span></a>';
                                } else {
                                    $status = ' <a href="javascript:void(0)" data-microtip-position="top" role="" aria-label="'.trans('custom_admin.label_inactive').'" data-id="'.customEncryptionDecryption($row->id).'" data-action-type="active" class="custom_font status"><span class="badge badge-pill badge-danger">'.trans('custom_admin.label_inactive').'</span></a>';
                                }
                            } else {
                                if ($row->status == '1') {
                                    $status = ' <a data-microtip-position="top" role="" aria-label="'.trans('custom_admin.label_active').'" class="custom_font"><span class="badge badge-pill badge-success">'.trans('custom_admin.label_active').'</span></a>';
                                } else {
                                    $status = ' <a data-microtip-position="top" role="" aria-label="'.trans('custom_admin.label_active').'" class="custom_font"><span class="badge badge-pill badge-danger">'.trans('custom_admin.label_inactive').'</span></a>';
                                }
                            }
                            return $status;
                        })
                        ->addColumn('action', function ($row) use ($isAllow, $allowedRoutes) {
                            $btn = '';
                            if ($isAllow || in_array($this->editUrl, $allowedRoutes)) {
                                $editLink = route($this->routePrefix.'.'.$this->editUrl, customEncryptionDecryption($row->id));

                                $btn .= '<a href="'.$editLink.'" data-microtip-position="top" role="tooltip" class="btn btn-primary btn-circle btn-circle-sm" aria-label="'.trans('custom_admin.label_edit').'"><i class="fa fa-edit"></i></a>';
                            }
                            if ($isAllow || in_array($this->deleteUrl, $allowedRoutes)) {
                                $btn .= ' <a href="javascript: void(0);" data-microtip-position="top" role="tooltip" class="btn btn-danger btn-circle btn-circle-sm delete" aria-label="'.trans('custom_admin.label_delete').'" data-action-type="delete" data-id="'.customEncryptionDecryption($row->id).'"><i class="fa fa-trash"></i></a>';
                            }
                            return $btn;
                        })
                        ->rawColumns(['status','action'])
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
        * Function name : add
        * Purpose       : This function is to add testimonial
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : 
    */
    public function add(Request $request, $id = null) {
        $data = [
            'pageTitle'     => trans('custom_admin.label_add_testimonial'),
            'panelTitle'    => trans('custom_admin.label_add_testimonial'),
            'pageType'      => 'CREATEPAGE'
        ];

        try {
            if ($request->isMethod('POST')) {
                $validationCondition = array(
                    'title.en'          => 'required',
                    'title.fr'          => 'required',
                    'author.en'         => 'required',
                    'author.fr'         => 'required',
                    'designation.en'    => 'required',
                    'designation.fr'    => 'required',
                    'description.en'    => 'required',
                    'description.fr'    => 'required',
                    'image'             => 'required|mimes:'.config('global.IMAGE_FILE_TYPES').'|max:'.config('global.IMAGE_MAX_UPLOAD_SIZE'),
                    'logo'              => 'mimes:'.config('global.IMAGE_FILE_TYPES').'|max:'.config('global.IMAGE_MAX_UPLOAD_SIZE'),
                );
                $validationMessages = array(
                    'title.en.required'         => trans('custom_admin.error_title', ['langKey' => 'english']),
                    'title.fr.required'         => trans('custom_admin.error_title', ['langKey' => 'francias']),
                    'author.en.required'        => trans('custom_admin.error_author', ['langKey' => 'english']),
                    'author.fr.required'        => trans('custom_admin.error_author', ['langKey' => 'francias']),
                    'designation.en.required'   => trans('custom_admin.error_designation', ['langKey' => 'english']),
                    'designation.fr.required'   => trans('custom_admin.error_designation', ['langKey' => 'francias']),
                    'description.en.required'   => trans('custom_admin.error_description', ['langKey' => 'english']),
                    'description.fr.required'   => trans('custom_admin.error_description', ['langKey' => 'francias']),
                    'image.required'            => trans('custom_admin.error_image'),
                    'image.mimes'               => trans('custom_admin.error_image_mimes'),
                    'logo.mimes'                => trans('custom_admin.error_image_mimes'),
                );
                $validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($validator->fails()) {
                    $validationFailedMessages = validationMessageBeautifier($validator->messages()->getMessages());
                    $this->generateToastMessage('error', $validationFailedMessages, false);
                    return redirect()->back()->withInput();
                } else {
                    $saveData               = [];
                    $image                  = $request->file('image');
                    $uploadedImage          = '';
                    if ($image != '') {
                        $uploadedImage      = singleImageUpload($this->modelName, $image, 'testimonial', $this->pageRoute, true); // If thumb true, mention size in global.php
                        $saveData['image']  = $uploadedImage;
                    }
                    $logo           = $request->file('logo');
                    $uploadedLogo   = '';
                    if ($logo != '') {
                        $uploadedLogo= singleImageUpload($this->modelName, $logo, 'logo', $this->pageRoute, false);
                        $saveData['logo']= $uploadedLogo;
                    }
                    $saveData['sort']       = generateSortNumber($this->model);
                    $saveData['slug']       = generateUniqueSlug($this->model, trim($request->title['en'],' '));
                    foreach ($this->websiteLanguages as $langKey => $langVal) {
                        $saveData['title'][$langKey]        = $request->title[$langKey] ?? null;
                        $saveData['author'][$langKey]       = $request->author[$langKey] ?? null;
                        $saveData['designation'][$langKey]  = $request->designation[$langKey] ?? null;
                        $saveData['description'][$langKey]  = $request->description[$langKey] ?? null;
                    }
                    $save = $this->model->create($saveData);
                    
                    if ($save) {
                        $this->generateToastMessage('success', trans('custom_admin.success_data_updated_successfully'), false);
                        return redirect()->route($this->routePrefix.'.'.$this->listUrl);
                    } else {
                        // If files uploaded then delete those files
                        unlinkFiles($this->modelName, $uploadedImage, $this->pageRoute, false);

                        $this->generateToastMessage('error', trans('custom_admin.error_took_place_while_adding'), false);
                        return redirect()->back()->withInput();
                    }
                }
            }
            return view($this->viewFolderPath.'.add', $data);
        } catch (Exception $e) {
            $this->generateToastMessage('error', trans('custom_admin.error_something_went_wrong'), false);
            return redirect()->route($this->routePrefix.'.'.$this->listUrl);
        } catch (\Throwable $e) {
            $this->generateToastMessage('error', $e->getMessage(), false);
            return redirect()->route($this->routePrefix.'.'.$this->listUrl);
        }
    }

    /*
        * Function name : edit
        * Purpose       : This function is to update form
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Returns testimonial data
    */
    public function edit(Request $request, $id = null) {
        $data = [
            'pageTitle'     => trans('custom_admin.label_edit_testimonial'),
            'panelTitle'    => trans('custom_admin.label_edit_testimonial'),
            'pageType'      => 'EDITPAGE'
        ];

        try {
            $data['id']             = $id;
            $data['testimonialId']  = $id = customEncryptionDecryption($id, 'decrypt');
            $data['details']        = $details = $this->model->where(['id' => $id])->first();
            
            if ($request->isMethod('POST')) {
                if ($id == null) {
                    $this->generateToastMessage('error', trans('custom_admin.error_something_went_wrong'), false);
                    return redirect()->route($this->routePrefix.'.'.$this->listUrl);
                }
                $validationCondition = array(
                    'title.en'          => 'required',
                    'title.fr'          => 'required',
                    'author.en'         => 'required',
                    'author.fr'         => 'required',
                    'designation.en'    => 'required',
                    'designation.fr'    => 'required',
                    'description.en'    => 'required',
                    'description.fr'    => 'required',
                    'image'             => 'mimes:'.config('global.IMAGE_FILE_TYPES').'|max:'.config('global.IMAGE_MAX_UPLOAD_SIZE'),
                    'logo'              => 'mimes:'.config('global.IMAGE_FILE_TYPES').'|max:'.config('global.IMAGE_MAX_UPLOAD_SIZE'),
                );
                $validationMessages = array(
                    'title.en.required'         => trans('custom_admin.error_title', ['langKey' => 'english']),
                    'title.fr.required'         => trans('custom_admin.error_title', ['langKey' => 'francias']),
                    'author.en.required'        => trans('custom_admin.error_author', ['langKey' => 'english']),
                    'author.fr.required'        => trans('custom_admin.error_author', ['langKey' => 'francias']),
                    'designation.en.required'   => trans('custom_admin.error_designation', ['langKey' => 'english']),
                    'designation.fr.required'   => trans('custom_admin.error_designation', ['langKey' => 'francias']),
                    'description.en.required'   => trans('custom_admin.error_description', ['langKey' => 'english']),
                    'description.fr.required'   => trans('custom_admin.error_description', ['langKey' => 'francias']),
                    'image.mimes'               => trans('custom_admin.error_image_mimes'),
                    'logo.mimes'                => trans('custom_admin.error_image_mimes'),
                );
                $validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($validator->fails()) {
                    $validationFailedMessages = validationMessageBeautifier($validator->messages()->getMessages());
                    $this->generateToastMessage('error', $validationFailedMessages, false);
                    return redirect()->back()->withInput();
                } else {
                    $updateData         = [];
                    $image              = $request->file('image');
                    $uploadedImage      = '';
                    $previousFileName   = null;
                    $unlinkStatus       = false;
                    if ($image != '') {
                        if ($details['image'] != null) {
                            $previousFileName   = $details['image'];
                            $unlinkStatus       = true;
                        }
                        $uploadedImage          = singleImageUpload($this->modelName, $image, 'testimonial', $this->pageRoute, true, $previousFileName, $unlinkStatus);
                        $updateData['image']    = $uploadedImage;
                    }
                    $logo                   = $request->file('logo');
                    $uploadedLogo           = '';
                    $previousLogoFileName   = null;
                    $unlinkStatusLogo       = false;
                    if ($logo != '') {
                        if ($details['logo'] != null) {
                            $previousLogoFileName   = $details['logo'];
                            $unlinkStatusLogo       = false;
                        }
                        $uploadedLogo           = singleImageUpload($this->modelName, $logo, 'logo', $this->pageRoute, false, $previousLogoFileName, $unlinkStatusLogo);
                        $updateData['logo']    = $uploadedLogo;
                    }
                    $updateData['slug'] = generateUniqueSlug($this->model, trim($request->title['en'],' '), $data['id']);
                    foreach ($this->websiteLanguages as $langKey => $langVal) {
                        $updateData['title'][$langKey]        = $request->title[$langKey] ?? null;
                        $updateData['author'][$langKey]       = $request->author[$langKey] ?? null;
                        $updateData['designation'][$langKey]  = $request->designation[$langKey] ?? null;
                        $updateData['description'][$langKey]  = $request->description[$langKey] ?? null;
                    }
                    $update = $details->update($updateData);
                    
                    if ($update) {
                        $this->generateToastMessage('success', trans('custom_admin.success_data_updated_successfully'), false);
                        return redirect()->route($this->routePrefix.'.'.$this->listUrl);
                    } else {
                        $this->generateToastMessage('error', trans('custom_admin.error_took_place_while_updating'), false);
                        return redirect()->back()->withInput();
                    }
                }
            }
            return view($this->viewFolderPath.'.edit', $data);
        } catch (Exception $e) {
            $this->generateToastMessage('error', trans('custom_admin.error_something_went_wrong'), false);
            return redirect()->route($this->routePrefix.'.'.$this->listUrl);
        } catch (\Throwable $e) {
            $this->generateToastMessage('error', $e->getMessage(), false);
            return redirect()->route($this->routePrefix.'.'.$this->listUrl);
        }
    }

    /*
        * Function name : status
        * Purpose       : This function is to status
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request, $id = null
        * Return Value  : Returns json
    */
    public function status(Request $request, $id = null) {
        $title      = trans('custom_admin.message_error');
        $message    = trans('custom_admin.error_something_went_wrong');
        $type       = 'error';

        try {
            if ($request->ajax()) {
                $id = customEncryptionDecryption($id, 'decrypt');
                if ($id != null) {
                    $details = $this->model->where('id', $id)->first();
                    if ($details != null) {
                        if ($details->status == 1) {
                            $details->status = '0';
                            $details->save();
                            
                            $title      = trans('custom_admin.message_success');
                            $message    = trans('custom_admin.success_status_updated_successfully');
                            $type       = 'success';        
                        } else if ($details->status == 0) {
                            $details->status = '1';
                            $details->save();
        
                            $title      = trans('custom_admin.message_success');
                            $message    = trans('custom_admin.success_status_updated_successfully');
                            $type       = 'success';
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
        * Function name : sort
        * Purpose       : This function is to display record as per sort order
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : Request $request
        * Return Value  : Display list of records
    */
    public function sort(Request $request) {
        $data = [
            'pageTitle'     => trans('custom_admin.label_sort'),
            'panelTitle'    => trans('custom_admin.label_sort'),
            'pageType'      => 'SORTPAGE',
            'order_by'      => 'sort',
            'order'         => 'asc'
        ];        

        try {
            $list = $this->model->whereNull('deleted_at')->orderBy($data['order_by'], $data['order'])->get();
            if ($list->count()) {
                $data['list'] = $list;
            } else {
                $data['list'] = [];
            }
            return view($this->viewFolderPath.'.sort', $data);
        } catch (Exception $e) {
            $this->generateToastMessage('error', trans('custom_admin.error_something_went_wrong'), false);
            return redirect()->route($this->routePrefix.'.'.$this->listUrl);
        } catch (\Throwable $e) {
            $this->generateToastMessage('error', $e->getMessage(), false);
            return redirect()->route($this->routePrefix.'.'.$this->listUrl);
        }
    }

    /*****************************************************/
    # Function name : saveSort
    # Params        : Request $request
    /*****************************************************/
    public function saveSort(Request $request) {
        $title      = trans('custom_admin.message_error');
        $message    = trans('custom_admin.error_something_went_wrong');
        $type       = 'error';

        try {
            if ($request->isMethod('POST')) {
                foreach ($request->order as $sort => $id) {
                    $this->model->where(['id' => $id])->update(['sort' => $sort]);
                }
                $title      = trans('custom_admin.message_success');
                $message    = trans('custom_admin.success_sorted_successfully');
                $type       = 'success';
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
                    if ($actionType ==  'active') {
                        $this->model->whereIn('id', $selectedIds)->update(['status' => '1']);
                        
                        $title      = trans('custom_admin.message_success');
                        $message    = trans('custom_admin.success_status_updated_successfully');
                        $type       = 'success';
                    } elseif ($actionType ==  'inactive') {
                        $this->model->whereIn('id', $selectedIds)->update(['status' => '0']);

                        $title      = trans('custom_admin.message_success');
                        $message    = trans('custom_admin.success_status_updated_successfully');
                        $type       = 'success';
                    } else {
                        $this->model->whereIn('id', $selectedIds)->delete();

                        $title      = trans('custom_admin.message_success');
                        $message    = trans('custom_admin.success_data_deleted_successfully');
                        $type       = 'success';
                    }
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
        * Function Name : deleteUploadedImage
        * Purpose       : This function is for delete uploaded image
        * Author        :
        * Created Date  :
        * Modified date :
        * Input Params  : Request $request
        * Return Value  : 
    */
    public function deleteUploadedImage(Request $request, $id = null) {
        $title      = trans('custom_admin.message_error');
        $message    = trans('custom_admin.error_something_went_wrong');
        $type       = 'error';

        try {
            if ($request->ajax()) {
                $primaryId  = $request->primaryId ? customEncryptionDecryption($request->primaryId, 'decrypt') : null;
                $dbField    = $request->dbField ? $request->dbField : '';

                if ($primaryId != null && $dbField != '') {
                    $details = $this->model->where('id', $primaryId)->first();
                    if ($details != '') {
                        $response = unlinkFiles($details->logo, $this->pageRoute, false);
                        if ($response) {
                            $details->$dbField = null;
                            if ($details->save()) {
                                $title      = trans('custom_admin.message_success');
                                $message    = trans('custom_admin.message_image_uploaded_successfully');
                                $type       = 'success';
                            } else {
                                $message    = trans('custom_admin.error_took_place_while_deleting');
                            }
                        } else {
                            $message    = trans('custom_admin.error_took_place_while_deleting');
                        }
                    } else {
                        $message = trans('custom_admin.error_invalid');
                    }                    
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

}
