<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRoomValidation;
use App\Models\ClassModel;
use App\Models\TeacherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{
    public function index()
    { 

        $class = ClassModel::orderBy("updated_at", "desc")->get();
        // $class = ClassModel::with('students', 'homeroomTeacher')->get();
        
        $data['class'] = $class;

        return view('classroom', $data);
    }

    public function show($id)
    {
        $class = ClassModel::with(['students', 'homeroomTeacher'])
                    ->findOrFail($id);
        
        $data['class'] = $class;

        return view('classroom-detail', $data);
    }

    public function create()
    { 
        $teacher              = TeacherModel::select('id', 'name')->get(); 
        $data['teacher']      = $teacher;
        return view('classroom-add', $data);
    }
    
    public function store(ClassRoomValidation $request)
    {  
        $class            = ClassModel::create($request->all());

        if($class){
            Session::flash('status', 'success');
            Session::flash('message', 'Add new ClassRoom succes');
        }
        return redirect('class');
    }

    public function edit($id)
    {
        $class              = ClassModel::select('id','name','teacher_id')->findOrFail($id);
        
        $teacher            = TeacherModel::select('id', 'name')->get();

        $data['class']      = $class;
        $data['teacher']    = $teacher;

        return view('classroom-edit', $data);
    }

    public function update(ClassRoomValidation $request, $id)
    { 
        $class            = ClassModel::findOrFail($id);

        $update           = $class->update($request->all());

        if($update){
            Session::flash('status', 'success');
            Session::flash('message', 'Edit ClassRoom succes');
        }
 
        return redirect('class');
    }

    public function delete($id)
    {
 

        $class              = ClassModel::with(['students'])->findOrFail($id);
     
        if($class->students){
            $DelClassStudent    = $class->students()->delete(); 
        }

        $delete             = $class->delete(); 

        if($delete){
            Session::flash('status', 'success');
            Session::flash('message', 'Delete ClassRoom succes');
        }

        return redirect('class');


    }
}
