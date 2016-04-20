<?php

namespace App\Http\Controllers;
use DB;
use DateTime;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Scholarship;
use App\Http\Requests;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('scholarship');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scholarship = new Scholarship();
        $scholarship->scholarship_id = $request->scholarship_id;
        $scholarship->student_name = $request->student_name;
        $scholarship->deadline = $request->deadline;
//        $scholarship->picture = $request->picture;
        $scholarship->video = $request->video;
        $scholarship->short_description = $request->short_description;
        $scholarship->long_description = $request->long_description;
        $scholarship->created = $request->created;
        $scholarship->location_id = $request->location_id;
        $scholarship->member_id = $request->member_id;
        $scholarship->save();
        if($request->picture != null){
            $this->updatePicture($request->picture, $request->scholarship_id);
        }
    }

    public function updatePicture($picture, $scholarship_id){
        $file = array('image' => $picture);
        $rules = array('image' => 'required');
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            print_r ("Failed");
        }else{
            if ($picture->isValid()) {
                $destinationPath = 'adminLTE/dist/img/'; // upload path
                $extension = $picture->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $picture->move($destinationPath, $fileName); // uploading file to given path
                Scholarship::where('scholarship_id', $scholarship_id)->update(['picture' => $destinationPath.$fileName]);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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

    public function detail($id){

        $scholarship = new Scholarship();
//        return response()->json(['scholarship'=>$scholarship->getRowsByScholarship($id), 'funders'=>$scholarship->getFunderByScholarship($id)]);
        return view('scholarship-detail')->with(['scholarship'=>$scholarship->getRowsByScholarship($id), 'funders'=>$scholarship->getFunderByScholarship($id), 'variables'=>$scholarship->getVariableByScholarship($id)]);
    }

    public function getThree(){
//        $scholarship = Scholarship::all()->take(3);
//        $someUsers = User::where('votes', '>', 100)->paginate(15);

        $scholarship = new Scholarship();
//        $member = DB::table('member')
//            ->join('scholarship', 'scholarship.member_id', '=', 'member.member_id')
//            ->select('*')->get();
        return response()->json(['data' => $scholarship->getRow(3)]);
    }

    public function homeScholarship(){
        $scholarship = new Scholarship();
        return view('home-scholarship')->with('scholarships',$scholarship->getRow(3));
    }

    public function allScholarship(){
        $scholarship = new Scholarship();
        return view('all-scholarship')->with('scholarships',$scholarship->getAllRows());
    }

    public function myScholarship(){
        $member_id = Session::get('member')->member_id;
        $scholarship = new Scholarship();
        return view('my-scholarship')->with('scholarships',$scholarship->getRowsByUser($member_id));
    }

    public function allScholarshipJson(){
        $scholarship = new Scholarship();
        return response()->json($scholarship->getAllRows());
    }

}
