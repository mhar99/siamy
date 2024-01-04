<footer>
    <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> &diams; <a href="#">Kelompok10</a>. </strong>
</footer>

  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('sources/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('sources/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('sources/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('sources/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('sources/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('sources/js/off-canvas.js') }}"></script>
  <script src="{{ asset('sources/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('sources/js/template.js') }}"></script>
  <script src="{{ asset('sources/js/settings.js') }}"></script>
  <script src="{{ asset('sources/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('sources/js/dashboard.js') }}"></script>
  <script src="{{ asset('sources/js/Chart.roundedBarCharts.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
  <!-- End custom js for this page-->
  

<!-- page script -->
<script>
    function inputAngka(e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }
        return true;
    }

    function sikap(e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (charCode > 31 && (charCode < 49 || charCode > 52)){
            return false;
        }
        return true;
    }
    
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });

    // $(function () {
    //     $("#example1").DataTable();
    //     $('#example2').DataTable({
    //         "paging": false,
    //         "lengthChange": false,
    //         "searching": false,
    //         "ordering": false,
    //         "info": false,
    //         "autoWidth": true,
    //     });
    // });
    
    // $(document).ready(function () {
    //     bsCustomFileInput.init();
    // });

    $(function () {
        // //Initialize Select2 Elements
        // $('.select2').select2()

        // //Initialize Select2 Elements
        // $('.select2bs4').select2({
        // theme: 'bootstrap4'
        // })

        //Datemask dd/mm/yyyy
        // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        // $('[data-mask]').inputmask()

        //Date range picker
        // $('#reservation').daterangepicker()
        // //Date range picker with time picker
        // $('#reservationtime').daterangepicker({
        // timePicker: true,
        // timePickerIncrement: 30,
        // locale: {
        //     format: 'MM/DD/YYYY hh:mm A'
        // }
        // })
        // //Date range as a button
        // $('#daterange-btn').daterangepicker(
        // {
        //     ranges   : {
        //     'Today'       : [moment(), moment()],
        //     'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //     'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        //     'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //     'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        //     'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        //     },
        //     startDate: moment().subtract(29, 'days'),
        //     endDate  : moment()
        // },
        // function (start, end) {
        //     $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        // }
        // )

        //Timepicker
        // $('#timepicker').datetimepicker({
        // format: 'LT'
        // })
        
        // //Bootstrap Duallistbox
        // $('.duallistbox').bootstrapDualListbox()

        // //Colorpicker
        // $('.my-colorpicker1').colorpicker()
        // //color picker with addon
        // $('.my-colorpicker2').colorpicker()

        // $('.my-colorpicker2').on('colorpickerChange', function(event) {
        // $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        // });

        // $("input[data-bootstrap-switch]").each(function(){
        // $(this).bootstrapSwitch('state', $(this).prop('checked'));
        // });
    });

    // const Toast = Swal.mixin({
    //     toast: true,
    //     position: 'bottomRight',
    //     showConfirmButton: false,
    //     timer: 3000
    // });
    
    // $(function () {
    //     $('.textarea').summernote()
    // })
</script>

@yield('js')

@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif
@if (Session::has('success'))
    <script>
        toastr.success("{{ Session('success') }}");
    </script>
@endif
@if (Session::has('warning'))
    <script>
        toastr.warning("{{ Session('warning') }}");
    </script>
@endif
@if (Session::has('info'))
    <script>
        toastr.info("{{ Session('info') }}");
    </script>
@endif
@if (Session::has('error'))
    <script>
        toastr.error("{{ Session('error') }}");
    </script>
@endif

</body>
</html>

