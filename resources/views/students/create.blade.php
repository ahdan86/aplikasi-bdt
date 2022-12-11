@extends('students.layout')
  
@section('content')
{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2>Add New Student</h2>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.store') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kelas:</strong>
            <input class="form-control" name="kelas" placeholder="Kelas"></input>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form> --}}

    <div class="card card-body mx-auto" style="width: 25rem;">
        <h1>Tambah data mahasiswa</h1>
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-outline mb-4">
                <input type="text" name="nrp" id="nrp" class="form-control" required/>
                <label for="nrp" class="form-label">NRP : </label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="nama" id="nama" class="form-control" required/>
                <label for="nama" class="form-label">Nama : </label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="email" id="email" class="form-control" required/>
                <label for="email" class="form-label">Email : </label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="jurusan" id="jurusan" class="form-control" required/>
                <label for="jurusan" class="form-label">Jurusan : </label>
            </div>
            
            <div class="form-outline mb-4">
                <input type="number" name="angkatan" id="angkatan" class="form-control" required/>
                <label for="angkatan" class="form-label">Angkatan : </label>
            </div>
            
            <div class="mb-4">
                <label for="foto" class="form-label">Foto : </label>
                <input type="file" name="foto" id="foto" class="form-control" required />
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Tambah Data</button>
        </form>
    </div>
    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
@endsection