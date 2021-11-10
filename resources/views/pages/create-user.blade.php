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
                    <h1 class="m-0">Tambah User</h1>
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
                                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>No. Induk Siswa/Guru</label>
                                                <input type="text" name="main_number" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Jenis kelamin </label>
                                                <select name="gender" class="form-control" id="">
                                                    <option value=""></option>
                                                    <option value="PRIA">Pria</option>
                                                    <option value="WANITA">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Level </label>
                                                <select name="roles" class="form-control" id="level"
                                                    class="form-control" v-model="level" required>
                                                    <option value=""></option>
                                                    <option value="ADMIN">Admin</option>
                                                    <option value="SISWA">Siswa</option>
                                                    <option value="GURU">Guru</option>
                                                </select>
                                            </div>
                                        </div>
                                        <template v-if="level=='SISWA'">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select name="class_students_id" class="form-control" id=""
                                                        required>
                                                        <option value="">PILIH KELAS</option>
                                                        @foreach ($class as $class )
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </template>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" name="photo_user" class="form-control"
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