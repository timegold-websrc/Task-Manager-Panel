<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
use App\Providers;
use App\Admin;
use DB;
use App\Models\User;
use App\Models\Task;

class HomepageController extends Controller
{
    //

    public function __construct()
    {   
        
    }
    public function index() {
        session()->put('custom_url', '/');       

        if ( !Auth::user() ) 
            return redirect(route('login'));
        else{            
            $SITELIST = Admin::getSiteListBySiteIDS(Admin::string2Array(Auth::user()->site_id)); 
            if ( Auth::user()->authorization == 1 ) {
                $SITELIST = Admin::getAllSiteList();
            }
            if ( count($SITELIST) == 0 ) {
                    Auth::logout();
                    return "You can't access this page, You should be have permission of access to your dashboard.";
            }
            
            $site_id = $SITELIST[0]->id;
            $yRowKeyDatas = Admin::getAllScoreListBySiteID($site_id);
            $barRowColors = Admin::getAllColorListBySiteID($site_id, 'blue');
            $SITE_PROPERTY = Admin::getAllSitePropertiesByID($site_id);      
            
            $SCORETOTAL = Admin::getTotalScoreBySiteID($site_id);
            $SCORE = $this->getFinalTotalScore($SCORETOTAL);    
            $GAUGEVALUE = $this->getGaugeValue($SCORE);    
            $NEWESTRATE = $this->getNewestRate($SCORETOTAL);
            $MANAGER_SERVICE = Admin::getManagerInfoByID($SITE_PROPERTY->servicemng_id);
            $MANAGER_COMMUNITY = Admin::getManagerInfoByID($SITE_PROPERTY->communitymng_id);
            $MANAGER_REGINAL = Admin::getManagerInfoByID($SITE_PROPERTY->reginalmng_id);
            $SITE_PROPERTY_ADDDATE = Admin::convertDateToString($SITE_PROPERTY->date_added_STF);
            $SCORE_TYPE = [ 'Reactionary', 'Preventative', 'Predictive', 'Excellence' ];
            
            $yLabels[] = ["F", $SCORETOTAL['score_F'], Admin::convertDateToString($SITE_PROPERTY->final_eval_date)];
            $yLabels[] = ['M', $SCORETOTAL['score_M'], Admin::convertDateToString($SITE_PROPERTY->milestone_eval_date)];
            $yLabels[] = ['P', $SCORETOTAL['score_P'], Admin::convertDateToString($SITE_PROPERTY->primary_eval_date)];
            $LIST_QUESTION = Admin::getAllQuestionList();
            $GALLERY_BEFORE = Admin::string2Array($SITE_PROPERTY->gallery_before);
            $GALLERY_AFTER = Admin::string2Array($SITE_PROPERTY->gallery_after);
            $GALLERY_BEFORE_C = -1;
            $GALLERY_AFTER_C = -1;

            $TASKLIST = Task::where('site_id', $site_id)->get();  
            
            $current_date = config('app.datetime');     
            
            foreach ( $TASKLIST as $_i => $val ) {
                $TASKLIST[$_i]['datedue'] = Admin::format_MM_DD_YYYY($val->date_due);            
                $TASKLIST[$_i]['daydue'] = ( $current_date > $val->date_due ) ? -1 : Admin::getDiffDate($val->date_due, $current_date);
            } 

            foreach ( $GALLERY_BEFORE as $val ) {
                if ( $val )
                    $GALLERY_BEFORE_C ++;
            }
            foreach ( $GALLERY_AFTER as $val ) {
                if ( $val )
                    $GALLERY_AFTER_C ++;
            }
            
            return view('welcome', [    'yLabels' => $yLabels,
                    'yRowKeyDatas' => $yRowKeyDatas,
                    'barRowColors' => $barRowColors,
                    'SITE_PROPERTY' => $SITE_PROPERTY,
                    'SITELIST' => $SITELIST,
                    'SCORETOTAL' => $SCORETOTAL,
                    'SCORE' => $SCORE,
                    'GAUGEVALUE' => $GAUGEVALUE,
                    'MANAGER_SERVICE' => $MANAGER_SERVICE,
                    'MANAGER_COMMUNITY' => $MANAGER_COMMUNITY,
                    'MANAGER_REGINAL' => $MANAGER_REGINAL,
                    'NEWESTRATE' => $NEWESTRATE,
                    'SITE_PROPERTY_ADDDATE' => $SITE_PROPERTY_ADDDATE,
                    'SCORE_TYPE' => $SCORE_TYPE,
                    'GALLERY_BEFORE' => $GALLERY_BEFORE,
                    'GALLERY_AFTER' => $GALLERY_AFTER,
                    'GALLERY_BEFORE_C' => $GALLERY_BEFORE_C,
                    'GALLERY_AFTER_C' => $GALLERY_AFTER_C,
                    'TASKLIST' => $TASKLIST,
                    'LIST_QUESTION' => $LIST_QUESTION]);
        }            
    }
    public function dashboard(Request $request) {
        if ( !Auth::user() ) 
            return redirect(route('login'));
        else{            
            $SITELIST = Admin::getSiteListBySiteIDS(Admin::string2Array(Auth::user()->site_id)); 
            if ( Auth::user()->authorization == 1 ) {
                $SITELIST = Admin::getAllSiteList();
            }
            if ( count($SITELIST) == 0 ) {
                    Auth::logout();
                    return "You can't access this page, You should be have permission of access to your dashboard.";
            }
            $site_id = $request['id'];
            $yRowKeyDatas = Admin::getAllScoreListBySiteID($site_id);
            $barRowColors = Admin::getAllColorListBySiteID($site_id, 'blue');
            $SITE_PROPERTY = Admin::getAllSitePropertiesByID($site_id);      
            
            $SCORETOTAL = Admin::getTotalScoreBySiteID($site_id);
            $SCORE = $this->getFinalTotalScore($SCORETOTAL);    
            $GAUGEVALUE = $this->getGaugeValue($SCORE);    
            $NEWESTRATE = $this->getNewestRate($SCORETOTAL);
            $MANAGER_SERVICE = Admin::getManagerInfoByID($SITE_PROPERTY->servicemng_id);
            $MANAGER_COMMUNITY = Admin::getManagerInfoByID($SITE_PROPERTY->communitymng_id);
            $MANAGER_REGINAL = Admin::getManagerInfoByID($SITE_PROPERTY->reginalmng_id);
        
            $SITE_PROPERTY_ADDDATE = Admin::convertDateToString($SITE_PROPERTY->date_added_STF);
            
            $SCORE_TYPE = [ 'Reactionary', 'Preventative', 'Predictive', 'Excellence' ];
            
            $yLabels[] = ["F", $SCORETOTAL['score_F'], Admin::convertDateToString($SITE_PROPERTY->final_eval_date)];
            $yLabels[] = ['M', $SCORETOTAL['score_M'], Admin::convertDateToString($SITE_PROPERTY->milestone_eval_date)];
            $yLabels[] = ['P', $SCORETOTAL['score_P'], Admin::convertDateToString($SITE_PROPERTY->primary_eval_date)];
            $LIST_QUESTION = Admin::getAllQuestionList();
            $GALLERY_BEFORE = Admin::string2Array($SITE_PROPERTY->gallery_before);
            $GALLERY_AFTER = Admin::string2Array($SITE_PROPERTY->gallery_after);
            $GALLERY_BEFORE_C = -1;
            $GALLERY_AFTER_C = -1;


            // $TASKLIST = Admin::getAllTaskListBySiteID($site_id);        
            $TASKLIST = Task::where('site_id', $site_id)->get();
            $current_date = config('app.datetime');     
            
            foreach ( $TASKLIST as $_i => $val ) {
                $TASKLIST[$_i]['datedue'] = Admin::format_MM_DD_YYYY($val->date_due);            
                $TASKLIST[$_i]['daydue']  = ( $current_date > $val->date_due ) ? -1 : Admin::getDiffDate($val->date_due, $current_date);
            } 

            foreach ( $GALLERY_BEFORE as $val ) {
                if ( $val )
                    $GALLERY_BEFORE_C ++;
            }
            foreach ( $GALLERY_AFTER as $val ) {
                if ( $val )
                    $GALLERY_AFTER_C ++;
            }
        
            return view('welcome', [    'yLabels' => $yLabels,
                    'yRowKeyDatas' => $yRowKeyDatas,
                    'barRowColors' => $barRowColors,
                    'SITE_PROPERTY' => $SITE_PROPERTY,
                    'SITELIST' => $SITELIST,
                    'SCORETOTAL' => $SCORETOTAL,
                    'SCORE' => $SCORE,
                    'GAUGEVALUE' => $GAUGEVALUE,
                    'MANAGER_SERVICE' => $MANAGER_SERVICE,
                    'MANAGER_COMMUNITY' => $MANAGER_COMMUNITY,
                    'MANAGER_REGINAL' => $MANAGER_REGINAL,
                    'NEWESTRATE' => $NEWESTRATE,
                    'SITE_PROPERTY_ADDDATE' => $SITE_PROPERTY_ADDDATE,
                    'SCORE_TYPE' => $SCORE_TYPE,
                    'GALLERY_BEFORE' => $GALLERY_BEFORE,
                    'GALLERY_AFTER' => $GALLERY_AFTER,
                    'GALLERY_BEFORE_C' => $GALLERY_BEFORE_C,
                    'GALLERY_AFTER_C' => $GALLERY_AFTER_C,
                    'TASKLIST' => $TASKLIST,
                    'LIST_QUESTION' => $LIST_QUESTION]);
        }
    }
    function getFinalTotalScore($data) {
        if ( $data['score_F'] != 0 ) 
            return $data['score_F'];
        if ( $data['score_M'] != 0 )
            return $data['score_M'];
        return $data['score_P'];
    }
    function getNewestRate($data) {
        if ( $data['score_F'] != 0 ) 
            return 'score_F';
        if ( $data['score_M'] != 0 )
            return 'score_M';
        return 'score_P';
    }
    function getGaugeValue($data) {
        if ( $data > 0 && $data <= 179 )
            return 10;
        if ( $data > 179 && $data <= 209 )
            return 30;
        if ( $data > 209 && $data <= 238 )
            return 50;
        if ( $data > 238 && $data <= 253 )
            return 70;
        if ( $data > 253 && $data <= 310 )
            return 90;
    }
    function showGraph(Request $request) {
        $barRowColors = Admin::getAllColorListBySiteID($request['site_id'], $request['colorType']);
        echo json_encode($barRowColors);
    }
}
