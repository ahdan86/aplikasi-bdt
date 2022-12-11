@extends('students.layout')
@section('content')
    {{-- <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Laravel 9 CRUD School Application</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New student</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Kelas</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->kelas }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="row text-center">
        {!! $students->links() !!}
    </div> --}}
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand p-2">Dashboard Admin PWeb</a>
        {{-- <a class="btn btn-outline-danger my-2 my-sm-0 me-2 " href="../Mission9/logout.php">Logout</a> --}}
    </nav>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container mt-2">
        <div class="row justify-content-between">
            <div class="col-4">
                <a class="btn btn-success btn-sm mt-2 mb-3" href="{{ route('students.create') }}">+ Tambah data mahasiswa</a>
                {{-- <a class="btn btn-warning btn-sm mt-2 mb-3 " href="../Mission10/chart.php">Chart data angkatan</a> --}}
            </div>
            
            <div class="col-lg-4 col-7">
                <form action="{{ route('students.find') }}" method="POST">
                    @csrf
                    <div class="input-group mt-2 mb-3">
                        <div class="form-outline">
                            <input type="search" id="form1" class="form-control" name="keyword" autofocus/>
                            <label class="form-label" for="form1">Siswa, NRP dsb...</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="cari">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="table-responsive text-center">
            <table class="table table-hover" id="dataTable" border="1" cellpadding="10" cellspacing="0">
                <thead>    
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                            <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('students.edit',$student->id) }}">Ubah</a> | 
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                        <td><img src="{{ url('storage/'.$student->foto) }}" alt="Gambar mahasiswa" width="50"></td>
                        <td>{{ $student->nrp}}</td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->angkatan }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->jurusan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
@endsection