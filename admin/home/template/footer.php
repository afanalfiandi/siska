     </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div> -->
    <strong>Copyright &copy; 2021 <a>Admin-smkn1pwt</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<!-- <script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->




<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    function formToggle(ID){
        var element = document.getElementById(ID);
        if (element.style.display === "none"){
            element.style.display = "block";
        }
        else {
            element.style.display = "none";
        }
    }
</script>
</body>
</html>