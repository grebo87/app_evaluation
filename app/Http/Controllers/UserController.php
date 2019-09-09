<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email'  => 'required',
            'password'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false, 'message' => 'Validation Error.','errors' =>  $validator->errors()]);      
        }

        $user = User::create($request->all());
        if($user){
           return response()->json(['success' => true, 'message' => 'user create.','data' => $user]);
        }
        return response()->json(['success' => false, 'message' => 'error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id));

        if (empty($user)) {
            return response()->json(['success' => false, 'message' => 'user not found.']);
        }

        return new UserResource($user);
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
        $user = User::find($id));

        if (empty($user)) {
            return response()->json(['success' => false, 'message' => 'user not found.']);
        }

        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false, 'message' => 'Validation Error.','errors' =>  $validator->errors()]);      
        }

        $user->update($request->all());
        return response()->json(['success' => true, 'message' => 'user update.','data' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::find($id));

        if (empty($user)) {
            return response()->json(['success' => false, 'message' => 'user not found.']);
        }

        $user->delete();

       return response()->json(['success' => true, 'message' => 'user delete.','data' => $user]);
    }
}
