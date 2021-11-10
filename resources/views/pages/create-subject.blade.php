@extends('/layouts.app')
@section('title')
Buat Mata Pelajaran
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid" id="levelUser">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Mata Pelajaran</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                @if ($errors->any())
                                <div class="alert alert-danger ">
                                    <ul>
                                        @foreach ($errors->all() as $error )
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route('mapel.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Mapel</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select name="class_students_id" class="form-control" id="">
                                                    <option value="">PILIH KELAS</option>
                                                    @foreach ($class as $class )
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" name="photo_subject" class="form-control"
                                                    placeholder="Photo">
                                                <small>Silahkan kosongkan jika tidak ada foto</small>

                                            </div>
                                        </div>
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">Simpan</button>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection