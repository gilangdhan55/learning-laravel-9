  @extends('layout.mainlayout')

  @section('title', 'Home')

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

            <form action="/student/{{ $student->id }}" method="post">
                  @method('PUT')
                  @csrf
                  <div class="mb-5">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $student->name }}" >
                  </div>
                  <div class="mb-5">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender" >
                              <option value="" selected disabled>Select Gender</option>
                              <option value="L" {{ $student->gender == "L" ? 'selected' : '' }}>L</option>
                              <option value="P" {{ $student->gender == "P" ? 'selected' : '' }}>P</option>
                        </select>
                  </div>
                  <div class="mb-5">
                        <label for="nis">Nis</label>
                        <input class="form-control" type="text" name="nis" id="nis" value="{{ $student->nis }}" >
                  </div>
                  <div class="mb-5">
                        <label for="class">Class</label>
                        <select class="form-control" name="class_id" id="class" >  
                              <option value="" selected disabled>-- Select Class --</option>
                              {{-- <option value="{{ $student->class->id }}">{{ $student->class->name }}</option> --}}
                              @if ($student->class)
                                    @foreach ($class as $c)
                                          <option value="{{ $student->class->id }}" {{ $c->id == $student->class->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                    @endforeach
                              @else
                                    @foreach ($class as $c)
                                          <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                              @endif
                             
                        </select>
                  </div>
                  <div class="mb-5">
                        <button class="btn btn-success" type="submit">Save</button>
                  </div>
            </form>
        </div>
  @endsection
  