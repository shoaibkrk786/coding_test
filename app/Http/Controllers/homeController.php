<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User,
    Auth,
    Hash;
use Validator;
use App\Project;

class homeController extends Controller
{
    //logout function
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    //registration form view
    public function reg_view(){
        return view('forms.registration');
    }
    //login form view
    public function login(){
        return view('forms.login');
    }
    //registration for new user
    public function new_user(Request $request){

        $data = $request->input();
        $email['email'] = $data['email'];
        $rule_email = array('email' => 'unique:users,email');
        $validator_email = Validator::make($email, $rule_email);
        if ($validator_email->fails()) {
            $message = '[Email] already exists';
            return response()->json(array("status" => "error", "msg" => $message, "error_field" => 'email'));
        } else {
            $pass = $data['password'];
            $data['password'] = Hash::make($pass);
            $id = User::create($data);

        }


        return response()->json(array("status" => "success"));
    }
    //login user function
    public function login_user(Request $request){

        $data = $request->input();
        $user = User::where("email", $data['email'])
            ->first();
        if (!is_null($user)) {
            if (Hash::check($data['password'], $user->password)) {
                Auth::login($user);
                $res['status'] = true;
                return response()->json($res);
            }

            $res['status'] = false;
            $res['msg'] = 'Incorect Password';
            return response()->json($res);
        } else {
            $res['status'] = false;
            $res['msg'] = 'Email not exist Register yourself';
            return response()->json($res);
        }
    }
    //submission form view
    public function form_view(){
        if(Auth::check()){
            return view('home');
        }else{
            return redirect('/');
        }
    }
    //submission form data save in database
    public function new_data(Request $request){
        $data = $request->input();

        $serializedArr = json_encode($data['service']);
        $data['service']=$serializedArr;
        Project::create($data);
        return response()->json(array("status" => "success"));
    }
    //get submited data from database
    public function result(){
        $result =Project::orderby('id', 'asc')->get();
        return view('result_data')
            ->with('results',$result);
    }

}
