<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Job;
use App\Http\Resources\JobResource;

class JobController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Job::all();
    
        return $this->sendResponse(JobResource::collection($job), 'Contract jobs retrieved successfully.');
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
            'idContract' => 'required',
            'jobNumber' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $job = Job::create($input);
   
        return $this->sendResponse(new JobResource($job), 'Contract job created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
  
        if (is_null($job)) {
            return $this->sendError('Job not found.');
        }
   
        return $this->sendResponse(new JobResource($job), 'Contract job retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'idContract' => 'required',
            'jobNumber' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $job->idContract = $input['idContract'];
        $job->jobNumber = $input['jobNumber'];
        $job->save();
   
        return $this->sendResponse(new JobResource($job), 'Contract job updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
   
        return $this->sendResponse([], 'Contract job deleted successfully.');
    }
}
