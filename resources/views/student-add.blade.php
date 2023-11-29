  @extends('layout.mainlayout')

  @section('title', 'Add New Student')

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

            <form action="/student" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name">
                  </div>
                  <div class="mb-3">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                              <option value="">Select One</option>
                              <option value="L">L</option>
                              <option value="P">P</option>
                        </select>
                  </div>
                  <div class="mb-3">
                        <label for="nis">Nis</label>
                        <input class="form-control" type="text" name="nis" id="nis">
                  </div>
                  <div class="mb-3">
                        <label for="class">Class</label>
                        <select class="form-control" name="class_id" id="class"> 
                              <option value="">Select One</option>
                              @foreach ($class as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>  
                              @endforeach
                        </select>
                  </div>
                  <div class="mb-3">
                        <label for="photo">Photo</label>
                        <div class="input-group">
                              <input type="file" class="form-control" id="photo" name="photo"> 
                        </div>
                  </div>
                  <div class="mb-3">
                        <button class="btn btn-success" type="submit">Save</button>
                  </div>
            </form>
        </div>
  @endsection
  