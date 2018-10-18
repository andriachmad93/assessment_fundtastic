<?php

namespace App\Http\Controllers\APIController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Models\User;
use JWTAuthException;
use App\Jobs\SendRegisterEmail;

class UserAPIController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user = $user;
        $this->middleware('jwt.auth', ['except'=>['register']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=>true,'message'=>'User retrieved successfully','data'=>User::all()]);
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
        //
    }

    public function register(Request $request){
        $user = $this->user->create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'password' => bcrypt($request->get('password'))
        ]);

        $job = (new SendRegisterEmail($request->get('email')));

        $this->dispatch($job);

        return response()->json(['status'=>true,'message'=>'User created successfully','data'=>$user]);
    }

    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json(['status'=>false,'message'=>'User Not Found'], 404);
        }

        return response()->json(['status'=>true,'message'=>'User retrieved successfully','data'=>$user]);
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
        $user = User::find($id);

        if(!$user){
            return response()->json(['status'=>false,'message'=>'User Not Found'], 404);
        }

        $user->update($request->all());

        return response()->json(['status'=>true,'message'=>'User updated successfully','data'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json(['status'=>false,'message'=>'User Not Found'], 404);
        }

        $user->delete();

        return response()->json(['status'=>true,'message'=>'User deleted successfully']);
    }
}
