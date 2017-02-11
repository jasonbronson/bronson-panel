<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


class BaseController extends Controller
{


    public function Index()
	{
		
		return view('dashboard');
	}

	public function GetTime(REQUEST $request)
	{
		
		date_default_timezone_set("America/Los_Angeles"); 
		$time = array("data" => date('g:i A', strtotime('now')));
		echo json_encode($time);
		exit;

	}

	public function GetPictures(Request $request)
	{

        $type = $request->input('type');

        switch($type){
            case "georgiaList":
                $directory = "/www_homeautomation/public/images/georgia";
                $pathDirectory = "/images/georgia/";
            break;
            default:
                $directory = "/www_homeautomation/public/slideshow";
                $pathDirectory = "/slideshow/";
            break;
        }
		$pics = scandir($directory);
		foreach($pics as $pic){
			$info = pathinfo($pic);
			if( strtolower($info['extension']) == "jpg" )
			   $list[] = $pathDirectory.$pic;
		}
		echo json_encode($list);
		exit;

	}
	

    
}
