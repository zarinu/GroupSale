@extends('layouts.admin')
@section('title', 'لیست محصولات')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-body" style="overflow-x: auto;">
                    <table id="empTable" class="table table-bordered table-responsive table-responsive-xxl table-hover table-striped">
                        <thead>
                        <tr>
                            <th> عکس </th>
                            <th> نام محصول </th>
                            <th> slug </th>
                            <th> دسته بندی </th>
                            <th> قیمت </th>
                            <th> موجودی </th>
                            <th> وضعیت </th>
                            <th> امتیاز </th>
                            <th> تاریخ ثبت </th>
                            <th> تعداد نوع محصول </th>
                            <th> تعداد ویژگی ها </th>
                            <th> عملیات </th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div> <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            // Initialize
            $('#empTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.products.grid') }}",
                columns: [
                    { data: 'thumbnail' },
                    { data: 'name' },
                    { data: 'slug' },
                    { data: 'category_id' },
                    { data: 'price',
                        render: function (data, type, row) {

                            if (type === 'display' || type === 'filter') {
                                return new Intl.NumberFormat('fa-IR').format(data) + ' تومان';
                            }

                            return data; // for sorting & type processing
                        }
                    },
                    { data: 'stock' },
                    { data: 'status' },
                    { data: 'rating_avg' },
                    { data: 'created_at' },
                    { data: 'variants_count' },
                    { data: 'attributes_count' },
                    { data: 'action', orderable:false },
                ],
                "oLanguage": {
                    "sUrl": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
                },
            });
        });
    </script>
@endpush