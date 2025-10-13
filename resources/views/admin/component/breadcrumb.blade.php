<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">{{ $title }}</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    @foreach($items as $name => $url)
                        @if($loop->last)
                            <li class="breadcrumb-item active">{{ $name }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ $url }}">{{ $name }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>