@if (session('success'))
    <div class="container py-2">
        <div class="alert alert-success m-2">
            {{ session('success') }}
        </div>
    </div>
@endif
@if (session('fail'))
    <div class="container py-2">
        <div class="alert alert-warning m-2">
            {{ session('fail') }}
        </div>
    </div>
@endif