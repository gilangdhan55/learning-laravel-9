  @extends('layout.mainlayout')

  @section('title', 'Home')

  @section('content')
        <h1>INI HALAMAN STUDENT YANG DI DELETED</h1>

        <div class="my-5 d-flex justify-content-between">
            <a href="students" class="btn btn-primary">Back</a> 
        </div>


        <div class="mt-5">
            <table class="table">
                  <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>NIS</th>
                        <th>ACTION</th>
                  </thead>
                  <tbody>
                        @foreach ($student as $s)
                        <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $s->name }}</td>
                              <td>{{ $s->gender }}</td>
                              <td>{{ $s->nis }}</td> 
                              <td>
                                  <a href="students/restore/{{ $s->id }}" class="btn btn-success">Restore</a>     
                        </tr> 
                        @endforeach
                  </tbody>
            </table>
        </div>
  @endsection
  