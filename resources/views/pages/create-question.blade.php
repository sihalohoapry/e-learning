@extends('/layouts.app')
@section('title')
Buat Soal
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid" id="levelUser">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Soal</h1>
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
                                <form action="{{ route('question.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ujian</label>
                                                <select name="exams_id" class="form-control" id="">
                                                    <option value="">PILIH UJIAN</option>
                                                    @foreach ($exam as $exam )
                                                    <option value="{{ $exam->id }}">{{ $exam->name }}
                                                        ({{ $exam->class->name }})
                                                        {{ $exam->user->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pertanyaan</label>
                                                <input type="text" name="question" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pilihan A</label>
                                                <input type="text" name="multiple_choice_one" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pilihan B</label>
                                                <input type="text" name="multiple_choice_two" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pilihan C</label>
                                                <input type="text" name="multiple_choice_three" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pilihan D</label>
                                                <input type="text" name="multiple_choice_four" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Jawaban Benar</label>
                                                <input type="text" name="answer" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">Simpan</button>
                                        </div>

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