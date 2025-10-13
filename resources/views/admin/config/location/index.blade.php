@extends('layouts.admin')
@section('adminContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Dastone</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center mb-3">
                            <div class="col">
                                <form id="import-location-form">
                                    @csrf
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalPrimary">
                                        Open Modal
                                    </button>
                                </form>
                            </div>
                            <div class="col text-end">
                                <div id="response-message" class="m-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Loading Overlay -->
            <div id="loading-overlay"
                style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; z-index:9999; background:rgba(0,0,0,0.5);">
                <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); color:white;">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="mt-2">{{ config('custom.messages.importing') }}</div>
                </div>
            </div>
        </div><!--end row-->

    </div><!-- container -->
@endsection

<x-admin-modal alias="modal"
    id="exampleModalPrimary"
    title="Primary Modal"
    color="primary"
    :content="['Lorem Ipsum is dummy text.', 'It is a long established reader.', 'Contrary to popular belief, Lorem simply.']"
    saveButtonText="Save changes"
/>

@push('script')
    <script>
        $(function() {
            $('#import-location-form').on('submit', function(e) {
                e.preventDefault();

                if (confirm('Bạn chắc chắn chứ!')) {
                    $('#loading-overlay').fadeIn();

                    $.ajax({
                        url: "{{ route('admin.config.location.import') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $('#loading-overlay').fadeOut();
                            $('#response-message')
                                .removeClass('alert-danger')
                                .addClass('alert alert-success')
                                .text(response.message ?? 'Import thành công.');
                        },
                        error: function(xhr) {
                            $('#loading-overlay').fadeOut();
                            let errorMessage = xhr.responseJSON?.message || 'Đã xảy ra lỗi!';
                            $('#response-message')
                                .removeClass('alert-success')
                                .addClass('alert alert-danger')
                                .text(errorMessage);
                        }
                    });
                }
            });
        });
    </script>
@endpush
