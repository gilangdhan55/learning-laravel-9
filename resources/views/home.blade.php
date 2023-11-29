  @extends('layout.mainlayout')

  @section('title', 'Home')

  @section('content')
        <h1>INI HALAMAN HOME</h1>
        <h2>Selamat Datang {{ Auth::user()->name }} anda adalah {{ Auth::user()->role->name }}</h2>   
  @endsection
  