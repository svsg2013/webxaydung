@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.partial.errors')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table id="datatable-fixed-header" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    @foreach($cates as $cate)
                        <tr>
                            <td>{{$cate->email}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jstable')

    <!--js table-->
    <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.colVis.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables/dataTables.fixedColumns.min.js')}}"></script>

    <!-- init -->
    <script src="{{asset('public/backend/pages/jquery.datatables.init.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({keys: true});
            $('#datatable-responsive').DataTable();
            $('#datatable-colvid').DataTable({
                "dom": 'C<"clear">lfrtip',
                "colVis": {
                    "buttonText": "Change columns"
                }
            });
            $('#datatable-scroller').DataTable({
                ajax: "{{asset('public/backend/plugins/datatables/json/scroller-demo.json')}}",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
            var table = $('#datatable-fixed-col').DataTable({
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    leftColumns: 1,
                    rightColumns: 1
                }
            });
        });
        TableManageButtons.init();

    </script>
@endsection