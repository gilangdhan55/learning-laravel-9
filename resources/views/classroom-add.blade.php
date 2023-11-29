  @extends('layout.mainlayout')

  @section('title', 'Add New ClassRoom')

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

            <form action="/class" method="post">
                  @csrf
                  <div class="mb-5">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name">
                  </div> 
                  <div class="mb-5">
                        <label for="class">Home Teacher</label>
                        <select class="form-control" name="teacher_id" id="class"> 
                              <option value="">Select One</option>
                              @foreach ($teacher as $t)
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>  
                              @endforeach
                        </select>
                  </div>
                  <div class="mb-5">
                        <button class="btn btn-success" type="submit">Save</button>
                  </div>
            </form>
        </div>
  @endsection
  