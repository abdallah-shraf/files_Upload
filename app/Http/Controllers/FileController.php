<?php

namespace App\Http\Controllers;

use App\file;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userid=auth()->user()->id;
        $files= file::where('UserId', $userid)->get();
        return  view("file.index",compact('files'));
    }


    public function create()
    {
        return view('file.creat');
    }


    public function store(Request $request)
    {
        $request->validate([
            'filename'=>'required',
            'filedesc'=>'required',
            'User'=>'required',
            'file_input'=>'required'
        ]);

        $file =new file();
        $file->title=$request->filename;
        $file->desc=$request->filedesc;


        $file->UserId=$request->User;

        $file_data=$request->file('file_input');
        $file_name=$file_data->getClientOriginalName();
        $file_data->move(public_path().'/files/',$file_name);

        $file->file=$file_name;
        $file->save();

        return redirect('files/list')->with("done","Done Insert To DataBase");


    }


    public function show( $id)
    {
        $file = file::find($id);
        return  view("file/show", compact('file'));
    }


    public function edit($id)
    {
        $file = file::find($id);
        return  view("file/edit", compact('file'));

    }


    public function update(Request $request, $id)
    {
        $file = file::find($id);
        $file->title = $request->filename;
        $file->desc = $request->filedesc;


        $file_data = $request->file('file_input');
        $file_name = $file_data->getClientOriginalName();
        $file_data->move(public_path() . '/files/', $file_name);

        $file->file = $file_name;
        $file->save();

        return redirect('files/list')->with("done", "Done Update To DataBase");


    }


    public function destroy($id)
    {
        $file=file::find($id);
        $file->delete();
        return redirect('files/list')->with("done", "Done Delete To DataBase");

    }

    public function download($id){

        $data=file::where('id',$id)->firstOrFail();
        $data_path=public_path('files/' . $data->file);
        return  response()->download($data_path);
    }
}
