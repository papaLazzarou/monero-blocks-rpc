<br/>
<div id="wide-header" class="row">
  <div class="col-xs-12 col-lg-12 text-left">
    <h5><span class="page-header large"><i class="fa fa-bullseye fa-fw"></i> median block size of the last n blocks </span></h5>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
  <div class="col-xs-12 col-lg-12">
    <div class="panel panel-default panel-table">
      <div class="panel-heading">
        <div class="row ">
          <div class="col-xs-3 col-sm-1 col-md-2">last blocks </div>
          <div class="col-xs-2 col-sm-1 col-md-1">200</div>
          <div class="col-xs-2 col-sm-1 col-md-1">400</div>
          <div class="col-xs-5 col-sm-3 col-md-1">600</div>
          <div class="col-xs-12 col-sm-6 col-md-1">800</div>
          <div class="col-xs-12 col-sm-6 col-md-1">1000</div>
        </div>
      </div>
<?php 

//$medians = $data['median'];
?>
        <div class="row show-grid top-row">
          <div class="col-xs-3 col-sm-1 col-md-2">&nbsp;</strong></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $data['median200'] ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $data['median400'] ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $data['median600'] ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $data['median800'] ?></div>
          <div class="col-xs-5 col-sm-3 col-md-1"><?php echo $data['median1000'] ?></div>
        </div>
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-4 -->

</div>
<!-- /.row -->
