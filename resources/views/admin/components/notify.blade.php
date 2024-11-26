<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
    // Kiểm tra và hiển thị thông báo từ session
    @php
        $toastTypes = ['success', 'error', 'warning', 'info'];
    @endphp

    @foreach ($toastTypes as $type)
        @if (session($type))
            toastr.{{ $type }}("{{ session($type) }}");
        @endif
    @endforeach
</script>
