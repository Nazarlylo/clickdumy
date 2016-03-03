<?php

namespace App\Http\Controllers;
use App\Clickdumy;
use App\User;
use App\Image;
use Input;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Group;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateClickDumyRequest;
use App\Http\Requests\UbdateClikdumies;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClickdumyController extends Controller
{
	public function __construct () {
		//$this->middleware('auth',['except'=>['click-dummy','hide']]);
	}

	public function index () {
		$dummys = Clickdumy::where('user_id',\Auth::user()->id)->get();
		return view('clickdummy.index', compact('dummys'));
	}
	public function show($id){
		$clickdumy = Clickdumy::find($id);
		$images = Image::where('clickdum_id',$id)->get();
		return view('clickdummy.show',compact('clickdumy','images'));
	}
	public function create(){
		return view('clickdummy.create');
	}
	public function store(CreateClickDumyRequest $request){
		$input = $request->all();
		if(!isset($input['protection'])){
			$input = array_merge($input,array('protection'=>0));
		}
		$name_img =$this->uploadimg($input);
		$title =$this->savetitle($input);
		//var_dump($title);
		$imagest=array_combine($title,$name_img);
		if (Auth::guest()) {
			$user_id = User::create([ 'name' => $input[ 'user_name' ], 'email' => $input[ 'email' ], 'password' => bcrypt($input[ 'password' ]), 'role' => 2, 'group' => 2 ]);
			$input['user_id'] =$user_id->id;
		}
		else{
			$input['user_id']=\Auth::user()->id;
		}

		$input['group_id'] =2;
		 $click_id = Clickdumy::Create($input);
		foreach($imagest as $key=>$img) {
			$tit =explode('&',$key);
			$this->create_image(['clickdum_id'=>$click_id->id,'title' => $tit['0'],'images'=>$img,'numb_img'=>$tit['1']]);
		}
		\Session::flash('flash_message','You article has been create');

		return redirect('click-dummy');
	}
	private function create_image($data = []){
		Image::create($data);

	}
	public function edit($id){
		$clickdumy = Clickdumy::find($id);
		$images = Image::where('clickdum_id',$id)->get();
		return view('clickdummy.edit',compact('clickdumy','images'));

	}
	public function update($id, UbdateClikdumies $request ){
		$clickdmy = Clickdumy::find($id);
		$input = $request->all();
		if(!isset($input['protection'])){
			$input = array_merge($input,array('protection'=>0));
		}
		$name_img =$this->uploadimg($input);
		$title =$this->savetitle($input);
		$imagest=array_combine($title,$name_img);
		foreach($imagest as $key=>$img) {
			$tit =explode('&',$key);
			Image::where('clickdum_id',$id)->where('numb_img',$tit['1'])->update(['title' => $tit['0'],'images'=>$img]);
		}
		$clickdmy->update($input);
		\Session::flash('flash_message','You CD has been update');
       return redirect('click-dummy');

	}
	public function uploadimg($input){
		$name_img = [];
		foreach($input['images'] as $image){
			$image_id = mt_rand(10000,99999);
			if(!empty($image)){
				$filename =$image_id.'_'.$image->getClientOriginalName();
				$image->move(base_path().'/images', $filename);
				$name_img []=$filename;
			}
		}
		return $name_img;
	}
	public function delete($id){
		$clickdmy = Clickdumy::find($id);
		$clickdmy->delete();
		\Session::flash('flash_message_del','You CD  delete');
		return redirect('click-dummy');
	}
	public function savetitle($input){
		var_dump($input);
		exit;
		$title = [];
		if(!empty($input['title0']) ) {
			$title[] = $input['title0'].'&'.$input[ 'img_index0' ];
		}
		if(!empty($input['title1'])) {
			$title[] = $input['title1'].'&'.$input[ 'img_index1' ];
		}
		if(!empty($input['title2'])) {

			$title[] = $input['title2'].'&'.$input[ 'img_index2' ];
		}
		if(!empty($input['title3'])) {

			$title[] = $input['title3'].'&'.$input[ 'img_index3' ];
		}
		return $title;

	}
}
