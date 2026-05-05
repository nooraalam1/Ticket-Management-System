@if (session('success'))
    <div class="alert bg-success text-white alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <h5 class="mb-0">{{ session('success') }}</h5>
    </div>
@endif

@if (session('error'))
    <div class="alert bg-danger text-white alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <h5 class="mb-0">{{ session('error') }}</h5>
    </div>
@endif
