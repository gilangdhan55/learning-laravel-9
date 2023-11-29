@extends('layout.mainlayout')

@section('title', 'Student Detail')

@section('content')
      <h1>Anda sedang melihat data detail dari class {{ $class->name }}</h1> 

      <div class="mt-5 mb-5">
        <h4>Home Room Teacher : {{ $class->homeroomTeacher->name }}</h4>
        
      </div> 

      <div>
        <h3>Students</h3>
        <ol>
            @foreach ($class->students as $s)
                <li>{{ $s->name }}</li>
            @endforeach 
        </ol>
    
    </div>

      <style>
        th{
            width: 25%;
        }
      </style>
@endsection
