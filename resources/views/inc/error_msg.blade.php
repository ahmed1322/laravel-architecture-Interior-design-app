@if (session('error_msg'))
<div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error_msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif