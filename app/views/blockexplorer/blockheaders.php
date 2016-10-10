	<div id="wide-header" class="row">
        	<div class="col-xs-12 col-lg-12 text-center">
                   	<h5><span class="page-header large"><i class="fa fa-chain fa-fw"></i> Blockbrowser</span></h5>

<?php if($data['previous'] < $data['last_height']){ ?>
                	<span class="pull-left">
                      		<a href="/browser/blocks/<?php echo $data['previous']; ?>">
					<i class="fa fa-chevron-left fa-1x"></i>&nbsp;Higher
				</a>
                  	</span>
<?php } ?>
<?php if($data['next'] > 0){ ?>
                  	<span class="pull-right">
				<a href="/browser/blocks/<?php echo $data['next']; ?>">
					Lower&nbsp;<i class="fa fa-chevron-right fa-1x"></i>
				</a>
                  	</span>
<?php } ?>

		</div>
                <!-- /.col-lg-12 -->
	 </div>
         <!-- /.row -->

         <div class="row">
		<div class="col-xs-12 col-lg-12">
                	<div class="panel panel-default panel-table">
	                        <div class="panel-heading">
        	                    <div class="row ">
                	                <div class="col-xs-3 col-sm-1 col-md-1">Height</div>
                        	        <div class="col-xs-2 col-sm-1 col-md-1">Size</div>
                                	<div class="col-xs-2 col-sm-1 col-md-1">Tx</div>
	                                <div class="col-xs-5 col-sm-3 col-md-2">Timestamp</div>
        	                        <div class="col-xs-12 col-sm-6 col-md-2 hash-header" >Block Hash</div>
	                            </div>
        	                </div>
                        	<div class="panel-body">

		<?php
			$block_list = $data['block_list'];

			 foreach($block_list as $block) {
		?>

				<div class="row show-grid top-row">
					<a href="/block/<?php echo $block['height'] ?>"></a>
					<div class="col-xs-3 col-sm-1 col-md-1"><strong class="primary-font"><?php echo $block['height'] ?></strong></div>
                                        <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $block['size']; ?></div>
                                        <div class="col-xs-2 col-sm-3 col-md-1"><?php echo $block['tx_count']; ?></div>
					<div class="col-xs-5 col-sm-3 col-md-2"><?php echo date('Y-m-d H:i:s ',$block['timestamp']) ?></div>
	                                <div class="col-xs-12 col-sm-12 col-md-7 hash" ><?php echo $block['hash'] ?></div>
	                        </div>
		<?php
			} 
		?>
<?php if($data['previous'] < $data['last_height']){ ?>
                        <span class="pull-left">
                                <a href="/browser/blocks/<?php echo $data['previous']; ?>">
                                        <i class="fa fa-chevron-left fa-1x"></i>&nbsp;Higher
                                </a>
                        </span>
<?php } ?>
<?php if($data['next'] > 0){ ?>
                        <span class="pull-right">
                                <a href="/browser/blocks/<?php echo $data['next']; ?>">
                                        Lower&nbsp;<i class="fa fa-chevron-right fa-1x"></i>
                                </a>
                        </span>
<?php } ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                     <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
