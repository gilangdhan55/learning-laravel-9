@extends('layout.mainlayout')

@section('title', 'Extracurrituller')

@section('content')
    <h1>Anda sedang melihat detail Extracurrituller {{ $eskul->name }}</h1>
 
    <div>
        <h3>List Student yang mengikuti Extracurrituller {{ $eskul->name }} :</h3>
        <ol>
            @foreach ($eskul->students as $s)
                <li>{{ $s->name }}</li>
            @endforeach 
        </ol>
    
    </div>
@endsection