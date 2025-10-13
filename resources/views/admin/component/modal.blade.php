@props([
    'id', // <- nếu không có default, bắt buộc phải truyền
    'title' => 'Modal Title',
    'color' => 'primary',
    'img' => 'assets/images/extra/card/btc.png',
    'badge' => 'Disable Services',
    'date' => '07 Oct 2024',
    'content' => [],
    'saveButtonText' => 'Save changes'
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-{{ $color }}">
                <h6 class="modal-title m-0 text-white" id="{{ $id }}Label">{{ $title }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3 text-center align-self-center">
                        <img src="{{ $img }}" alt="" class="img-fluid">
                    </div><!--end col-->
                    <div class="col-lg-9">
                        <h5>{{ $title }}</h5>
                        <span class="badge bg-light text-dark">{{ $badge }}</span>
                        <small class="text-muted ms-2">{{ $date }}</small>
                        <ul class="mt-2 mb-0">
                            @foreach($content as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end modal-body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-{{ $color }} btn-sm">{{ $saveButtonText }}</button>
            </div><!--end modal-footer-->
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div><!--end modal-->