@if (session('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('success')}}</strong>
    </div>
@endif