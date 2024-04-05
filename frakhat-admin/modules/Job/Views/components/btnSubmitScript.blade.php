<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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

