@extends('layouts.admin')
@section('title', 'لیست دوره های فعال کاربران')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="card">



                <!-- filter inputs -->
                <div class="row mb-2 card-header">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="filter_date">فیلتر بر اساس تاریخ ثبت: </label>
                            <input id="filter_date" class="normal-example form-control" style="width: 250px; display: inline-block;">
                            <input id="alt-field-example" type="hidden"/>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="filter_has_course" class="control-label mr-2">داشتن دوره:</label>
                            <select class="form-control" id="filter_has_course" name="filter_has_course">
                                <option disabled selected>انتخاب کنید</option>
                                @foreach(\App\Models\Course::all() as $course)
                                    <option {{old('filter_has_course', !empty($student_photo) ? $student_photo->filter_has_course : null) == $course->id ? 'selected' : ''}} value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="filter_has_not_course" class="control-label mr-2">نداشتن دوره:</label>
                            <select class="form-control" id="filter_has_not_course" name="filter_has_not_course">
                                <option disabled selected>انتخاب کنید</option>
                                @foreach(\App\Models\Course::all() as $course)
                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3 d-flex align-items-end ml-0">
                        <div class="row">
                            <div class="col m-1">
                                <button id="filter_btn" class="btn btn-primary">اعمال فیلتر</button>
                            </div>
                            <div class="col m-1">
                                <button id="exportExcel" class="btn btn-success">📥 خروجی اکسل</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body" style="overflow-x: auto;">
                    <table id="example1" class="table table-bordered table-responsive table-responsive-xxl table-hover table-striped">
                        <thead>
                        <tr>
                            <th> کاربر </th>
                            <th> موبایل </th>
                            <th> دوره </th>
                            <th> تاریخ ثبت </th>
                            <th> غیرفعال کردن دوره برای کاربر </th>
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

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/persian-datepicker.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/assets/dist/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('/assets/dist/js/persian-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        function convertPersianToEnglish(str) {
            const persianDigits = '۰۱۲۳۴۵۶۷۸۹';
            const englishDigits = '0123456789';

            return str.replace(/[۰-۹]/g, (d) => englishDigits[persianDigits.indexOf(d)]);
        }

        $(document).ready(function(){
            let table = $('#example1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('user_courses.grid') }}",
                    data: function (d) {
                        d.filter_date = convertPersianToEnglish($('#alt-field-example').val()); // ارسال مقدار فیلتر شده
                        d.filter_has_course = $('#filter_has_course').val();
                        d.filter_has_not_course = $('#filter_has_not_course').val();
                    }
                },
                columns: [
                    { data: 'user_name', name: 'user.name'},
                    { data: 'user_mobile', name: 'user.mobile'},
                    { data: 'course_name', name: 'course.name'},
                    { data: 'created_at' },
                    { data: 'action', orderable:false },
                ],
                "oLanguage": {
                    "sUrl": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
                },
            });

            // فیلتر کردن بر اساس تاریخ
            $('#filter_btn').click(function(){
                table.draw();
            });
        });

        $('.normal-example').persianDatepicker(
            {
                "format": "dddd D MMMM YYYY",
                "autoClose": true,
                "initialValue": false,
                "observer": true,
                "altFormat": "L", // X
                "altField": "#alt-field-example",
            }
        );

        $(document).ready(function () {
            $('#exportExcel').on('click', function () {
                let params = new URLSearchParams(window.location.search);
                let filter_date = convertPersianToEnglish($('#alt-field-example').val());
                let filter_has_course = $('#filter_has_course').val();
                let filter_has_not_course = $('#filter_has_not_course').val();

                params.set('filter_date', filter_date);

                // Add filter_has_course only if it has a value other than null or empty string
                if (filter_has_course) {
                    params.set('filter_has_course', filter_has_course);
                } else {
                    params.delete('filter_has_course');
                }

                // Add filter_has_not_course only if it has a value other than null or empty string
                if (filter_has_not_course) {
                    params.set('filter_has_not_course', filter_has_not_course);
                } else {
                    params.delete('filter_has_not_course');
                }

                // Redirect to Laravel export route with updated query parameters
                window.location.href = '/admin/users-courses/export-excel?' + params.toString();
            });
        });

    </script>
@endpush