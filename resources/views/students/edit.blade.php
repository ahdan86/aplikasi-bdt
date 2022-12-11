@extends('students.layout')
@section('content')
  {{-- <div class="row">
    <div class="col-lg-12 margin-tb">
      <div>
        <h2>Edit student</h2>
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
  
<form action="{{ route('students.update',$student->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Name:</strong>
        <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Name">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Kelas:</strong>
        <input class="form-control" name="kelas" placeholder="Kelas" value="{{ $student->kelas }}">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form> --}}


<div class="card card-body mx-auto" style="width: 25rem;">
  <h1>Edit data mahasiswa</h1>
  <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-outline mb-4">
          <input type="text" name="nrp" id="nrp" class="form-control" value="{{ $student->nrp }}" required/>
          <label for="nrp" class="form-label">NRP : </label>
      </div>
      <div class="form-outline mb-4">
          <input type="text" name="nama" id="nama" class="form-control" value="{{ $student->nama }}" required/>
          <label for="nama" class="form-label">Nama : </label>
      </div>
      <div class="form-outline mb-4">
          <input type="text" name="email" id="email" class="form-control" value="{{ $student->email }}" required/>
          <label for="email" class="form-label">Email : </label>
      </div>
      <div class="form-outline mb-4">
          <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ $student->jurusan }}" required/>
          <label for="jurusan" class="form-label">Jurusan : </label>
      </div>
      
      <div class="form-outline mb-4">
          <input type="number" name="angkatan" id="angkatan" class="form-control" value="{{ $student->angkatan }}" required/>
          <label for="angkatan" class="form-label">Angkatan : </label>
      </div>
      
      <div class="mb-4">
          <label for="foto" class="form-label">Foto : </label>
          <input type="file" name="foto" id="foto" class="form-control" required />
      </div>

      <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Edit Data</button>
  </form>
</div>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
@endsection