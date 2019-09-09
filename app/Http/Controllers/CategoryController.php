<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\CategoryResource;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::paginate());
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
            'va_slug'  => 'required',
            'var_name'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false, 'message' => 'Validation Error.','errors' =>  $validator->errors()]);      
        }

        $category = Category::create($request->all());
        if($category){
           return response()->json(['success' => true, 'message' => 'Category create.','data' => $category]);
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
        $category = Category::find($id);

        if (empty($category)) {
            return response()->json(['success' => false, 'message' => 'category not found.']);
        }

        return new CategoryResource($category);
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
       $category = Category::find($id);

        if (empty($category)) {
            return response()->json(['success' => false, 'message' => 'category not found.']);
        }

        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false, 'message' => 'Validation Error.','errors' =>  $validator->errors()]);      
        }

        $category->update($request->all());
        return response()->json(['success' => true, 'message' => 'category update.','data' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return response()->json(['success' => false, 'message' => 'category not found.']);
        }

        $category->delete();

       return response()->json(['success' => true, 'message' => 'category delete.','data' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoriesAssignediUser($id='')
    {
        # code...
    }
    
}
