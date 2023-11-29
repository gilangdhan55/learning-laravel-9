<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtracurritullerValidation;
use App\Models\Extracurrituler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExtracurritulerController extends Controller
{
    public function index()
    {
        $eskul = Extracurrituler::with('students')->get(); 
        $data['eskul'] = $eskul;
        return view('extracurrituller', $data);
        
    }

    public function show($id)
    {
        $eskul = Extracurrituler::with('students')->findOrFail($id); 
        $data['eskul'] = $eskul;
        return view('extracurrituller-detail', $data);
        
    }

    public function create()
    {  
        return view('extracurrituller-add');
    }
    
    public function store(ExtracurritullerValidation $request)
    {  
        $eskul      = Extracurrituler::create($request->all());

        if($eskul){
            Session::flash('status', 'success');
            Session::flash('message', 'Add new Extracurrituler succes');
        } 

        return redirect('extracurrituller');
    }

    public function edit($id)
    {
        $eskul                  = Extracurrituler::select('id','name')->findOrFail($id);
        
        $data['eskul']          = $eskul;

        return view('extracurrituller-edit', $data);
    }

    public function update(ExtracurritullerValidation $request, $id)
    { 
        $eskul                  = Extracurrituler::findOrFail($id);

        $update                 = $eskul->update($request->all());

        if($update){
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Extracurrituler succes');
        }
        
        return redirect('extracurrituller');
    }
}
