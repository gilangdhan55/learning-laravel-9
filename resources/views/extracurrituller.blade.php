@extends('layout.mainlayout')

@section('title', 'Extracurrituller')

@section('content')
    <h1>INI HALAMAN Extracurrituller</h1>

    <div class="my-5">
        <a href="{{ route('extracurrituller-add') }}" class="btn btn-primary">Add Data</a>
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
                <th>Extracurrituller</th>
                <th>Action</th>      
            </tr>
        </thead>
        <tbody>
           @foreach ($eskul as $v)
               <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $v->name }}</td> 
                    <td>
                        <a href="extracurrituller/{{ $v->id }}">Detail</a>    
                        <a href="extracurrituller/edit/{{ $v->id }}">Edit</a>    
                    </td>  
               </tr>
           @endforeach
        </tbody>
    </table>
@endsection