<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Contract;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ContractResource;
   
class ContractController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract = Contract::all();
    
        return $this->sendResponse(ContractResource::collection($contract), 'Contracts retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
//            'job_idJob' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $contract = Contract::create($input);
   
        return $this->sendResponse(new ContractResource($contract), 'Contract created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::find($id);
  
        if (is_null($contract)) {
            return $this->sendError('Contract not found.');
        }
   
        return $this->sendResponse(new ContractResource($contract), 'Contract retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
//            'job_idJob' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $contract->name = $input['name'];
//        $contract->job_idJob = $input['job_idJob'];
        $contract->save();
   
        return $this->sendResponse(new ContractResource($contract), 'Contract updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
   
        return $this->sendResponse([], 'contract deleted successfully.');
    }
}