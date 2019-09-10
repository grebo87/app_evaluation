<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Resources\CompanyResource;
use Validator;
use App\Category;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyResource::collection(Company::paginate());
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
            'var_razon_social' => 'required',
            'var_nombre_comercial' => 'required',
            'var_nro_documento' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false, 'message' => 'Validation Error.','errors' =>  $validator->errors()]);      
        }

        $company = Company::create($request->all());
        if($company){
           return response()->json(['success' => true, 'message' => 'company create.','data' => $company]);
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
        $company = Company::find($id);

        if (empty($company)) {
            return response()->json(['success' => false, 'message' => 'company not found.']);
        }

        return new CompanyResource($company);
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
         $company = Company::find($id);

        if (empty($company)) {
            return response()->json(['success' => false, 'message' => 'company not found.']);
        }

        $validator = Validator::make($request->all(), [
            'var_razon_social' => 'required',
            'var_nombre_comercial' => 'required',
            'var_nro_documento' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false, 'message' => 'Validation Error.','errors' =>  $validator->errors()]);      
        }

        $company->update($request->all());
        return response()->json(['success' => true, 'message' => 'company update.','data' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if (empty($company)) {
            return response()->json(['success' => false, 'message' => 'company not found.']);
        }

        $company->delete();

       return response()->json(['success' => true, 'message' => 'company delete.','data' => $company]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listCompany()
    {
        $companies =  Company::all();
        //se recorre las compañias 
        foreach ($companies as $key => $company) {
            if (isset($company->users)) {
                //se recorre los usuarios por cada compañia
                foreach ($company->users as  $user) {
                    $idsCategories = [];
                    if (isset($user->categoriesAssigned)) {
                        //se recorre los categorias asignadas a un usuario
                       foreach ($user->categoriesAssigned as $categoriesAssigned) {
                           $idsCategories[] =  $categoriesAssigned->category_id;
                       }
                    }
                    //se agregan las categorias asignadas al usuario
                    $user->categories = Category::whereIn('id',$idsCategories)->get();
                }
            }
        }
        return response()->json(['success' => true,'data' => $companies]);
    }
}
