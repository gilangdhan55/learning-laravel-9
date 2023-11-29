  @extends('layout.mainlayout')

  @section('title', 'Edit ClassRoom')

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
            <form action="/class/{{ $class->id }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="mb-5">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $class->name }}" required>
                  </div>  
                  <div class="mb-5">
                        <label for="class">Home Teacher</label>
                        <select class="form-control" name="teacher_id" id="class" required> 
                              <option value="" selected disabled>-- Select Home Teacher --</option>
                              @foreach ($teacher as $t)
                                    <option value="{{ $t->id }}" {{ $t->id == $class->teacher_id ? 'selected' : '' }}>{{ $t->name }}</option>  
                              @endforeach
                        </select>
                  </div>
                  <div class="mb-5">
                        <button class="btn btn-success" type="submit">Save</button>
                  </div>
            </form>
        </div>
  @endsection
  