<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>
	<meta charset="utf-8">
	<title><?php echo SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
	<meta name="keywords" content="monero, block, transaction, payment id, blockexplorer, richlist, hashrate, difficulty, explorer, blockchain, xmr">
	<meta name="description" content="Monero blockchain explorer -  XMR blocks, transactions, payment ids, hashrate, emission. We show it all. ">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--	<meta name="google-site-verification" content="LrH8eGW-k9EFwLgRMLXW7AzzdkyBJ0JQBhdsG9P2Gxw" /> -->
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!--	<link href='//fonts.googleapis.com/css?family=Ubuntu+Mono:400,400italic,700,700italic' rel='stylesheet' type='text/css'> -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/css/grayscale.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="/assets/img/favico_monero.ico" />
	<!-- Custom Fonts -->
	<link href="/assets/fonts-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

	<div id="wrapper">

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-default">
				<div class="navbar-header">
					<a href="http://moneroblocks.info" title="Monero blocks - blockchain explorer" class="navbar-brand">
					<div class="pull-left">
						<img src="/assets/img/monero-block-explorer.png" alt="Monero block explorer"/>
					</div>
						 <span class="light">blocks</span>
					</a>
				</div>
<?php if(!isset($data['nonav']) || $data['nonav'] != 1 ){?>

				<ul class="nav navbar-nav">
					<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
					<li class="hidden active">
						<a href="#page-top"></a>
					</li>
					<li>
						<a class="page-scroll" href="/">Explorer</a>
					</li>

					<li>
		                            <a class="page-scroll" href="/stats">Stats</a>

					</li>
                                        <li>
                                            <a class="page-scroll" href="/richlist">Rich List</a>
                                        </li>
                			<li>
		   			    <a class="page-scroll" href="/api">API</a>
		                        </li>
				</ul>
<?php } ?>
<?php if(!isset($data['nosearch']) || $data['nosearch'] != 1 ){ ?>
				<form id="frmSearch" action="/search/">
					<div class="input-group custom-search-form">
						<input type="text" class="form-control" placeholder="Search by block height / block hash / transaction hash / payment id" id="txt_search">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit" id="btn_search">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
<?php } ?>
				<!-- /.sidebar-collapse -->
			</div>

        </div>
        <!-- /.container -->
    </nav>

 	<div id="page-wrapper">

