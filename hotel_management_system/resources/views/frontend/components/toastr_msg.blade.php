{{-- error message --}}

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',

                message: '{{ $error }}',
            });
        </script>
    @endforeach

@endif

@if (session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'center',

            message: '{{ session()->get('error') }}',
        });
    </script>
@endif



{{-- success message --}}

@if (session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif
