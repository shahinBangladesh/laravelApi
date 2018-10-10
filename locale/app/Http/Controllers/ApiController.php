<?php

namespace App\Http\Controllers;
use App\User;
use App\Device;
use App\Ccadresse;
use App\News;
use App\Offer;
use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function user(Request $request){
    	if(!is_null($request->uid) && !is_null($request->email)){
    		$user = new User();
    		$user->uid = $request->uid;
    		$user->email = $request->email;
    		$user->phone = $request->phone;
    		$user->devices_id = $request->devices_id;
    		$user->latitude = $request->latitude;
    		$user->longitude = $request->longitude;
    		$user->location = $request->location;
    		$user->division = $request->division;
    		$user->district = $request->district;

    		$user->save();

    		if($user->id <> '' && $user->id <> 0){
    			return response()->json([
                        'status' => 'Successfully Saved Data',
                        'code'=>200
                    ]);
    		}else{
    			return response()->json([
                        'status' => 'Something is Wrong',
                        'code'=>204
                    ]);
    		}
    	}else{
    		return response()->json([
                        'status' => 'User Id Or Email Can\'t Be Null',
                        'code'=>204
                    ]);
    	}
    }
    public function devices(Request $request){
    	if(!is_null($request->uid)){
    		$devices = new Device();
    		$devices->uid = $request->uid;
    		$devices->name = $request->name;
    		$devices->imei = $request->imei;
    		$devices->mac = $request->mac;

    		$devices->save();

    		if($devices->id <> '' && $devices->id <> 0){
    			return response()->json([
                        'status' => 'Successfully Saved Data',
                        'code'=>200
                    ]);
    		}else{
    			return response()->json([
                        'status' => 'Something is Wrong',
                        'code'=>204
                    ]);
    		}
    	}else{
    		return response()->json([
                        'status' => 'User Id Can\'t Be Null',
                        'code'=>204
                    ]);
    	}
    }
    public function ccAddress(Request $request){
    	$ccAddress = new Ccadresse();
		$ccAddress->name = $request->name;
		$ccAddress->district = $request->district;
		$ccAddress->latitude = $request->latitude;
		$ccAddress->longitude = $request->longitude;
		$ccAddress->address = $request->address;
		$ccAddress->cc = $request->cc;
		$ccAddress->country = $request->country;

		$ccAddress->save();

		if($ccAddress->id <> '' && $ccAddress->id <> 0){
			return response()->json([
                    'status' => 'Successfully Saved Data',
                    'code'=>200
                ]);
		}else{
			return response()->json([
                    'status' => 'Something is Wrong',
                    'code'=>204
                ]);
		}
    }
    public function getCcAddress(){
    	$ccAdresse = Ccadresse::latest()->get();
    	if(count($ccAdresse)>0){
			return response()->json([
					'data' => $ccAdresse,
                    'status' => 'Data Found',
                    'code'=>200
                ]);
		}else{
			return response()->json([
                    'status' => 'Data Not Found',
                    'code'=>200
                ]);
		}
    }

    public function news(Request $request){
    	if(!is_null($request->title)){
    		$news = new News();
    		$news->title = $request->title;
    		$news->description = $request->description;
    		$news->top_card = $request->top_card;
    		$news->user_segment = $request->user_segment;
    		$news->series = $request->series;
    		$news->type = $request->type;
    		$news->open_activity = $request->open_activity;
    		$news->sw_version = $request->sw_version;
    		$news->image_url = $request->image_url;
    		$news->video_url = $request->video_url;
    		$news->link = $request->link;

    		$news->save();

    		if($news->id <> '' && $news->id <> 0){
    			return response()->json([
                        'status' => 'Successfully Saved Data',
                        'code'=>200
                    ]);
    		}else{
    			return response()->json([
                        'status' => 'Something is Wrong',
                        'code'=>204
                    ]);
    		}
    	}else{
    		return response()->json([
                        'status' => 'Title Can\'t be null ',
                        'code'=>204
                    ]);
    	}
    }
    public function offer(Request $request){
    	if(!is_null($request->title)){
    		$news = new Offer();
    		$news->title = $request->title;
    		$news->style = $request->style;
    		$news->image_url = $request->image_url;
    		$news->video_url = $request->video_url;
    		$news->link = $request->link;
    		$news->visible = $request->visible;

    		$news->save();

    		if($news->id <> '' && $news->id <> 0){
    			return response()->json([
                        'status' => 'Successfully Saved Data',
                        'code'=>200
                    ]);
    		}else{
    			return response()->json([
                        'status' => 'Something is Wrong',
                        'code'=>204
                    ]);
    		}
    	}else{
    		return response()->json([
                        'status' => 'Title Can\'t be null ',
                        'code'=>204
                    ]);
    	}
    }

    public function getOffer(){
    	$offer = Offer::latest()->get();
    	if(count($offer)>0){
			return response()->json([
					'data' => $offer,
                    'status' => 'Data Found',
                    'code'=>200
                ]);
		}else{
			return response()->json([
                    'status' => 'Data Not Found',
                    'code'=>200
                ]);
		}
    }
    public function getNews(){
    	$news = News::latest()->get();
    	if(count($news)>0){
			return response()->json([
					'data' => $news,
                    'status' => 'Data Found',
                    'code'=>200
                ]);
		}else{
			return response()->json([
                    'status' => 'Data Not Found',
                    'code'=>200
                ]);
		}
    }
    public function topCardNews(){
    	$news = News::where('top_card',1)->latest()->get();
    	if(count($news)>0){
			return response()->json([
					'data' => $news,
                    'status' => 'Data Found',
                    'code'=>200
                ]);
		}else{
			return response()->json([
                    'status' => 'Data Not Found',
                    'code'=>200
                ]);
		}
    }
    public function newsSeries(){
    	$news = News::groupBy('series')->latest()->get();
    	if(count($news)>0){
			return response()->json([
					'data' => $news,
                    'status' => 'Data Found',
                    'code'=>200
                ]);
		}else{
			return response()->json([
                    'status' => 'Data Not Found',
                    'code'=>200
                ]);
		}
    }
    public function newsUserSegment(){
    	$news = News::groupBy('user_segment')->latest()->get();
    	if(count($news)>0){
			return response()->json([
					'data' => $news,
                    'status' => 'Data Found',
                    'code'=>200
                ]);
		}else{
			return response()->json([
                    'status' => 'Data Not Found',
                    'code'=>200
                ]);
		}
    }
    public function userListWithLastDevicesRow(){
    	$user = User::with('devices')->where('users.id','!=','1')->orderBy('id','DESC')->get();
    	if(count($user)>0){
			return response()->json([
					'data' => $user,
                    'status' => 'Data Found',
                    'code'=>200
                ]);
		}else{
			return response()->json([
                    'status' => 'Data Not Found',
                    'code'=>200
                ]);
		}
    }
}
