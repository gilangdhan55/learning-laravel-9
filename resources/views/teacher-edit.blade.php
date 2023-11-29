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
            <form action="/teacher/{{ $teacher->id }}" method="post">
                  @method('PUT')
                  @csrf
                  <div class="mb-5">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name"  value="{{ $teacher->name }}">
                  </div>  
                  <div class="mb-5">
                        <button class="btn btn-success" type="submit">Save</button>
                  </div>
            </form>
        </div>
  @endsection
  