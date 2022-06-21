@if(\Session::has('success'))
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@push('js')
    <script>
        Swal.fire(
            'Oba!',
            '{{ Session::get('success') }}',
            'success'
        )
    </script>
@endpush
@endif

@if(\Session::has('error'))
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@push('js')
    <script>
        Swal.fire(
            'Oops!',
            '{{ Session::get('error') }}',
            'error'
        )
    </script>
@endpush
@endif
