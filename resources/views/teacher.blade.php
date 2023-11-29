@extends('layout.mainlayout')

@section('title', 'Teacher')

@section('content')
      <h1>INI HALAMAN Teacher</h1>
      
        <div class="my-5">
            <a href="teachers/add" class="btn btn-primary">Add Data</a>
        </div>

        @if (Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        
      <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Teacher List</th>
                <th>Action</th>   
            </tr>
        </thead>
        <tbody>
            @foreach ($teacher as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $t->name }}</td>  
                <td>
                    <a href="teacher/{{ $t->id }}">Detail</a>    
                    <a href="teacher/edit/{{ $t->id }}">Edit</a>    
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
