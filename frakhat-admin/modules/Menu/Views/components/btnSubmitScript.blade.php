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

