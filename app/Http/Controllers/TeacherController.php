<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherValidation;
use App\Models\TeacherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    public function index()
    {
        $data['teacher'] = TeacherModel::orderBy('updated_at', 'desc')->get();
        return view('teacher', $data);
    }

    public function show($id)
    {
        $data['teacher'] = TeacherModel::with('class.students')->findOrFail($id);
        return view('teacher-detail', $data);
    }

    public function create()
    {
        return view('teacher-add');
    }

    public function store(TeacherValidation $request)
    {
        $teacher            = TeacherModel::create($request->all());

        if($teacher){
            Session::flash('status', 'success');
            Session::flash('message', 'Add new Teacher succes');
        } 

        return redirect('teacher');
    }

    public function edit($id)
    {
        $teacher                  = TeacherModel::select('id','name')->findOrFail($id);
        
        $data['teacher']          = $teacher;

        return view('teacher-edit', $data);
    }

    public function update(TeacherValidation $request, $id)
    { 
        $teacher                  = TeacherModel::findOrFail($id);

        $update                   = $teacher->update($request->all());
        
        if($update){
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Teacher succes');
        }


        return redirect('teacher');
    }
}
