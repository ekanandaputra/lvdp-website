<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/template/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('assets/template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('assets/template/js/sb-admin-2.min.js')}}"></script>
<!-- Page level plugins -->
<script src="{{asset('assets/template/vendor/chart.js/Chart.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{asset('assets/template/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/template/js/demo/chart-pie-demo.j')}}"></script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

<script>
  $('#bologna-list a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>