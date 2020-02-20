<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Routing\RedirectController;
use Symfony\Component\Console\Question\Question;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Task;

class Admin extends Model
{
    //

    public function create($data) {

    }
    public static function construct__init() {
        
    }
    public static function getAllSiteList() {
        $result = [];
        foreach ( DB::table('tbl_siteproperties')->get() as $val  ) {
            $result[] = $val;
        }
        return $result;
    }
    public static function getSiteLocations() {
        $result = [];
        foreach ( DB::table('tbl_siteproperties')->select('site_location')->groupBy('site_location')->get() as $val  ) {
            $result[] = $val->site_location;
        }
        return $result;
    }
    public static function getAllSitePropertiesByID($id) {
        $result = [];
        foreach ( DB::table('tbl_siteproperties')->where('id', '=', $id)->get() as $val ) {
            $result = $val;
        }
        return $result;
    }
    public static function getAllQuestionList() {
        $data = DB::table('tbl_questions')->select('*')->get();
        $result = [];
        foreach($data as $val){
            $result[] = [ "id" => $val->id, "question" => $val->question, "cat_id" => $val->cat_id ];            
        }
        return $result;
    }
    public static function getAllCategoryList() {
        $data = DB::table('tbl_category')->select('category')->get();
        $result = [];
        foreach($data as $val){
            $result[] = $val->category;
        }
        return $result;
    }
    public static function getAllScoreListBySiteID($site_id) {
        $result = [];
        $score = [ 'score_P', 'score_M', 'score_F' ];
        for ( $_i = 0; $_i < 3; $_i ++ ) {
            $score_name = $score[$_i];
            for ( $_cat = 0; $_cat < 5; $_cat ++ ) {
                foreach( DB::table('tbl_evaluations')->select('*')->where([ ['site_id', '=', $site_id], ['cat_id', '=', $_cat + 1] ])->get() as $val ) {
                    $result[$_i][] = $val->$score_name;
                }     
                $result[$_i][] = 101;
            }
        }
        return $result;
    }
    public static function getAllScoreBySiteID($site_id) {
        $result = [];
        $score = [ 'score_P', 'score_M', 'score_F' ];
        for ( $_i = 0; $_i < 3; $_i ++ ) {
            $score_name = $score[$_i];
            foreach ( DB::table('tbl_category')->get() as $_cat => $category ) {             
                foreach( DB::table('tbl_evaluations')->select('*')->where([ ['site_id', '=', $site_id], ['cat_id', '=', $category->id] ])->get() as $val ) {
                    $result[$score_name][] = $val->$score_name;
                }     
            }
        }
        return $result;
    }
    public static function getAllNoteBySiteID($site_id) {
        $result = [];
        foreach( DB::table('tbl_evaluations')->select('*')->where([ ['site_id', '=', $site_id] ])->get() as $val ) {
            $result[] = $val->note;
        }     
        return $result;
    }
    public static function getAllColorListBySiteID($site_id, $is_color) {
        $result = [];   
        $colors = ['#fff0', '#4074b8', '#4074b8', '#4074b8', '#4074b8', '#4074b8'];
        if ( $is_color == 'color' ) {
            $colors = ['#fff0', '#ff6549', '#ffba49', '#ffd849', '#35b796', '#4074b8'];
        }
        
        $score = [ 'score_P', 'score_M', 'score_F' ];
        for ( $_i = 0; $_i < 3; $_i ++ ) {
            $score_name = $score[$_i];
            for ( $_cat = 0; $_cat < 5; $_cat ++ ) {
                foreach( DB::table('tbl_evaluations')->select('*')->where([ ['site_id', '=', $site_id], ['cat_id', '=', $_cat + 1] ])->get() as $val ) {
                    $result[$_i][] = $colors[$val->$score_name];
                }     
                $result[$_i][] = '';
            }
        }
        return $result;
    }
    public static function addSiteProperties($data) {        
        $b_service = 0;
        $b_community = 0;
        $b_reginal = 0;
        $servicemng_id = 0;
        $communitymng_id = 0;
        $reginalmng_id = 0;
        $site_id = 0;
        $evaluations = [];
        $service_manager = [    'name' => $data['servicemng_name'],                                 
                                'email' => $data['servicemng_email'],                                
                                'avatar' => ( $data['servicemng_avatar'] == null ) ? $data['servicemng_avatar_val'] : Admin::storeAvatarFile($data['servicemng_avatar']),
                                'password' => Hash::make(''),
                                'phone' => $data['servicemng_phone'],
                                'resume' => ( $data['servicemng_resume'] == null ) ? $data['servicemng_resume_val'] : Admin::storeResumeFile($data['servicemng_resume']), ];
        $community_manager = [  'name' => $data['communitymng_name'],                                 
                                'email' => $data['communitymng_email'],
                                'avatar' => ( $data['communitymng_avatar'] == null ) ? $data['communitymng_avatar_val'] : Admin::storeAvatarFile($data['communitymng_avatar']),
                                'password' => Hash::make(''),
                                'phone' => $data['communitymng_phone'],
                                'resume' => ( $data['communitymng_resume'] == null ) ? $data['communitymng_resume_val'] : Admin::storeResumeFile($data['communitymng_resume']), ];       
        $reginal_manager = [    'name' => $data['reginalmng_name'],                                 
                                'email' => $data['reginalmng_email'],
                                'avatar' => ( $data['reginalmng_avatar'] == null ) ? $data['reginalmng_avatar_val'] : Admin::storeAvatarFile($data['reginalmng_avatar']),
                                'password' => Hash::make(''),
                                'phone' => $data['reginalmng_phone'],
                                'resume' => ( $data['reginalmng_resume'] == null ) ? $data['reginalmng_resume_val'] : Admin::storeResumeFile($data['reginalmng_resume']), ];      
                                
        //
        foreach( DB::table('users')->select('id')->where('email', $data['servicemng_email'])->get() as $val ) {
            $b_service ++;  
        }
        if ( $b_service == 0 ) {
            User::create($service_manager);
        }
        foreach( DB::table('users')->select('id')->where('email', $data['communitymng_email'])->get() as $val ) {
            $b_community ++;  
        }
        if ( $b_community == 0 ) {
            User::create($community_manager);
        }
        foreach( DB::table('users')->select('id')->where('email', $data['reginalmng_email'])->get() as $val ) {
            $b_reginal ++;  
        }
        if ( $b_reginal == 0 ) {
            User::create($reginal_manager);
        }
        
        foreach ( DB::table('users')->where('email', $data['servicemng_email'])->get() as $val ) {
            $servicemng_id = $val->id;
        }
        foreach ( DB::table('users')->where('email', $data['communitymng_email'])->get() as $val ) {
            $communitymng_id = $val->id;
        }
        foreach ( DB::table('users')->where('email', $data['reginalmng_email'])->get() as $val ) {
            $reginalmng_id = $val->id;
        }
        
        $site_properties = [    'site_name' => $data['site_name'],
                                'site_location' => $data['site_location'],
                                'lat' => $data['site-lat'],
                                'lng' => $data['site-lng'],
                                'site_manager' => $data['site_manager'],
                                'property_build_date' => Admin::convertFormatToDate($data['property_build_date']),
                                'date_added_STF' => Admin::convertFormatToDate($data['date_added_STF']),
                                'num_service_staff' => Admin::isValue($data['num_service_staff']),
                                'num_units' => Admin::isValue($data['num_units']),                                
                                'num_built' => Admin::isValue($data['num_built']),                                
                                'pic_property' => Admin::storeImage($data['pic_property']),
                                'ticket_last30' => Admin::isValue($data['ticket_last30']),
                                'avgticket_closetime_last30' => Admin::isValue($data['avgticket_closetime_last30']),
                                'callback_percentage' => Admin::isValue($data['callback_percentage']),
                                'ready_percentage' => Admin::isValue($data['ready_percentage']),
                                'servicemng_id' => $servicemng_id,
                                'communitymng_id' => $communitymng_id,
                                'reginalmng_id' => $reginalmng_id,
                                'primary_eval_date' => Admin::convertFormatToDate($data['primary_eval_date']),
                                'milestone_eval_date' => Admin::convertFormatToDate($data['milestone_eval_date']),
                                'final_eval_date' => Admin::convertFormatToDate($data['final_eval_date']),
                                'primary_eval_by' => $data['primary_eval_by'],
                                'milestone_eval_by' => $data['milestone_eval_by'],
                                'final_eval_by' => $data['final_eval_by'], 
                                'eval_scoreP' => $data['eval_scoreP'],
                                'eval_scoreM' => $data['eval_scoreM'],
                                'eval_scoreF' => $data['eval_scoreF'],
                                'gallery_before' => $data['gallery_before_uploaded'],
                                'gallery_after' => $data['gallery_after_uploaded'] ];
                                
        //
        DB::table('tbl_siteproperties')->insert($site_properties);
        $site_id = DB::table('tbl_siteproperties')->max('id');
        $_i = 0;
        foreach ( DB::table('tbl_questions')->get() as $val ) {
            $evaluations[] = [ 'question_id' => $val->id, 
                                'score_P' => $data['question_'.$val->id.'_scoreP'],
                                'score_M' => $data['question_'.$val->id.'_scoreM'],
                                'score_F' => $data['question_'.$val->id.'_scoreF'],
                                'cat_id' => $data['question_'.$val->id.'_catid'],
                                'note' => $data['question_'.$val->id.'_note'],
                                'site_id' => $site_id ];
        }

        DB::table('tbl_evaluations')->insert($evaluations);       
    }    
    public static function updateSiteProperties($data, $site_id) {        
        
        $b_service = 0;
        $b_community = 0;
        $b_reginal = 0;
        $servicemng_id = 0;
        $communitymng_id = 0;
        $reginalmng_id = 0;
        $evaluations = [];

        

        $service_manager = [    'name' => $data['servicemng_name'],                                 
                                'email' => $data['servicemng_email'],                                
                                'avatar' => ( $data['servicemng_avatar'] == null ) ? $data['servicemng_avatar_val'] : Admin::storeAvatarFile($data['servicemng_avatar']),
                                'password' => Hash::make(''),
                                'phone' => $data['servicemng_phone'],
                                'resume' => ( $data['servicemng_resume'] == null ) ? $data['servicemng_resume_val'] : Admin::storeResumeFile($data['servicemng_resume']), ];
        $community_manager = [  'name' => $data['communitymng_name'],                                 
                                'email' => $data['communitymng_email'],
                                'avatar' => ( $data['communitymng_avatar'] == null ) ? $data['communitymng_avatar_val'] : Admin::storeAvatarFile($data['communitymng_avatar']),
                                'password' => Hash::make(''),
                                'phone' => $data['communitymng_phone'],
                                'resume' => ( $data['communitymng_resume'] == null ) ? $data['communitymng_resume_val'] : Admin::storeResumeFile($data['communitymng_resume']), ];       
        $reginal_manager = [    'name' => $data['reginalmng_name'],                                 
                                'email' => $data['reginalmng_email'],
                                'avatar' => ( $data['reginalmng_avatar'] == null ) ? $data['reginalmng_avatar_val'] : Admin::storeAvatarFile($data['reginalmng_avatar']),
                                'password' => Hash::make(''),
                                'phone' => $data['reginalmng_phone'],
                                'resume' => ( $data['reginalmng_resume'] == null ) ? $data['reginalmng_resume_val'] : Admin::storeResumeFile($data['reginalmng_resume']), ];     
                                
        //
        foreach( DB::table('users')->select('id')->where('email', $data['servicemng_email'])->get() as $val ) {
            DB::table('users')->where('id', '=', $val->id)->update($service_manager);
            $b_service ++;  
        }
        if ( $b_service == 0 ) {
            User::create($service_manager);
        }
        foreach( DB::table('users')->select('id')->where('email', $data['communitymng_email'])->get() as $val ) {
            DB::table('users')->where('id', '=', $val->id)->update($community_manager);
            $b_community ++;  
        }
        if ( $b_community == 0 ) {
            User::create($community_manager);
        }
        foreach( DB::table('users')->select('id')->where('email', $data['reginalmng_email'])->get() as $val ) {
            DB::table('users')->where('id', '=', $val->id)->update($reginal_manager);
            $b_reginal ++;  
        }
        if ( $b_reginal == 0 ) {
            User::create($reginal_manager);
        }
        
        foreach ( DB::table('users')->where('email', $data['servicemng_email'])->get() as $val ) {
            $servicemng_id = $val->id;
        }
        foreach ( DB::table('users')->where('email', $data['communitymng_email'])->get() as $val ) {
            $communitymng_id = $val->id;
        }
        foreach ( DB::table('users')->where('email', $data['reginalmng_email'])->get() as $val ) {
            $reginalmng_id = $val->id;
        }
        $site_properties = [    'site_name' => $data['site_name'],
                                'site_location' => $data['site_location'],
                                'lat' => $data['site-lat'],
                                'lng' => $data['site-lng'],
                                'site_manager' => $data['site_manager'],
                                'property_build_date' => Admin::convertFormatToDate($data['property_build_date']),
                                'pic_property' => ( $data['pic_property'] == null ) ? $data['pic_property_val'] : Admin::storeImage($data['pic_property']),
                                'date_added_STF' => Admin::convertFormatToDate($data['date_added_STF']),
                                'num_service_staff' => Admin::isValue($data['num_service_staff']),
                                'num_units' => Admin::isValue($data['num_units']),                                
                                'num_built' => Admin::isValue($data['num_built']),            
                                'ticket_last30' => Admin::isValue($data['ticket_last30']),
                                'avgticket_closetime_last30' => Admin::isValue($data['avgticket_closetime_last30']),
                                'callback_percentage' => Admin::isValue($data['callback_percentage']),
                                'ready_percentage' => Admin::isValue($data['ready_percentage']),
                                'servicemng_id' => $servicemng_id,
                                'communitymng_id' => $communitymng_id,
                                'reginalmng_id' => $reginalmng_id,
                                'primary_eval_date' => Admin::convertFormatToDate($data['primary_eval_date']),
                                'milestone_eval_date' => Admin::convertFormatToDate($data['milestone_eval_date']),
                                'final_eval_date' => Admin::convertFormatToDate($data['final_eval_date']),
                                'primary_eval_by' => $data['primary_eval_by'],
                                'milestone_eval_by' => $data['milestone_eval_by'],
                                'final_eval_by' => $data['final_eval_by'],
                                'eval_scoreP' => $data['eval_scoreP'],
                                'eval_scoreM' => $data['eval_scoreM'],
                                'eval_scoreF' => $data['eval_scoreF'], 
                                'gallery_before' => $data['gallery_before_uploaded'],
                                'gallery_after' => $data['gallery_after_uploaded'] ];
                                
        //

        DB::table('tbl_siteproperties')->where('id', intval($site_id))->update( $site_properties );
        DB::table('tbl_evaluations')->where('site_id', '=', $site_id)->delete();
        foreach ( DB::table('tbl_questions')->get() as $_i => $val ) {
            $evaluations[] = [ 'question_id' => $val->id, 
                                'score_P' => $data['question_'.$val->id.'_scoreP'],
                                'score_M' => $data['question_'.$val->id.'_scoreM'],
                                'score_F' => $data['question_'.$val->id.'_scoreF'],
                                'cat_id' => $data['question_'.$val->id.'_catid'],
                                'note' => $data['question_'.$val->id.'_note'],
                                'site_id' => $site_id ];
        }
        // dd($evaluations);        

        DB::table('tbl_evaluations')->insert($evaluations);       
    } 
    public static function deleteSite($id) {       
        DB::table('tbl_siteproperties')->where('id', '=', $id)->delete();
        DB::table('tbl_evaluations')->where('site_id', '=', $id)->delete();
        return true;
    }
    public static function convertFormatToDate($data) {
        if ( $data != null) {
            $date = explode('/', $data);
            $result = $date[2].'/'.$date[0].'/'.$date[1];
            return $result;        
        }
        return $data;
    }
    public static function format_MM_DD_YYYY($data) {

        if ( $data != null) {
            $date = explode('-', $data);
            $result = $date[1].'/'.$date[2].'/'.$date[0];
            return $result;        
        }
        return $data;
    }
    public static function isValue($data) {
        if ( $data == null || $data == "" ) {
            return 0;
        }
        return $data;
    }
    public static function convertDateToString($data) {
        
        $months = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        if ( $data == null || $data == "" ) {
            return "";
        }
        $date = explode('-', $data);
        $m = intval($date[1]);
        $result = $months[$m].' '.$date[2].' '.$date[0];        
        return $result;        
    }
    public static function getTotalScoreBySiteID($site_id) {
        $result = [];
        $score = [ 'score_P', 'score_M', 'score_F' ];
        for ( $_i = 0; $_i < 3; $_i ++ ) {
            $score_name = $score[$_i];
            $result[$score_name] = 0;
            foreach( DB::table('tbl_evaluations')->select('*')->where([ ['site_id', '=', $site_id] ])->get() as $val ) {
                $result[$score_name] += $val->$score_name;
            }     
        }
        return $result;
    }
    public static function getManagerInfoByID($id) {
        $result = [];
        foreach ( DB::table('users')->where('id', '=', $id)->get() as $val ) {
            $result = $val;
        }
        return $result;
    }
    public static function storeImage($file) {      
        if ( $file != null )
            return $file->store('images');      
        return null;  
    }
    public static function storeAvatarFile($file) {       
        if ( $file != null )
            return $file->store('avatars');  
        return null;      
    }
    public static function storeResumeFile($file) {   
        if ( $file != null )     
            return $file->store('resumes');        
        return null;
    }
    public static function storeBlogFile($category, $file_count, $data) {
        $result = [];
        if ( $file_count != 0 ) {
            for ( $_i = 0; $_i < $file_count; $_i ++ ) {
                $file = $data['file_'.$_i];
                $file_name = $data['filename_'.$_i];
                $result[] = $file->store('blogs/'.$category);
            }
            return $result;
        }                
        return null;      
    }
    public static function getScoreByID($id) {
        
    }
    public static function getAllUsersList() {
        $result = [];
        foreach ( DB::table('users')->get() as $val  ) {
            $result[] = $val;
        }
        return $result;
    }
    public static function getUserPropertiesByID($id) {
        $result = [];
        foreach ( DB::table('users')->where('id', '=', $id)->get() as $val ) {
            $result = [     'id' => $val->id,
                            'name' => $val->name,
                            'email' => $val->email,
                            'avatar' => $val->avatar,
                            'authorization' => $val->authorization,
                            'phone' => $val->phone,
                            'resume' => $val->resume,
                            'site_id' => $val->site_id ];
        }
        return $result;
    }
    public static function getUserListByIDS($data) {
        $result = [];
        foreach ( DB::table('users')->whereIn( 'id', $data )->get() as $val ) {
            $result[] = $val;
        }
        return $result;
    }
    public static function updateUser($data) {
        $id = $data['user_id'];                
        $property = [   'name' => $data['user_name'],
                        'email' => $data['user_email'],
                        'avatar' =>  ( $data['user_avatar'] == null ) ? $data['user_profileImage'] : Admin::storeAvatarFile($data['user_avatar']),
                        'phone' => $data['user_phone'],
                        'resume' => ( $data['user_resume'] == null ) ? $data['user_resumePdf'] : Admin::storeResumeFile($data['user_resume']),
                        'site_id' => $data['user_site_ids'] ];
        return DB::table('users')->where('id', '=', $id)->update($property);
    }
    public static function deleteUser($id) {       
        return DB::table('users')->where('id', '=', $id)->delete();
    }
    public static function string2Array($data) {
        $result = [];
        $result = explode(',', $data);
        return $result;
    }
    public static function getSiteListBySiteIDS($data) {
        $result = [];
        foreach ( DB::table('tbl_siteproperties')->whereIn( 'id', $data )->get() as $val ) {
            $result[] = $val;
        }
        return $result;
    }
    public static function getAllTaskListBySiteID($site_id) {
        $result = [];
        foreach ( DB::table('tasks')->where('site_id', $site_id)->get() as $val ) {
            $result[] = $val;
        }
        return $result;
    }
    public static function getTaskPropertiesByID($id) {
        foreach ( DB::table('tasks')->where('id', $id)->get() as $val ) {
            $result = $val;
        }
        return $result;
    }   
    
    public static function deleteTask($id) {
        DB::table('tasks')->where('id', $id)->delete();
    }
    public static function getDiffDate($date1, $date2) {
        $diff = abs(strtotime($date2) - strtotime($date1)); 
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        return $days;
    }
}
