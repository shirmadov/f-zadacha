<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    protected $table = 'notebook';
    protected $fillable = ['fio','company','phone','email','birthday','photo'];

    public function saveNote($request){

        $notebook = new Notebook;

        $notebook->fio = $request->fio;
        $notebook->company = $request->company;
        $notebook->phone = $request->phone;
        $notebook->email = $request->email;
        $notebook->birthday = $request->birthday;

        $notebook->save();

        return $notebook;
    }

    public function updateNote( $id, $request ){

        $notebook =  Notebook::find($id);
        $notebook->fio = $request->fio;
        $notebook->company = $request->company;
        $notebook->phone = $request->phone;
        $notebook->email = $request->email;
        $notebook->birthday = $request->birthday;

        $notebook->save();

        return $notebook;
    }
}
