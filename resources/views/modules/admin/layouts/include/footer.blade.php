  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; {{date('Y')}} <a href="https://adminlte.io">Admin Panel</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <div class="control-sidebar-bg"></div>
  <!-- jQuery 2.2.3 -->
  <script src='{{ asset("public/themes/admin/plugins/")}}/jQuery/jquery-2.2.3.min.js'></script>
  <!-- Bootstrap 3.3.6 -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

  <script src="{{asset('public/toaster/toastr.min.js')}}"></script>

  <script src='{{ asset("public/themes/admin/")}}/js/bootstrap.min.js'></script>
  <!-- FastClick -->
  <script src='{{ asset("public/themes/admin/plugins/")}}/fastclick/fastclick.js'></script>
  <!-- AdminLTE App -->
  <script src='{{ asset("public/themes/admin/")}}/js/app.min.js'></script>
  <!-- Sparkline -->
  <script src='{{ asset("public/themes/admin/plugins/")}}/sparkline/jquery.sparkline.min.js'></script>
  <!-- jvectormap -->
  <script src='{{ asset("public/themes/admin/plugins/")}}/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
  <script src='{{ asset("public/themes/admin/plugins/")}}/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
  <!-- SlimScroll 1.3.0 -->
  <script src='{{ asset("public/themes/admin/plugins/")}}/slimScroll/jquery.slimscroll.min.js'></script>
  <!-- ChartJS 1.0.1 -->
  <script src='{{ asset("public/themes/admin/plugins/")}}/chartjs/Chart.min.js'></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes)
{{ asset("administrator/")}}/js/dashboard2.js
-->

<script src='{{ asset("public/themes/admin/plugins/")}}/datatables/jquery.dataTables.min.js'></script>
<script src='{{ asset("public/themes/admin/plugins/")}}/datatables/dataTables.bootstrap.min.js'></script>

<script src='{{ asset("public/themes/admin/plugins/")}}/daterangepicker/moment.min.js'></script>
<script src='{{ asset("public/themes/admin/plugins/")}}/datepicker/bootstrap-datepicker.js'></script>
<script src='{{ asset("public/themes/admin/plugins/")}}/daterangepicker/daterangepicker.js'></script>
<script src='{{ asset("public/themes/admin/plugins/colorpicker/bootstrap-colorpicker.min.js")}}'></script>

<script src='{{ asset("public/themes/admin/plugins/")}}/fancybox/jquery.fancybox.min.js'></script>
<script src='{{ asset("public/themes/admin/js/jquery.bootstrap-growl.min.js")}}'></script>
<!-- <script src='{{ asset("js/notify.js")}}'></script> -->
<script src="{{ asset('public/themes/admin/plugins/select2/select2.full.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src='{{ asset("public/themes/admin/")}}/js/demo.js'></script>
<script src='{{ asset("public/themes/admin/")}}/js/dialog.js'></script>

<!-- <script src="{{asset('toaster/toastr.min.js')}}" type="text/javascript"></script> -->

<script src='{{ asset("public/ckeditor/ckeditor.js")}}'></script>

<script type="text/javascript" src="{{asset('public/tooltip/jquery-validate.bootstrap-tooltip.js')}}"></script>
<script type="text/javascript" src="{{asset('public/tooltip/jquery-validate.bootstrap-tooltip.min.js')}}"></script>

<script src='{{ asset("public/js/common.js")}}'></script>
<script src='{{ asset("public/js/adminlte.min.js")}}'></script>



 <script>
        var editor = CKEDITOR.replace( 'description', {

        });
        CKEDITOR.config.allowedContent = true;
    </script>





<script type="text/javascript">
  function resetField() {
        $('#dataTableBuilder').dataTable().fnDraw(false);
        $('#addEdit')[0].reset();
        $('[data-repeater-list]').empty();
        $('#createJobcardArea').html('');
        $('#form-errors').html('');
        $('input[name=imageDisplay]').val('');
        $('input[name=id]').val('');
        $('#form-errors').html('');
    }
</script>
<script type="text/javascript">
  $(window).load(function(){
     $('.loader').fadeOut();
});
</script>
<script type="text/javascript">

$(document).on("click","#select_all",function(){

  check_uncheck_data();

})
//=====CHECK ALL DATA
  function check_uncheck_data()
  {
    if($("#select_all").prop("checked"))
    {
      $(".select_checkbox_value").prop("checked",true);
    }
    else
    {
      $(".select_checkbox_value").prop("checked",false);
    }
  }
</script>
 @include('admin::layouts.include.flashmessage')
