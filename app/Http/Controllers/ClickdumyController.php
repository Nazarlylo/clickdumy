<?php

namespace App\Http\Controllers;
use App\Clickdumy;
use App\User;
use App\Image;
use App\Simage;
use Illuminate\Support\Facades\Mail;
use Input;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\CreateClickDumyRequest;
use App\Http\Requests\UbdateClikdumies;
use App\Http\Requests\SearchCDRequest;
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
	public function show($url){
		$id = Clickdumy::where('url',$url)->value('id');
		$clickdumy=Clickdumy::find($id);
		if($clickdumy->sort_image ==1)
			$images = Image::where('clickdum_id', $id)->orderBy('title', 'asc')->get();
		else
			$images = Image::where('clickdum_id', $id)->orderBy('title', 'desc')->get();

		return view('clickdummy.show',compact('clickdumy','images'));
	}
	public function create(){
		$simages = Simage::all();
		return view('clickdummy.create',compact('simages'));
	}
	public function store(CreateClickDumyRequest $request){
		$input = $request->all();
		$name_img =$this->uploadimg($input);
		$imageCollection = array();
		if(!isset($input['approve'])){
			$input = array_merge($input,array('approve'=>0));
		}
		for($imagesCount = count($name_img) ;$imagesCount > 0; $imagesCount-- )
		{
			$image = array();
			$image['title'] = $input[ 'title' ][$imagesCount - 1];
			$image['image'] = $name_img [$imagesCount - 1];
			$image['approve'] = $input[ 'approve' ] [$imagesCount - 1];
			$imageCollection[] = $image;
		}
		if (Auth::guest()) {
			$user_id = User::create([ 'name' => $input[ 'user_name' ], 'email' => $input[ 'email' ], 'password' => bcrypt($input[ 'password' ]), 'role' => 2, 'group' => 2 ]);
			$input['user_id'] =$user_id->id;
		}
		else{
			$input['user_id']=\Auth::user()->id;
		}
		$input['group_id'] =2;
		$input['url']=str_replace(' ','-',strtolower($input['name']));
		 $click_id = Clickdumy::Create($input);
		foreach($imageCollection as $key=>$img) {
			$this->create_image(['clickdum_id'=>$click_id->id,'title' => $img['title'],'images'=>$img['image'],'approve'=>$img['approve'],'numb_img'=>$key]);
		}
		\Session::flash('flash_message','You article has been create');
        $this->sendmail(\Auth::user()->email);
		return redirect('click-dummy');
	}
	private function create_image($data = []){
		Image::create($data);
	}
	public function edit($url){
		$id = Clickdumy::where('url',$url)->value('id');
		$clickdumy = Clickdumy::find($id);
		$simages = Simage::all();
		$images = Image::where('clickdum_id',$id)->get();
		return view('clickdummy.edit',compact('clickdumy','images','simages'));
	}
	public function update($url, UbdateClikdumies $request ){
		$id = Clickdumy::where('url',$url)->value('id');
		$clickdmy = Clickdumy::find($id);
		$input = $request->all();
		if(isset($input['id_img'])) {
			$arrtitle = array();
			for($updtitle = count($input[ 'id_img' ]) ;$updtitle > 0; $updtitle-- )
			{
				$title = array();
				$title['title'] = $input[ 'title' ][$updtitle - 1];
				$title['approve'] = $input['approve'][$updtitle - 1];
				$title['id_img'] = $input['id_img'][$updtitle - 1];
				$arrtitle[] = $title;
			}
			foreach( $arrtitle as $tit){
				$tit['id_img'] = Crypt::decrypt($tit['id_img']);
				$imagec = Image::find($tit['id_img']);
				$imagec->update(['title' => $tit['title'],'approve'=>$tit['approve']]);
			}
		}
		$name_img =$this->uploadimg($input);
		$imageCollection = array();
		for($imagesCount = count($name_img) ;$imagesCount > 0; $imagesCount-- )
		{
			$image = array();
			$image['title'] = $input[ 'title' ][$imagesCount - 1];
			$image['image'] = $name_img [$imagesCount - 1];
			$image['approve'] = $input[ 'approve' ][$imagesCount - 1];
			$imageCollection[] = $image;
		}
		foreach($imageCollection as $key=>$img) {
			$this->create_image(['clickdum_id'=>$clickdmy->id,'title' => $img['title'],'images'=>$img['image'],'approve'=>$img['approve'],'numb_img'=>$key]);
		}
		$input['url']=str_replace(' ','-',strtolower($input['name']));
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
	public function delete($url){
		$id = Clickdumy::where('url',$url)->value('id');
		$clickdmy = Clickdumy::find($id);
		$clickdmy->delete();
		\Session::flash('flash_message_del','You CD  delete');
		return redirect('click-dummy');
	}
	public function delete_img(Request $request){
		$id_post =Crypt::decrypt($request->input('item_id'));
		$src = $request->input('src');
		//$numb_img = $request->input('numb_img');
	    Image::where('clickdum_id',$id_post)->where('images',$src)->delete();
		return 'Ok';
	}
	public function search(SearchCDRequest $request){
		$search =$request->input('search');
		$result = Clickdumy::where('name', 'like', '%' . trim($search) . '%')->get();
	    return view('clickdummy.search',compact('result'));
	}
	public function sendmail($email){
		$data = array(
			'name' => $email,
		);
		Mail::send('auth.emails.welcome', $data, function ($message) use ($email) {
			$message->from('yourEmail@domain.com', 'Learning Laravel');
			$message->to($email)->subject('Learning Laravel test email');

		});

	}
}
