<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DateTime;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member_id = Session::get('member')->member_id;
        $member = new Member();
        return response()->json(['data' => $member->getRowsByUser($member_id)]);
//        $member = Member::all();
//        return response()->json(['name' => $member]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = new DateTime();
        $member = new Member();
        $member->member_id = $request->member_id;
        $member->name= $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->photo = $request->photo;
        $member->biography = $request->biography;
        $member->last_login = $request->last_login;
        $member->register_date = $now->format('Y-m-d H:i:s');
        $member->password = md5($request->password);
        $member->status = $request->status;
        $member->location_id = $request->location_id;
        $member->save();
//        return redirect('../public/blog');
        return response()->json(['status' => 'sukses']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $member = new Member();
        return response()->json(['data' => $member->getRowsByUser($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Member::where('member_id', $id)->update(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'biography' => $request->biography,
                'location_id' => $request->location_id
            ]
        );
//        return "Hello World!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function save(){
        $member = new Member();
        $member->member_id = Input::get('member_id');
        $member->name = Input::get('name');
        $member->email = Input::get('email');
        $member->phone = Input::get('phone');
//        $member->register_date = $dt->format('Y-m-d H:i:s');
        $member->save();

        echo 'Sukses';
    }

    public function profil($id){

        return view('profil');
    }

    public function login(Request $request){
//        $member = Member::where('email', '=', Input::get('email'))
//                    ->Where('password', '=', md5(Input::get('password')))->first();
        $member = new Member();
        $logged = $member->login(Input::get('email'), md5(Input::get('password')));
        if(count($logged)){
            Session::put('member', $logged);
            return response()->json(['status' => $logged->status]);
        }else{
            return response()->json(['status' => -1]);
        }
    }

    public function forgetPassword(){
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $email = Input::get('email');
        Member::where('email', $email)
            ->update(['password' => md5($randomString)]);

        Mail::send('vendor.mail.hello', ['password' => $randomString], function ($m) {
            $m->from('telucollaborativelearning@gmail.com', 'Your Application');

            $m->to('rizqyfahmi@gmail.com', 'rizqyfahmi')->subject('Your Reminder!');
        });
    }

    public function emailValidator(){
        $valid   = true;
        $member = Member::where(function($query) {
            $query->where('email', '=', Input::get('email'));
        })->get();

        if(count($member)){
            $valid = false;
        }

        return response()->json(
            $valid ? ['valid' => $valid] : ['valid' => $valid, 'message' => 'Email already exist']
        );

    }

    public function passwordValidator(){
        $valid   = true;
        $member = Member::where('member_id', '=', Input::get('member_id'))
            ->Where('password', '=', md5(Input::get('password')))->get();

        if(!count($member)){
            $valid = false;
        }

        return response()->json(
            $valid ? ['valid' => $valid] : ['valid' => $valid, 'message' => 'Password is not valid']
        );

    }

    public function updatePassword(Request $request, $id){
        Member::where('member_id', $id)->update(['password' => md5($request->password)]);
    }

    public function updatePhoto(){
        $file = array('image' => Input::file('photo'));
        $rules = array('image' => 'required');
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            print_r ("Failed");
        }else{
            if (Input::file('photo')->isValid()) {
                $destinationPath = 'adminLTE/dist/img/'; // upload path
                $extension = Input::file('photo')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('photo')->move($destinationPath, $fileName); // uploading file to given path
                Member::where('member_id', Input::get('member_id'))->update(['photo' => $destinationPath.$fileName]);
            }
        }
        return "hello world!".Input::get('member_id');
    }

    public function logout(){
        Session::forget('member');
        Session::flush();
        return redirect('home');
    }

    public function error(){
        return view('error');
    }

    public function test(){
        $member = Member::where('email', '=', 'john@gmail.com')
            ->Where('password', '=', md5(123))->get();
        return response($member->name);
    }
}
