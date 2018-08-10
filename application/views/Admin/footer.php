 <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2016-2017 <a href="learningfromscratch.online">Job Portal</a>.</strong> All rights
    reserved.
    </div>
  </footer>
  <div class="control-sidebar-bg"></div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.19/features/searchHighlight/dataTables.searchHighlight.min.js"></script>
      <script src="js/adminlte.min.js"></script>
    <script type="text/javascript">
  $(function () 
  {
    var maxHieght =0;
    $(".fixHeight").each(function()
    {
      maxHieght = ($(this).height() > maxHieght ? $(this).height() : maxHieght);
    })
    $(".fixHeight").height(maxHieght);
  })
</script>
 <script type="text/javascript">
  $(function () 
  {
    var oTable = $("#mytable").dataTable(
      {
        "ajax" : {
        "url" :"<?= site_url('searchcontroller')?>",
        "dataSrc" : "",
        "data" : function(d)
        {
          
        }
        }
      });

    oTable.on( 'draw', function () {
        var body = $( oTable.table().body() );
 
        body.unhighlight();
        body.highlight( oTable.search() );  
    } );

    $("#myform").on("submit" , function(e)
    {
      e.preventDefault();
      oTable.api().ajax.reload(null ,false);
    })
  });
</script>
  
  </body>
</html>
