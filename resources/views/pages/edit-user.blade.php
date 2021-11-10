@extends('/layouts.app')
@section('title')
User
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid" id="levelUser">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
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
                                <form action="{{ route('user.update', $data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $data->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>No Induk Siswa/Guru</label>
                                                <input type="text" name="main_number" class="form-control"
                                                    value="{{ $data->main_number }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control">
                                                <small>Kosongkan jika tidak ingin mengganti email</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control">
                                                <small>Kosongkan jika tidak ingin mengganti password</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Jenis kelamin </label>
                                                <select name="gender" class="form-control" id="">
                                                    <option value="{{ $data->gender }}">{{ $data->gender }}</option>
                                                    <option value="PRIA">Pria</option>
                                                    <option value="WANITA">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Level </label>
                                                <select name="roles" class="form-control" id="">
                                                    <option value="{{ $data->roles }}">{{ $data->roles }}</option>
                                                    <option value="ADMIN">Admin</option>
                                                    <option value="SISWA">Siswa</option>
                                                    <option value="GURU">Guru</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if ($data->roles == 'SISWA')
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select name="class_students_id" class="form-control" id="">
                                                    <option value="{{ $data->class_students_id }}">
                                                        {{ $data->class->name }}
                                                    </option>
                                                    @foreach ($class as $class )
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @else

                                            @endif

                                        </div>
                                        </template>
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

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    Vue.use(Toasted);
  var register = new Vue({
    el: "#levelUser",
    data(){
        return{
            level: "USER",
        }
    },
  });
</script>
@endpush