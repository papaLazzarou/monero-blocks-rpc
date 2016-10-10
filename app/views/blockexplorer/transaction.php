            <div class="row">
                <div class="col-lg-12"  style="text-overflow: ellipsis; overflow-x:hidden;">
                    <h3 class="page-header"><i class="fa fa-exchange fa-fw"></i> Transaction <small><?php echo $data['hash']; ?></small></h3>
		<?php
		if(strlen($data['payment_id']) > 0){
		?>
                    <h4><i class="fa fa-bookmark fa-fw"></i> Payment Id: <small><?php echo $data['payment_id']; ?></small></h4>
                <?php
                }
                ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<br>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-6">
					<ul class="list-group">
                                                <li class="list-group-item">
                                                        <i class="fa fa-money fa-fw"></i> From Block
                                                        <span class="pull-right text-muted small"><em><?php echo $data['bl_height']; ?> </em>
                                                        </span>
                                                </li>
						<li class="list-group-item">
							<i class="fa fa-money fa-fw"></i> Output total
							<span class="pull-right text-muted small"><em><?php printf(MONEY, $data['amount']); ?> XMR</em>
							</span>
						</li>
						<li class="list-group-item">
							<i class="fa fa-bank fa-fw"></i> Fee
							<span class="pull-right text-muted small"><em><?php printf(MONEY, $data['fee']); ?> XMR</em>
							</span>
						</li>
						<li class="list-group-item">
							<i class="fa fa-arrows-h fa-fw"></i> Size
							<span class="pull-right text-muted small"><em><?php echo $data['tx_size']; ?> bytes</em>
							</span>
						</li>
						<li class="list-group-item">
							<i class="fa fa-arrows-h fa-fw"></i> Mixin
							<span class="pull-right text-muted small"><em><?php echo $data['tx_mixin']; ?> </em>
							</span>
						</li>
                                                <li class="list-group-item">
                                                        <i class="fa fa-unlock fa-fw"></i> Unlock 
                                                        <span class="pull-right text-muted small"><em><?php echo $data['unlock_time']; ?> </em>
                                                        </span>
                                                </li>
					</ul>
				</div>
			</div>
	<div class="row">
<?php
	if(count($data['tx_in'])>0){
?>
                <div class="col-sm-12 col-lg-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Inputs (<?php echo $data['tx_in_nr']; ?>)
						</div>
					</div>
                    <div id="inputs_panel" class="panel panel-default panel-table">
                        <div class="panel-heading">
							<div class="row">
								<div class="col-sm-1">&nbsp;</div>
								<div class="col-sm-3">Amount</div>
								<div class="col-sm-8">Key Image</div>
							</div>
						</div>
                        <div class="panel-body">

			<?php
			$tx_in = $data['tx_in'];
			 foreach($tx_in as $in) {
				 $amount = $in->amount / COIN;
			?>
	                    <div class="row show-grid top-row">
	                    	<div class="col-sm-1">
				  <button class="button output-list fa fa-plus fa-fw" data-status="O" data-vinid="<?php echo $in->vinid; ?>" title="Show participating outputs">&nbsp;</button>
				</div>
							<div class="col-sm-3 small"><?php printf(MONEY,$amount); ?></div>
							<div class="col-sm-8 key tiny"><?php echo $in->key_image; ?></div>
        	            </div>
        	            <div id="output-list-<?php echo $in->vinid; ?>" class="closed">
	        	            <div class="row small text-muted">
	        	            	<div class="col-sm-1">&nbsp;</div>
	        	            	<div class="col-sm-2">From Block</div>
	        	            	<div class="col-sm-9">Public Key</div>
	        	            </div>
<?php
	foreach ($in->offsets as $offset) {
?>
 							<div class="row show-grid small">
								<a href="../tx/<?php echo $offset->output_tx_hash ?>"></a>
	        	            				<div class="col-sm-1">&nbsp;</div>
								<div class="col-sm-2 small"><?php echo $offset->output_height; ?></div>
								<div class="col-sm-9 small"><?php echo $offset->output_public_key; ?></div>
							</div>
<!--
                                                        <div class="row show-grid small">
	        	            				<div class="col-sm-1">&nbsp;</div>
                                                                <div class="col-sm-6">Sorry for this interruption, but the mixin fairies are on strike</div>
                                                                <div class="col-sm-3"><img src="/assets/img/strike.jpg" style="width:100px;" /></div>
	        	            				<div class="col-sm-2">&nbsp;</div>
                                                        </div>
-->
<?php
	}
?>
							</div>
			<?php
			}
			?>

                        </div>
                    </div>
                </div>
<?php
}
?>
                <div class="col-sm-12 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Outputs (<?php echo $data['tx_out_nr']; ?>)
						</div>
					</div>
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">Amount</div>
					<div class="col-sm-9">Public Key</div>
				</div>
			</div>
                        <div class="panel-body">
			<?php
			$tx_out = $data['tx_out'];

			 foreach($tx_out as $out) {
				$amount = $out->amount / COIN;
			?>
				<div class="row show-grid top-row">
					<div class="col-sm-3 small"><?php printf(MONEY, $amount); ?></div>
					<div class="col-sm-9 key tiny"><?php echo $out->public_key; ?></div>
				</div>
			<?php
			}
			?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
