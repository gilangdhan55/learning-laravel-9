@extends('layout.mainlayout')

@section('title', 'ClassRoom')

@section('content')
    <h1>INI HALAMAN CLASS</h1>

    <div class="my-5">
        <a href="{{ route('class-add') }}" class="btn btn-primary">Add Data</a>
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
                <th>Class List</th> 
                <th>Action</th>   
            </tr>
        </thead>
        <tbody>
            @foreach ($class as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->name }}</td>
                <td>
                    <a href="class/{{ $s->id }}" class="btn btn-success">Detail</a>    
                    <a href="class/edit/{{ $s->id }}" class="btn btn-primary">Edit</a>  
                    <a href="class/delete/{{ $s->id }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $s->name }}?')">Delete</a>     
                </td>   
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection