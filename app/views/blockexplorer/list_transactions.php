	<div class="row">
		<div class="col-lg-12"  style="text-overflow: ellipsis; overflow-x:hidden;">
                	<h3 class="page-header">
				<i class="fa fa-bookmark fa-fw"></i> Payment Id
				<small><?php echo $data['payment_id']; ?></small>
  	 		</h3>
                </div>
                <!-- /.col-lg-12 -->
	</div>
	<br>

	<div class="row">
        <!-- /.col-lg-4 -->

        <div class="col-sm-12">
		<div class="panel panel-primary">
                	<div class="panel-heading large">
                            Transactions (<?php echo count($data['tx_list']); ?>)
                        </div>
		</div>
                <div class="panel panel-default panel-table">
                        <div class="panel-heading">
				<div class="row">
					<div class="col-xs-2 col-sm-6 col-md-7">Hash</div>
					<div class="col-xs-6 col-sm-3 col-md-2">Amount</div>
					<div class="col-xs-3 col-sm-2 col-md-2">Fee</div>
					<div class="col-xs-1 col-sm-1 col-md-1">Bytes</div>
				</div>

		<?php
		 foreach($data['tx_list'] as $transaction) {
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
		}
		?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
