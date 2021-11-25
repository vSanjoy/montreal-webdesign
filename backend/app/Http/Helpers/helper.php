<?php
/*
    # Company Name      :
    # Author            :
    # Created Date      :
    # Page/Class name   : helper
    # Purpose           : For global
*/

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Cms;
use App\Models\Category;
use App\Models\User;
use App\Models\Location;
use App\Models\WebsiteSetting;

/*
    * Function name : getAppName
    * Purpose       : This function is to return app name
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : 
    * Return Value  : 
*/
function getAppName() {
    return 'ARSA';
}

/*
    * Function name : getAppName
    * Purpose       : This function is to return app name
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : 
    * Return Value  : 
*/
function getBaseUrl() {
    $baseUrl = url('/'.\App::getLocale());
    return $baseUrl;
}

/*
    * Function name : getSiteSettings
    * Purpose       : This function is to return website settings
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : Void
    * Return Value  : Array
*/
function getSiteSettings() {
    $siteSettingData = WebsiteSetting::first();
    return $siteSettingData;
}

/*
    * Function name : getSiteSettingsWithSelectFields
    * Purpose       : This function is to return website settings with
                        selected fields
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : Void
    * Return Value  : Array
*/
function getSiteSettingsWithSelectFields($selectedFields) {
    $dataToReturn = [];
    $siteSettingData = WebsiteSetting::select($selectedFields)->first();
    foreach ($selectedFields as $keyLabel => $valLabel) {
        $dataToReturn[$valLabel]  = $siteSettingData->$valLabel;
    }
    return $dataToReturn;
}

/*
    * Function name : validationMessageBeautifier
    * Purpose       : This function is to beautify validation messages
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $errorMessageObject
    * Return Value  : String
*/
function validationMessageBeautifier($errorMessageObject) {
    $validationFailedMessages = '';
    foreach ($errorMessageObject as $fieldName => $messages) {
        foreach($messages as $message) {
            $validationFailedMessages .= $message.'<br>';
        }
    }
    return $validationFailedMessages;
}

/*
    * Function name : getUserRoleSpecificRoutes
    * Purpose       : This function is for user specific routes
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : Void
    * Return Value  : Array
*/
function getUserRoleSpecificRoutes() {
    $existingRoutes = [];
    $userExistingRoles = \Auth::guard('admin')->user()->userRoles;
    if ($userExistingRoles) {
        foreach ($userExistingRoles as $role) {
            if ($role->rolePermissionToRolePage) {
                foreach ($role->rolePermissionToRolePage as $permission) {
                    $existingRoutes[] = $permission['routeName'];
                }
            }
        }
    }
    return $existingRoutes;
}

/*
    * Function name : checkingAllowRouteToUser
    * Purpose       : This function is for allowed routes
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $routeToCheck without admin. alias
    * Return Value  : Array
*/
function checkingAllowRouteToUser($routePartToCheck = null) {
    $existingRoutes['is_super_admin']   = false;
    $existingRoutes['allow_routes']     = [];

    if (\Auth::guard('admin')->user()->id == 1 || \Auth::guard('admin')->user()->type == 'SA') {
        $existingRoutes['is_super_admin'] = true;
    } else {
        $userExistingRoles = \Auth::guard('admin')->user()->userRoles;
        if ($userExistingRoles) {
            foreach ($userExistingRoles as $role) {
                if ($role->rolePermissionToRolePage) {
                    foreach ($role->rolePermissionToRolePage as $permission) {
                        if (strpos($permission['routeName'], $routePartToCheck) !== false) {
                            $existingRoutes['allow_routes'][] = $permission['routeName'];
                        }
                    }
                }
            }
        }
    }
    return $existingRoutes;
}

/*
    * Function name : customEncryptionDecryption
    * Purpose       : This function is for encrypt/decrypt data
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $string, $action = encrypt/decrypt
    * Return Value  : String
*/
function customEncryptionDecryption($string, $action = 'encrypt') {
    $secretKey = 'c7tpe291z';
    $secretVal = 'GfY7r512';
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secretKey);
    $iv = substr(hash('sha256', $secretVal), 0, 16);

    if ($action == 'encrypt') {
        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

/*
    * Function Name : generateUniqueSlug
    * Purpose       : This function is to generate unique slug
    * Author        :
    * Created Date  :
    * Modified date :
    * Input Params  : $type, $validationFailedMessages, $extraTitle = false
    * Return Value  : Mixed
*/
function generateUniqueSlug($model, $title, $id = null) {
    $slug = Str::slug($title);
    $currentSlug = '';

    if ($id) {
        $id = customEncryptionDecryption($id, 'decrypt');
        $currentSlug = $model->where('id', '=', $id)->value('slug');
    }

    if ($currentSlug && $currentSlug === $slug) {
        return $slug;
    } else {
        $slugList = $model::where('slug', 'LIKE', $slug . '%')->whereNull('deleted_at')->pluck('slug');
        if ($slugList->count() > 0) {
            $slugList = $slugList->toArray();
            if (!in_array($slug, $slugList)) {
                return $slug;
            }
            $newSlug = '';
            for ($i = 1; $i <= count($slugList); $i++) {
                $newSlug = $slug . '-' . $i;
                if (!in_array($newSlug, $slugList)) {
                    return $newSlug;
                }
            }
            return $newSlug;
        } else {
            return $slug;
        }
    }
}

/*
    * Function Name : generateSortNumber
    * Purpose       : This function is to generate sort number
    * Author        :
    * Created Date  :
    * Modified date :
    * Input Params  : $model, $id = null
    * Return Value  : Sort number
*/
function generateSortNumber($model = null, $id = null) {
    if ($id != null) {
        $gettingLastSortedCount = $model::select('sort')->where('id','<>',$id)->whereNull('deleted_at')->orderBy('sort','desc')->first();
    } else {
        $gettingLastSortedCount = $model::select('sort')->whereNull('deleted_at')->orderBy('sort','desc')->first();
    }        
    $newSort = isset($gettingLastSortedCount->sort) ? ($gettingLastSortedCount->sort + 1) : 0;

    return $newSort;
}

/*
    * Function Name : excerpts
    * Purpose       : This function is to show certain words
    * Author        :
    * Created Date  :
    * Modified date :
    * Input Params  : $text, $limit = 5, $type = null
    * Return Value  : Certain words
*/
function excerpts($text, $limit = 5, $type = null) {
    if (str_word_count($text, 0) > $limit) {
        $words  = str_word_count($text, 2);
        $pos    = array_keys($words);
        $text   = substr($text, 0, $pos[$limit]);
        $text   = trim($text);
        if ($type == null) {
            $text .= '...';
        }
    }
    return $text;
}

/*
    * Function Name : getNumbersFromString
    * Purpose       : This function is to get numbers from string
    * Author        : Sanjay Karmakar
    * Created Date  : 03-06-2021
    * Modified date :
    * Input Params  : $string
    * Return Value  : Only numbers
*/
function getNumbersFromString($string) {
    $number = '';
    if ($string) {
        $number = preg_replace('/[^0-9]/', '', $string);
    }
    return $number;
}

/*
    * Function Name : generateVerificationCode
    * Purpose       : This function is to generate verification code
    * Author        :
    * Created Date  :
    * Modified date :
    * Input Params  : 
    * Return Value  : 4 digit verification code
*/
function generateVerificationCode() {
    $stringOfNumbers            = '123456789';
    $shuffledStringOfNumbers    = str_shuffle($stringOfNumbers);
    $verificationCode           = substr($shuffledStringOfNumbers, 1, 4);
    return $verificationCode;
}

/*
    * Function Name : truncateString
    * Purpose       : This function is to show certain words
    * Author        :
    * Created Date  :
    * Modified date :
    * Input Params  : $str, $chars, $to_space, $replacement="..."
    * Return Value  : Certain words
*/
function truncateString($str, $chars, $to_space, $replacement="...") {
    if($chars > strlen($str)) return $str;
 
    $str = substr($str, 0, $chars);
    $space_pos = strrpos($str, " ");
    if($to_space && $space_pos >= 0) 
        $str = substr($str, 0, strrpos($str, " "));
 
    return($str . $replacement);
 }


/*
    * Function name : singleImageUpload
    * Purpose       : This function is for image upload
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $modelName, $originalImage, $imageName, $uploadedFolder, $thumbImage = false,
    *                   $previousFileName = null, $unlinkStatus = false
    * Return Value  : Uploaded file name
*/
function singleImageUpload($modelName, $originalImage, $imageName, $uploadedFolder, $thumbImage = false, $previousFileName = null, $unlinkStatus = false) {
    $originalFileName   = $originalImage->getClientOriginalName();
    $extension          = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $fileName           = $imageName.'_'.strtotime(date('Y-m-d H:i:s')).'.'.$extension;
    $imageResize        = Image::make($originalImage->getRealPath());

    // Checking if folder already existed and if not create a new folder
    $directoryPath      = public_path('images/uploads/'.$uploadedFolder);
    $thumbDirectoryPath = public_path('images/uploads/'.$uploadedFolder.'/thumbs');
    if (!File::isDirectory($directoryPath)) {
        File::makeDirectory($directoryPath);    // make the directory because it doesn't exists
    }
    $imageResize->save($directoryPath.'/'.$fileName);

    if ($thumbImage) {
        if (!File::isDirectory($thumbDirectoryPath)) {
            File::makeDirectory($thumbDirectoryPath);    // make the Thumbs directory because it doesn't exists
        }

        $thumbImageWidth    = config('global.THUMB_IMAGE_WIDTH');   // Getting data from global file (global.php)
        $thumbImageHeight   = config('global.THUMB_IMAGE_HEIGHT');  // Getting data from global file (global.php)

        $imageResize->resize($thumbImageWidth[$modelName], $thumbImageHeight[$modelName], function ($constraint) {
            $constraint->aspectRatio();
        });
        $imageResize->save($thumbDirectoryPath.'/'.$fileName);
    }
    
    if ($unlinkStatus && $previousFileName != null) {
        if (file_exists($directoryPath.'/'.$previousFileName)) {
            $largeImagePath = $directoryPath.'/'.$previousFileName;
            @unlink($largeImagePath);
            if ($thumbImage) {
                $thumbImagePath = $thumbDirectoryPath.'/'.$previousFileName;
                @unlink($thumbImagePath);
            }
        }
    }
    return $fileName;
}

/*
    * Function name : singleImageUploadWithCropperTool
    * Purpose       : This function is for image upload with cropper tool
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $originalImage, $croppedImage = base64 format,  $imageName,
    *                   $uploadedFolder, $thumbImage = false, $previousFileName = null, $unlinkStatus = false
    * Return Value  : Uploaded file name
*/
function singleImageUploadWithCropperTool($originalImage, $croppedImage, $imageName, $uploadedFolder, $thumbImage = false, $previousFileName = null, $unlinkStatus = false) {
    $originalFileName   = $originalImage->getClientOriginalName();
    $extension          = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $fileName           = $imageName.'_'.strtotime(date('Y-m-d H:i:s')).'.'.$extension;
    $imageResize        = Image::make($originalImage->getRealPath());

    // Checking if folder already existed and if not create a new folder
    $directoryPath      = public_path('images/uploads/'.$uploadedFolder);
    $thumbDirectoryPath = public_path('images/uploads/'.$uploadedFolder.'/thumbs');
    if (!File::isDirectory($directoryPath)) {
        File::makeDirectory($directoryPath);    // make the directory because it doesn't exists
    }
    $imageResize->save($directoryPath.'/'.$fileName);

    if ($thumbImage) {
        if (!File::isDirectory($thumbDirectoryPath)) {
            File::makeDirectory($thumbDirectoryPath);    // make the Thumbs directory because it doesn't exists
        }

        // Cropped file upload
        $base64DecodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImage));
        $uploadedPath       = $thumbDirectoryPath.'/'.$fileName;
        file_put_contents($uploadedPath, $base64DecodedImage);
    }
    
    if ($unlinkStatus && $previousFileName != null) {
        if (file_exists($directoryPath.'/'.$previousFileName)) {
            $largeImagePath = $directoryPath.'/'.$previousFileName;
            @unlink($largeImagePath);
            if ($thumbImage) {
                $thumbImagePath = $thumbDirectoryPath.'/'.$previousFileName;
                @unlink($thumbImagePath);
            }
        }
    }
    return $fileName;
}

/*
    * Function name : gallerySingleImageUpload
    * Purpose       : This function is for image upload
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $modelName, $originalImage, $imageName, $uploadedFolder, $albumId, $thumbImage = false,
    *                   $previousFileName = null, $unlinkStatus = false
    * Return Value  : Uploaded file name
*/
function gallerySingleImageUpload($modelName, $originalImage, $imageName, $uploadedFolder, $thumbImage = false) {
    $originalFileName   = $originalImage->getClientOriginalName();
    $extension          = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $fileName           = $imageName.'_'.rand(1000,9999).'_'.strtotime(date('Y-m-d H:i:s')).'.'.$extension;
    $imageResize        = Image::make($originalImage->getRealPath());

    // Checking if folder already existed and if not create a new folder
    $directoryPath      = public_path('images/uploads/gallery');
    $subDirectoryPath   = public_path('images/uploads/gallery/'.$uploadedFolder);
    $thumbDirectoryPath = public_path('images/uploads/gallery/'.$uploadedFolder.'/thumbs');
    if (!File::isDirectory($directoryPath)) {
        File::makeDirectory($directoryPath);        // make the main directory (gallery) because it doesn't exists
        File::makeDirectory($subDirectoryPath);    // make the directory because it doesn't exists
    }
    $imageResize->save($subDirectoryPath.'/'.$fileName);

    if ($thumbImage) {
        if (!File::isDirectory($thumbDirectoryPath)) {
            File::makeDirectory($thumbDirectoryPath);    // make the Thumbs directory because it doesn't exists
        }

        $thumbImageWidth    = config('global.THUMB_IMAGE_WIDTH');   // Getting data from global file (global.php)
        $thumbImageHeight   = config('global.THUMB_IMAGE_HEIGHT');  // Getting data from global file (global.php)

        $imageResize->resize($thumbImageWidth[$modelName], $thumbImageHeight[$modelName], function ($constraint) {
            $constraint->aspectRatio();
        });
        $imageResize->save($thumbDirectoryPath.'/'.$fileName);
    }
    return $fileName;
}

/*
    * Function name : fileUpload
    * Purpose       : This function is for upload files
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $originalFile, $fileName, $uploadedFolder
    * Return Value  : Uploaded file name
*/
function fileUpload($originalFile, $fileName, $uploadedFolder) {
    $originalFileName   = $originalFile->getClientOriginalName();
    $extension          = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $fileName           = $fileName.'_'.strtotime(date('Y-m-d H:i:s')).'.'.$extension;
    $originalFile->move(public_path('images/uploads/'.$uploadedFolder), $fileName);

    return $fileName;
}

/*
    * Function name : unlinkFiles
    * Purpose       : This function is for unlinking files
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $fileName, $uploadedFolder, $thumbFile = false
    * Return Value  : True
*/
function unlinkFiles($fileName, $uploadedFolder, $thumbFile = false) {
    if ($fileName != '') {
        $directoryPath      = public_path('images/uploads/'.$uploadedFolder);
        $thumbDirectoryPath = public_path('images/uploads/'.$uploadedFolder.'/thumbs');
        
        if (file_exists($directoryPath.'/'.$fileName)) {
            $largeFilePath = $directoryPath.'/'.$fileName;
            @unlink($largeFilePath);
            if ($thumbFile) {
                $thumbFilePath = $thumbDirectoryPath.'/'.$fileName;
                @unlink($thumbFilePath);
            }
        }
    }    
    return true;
}

/*
    * Function name : getCurrentDate
    * Purpose       : This function is to get current date time
    * Author        : Sanjay Karmakar
    * Created Date  : 08-04-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : Date
*/
function getCurrentDate() {
    return Carbon::now()->format('Y-m-d');
}

/*
    * Function name : getCurrentFullDateTime
    * Purpose       : This function is to get current date time
    * Author        : 
    * Created Date  : 19-05-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : Date and Time
*/
function getCurrentFullDateTime() {
    return Carbon::now()->format('Y-m-d H:i:s');
}

/*
    * Function name : getCurrentDateTime
    * Purpose       : This function is to get current date time
    * Author        : 
    * Created Date  : 08-04-2021
    * Modified Date : 
    * Input Params  : 
    * Return Value  : Date and Time
*/
function getCurrentDateTime() {
    return Carbon::now()->format('Y-m-d h:i A');
}

/*
    * Function name : changeDateFormat
    * Purpose       : This function is for formatting date
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $fieldName, $dateFormat = false
    * Return Value  : Formatted date
*/
function changeDateFormat($fieldName, $dateFormat = false) {
    if ($dateFormat) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $fieldName)->format($dateFormat);
    } else {
        return Carbon::createFromFormat('Y-m-d H:i:s', $fieldName)->format('Y-m-d H:i');
    }    
}

/*
    * Function name : changeDateFormatFromUnixTimestamp
    * Purpose       : This function is for formatting date
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $dateValue, $dateFormat = false
    * Return Value  : True
*/
function changeDateFormatFromUnixTimestamp($dateValue, $dateFormat = false) {
    if ($dateFormat) {
        return Carbon::createFromTimestamp($dateValue)->format($dateFormat);
    } else {
        return Carbon::createFromTimestamp($dateValue)->format('Y-m-d H:i');
    }    
}

/*
    * Function name : categoryDropdownMenu
    * Purpose       : This function is category drop down menu
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : 
    * Return Value  : drop down structure
*/
function categoryDropdownMenu() {
    $categoryList   = [];
    $categories     = Category::select('id','title')->where(['status' => '1'])->whereNull(['parent_id','deleted_at'])->get();
    if ($categories->count()) {
        foreach ($categories as $categoryKey => $categoryVal) {
            $categoryList[$categoryVal->id] = $categoryVal->title;
            if ($categoryVal->childCategories->count()) {
                foreach ($categoryVal->childCategories as $childCategoryKey => $childCategoryVal) {
                    $categoryList[$childCategoryVal->id] = '- '.$childCategoryVal->title;
                }
            }
        }
    }
    return $categoryList;
}

/*
    * Function name : getContactList
    * Purpose       : This function is to get contact list
    * Author        : 
    * Created Date  : 
    * Modified Date : 
    * Input Params  : 
    * Return Value  : organized data
*/
function getContactList() {
    $contactList = Contact::orderBy('id','desc')->take(5)->get();
    return $contactList;
}

/*
    * Function name : dayParts
    * Purpose       : This function is to get morning/afternoon/evening
    * Author        : 
    * Created Date  : 
    * Modified Date : 
    * Input Params  : 
    * Return Value  : Data
*/
function dayParts() {
    if (date("H") < 12) {
        return "Good Morning";
    } elseif (date("H") > 11 && date("H") < 18) {
        return "Good Afternoon";
    } elseif (date("H") > 17) {
        return "Good Evening";
    }
}

/*
    * Function name : getMetaDetails
    * Purpose       : This function is to get meta details
    * Author        : 
    * Created Date  : 2021-04-17
    * Modified Date : 
    * Input Params  : $table = null, $where = ''
    * Return Value  : Meta details
*/
function getMetaDetails($table = null, $where = '') {
    if ($table == 'cms') {        
        $metaDetails = Cms::where('id', $where)->first();
        $metaData['title']              = $metaDetails['meta_title'] != '' ? $metaDetails['page_name'].' | '.$metaDetails['meta_title'] : $metaDetails['page_name'];
        $metaData['metaKeywords']       = $metaDetails['meta_keywords'] ?? null;
        $metaData['metaDescription']    = $metaDetails['meta_description'] ?? null;
    } else {
        $metaDetails = WebsiteSetting::select('website_title','default_meta_title', 'default_meta_keywords', 'default_meta_description')->first();
        $metaData['title']              = $metaData['default_meta_title'] ?? $metaData['website_title'];
        $metaData['metaKeywords']       = $metaData['default_meta_keywords'] ?? null;
        $metaData['metaDescription']    = $metaData['default_meta_description'] ?? null;
    }
    return $metaData;
}

/******************************************************** API SECTION ********************************************************/

/*
    * Function name : generateResponseBody
    * Purpose       : This function is to generate response body
    * Author        : 
    * Created Date  : 
    * Modified Date : 
    * Input Params  : $code, $data, $success = true, $errorCode = null
    * Return Value  : Structured response body
*/
function generateResponseBody($code, $data, $success = true, $errorCode = null) {
    $response       = [];
    $result         = [];
    $finalCode      = $code;
    $functionName   = null;
    // explode to get code and function name
    if (strpos($code, '#') !== false) {
        $explodedCode   = explode('#',$code);
        $finalCode      = $explodedCode[0];
        $functionName   = $explodedCode[1];
    }
    $result['code'] = $finalCode;
    // response status
    if ($success) {
        $result['status'] = '200';     // for success
    } else {
        $result['status'] = '0';     // for error
        if ($errorCode) {
            $result['error_code'] = $errorCode;
        }
    }
    // response return type
    if (gettype($data) === 'string') {
        $result['message'] = $data;
    } else if(gettype($data) === 'array' && array_key_exists('errors',$data)){
        $result['message'] = implode(",",$data['errors']);
    } else {
        $result['message'] = "";
        $result['details'] = $data;
    }
    // response function name
    if ($functionName != null) {
        $response[$functionName] = $result;
    } else {
        $response = $result;
    }
    return $response;
}

/*
    * Function name : generateResponseBodyForSignInSignUp
    * Purpose       : This function is to generate response body for sign up / sign in
    * Author        : 
    * Created Date  : 
    * Modified Date : 
    * Input Params  : $code, $data, $success = true, $errorCode = null, $encryptedUserData = ''
    * Return Value  : Structured response body
*/
function generateResponseBodyForSignInSignUp($code, $data, $success = true, $errorCode = null, $encryptedUserData = '') {
    $response       = [];
    $result         = [];
    $finalCode      = $code;
    $functionName   = null;
    // explode to get code and function name
    if (strpos($code, '#') !== false) {
        $explodedCode   = explode('#',$code);
        $finalCode      = $explodedCode[0];
        $functionName   = $explodedCode[1];
    }
    $result['code'] = $finalCode;
    // response status
    if ($success === true) {
        $result['status'] = '1';     // for success
    } else if($success === 2) {
        $result['status'] = '2';
    } else {
        $result['status'] = '0';     // for error
        if ($errorCode) {
            $result['error_code'] = $errorCode;
        }
    }
    // response return type
    if (gettype($data) === 'string') {
        $result['message'] = $data;
    } else if(gettype($data) === 'array' && array_key_exists('errors',$data)){
        $result['message'] = implode(",",$data['errors']);
    } else {
        $result['message'] = "";
        $result['details'] = $data;
    }

    // Encrypted user data
    if ($encryptedUserData != '') {
        $result['encryptedUserData'] = $encryptedUserData;
    }
    // response function name
    if ($functionName != null) {
        $response[$functionName] = $result;
    } else {
        $response = $result;
    }
    return $response;
}

/*
    * Function name : getFunctionNameFromRequestUrl
    * Purpose       : This function is to return structured function name
    * Author        : 
    * Created Date  : 
    * Modified Date : 
    * Input Params  : 
    * Return Value  : Structured function name
*/
function getFunctionNameFromRequestUrl() {
    $requestUrl             = Request::getRequestUri();
    $requestUrlAfterVersion = substr($requestUrl, strpos($requestUrl, 'v1/') + 3);
    $urlSegments            = explode("/",$requestUrlAfterVersion);
    $functionName           = $urlSegments[0];

    return str_replace("-","_",$functionName);
}

/*
    * Function name : categoryList
    * Purpose       : This function is category list
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : 
    * Return Value  : 
*/
function categoryList() {
    $categoryList   = Category::select('id','title')->where(['status' => '1'])->whereNull('deleted_at')->get();
    return $categoryList;
}

/*
    * Function name : vendorList
    * Purpose       : This function is vendor / user list
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : 
    * Return Value  : 
*/
function vendorList() {
    $vendorList   = User::select('id','full_name', 'email')->where('id','<>','1')->where(['type' => 'V'])->whereNull('deleted_at')->orderBy('id', 'desc')->get();
    return $vendorList;
}

/*
    * Function name : locationList
    * Purpose       : This function is location list
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : 
    * Return Value  : 
*/
function locationList() {
    $locationList   = Location::select('id','location')->where(['status' => '1'])->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
    return $locationList;
}

/*
    * Function name : toSetAndGetLocale
    * Purpose       : This function is get and set language
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $request
    * Return Value  : 
*/
function toSetAndGetLocale($request) {
    $requestLanguage = $request->header('x-lang');
    if (!$requestLanguage) {
        $requestLanguage =  \App::getLocale();
    }
    \App::setLocale($requestLanguage);
    return $requestLanguage;
}

/*
    * Function name : getUserFromHeader
    * Purpose       : This function is get user from header
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $request
    * Return Value  : 
*/
function getUserFromHeader($request) {   
    $headers            = $request->header();
    $authenticatedToken = $headers['x-access-token'][0];
    $userData           = App\Models\User::where('auth_token', $authenticatedToken)->first();
    return $userData;
}

/*
    * Function name : dateDiffInDaysNights
    * Purpose       : This function is get user from header
    * Author        :
    * Created Date  :
    * Modified Date : 
    * Input Params  : $request
    * Return Value  : 
*/
function dateDiffInDaysNights($startDateTime, $endDateTime) {
    $startDateTime  = new DateTime($startDateTime);
    $endDateTime    = new DateTime($endDateTime);
    $sinceStart     = $startDateTime->diff($endDateTime);
    $numberOfNights = $startDateTime->setTime(0,0)
                                    ->diff($endDateTime)
                                    ->format("%a");
    // echo $sinceStart->y.' years<br>';
    // echo $sinceStart->m.' months<br>';
    // echo $sinceStart->s.' seconds<br>';
    $numberOfDays   = $sinceStart->d;
    $numberOfHours  = $sinceStart->h;
    $numberOfMinutes= $sinceStart->i;
    $tripDuration   = '';
    if ($numberOfDays != 0 && $numberOfNights != 0) {
        if ($numberOfDays > 1) {
            $tripDuration .= $numberOfDays.' '.trans('custom_api.label_days');
        } else {
            $tripDuration .= $numberOfDays.' '.trans('custom_api.label_day');
        }
        if ($numberOfNights > 1) {
            $tripDuration .= ' '.$numberOfNights.' '.trans('custom_api.label_nights');
        } else {
            $tripDuration .= ' '.$numberOfNights.' '.trans('custom_api.label_night');
        }
    } else if ($numberOfDays != 0 && $numberOfNights == 0) {
        if ($numberOfDays > 1) {
            $tripDuration .= $numberOfDays.' '.trans('custom_api.label_days');
        } else {
            $tripDuration .= $numberOfDays.' '.trans('custom_api.label_day');
        }
    } else if ($numberOfDays == 0 && $numberOfNights != 0) {
        if ($numberOfNights > 1) {
            $tripDuration .= $numberOfNights.' '.trans('custom_api.label_nights');
        } else {
            $tripDuration .= $numberOfNights.' '.trans('custom_api.label_night');
        }
    } else {
        if ($numberOfHours > 1) {
            $tripDuration .= $numberOfHours.' '.trans('custom_api.label_hours');
        } else {
            $tripDuration .= $numberOfHours.' '.trans('custom_api.label_hour');
        }
    }
    return $tripDuration;
}