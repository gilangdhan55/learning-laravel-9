@extends('layout.mainlayout')

@section('title', 'Extracurrituller')

@section('content')
    <h1>Anda sedang melihat detail Teacher {{ $teacher->name }}</h1>
    
    <h3>Teacher {{ $teacher->name }} : 
        @if ($teacher->class)
            {{ $teacher->class->name }}</h3>
        @else
            -
        @endif
    <div class="mt-5">
        <h4>List Student</h4>
        <ol>
            @if ($teacher->class)
                @foreach ($teacher->class->students as $s)
                    <li>{{ $s->name }}</li>
                @endforeach
            @endif
          
        </ol> 
    </div> 
 
@endsection