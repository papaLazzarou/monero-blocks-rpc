<br/>
<div id="wide-header" class="row">
  <div class="col-xs-12 col-lg-12 text-left">
    <h5><span class="page-header large"><i class="fa fa-bullseye fa-fw"></i> median block size of the last n blocks </span></h5>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

  <table class="data-table small" >
    <thead style="background-color:#f1f1f1;">
      <tr>
        <th>Date</th>
        <th>Tx count</th>
        <th>Block count</th>
        <th>Tx per block</th>
      </tr>
    </thead>
    <tbody>

<?php// var_dump($data); ?>
<?php
	foreach ($data as $row) { //var_dump($row);
?>

        <tr>
          <td><?php echo $row->data ?><?php echo $row->hora; ?></td>
	  <td><?php echo $row->tx_count; ?></td>
	  <td><?php echo $row->block_count; ?></td>
	  <td><?php echo $row->tx_per_block; ?></td>
	</tr>

<?php } ?>

    </tbody>
  </table>
