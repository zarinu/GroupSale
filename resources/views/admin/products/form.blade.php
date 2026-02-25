@extends('layouts.admin')
@section('title', $title)

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- form -->
            <div class="card card-default">

                <!-- tabs -->
                <div class="p-4">
                    <ul class="nav nav-tabs" id="productTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active"
                               id="general-tab"
                               data-toggle="tab"
                               href="#general"
                               role="tab"
                               aria-controls="general"
                               aria-selected="true">
                                اطلاعات کلی محصول
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                               id="images-tab"
                               data-toggle="tab"
                               href="#images"
                               role="tab"
                               aria-controls="images"
                               aria-selected="false">
                                عکس های محصول
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                               id="attributes-tab"
                               data-toggle="tab"
                               href="#attributes"
                               role="tab"
                               aria-controls="attributes"
                               aria-selected="false">
                                ویژگی های محصول
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                               id="variants-tab"
                               data-toggle="tab"
                               href="#variants"
                               role="tab"
                               aria-controls="variants"
                               aria-selected="false">
                                نوع محصول ها
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="productTabContent">
                        <div class="tab-pane fade show active"
                             id="general"
                             role="tabpanel"
                             aria-labelledby="general-tab">
                            @livewire('admin_products.general', ['product' => $product])
                        </div>

                        <div class="tab-pane fade"
                             id="images"
                             role="tabpanel"
                             aria-labelledby="images-tab">
                            @livewire('admin_products.images', ['product' => $product])
                        </div>

                        <div class="tab-pane fade"
                             id="attributes"
                             role="tabpanel"
                             aria-labelledby="attributes-tab">
                            @livewire('admin_products.attributes', ['product' => $product])
                        </div>

                        <div class="tab-pane fade"
                             id="variants"
                             role="tabpanel"
                             aria-labelledby="variants-tab">
                            @livewire('admin_products.variants', ['product' => $product])
                        </div>
                    </div>
                </div>
                <!-- end tabs -->





            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('/assets/admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            ClassicEditor
                .create(document.querySelector('#description-editor'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                })

            // bootstrap WYSIHTML5 - text editor

            $('.textarea').wysihtml5({
                toolbar: { fa: true }
            })
        })
    </script>
@endpush