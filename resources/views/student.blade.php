@extends('layout.mainlayout')

@section('title', 'Student')

@section('content')
    <h1>INI HALAMAN Student</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="students/add" class="btn btn-primary">Add Data</a>
        @if (Auth::user()->role_id == 1)
            <a href="students-deleted" class="btn btn-info">Show Deleted Data</a>
        @endif

    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
            <div class="input-group flex-nowrap ">
                <input type="text" class="form-control" placeholder="keyword" name="keyword">
                <button class="btn btn-primary input-group-text" id="addon-wrapping">Search</button>
            </div>
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Student List</th> 
                <th>Gender</th> 
                <th>Nis</th>   
                <th>Class</th>
                @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)

                @else
                    <th>Action</th>   
                @endif
            </tr>
        </thead>
        <tbody> 
            @foreach ($student as $s)
            <tr>
                <td>{{$loop->iteration + $student->firstItem() - 1}}</td>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $s->name }}</td>
                <td>{{ $s->gender }}</td>
                <td>{{ $s->nis }}</td> 
                @if ($s->class)
                    <td>{{ $s->class->name }}</td>
                @else
                    <td></td>
                @endif
                <td>
                    @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                        
                    @else
                        <a href="student/{{ $s->id }}" class="btn btn-success">Detail</a>  
                        <a href="students/edit/{{ $s->id }}" class="btn btn-primary">Edit</a> 
                        @endif
                    @if(Auth::user()->role_id == 1)  
                        <a href="students/delete/{{ $s->id }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $s->name }}?')">Delete</a>   
                    @endif
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-5">
        {{ $student->withQueryString()->links() }}

    </div>
@endsection