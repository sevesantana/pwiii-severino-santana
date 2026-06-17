@if (session('success'))
    <div class="bbai-flash bbai-flash-success" role="status" aria-live="polite">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bbai-flash bbai-flash-error" role="alert">
        <ul class="bbai-flash-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

