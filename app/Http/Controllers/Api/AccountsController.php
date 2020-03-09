<?php

namespace App\Http\Controllers\Api;
use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AccountResource as AccountResource;
class AccountsController extends Controller
{
    public function index(){
    	$accounts = Account::all();
    	return AccountResource::collection($accounts);
    }



    public function store(Request $request){
    	$data = $this->validatePostRequest();
    	$result = Account::create($data);
    	return response()->json(['data' => $result,'success' => 'account created successfully.'], 201);

    }



    public function show($id){
    	$account = Account::where('id',$id)->first();
    	return response()->json(['data' => $account], 200);
    }



    public function update(Request $request, $id){
    	$data = $this->validateUpdateRequest();
    	$record = Account::where('id',$id)->first();
    	$result = $record->update($data);
    	return response()->json(['data' => $record,'success' => 'account updated successfully.'], 200);
    }
    


    public function destroy($id){
    	$account = Account::where('id',$id)->first();
    	$account->delete();
    	return response()->json(['success' => 'account deleted successfully.'], 201);
    }


    private function validatePostRequest(){
    	return request()->validate([
	    	'amount' => 'required', 
	        'duration' => 'required',
	        'title' => 'required', 
	        'gender' => 'required', 
	        'first_name' => 'required',
	        'last_name' => 'required',
	        'dob' => 'required',
	        'phone' => 'required|numeric', 
	        'email' => 'required|email',
	        'address' => 'required|max:40',
	        'city' => 'required',
	        'state' => 'required',
	        'employer_name' => 'required',
	        'ippis_no' => 'required|max:14|min:14',
	        'salary_bank_name' => 'required',
	        'salary_account_number' => 'required|numeric',
    	]);
    }
    private function validateUpdateRequest(){
    	return request()->validate([
	    	'amount' => 'required', 
	        'duration' => 'required',
	        'title' => 'required', 
	        'gender' => 'required', 
	        'first_name' => 'required',
	        'last_name' => 'required',
	        'dob' => 'required',
	        'phone' => 'required|numeric',
	        'address' => 'required|max:40',
	        'city' => 'required',
	        'state' => 'required',
	        'employer_name' => 'required',
	        'ippis_no' => 'required|max:14|min:14',
	        'salary_bank_name' => 'required',
	        'salary_account_number' => 'required|numeric',
    	]);
    }

}
