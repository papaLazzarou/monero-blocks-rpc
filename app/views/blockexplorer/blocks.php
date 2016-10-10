<?php
	$height = $data['block_height'];
	$previous = ($height > 0 ? $height-1 : $height);
	$next = $height+1;
?>

            <div class="row">
                <div class="col-lg-12"  style="text-overflow: ellipsis; overflow-x:hidden;">
                    <h3 class="page-header">
			<i class="fa fa-cube fa-fw"></i> Block 
				<a href="<?php echo $previous; ?>">
					<small><i class="fa fa-chevron-left"></i></small>
				</a>
						<?php echo $height; ?>
						<a href="<?php echo $next; ?>">
								<small><i class="fa fa-chevron-right"></i></small>
						</a>
					<small><?php echo $data['block_hash']; ?></small>
					</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<br>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-6">
			<ul class="list-group">
				<li class="list-group-item">
					<i class="fa fa-arrows-v fa-fw"></i> Height
					<span class="pull-right text-muted small"><em><?php echo $height; ?></em></span>
				</li>
				<li class="list-group-item">
					<i class="fa fa-clock-o fa-fw"></i> Timestamp
					<span class="pull-right text-muted small"><em><?php echo $data['block_timestamp']; ?> UTC</em></span>
				</li>
                                <li class="list-group-item">
                                        <i class="fa fa-database fa-fw"></i> Block difficulty
                                        <span class="pull-right text-muted small"><em><?php echo $data['block_diff']; ?></em></span>
                                </li>
                                <li class="list-group-item">
                                        <i class="fa fa-arrows-h fa-fw"></i> Block size (bytes)
                                        <span class="pull-right text-muted small"><em><?php echo $data['block_size']; ?></em></span>
                                </li>
			</ul>
		</div>
		<div class="col-sm-6">
			<ul class="list-group">
				<li class="list-group-item">
					<i class="fa fa-arrows-h fa-fw"></i> Cumulative Difficulty
					<span class="pull-right text-muted small"><em><?php echo $data['block_cumulative_diff']; ?></em></span>
				</li>
                                <li class="list-group-item">
                                        <i class="fa fa-arrows-h fa-fw"></i> Total Generated Coins
                                        <span class="pull-right text-muted small"><em><?php echo $data['total_generated_coins']; ?></em></span>
                                </li>
				<li class="list-group-item">
					<i class="fa fa-exchange fa-fw"></i> Transactions
					<span class="pull-right text-muted small"><em><?php echo $data['block_tx_nr']; ?></em></span>
				</li>
<!--
				<li class="list-group-item">
					<i class="fa fa-database fa-fw"></i> Transactions size
					<span class="pull-right text-muted small"><em><?php //echo $data['block_transactions']; ?></em></span>
				</li>
-->
			</ul>
                </div>
	</div>

        <div class="row">
        <!-- /.col-lg-4 --> 
		<div class="col-sm-12">
	       	        <div class="panel panel-primary">
               	        	<div class="panel-heading large">
                       			Coinbase Transaction
	        	        </div>
        		 </div>
			<div class="panel panel-default panel-table">
                        	<div class="panel-heading">
                	               	<div class="row">
        	                               	<div class="col-xs-2 col-sm-6 col-md-7 hash-header">Hash</div>
		                                <div class="col-xs-6 col-sm-3 col-md-4">Amount</div>
        	                               	<div class="col-xs-1 col-sm-1 col-md-1">Bytes</div>
                	               	</div>
                        	</div>
				<?php $coinbase_tx = $data['coinbase_tx']; ?>
	                       	<div class="panel-body">
        	               		<div class="row show-grid top-row">
						<a href="../tx/<?php echo $coinbase_tx->hash ?>"></a>
        	        	               	<div class="col-xs-2 col-sm-6 col-md-7 hash">
                	                        	<?php echo $coinbase_tx->hash ?>
                        	       		</div>
	                       			<div class="col-xs-6 col-sm-3 col-md-4"><?php printf(MONEY,$coinbase_tx->amount/COIN); ?></div>
        	                		<div class="col-xs-1 col-sm-1 col-md-1"><?php echo $coinbase_tx->tx_size ?> </div>
	                        	</div>
				</div>
			</div>
		</div>
                <!-- /.col-lg-4 -->
	</div>
        <!-- /.row -->

	<div class="row">
        <!-- /.col-lg-4 -->

        <div class="col-sm-12">
		<div class="panel panel-primary">
                	<div class="panel-heading large">
                            Transactions (<?php echo $data['block_tx_nr']; ?>)
                        </div>
		</div>
                <div class="panel panel-default panel-table">
                        <div class="panel-heading">
				<div class="row">
					<div class="col-xs-2 col-sm-6 col-md-7 hash-header">Hash</div>
					<div class="col-xs-6 col-sm-3 col-md-2">Output total</div>
					<div class="col-xs-3 col-sm-2 col-md-2">Fee</div>
					<div class="col-xs-1 col-sm-1 col-md-1">Bytes</div>
				</div>

		<?php
		$block_transactions = $data['block_tx'];
//		$tx_array = $data['tx_array'];
							$i = 0;
		 foreach($block_transactions as $transaction) {
//	 	 $details = $tx_array[$i];
		?>
			</div>
                        <div class="panel-body">
                            <div class="row show-grid top-row">
				<a href="../tx/<?php echo $transaction->hash ?>"></a>
				<div class="col-xs-2 col-sm-6 col-md-7 hash"><?php echo $transaction->hash ?></div>
				<div class="col-xs-6 col-sm-3 col-md-2"><?php printf(MONEY,$transaction->amount / COIN); ?></div>
				<div class="col-xs-3 col-sm-2 col-md-2"><?php printf(MONEY,$transaction->fee / COIN); ?></div>
				<div class="col-xs-1 col-sm-1 col-md-1"><?php echo $transaction->tx_size ?> </div>
                            </div>
		<?php
			$i++;
		}
		?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
