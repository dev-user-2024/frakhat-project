<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function changeButtonText() {
        // Get the button element
        var button = document.getElementById('saveChange');

        // Change the button text to "Submitting..."
        button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>منتظر بمانید...';

        // Disable the button to prevent multiple submissions
        button.disabled = true;
    }
</script>
@if(session('success'))
    <script>
        Swal.fire({
            title: 'موفقیت آمیز',
            text: "باموفقیت ثبت شد",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'باشه'
        }).then(() => {
            window.location.href = '{{ route('teachingRequest.index') }}';
        });
    </script>
@endif
