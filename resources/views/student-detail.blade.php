@extends('layout.mainlayout')

@section('title', 'Student Detail')

@section('content')
      <h1>Anda sedang melihat detail student {{ $student->name }}</h1>  
        <div class="my-3 d-flex justify-content-center">
            @if ($student->image != null)
                <img src="{{ asset('storage/photo/'.$student->image) }}" alt="" width="250px"> 
            @else 
                <img src="{{ asset('images/default-person-pitcure.jpg') }}" alt="" width="250px"> 
            @endif
        </div>
        <div class="mt-5 mb-5">
            <table class="table table-bordered">
                <tr>
                    <th>NIS</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Home Room Teacher</th>
                </tr>
                <tr>
                    <td>{{ $student->nis }}</td> 
                    <td>
                        @if (strtolower($student->gender) == "p")
                            Perempuan  
                        @elseif(strtolower($student->gender) == "l")
                            Laki - Laki
                        @else
                            Belum di atur
                        @endif
                    </td> 
                    <td>{{ $student->class->name }}</td>
                    @if ($student->class->homeroomTeacher)
                    <td>{{ $student->class->homeroomTeacher->name }}</td>
                    @else
                    <td></td>
                    @endif
                   
                </tr>
            </table>
        </div>

      <div>
            <h3>Extracurriculars</h3>
        <ol>
            @foreach ($student->extracurricular as $e)
                <li>{{ $e->name }}</li>
            @endforeach 
        </ol>
      
      </div>
      

      <style>
        th{
            width: 25%;
        }
      </style>
@endsection
