@extends('layouts.master')
@section('title', 'subscribe')
@section('scriptTop')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin-newsflash/trang-chu')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tài khoản</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin tài khoản & cập nhật</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-md-6 pl-0">
                                            <div class="responveRemove">
                                                @if (\Session::has('remove_success'))
                                                <div class="alert alert-success message">
                                                    {!! \Session::get('remove_success') !!}
                                                </div>
                                                @endif
                                            </div>
                                            <div class="response_remove">
                                            </div>
                                            <button class="btn btn-danger" id="delete_post">Xóa email đã
                                                chọn</button>
                                        </div>
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th><input type="checkbox" name="delete_all" id="checkAll"></th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Email(s)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subscribes as $key => $subscribe)
                                                <tr role="row" class="odd">
                                                    <td><input class="changes_checked" type="checkbox" name="checked[]"
                                                            value="{{$subscribe->id}}">
                                                    <td tabindex="0" class="sorting_1">{{$key + 1}}</td>
                                                    <td>{{$subscribe->email}} </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    setTimeout(function(){
        $(".message").delay(1500).fadeOut('slow');
    }, 0);
</script>
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [
          { extend: "excel", text: "Xuất dữ liệu Excel" }
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');;
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="{{asset('admin/main/send-notice/checkbox-deletes-email.js')}}"></script>
@endsection