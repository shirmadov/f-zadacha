<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotebookController extends Controller
{
    private $data = [
        'status'=> 0,
        'error' => false,
    ];


    public function index(){

        $notebooks = NotebookResource::collection(Notebook::all());
        if($notebooks){
            $this->data['status'] = 1;
            $this->data['notebooks'] = $notebooks;
        }else{
            $this->data['error'] = 'У вас нет данный';
        }


        return $this->data;
    }

    public function store(Request $request, Notebook $notebook){

        try {
            $validator = Validator::make($request->all(), [
                'fio' => 'required|max:255',
                'company' => 'nullable|max:255',
                'phone' => 'required|max:255',
                'email' => 'required|unique:notebook|max:255',
                'birthday' => 'nullable|max:255',
                'photo' => 'nullable|max:255',
            ]);

            if($validator->fails()){
                return $this->data['error'] = $validator->errors()->first();;
            }

            $notebook = $notebook->saveNote($request);

            $this->data['status'] = 1;
            $this->data['notebook'] = $notebook;

        }catch(\Exception $e){
            return $this->data['error'] = $e->getMessage();
        }

        return $this->data;
    }

    public function show($id, Notebook $notebook){

        try {

            $notebook = Notebook::where('id',$id)->get();
            $this->data['status'] = 1;
            $this->data['notebook'] =  NotebookResource::collection($notebook);


        }catch(\Exception $e){
            return $this->data['error'] = $e->getMessage();
        }

        return $this->data;
    }



    public function edit($id, Request $request, Notebook $notebook){

        try {
            $validator = Validator::make($request->all(), [
                'fio' => 'required|max:255',
                'company' => 'nullable|max:255',
                'phone' => 'required|max:255',
                'email' => 'required|unique:notebook,email,'.$id,
                'birthday' => 'nullable|max:255',
                'photo' => 'nullable|max:255',
            ]);


            if($validator->fails()){
                return $this->data['error'] = $validator->errors()->first();;
            }

            $notebook = $notebook->updateNote($id, $request);

            $this->data['status'] = 1;
            $this->data['notebook'] = $notebook;

        }catch(\Exception $e){
            return $this->data['error'] = $e->getMessage();
        }

        return $this->data;
    }


    public function delete($id){

        try {
            $notebook = Notebook::find($id);

            $notebook->delete();

            $this->data['status'] = 1;
            $this->data['notebook'] = NotebookResource::collection(Notebook::all());
        }catch(\Exception $e){
            return $this->data['error'] = $e->getMessage();
        }

        return $this->data;
    }

}
