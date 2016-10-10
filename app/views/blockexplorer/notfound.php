        <div class="row">
		<div class="col-lg-12">
                	<h3 class="page-header">Uh-oh</h3>
		</div>
                <!-- /.col-lg-12 -->
        </div>
        <br>
        <div class="row">
                <div class="col-lg-12">
			<p>
<?php // var_dump($data); ?>
<?php if(!empty($data['type'])){ ?>
                        Shame on you!<br>
			There is no such thing as <?php echo $data['type']; ?> <?php echo $data['id']; ?> in Monero's blockchain!
<?php }else{ ?>
                        Nothing found.
<?php } ?>
			</p>
                </div>
                <!-- /.col-lg-12 -->
        </div>
