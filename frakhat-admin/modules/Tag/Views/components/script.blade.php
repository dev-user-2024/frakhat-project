<script src="{{ asset('panelStyle/app-assets/js/scripts/ui/data-list-view.min.js') }}"></script>
<script src="{{ asset('panelStyle/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('panelStyle/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('panelStyle/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('panelStyle/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('panelStyle/app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
<script src="{{ asset('panelStyle/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
<script src="{{asset('panelStyle/app-assets/js/scripts/navs/navs.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.tblData').DataTable({
            "language": {
                "paginate": {
                    "previous": "قبلی",
                    "next": "بعدی",
                },
                "sSearch": "جستجو : "
            },
            stateSave: false,
            "bDestroy": true,
            "order":[],
        });
    })
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#deleteForm').addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'آیا مطمئن هستید؟',
                text: "درصورت حذف اطلاعات باز نمیگردد",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله, حذف شود!',
                cancelButtonText: 'نه, منصرف شدم!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'منصرف شدم',
                        'error'
                    )
                }
            });
        });
    });
</script>
@if(session('success'))
    <script>
        Swal.fire({
            title: 'موفقیت آمیز',
            text: "باموفقیت حذف شد",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'باشه'
        })
    </script>
@endif
