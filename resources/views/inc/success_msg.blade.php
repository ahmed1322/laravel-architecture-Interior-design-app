@if (session('success_msg'))
<div class="text-center alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success_msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif