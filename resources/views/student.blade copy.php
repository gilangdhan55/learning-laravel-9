@extends('layout.mainlayout')

@section('title', 'Student')

@section('content')
    <h1>INI HALAMAN Student</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Student List</th> 
                <th>Gender</th> 
                <th>Nis</th>  
                <th>Class</th> 
                <th>Extracurricular</th> 
                <th>Home Room Teacher</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->gender }}</td>
                <td>{{ $s->nis }}</td> 
                <td>{{ $s->class['name'] }}</td>
                <td>
                    @foreach ($s->extracurricular as $v)
                       - {{ $v->name }} <br>
                    @endforeach
                </td>
                <td>{{ $s->class->homeroomTeacher->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection