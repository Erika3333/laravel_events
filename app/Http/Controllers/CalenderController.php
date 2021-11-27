<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        // ログインユーザー情報をViewに渡す
        $user = \Auth::user();


        // 1ヶ月カレンダー配列作成     
        $getDate = date('Y-m-d'); 
        // if( $this->request->is('get') && $this->request->getQuery('next_month')) {
        //     $getDate = $this->request->getQuery('next_month');
        // }
        // if( $this->request->is('get') && $this->request->getQuery('last_month')) {
        //     $getDate = $this->request->getQuery('last_month');
        // }

        
        $thisYear = date('Y', strtotime($getDate));
        $thisMonth = date('m', strtotime($getDate));
        
        $thisDate = date('Y-m-d', strtotime($getDate));

        $firstDate = 1;
        $lastDate = date('t', strtotime($getDate));
        $firstWeekNumber = date('w', strtotime($thisYear.'-'.$thisMonth.'-'.$firstDate));

        $calenderArray = [];
        $displayNumber = 0;

        for($dayLoop = $firstDate; $dayLoop <= $lastDate; $dayLoop++) {
            if($dayLoop == $firstDate ) {            
                for( $weekNumber = 0; $weekNumber <= $firstWeekNumber-1; $weekNumber++ ) {
                    $displayNumber++;
                    $calenderArray[$displayNumber]['day'] = ''; 
                    $calenderArray[$displayNumber]['Y-m-d'] = ''; 
                }
            }
            $displayNumber++;
            $calenderArray[$displayNumber]['day'] = $dayLoop;
            $calenderArray[$displayNumber]['Y-m-d'] = $thisYear.'-'.$thisMonth.'-'.$dayLoop; 
        }

        $test = 1;
        return view('calender.index',compact('calenderArray'));        
    }
}
