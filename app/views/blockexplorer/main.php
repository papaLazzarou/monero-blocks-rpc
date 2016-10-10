<?php
  $block_list = $data['block_list'];
  $last_block = $block_list[count($block_list)-1];
//echo count($block_list);
//var_dump($last_block);
?>
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    <h3 class="page-header"><i class="fa fa-chain fa-fw"></i> Latest blocks</h3>
                    <div class="col-xs-12" id="previous-blocks" >
			<span class="pull-right"><a href="/browser/blocks/<?php echo $last_block['height']-1; ?>"><small>Previous blocks >></small></a></span>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- /.col-lg-8 -->
                <div class="col-xs-12 col-lg-12">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row ">
				<div class="col-xs-3 col-sm-1 col-md-1 first-column">Height</div>
				<div class="col-xs-2 col-sm-1 col-md-1">Size</div>
				<div class="col-xs-2 col-sm-1 col-md-1">Tx</div>
				<div class="col-xs-5 col-sm-3 col-md-2">Timestamp</div>
                                <div class="col-xs-12 col-sm-6 col-md-2 hash-header" >Block Hash</div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

			<?php
//			$block_list = $data['block_list'];
			foreach($block_list as $block) {
			?>
                        	<div class="row show-grid top-row">
					<a href="block/<?php echo $block['height'] ?>"></a>
					<div class="col-xs-3 col-sm-1 col-md-1"><strong class="primary-font"><?php echo $block['height'] ?></strong></div>
					<div class="col-xs-2 col-sm-1 col-md-1"><?php echo $block['size'] ?></div>
					<div class="col-xs-2 col-sm-1 col-md-1"><?php echo $block['tx_count'] ?></div>
					<div class="col-xs-5 col-sm-3 col-md-2"><?php echo date('Y-m-d H:i:s ',$block['timestamp']) ?></div>
                                	<div class="col-xs-12 col-sm-6 col-md-7 hash"><?php echo $block['hash'] ?></div>
                           	 </div>
			<?php
			}
			?>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                     <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
