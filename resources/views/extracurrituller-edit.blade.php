  @extends('layout.mainlayout')

  @section('title', 'Edit Extracurrituller')

  @section('content')  
        <div class="mt-5 col-6 m-auto">
            @if ($errors->any())
                  <div class="alert alert-danger">
                        <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                        </ul>
                  </div>
            @endif
            
            <form action="/extracurrituller/{{ $eskul->id }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="mb-5">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $eskul->name }}">
                  </div>  
                  <div class="mb-5">
                        <button class="btn btn-success" type="submit">Save</button>
                  </div>
            </form>
        </div>
  @endsection
  