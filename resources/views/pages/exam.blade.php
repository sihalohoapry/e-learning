@extends('layouts.app')
@section('title')
Ujian
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ujian</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('exam.create') }}" class="btn btn-primary mb-3">
                                + Tambah Ujian
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID Ujian</th>
                                            <th>Nama Ujian</th>
                                            <th>Kelas</th>
                                            <th>Guru Pengampuh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
<script>
    var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide:true,
            ordering:true,
            ajax:{
                url: '{!! url()->current() !!}',
            },
            columns:[
                {data:'id', name: 'id'},
                {data:'name', name: 'name'},
                {data:'class.name', name: 'class.name'},
                {data:'user.name', name: 'user.name'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ]
        });
</script>
@endpush