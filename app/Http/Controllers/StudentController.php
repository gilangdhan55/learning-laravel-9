<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentValidation;
use App\Models\ClassModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request)
    {
         $keyword       = $request->keyword; 

         if($request){
            $query = StudentModel::with('class')
                            ->where('name', 'LIKE', '%'.$keyword.'%') 
                            ->orWhere('gender', $keyword)
                            ->orWhere('nis', 'LIKE', '%'.$keyword.'%')
                            ->orWhereHas('class', function($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%'.$keyword.'%');
                            })
                            ->orderBy("updated_at", "desc")
                            ->paginate(15); 
         }else{
         $query     = StudentModel::orderBy("updated_at", "desc")
                            ->paginate(15);
         }
        // $data['student'] = StudentModel::with(['class.homeroomTeacher', 'extracurricular'])->get(); ini untuk relasi ke 3 table

        $data['student']   = $query;
        
        // $data['student'] = StudentModel::orderBy("updated_at", "desc")->simplepaginate(15);
        return view('student', $data); 
        
    }

    public function show($id)
    {
        $student            = StudentModel::with(['class.homeroomTeacher', 'extracurricular'])
                            ->findOrFail($id);

        $data['student']    = $student;
        return view('student-detail', $data); 
    }

    public function create()
    {
        $class              = ClassModel::select('id', 'name')->get();
         
        $data['class']      = $class;
        return view('student-add', $data);
    }

    public function store(StudentValidation $request)
    { 
        $pictureName        = "";

        if($request->file('photo')){
            $extensions         = $request->file('photo')->getClientOriginalExtension();
            $newName            = $request->name.'-'.now()->timestamp.'.'.$extensions;
            $uploadImage        = $request->file('photo')->storeAs('photo', $newName);
        }
      

        $request['image']   = $newName;
        $student            = StudentModel::create($request->all());

        if($student){
            Session::flash('status', 'success');
            Session::flash('message', 'Add new student succes');
        }
        
        return redirect('students');
    }

    public function edit($id)
    {
        $student            = StudentModel::with(['class'])
                            ->findOrFail($id);
        $class              = ClassModel::select('id', 'name')->get();

        $data['student']    = $student; 
        $data['class']      = $class;
        return view('student-edit', $data);
    }

    public function update(StudentValidation $request, $id)
    {
        

        $student            = StudentModel::findOrFail($id);

        //ini jika field di html tidak sama dengan di table database
        // $student->name      = $request->name;
        // $student->gender    = $request->gender;
        // $student->nis       = $request->nis;
        // $student->class_id  = $request->class_id;
        // $student->save();

        $update = $student->update($request->all()); 

        if($update){
            Session::flash('status', 'success');
            Session::flash('message', 'Edit student succes');
        }

        return redirect('students');
    }

    public function delete($id)
    {

        $student            = StudentModel::findOrFail($id);

        //check apakah ada dia memilki eskul atau extracullicurrer
        $eskul              = StudentModel::with('extracurricular')->findOrFail($id);
        if($eskul->extracurricular){
            DB::table('student_extracurrituler')->where('student_id', $id)->delete();
            //  $deleteEskul   = $eskul->extracurricular->delete();
        } 

        // $deleteStudent      = DB::table('students')->where('id', $id)->delete();
        $deletedStudent     = $student->delete();
        if($deletedStudent)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'deleted student succes');
        }
        return redirect('students'); 
    }

    public function deletedStudents()
    {
        $deletedStudent             = StudentModel::onlyTrashed()->get(); 
        $data['student']            = $deletedStudent;
        return view('student-deleted-list', $data); 
    }

    public function restore($id)
    {
        $deletedStudent             = StudentModel::withTrashed()->where('id', $id)->restore();

        if($deletedStudent)
        {
            Session::flash('status', 'success');
            Session::flash('message', 'restore student succes');
        }
        return redirect('students'); 
    }
}
