<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MessageType;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\MessageTypeResource;

class MessageTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messageTypeName = MessageType::all();
    
        return $this->sendResponse(MessageTypeResource::collection($messageTypeName), 'Message types retrieved successfully.');
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
            'messageTypeName' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $messagetype = MessageType::create($input);
   
        return $this->sendResponse(new MessageTypeResource($messagetype), 'Message Type created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messagetype = MessageType::find($id);
  
        if (is_null($messagetype)) {
            return $this->sendError('Message Type not found.');
        }
   
        return $this->sendResponse(new MessageTypeResource($messagetype), 'Message Type retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MessageType $messageType)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'messageTypeName' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $messageType->messageTypeName = $input['messageTypeName'];
        $messageType->save();
   
        return $this->sendResponse(new MessageTypeResource($messageType), 'Message Type updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageType $messagetype)
    {
        $messagetype->delete();
   
        return $this->sendResponse([], 'Message Type deleted successfully.');
    }
}
