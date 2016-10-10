<div class="col-lg-10 col-lg-offset-1">

	<div class="row">
		<div class="col-lg-12"  style="text-overflow: ellipsis; overflow-x:hidden;">
			<h1 class="page-header">
				API Documentation
			</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<br />

	<div class="row">
		<!-- /.col-lg-4 -->
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					How to use
					</h4>
				</div>
				<div class="row">&nbsp;</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-5 doc-text">
							<p>To invoke an API method, it should be made a GET request with params separated by slashs.  The first param should be the method to invoke. The response is issue in JSON.</p>
						</div>
						<div class="col-sm-7 doc-code">
							<blockquote>API ENDPOINT</blockquote>
							<pre><code class="json">http://moneroblocks.info/api/</code></pre>
						</div>
						<div class="col-sm-7 doc-code">
							<blockquote>URI Request Format</blockquote>
							<pre><code class="json">http://moneroblocks.info/api/{method}/{param1}/{param2}/</code></pre>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-5 doc-text">

						</div>
						<div class="col-sm-7 doc-code">
							<blockquote>JSON Response Example</blockquote>
<pre><code class="json">{
   "status":"ERROR",
   "error":"Block not found",
   "method":"get_block_header",
   "param_value":"s"
}</code></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.col-lg-4 -->
	</div>

	<div class="row">
		<!-- /.col-lg-4 -->
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					{get_stats}
					</h4>
				</div>
				<div class="panel-body">
					<div class="row">&nbsp;</div>
					<div class="row">
						<div class="col-sm-5 doc-text">
							<p> :Request current coin stats</p>
						</div>
						<div class="col-sm-7 doc-code">
							<blockquote><code class="json">http://moneroblocks.info/api/get_stats/</code></blockquote>
						</div>
						<div class="col-sm-12 doc-code">
							<p>JSON Response</p>
<pre><code class="json api-example">{
   "difficulty":857854576,
   "height":493168,
   "hashrate":14297576.266667,
   "current_emission":6892313564273197407,
   "last_reward":11019174126253,
   "last_timestamp":1427371888
}</code></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.col-lg-4 -->
	</div>

	<div class="row">
		<!-- /.col-lg-4 -->
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					{get_block_header}
					</h4>
				</div>
				<div class="panel-body">
					<div class="row">&nbsp;</div>
					<div class="row">
						<div class="col-sm-5 doc-text">
							<p> :Request a given block header by height or hash</p>
						</div>
						<div class="col-sm-7 doc-code">
							<blockquote><code class="json">http://moneroblocks.info/api/get_block_header/{height}</code></blockquote>
							<blockquote><code class="json">http://moneroblocks.info/api/get_block_header/{hash}</code></blockquote>
						</div>
						<div class="col-sm-12 doc-code">
							<p>JSON Response</p>
<pre><code class="json api-example">{
   "block_header":{
      "depth":101635,
      "difficulty":42822738260,
      "hash":"1aad696889727fd2b00f571f9b116c6dcf8169457fb5554dee27258ab6ed772e",
      "height":5898,
      "major_version":1,
      "minor_version":0,
      "nonce":745838533,
      "orphan_status":false,
      "prev_hash":"90dbd09f741ba8c6871e066a557215cd8aaf9a99d07e0d92caa02f9df03c730c",
      "reward":134544907000000,
      "timestamp":1413485348
   },
   "status":"OK"
}</code></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.col-lg-4 -->
	</div>

	<div class="row">
		<!-- /.col-lg-4 -->
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					{get_block_data}
					</h4>
				</div>
				<div class="panel-body">
					<div class="row">&nbsp;</div>
					<div class="row">
						<div class="col-sm-5 doc-text">
							<p> :Request a given block data by height or hash</p>
						</div>
						<div class="col-sm-7 doc-code">
							<blockquote><code class="json">http://moneroblocks.info/api/get_block_data/{height}</code></blockquote>
							<blockquote><code class="json">http://moneroblocks.info/api/get_block_data/{hash}</code></blockquote>
						</div>
						<div class="col-sm-12 doc-code">
							<p>JSON Response</p>
<pre><code class="json api-example">{
   "status":"OK",
   "block_data":{
      "major_version":1,
      "nonce":746851441,
      "prev_id":"2aa7b7c6a44729cabaaf5b938eb25d598fd19ca71e5c7bba829ee0ab475c120d",
      "minor_version":0,
      "timestamp":1417645872,
      "flags":0,
      "miner_tx":{
         "version":1,
         "unlock_time":75235,
         "vin":[
            {
               "gen":{
                  "height":75175
               }
            }
         ],
         "vout":[
            {
               "amount":600000,
               "target":{
                  "key":"2b917108db3580712debc5a8945dc8f30f61e441f0e0e59bc0f160ecfa4df0bb00"
               }
            },
            {
               "amount":1000000,
               "target":{
                  "key":"6c059b149824da0b029e8d00c9920935ac8ce050a964cadce1336635c9ac475600"
               }
            },
            {
               "amount":300000000,
               "target":{
                  "key":"ec2688976373aa8392f7455f1dba2299ccbdb83851aeefa28aa8f883349ca4fa00"
               }
            },
            {
               "amount":8000000000,
               "target":{
                  "key":"46faa74b35ee1a40b5f34d1f2abeaa3ea8abf8291aebe8f63bfe586e7d3a11d000"
               }
            },
            {
               "amount":70000000000,
               "target":{
                  "key":"72db0906835f33bf5c95dd5244e265d5529d41020bbf27d446d5efb9d540656300"
               }
            },
            {
               "amount":300000000000,
               "target":{
                  "key":"6fb2cf29ec8c0675557eae03039887d05eb71ac01859e1d8071d0f21ee1b283100"
               }
            },
            {
               "amount":1000000000000,
               "target":{
                  "key":"a4913c55836e6d3280f272ac31f4dac8932534b5c775adf255d1cff2f7aa22f000"
               }
            },
            {
               "amount":70000000000000,
               "target":{
                  "key":"eacf9e9fd83f7e496ac7211f485648eff61b69fc29a690ed5566476a10060d5500"
               }
            },
            {
               "amount":7137830160000,
               "target":{
                  "key":"3a56ee21b690e08c1161b3b0fa0ad687e51bdcba7a22cd3012712556f4580cbc00"
               }
            },
            {
               "amount":793092240000,
               "target":{
                  "key":"583be632c25ed1491fb10c274115510603778dc7d748da927320fa8bdf2f93ff00"
               }
            }
         ],
         "extra": [ 1, 163, 51, 94, 214, 113, 1, 65, 205, 162, 61, 176, 14, 133, 126, 40, 234, 156, 237, 174, 133, 254, 75, 37, 189, 181, 175, 165, 200, 250, 80, 110, 183, 2, 30, 48, 46, 54, 46, 54, 46, 49, 40, 48, 46, 49, 45, 103, 52, 48, 98, 56, 57, 102, 48, 41, 0, 0, 0, 5, 89, 208, 205, 227, 0
         ],
         "signatures":[

         ]
      },
      "tx_hashes":[
         "7c8d1a884732c50368abf78b7cf6dc607742734f71779704e050717c2c21d7a0",
         "b276603025c788f7ca8a7940419829a0d06eaf8da33d2fe87f0cec9f689ae9b5",
         "2acbef47861b11007baca7aca291b077bb53125bec8ad900d510cdd4a1766efd",
         "dcfff05a01e642f768935da72cf08cd49299641f68a86f8297ccf45583ea6d7e",
         "718b239908b112ac3f1d7c67187033bbdb47ee913a98412cbd50191db6a6992e"
      ]
   }
}</code></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.col-lg-4 -->
	</div>

	<div class="row">
		<!-- /.col-lg-4 -->
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					{get_transaction_data}
					</h4>
				</div>
				<div class="panel-body">
					<div class="row">&nbsp;</div>
					<div class="row">
						<div class="col-sm-5 doc-text">
							<p> :Request a given transaction by hash</p>
						</div>
						<div class="col-sm-7 doc-code">
							<blockquote><code class="json">http://moneroblocks.info/api/get_transaction_data/{hash}</code></blockquote>
						</div>
						<div class="col-sm-12 doc-code">
							<p>JSON Response</p>
<pre><code class="json api-example">{
   "status":"OK",
   "transaction_data":{
      "version":1,
      "unlock_time":0,
      "vin":[
         {
            "key":{
               "amount":80000000000000,
               "key_offsets":[
                  12264
               ],
               "k_image":"d3c1df0e5e3986795a7c0c25958f0cb64d01a8e73f71607f158c826f94af223b"
            }
         }
      ],
      "vout":[
         {
            "amount":1000000000,
            "target":{
               "key":"617c35bc8e9e9a69ae04fee3a4776efe908dc412213d182ec9e01ae99ad0c06100"
            }
         },
         {
            "amount":3000000000,
            "target":{
               "key":"1c5e7782bbd6e34e0dd222075617e721e0c8d061aeaaa5784abf06bd3399a6ef00"
            }
         },
         {
            "amount":6000000000,
            "target":{
               "key":"c2ae4fd38aae5bc92f8a24a53ba0b18485b11065616984110c1ec269bb2e01be00"
            }
         },
         {
            "amount":8000000000,
            "target":{
               "key":"0078edd9df9174a5175b55863187dd65afdbe5a190b4ab32fbea2e9d6c853c7d00"
            }
         },
         {
            "amount":8000000000,
            "target":{
               "key":"be73c6cb0566394282d467374136aa192c1df4118fbb69c174391d5ba690da5b00"
            }
         },
         {
            "amount":8000000000,
            "target":{
               "key":"08461dd27200103e426855d564d77a3880cf803e356475a2312536ade3ec088d00"
            }
         },
         {
            "amount":9000000000,
            "target":{
               "key":"101c94607c7352fb2cb2fa8c5d1a0277aabed0efa03d518a10238d772a62385d00"
            }
         },
         {
            "amount":9000000000,
            "target":{
               "key":"5ccc5653817579da32247661c86dc16c13d18f8bb58af68d7bf038dade1f308000"
            }
         },
         {
            "amount":10000000000,
            "target":{
               "key":"bddb6d242a5b712171c410a7791e8fd3d9255f3e8a2e5fa4430746158541c48c00"
            }
         },
         {
            "amount":10000000000,
            "target":{
               "key":"a875d8b179aefc458c1b504f67ea372944665ba34f99c8d7f84fb41d07b9463800"
            }
         },
         {
            "amount":20000000000,
            "target":{
               "key":"14b8adb96b49937b0521a562bd6898b47208ebb2b983dde53b7049540ae29cc600"
            }
         },
         {
            "amount":30000000000,
            "target":{
               "key":"f891fa36cd14cc26c4ea79c6acb4f69fde3a1d0d8b065a6202b5895a4c646cae00"
            }
         },
         {
            "amount":50000000000,
            "target":{
               "key":"9fee400ca605f79ec90e1181d16a8457db7fced3fe82e01f870dde536ba926d300"
            }
         },
         {
            "amount":50000000000,
            "target":{
               "key":"4766180ae169949f271729aa539c938715cdc8edb761a891c8ac62a461b9c5f000"
            }
         },
         {
            "amount":60000000000,
            "target":{
               "key":"437be53e54afd1ce08e56a6fe960a41b7257be3ed6b07a3c5d4dc4f8881e128900"
            }
         },
         {
            "amount":70000000000,
            "target":{
               "key":"2cd73822490a3bc6a72933c7dbc19da3540e8d641a4a6d4e630fadf69a839d1e00"
            }
         },
         {
            "amount":70000000000,
            "target":{
               "key":"d8d1039e53d2735ab3c01350f899bbd7f06f7e19f4dfd772986ac9d23b72ff5000"
            }
         },
         {
            "amount":80000000000,
            "target":{
               "key":"d4ce9e739c41ebdb6125d89c2da55c04d4d20d6dc57a557a30829dbcd16c353500"
            }
         },
         {
            "amount":80000000000,
            "target":{
               "key":"5324427d94cab092847907be0d89839a1a9392c69cbf825794c2ede2776e9cc500"
            }
         },
         {
            "amount":100000000000,
            "target":{
               "key":"2ed971f8bcbda2b48ba597b68460f599d5359595f3f9da6d6d7c143a6d09c90b00"
            }
         },
         {
            "amount":100000000000,
            "target":{
               "key":"456f1c162650799b019843c4e58167695554e598c7b2682b212cd2243b6c22f700"
            }
         },
         {
            "amount":100000000000,
            "target":{
               "key":"2d48ba4afbace6f2ce450bc3cea99262a4a6e365676610608bcb4d28dfafe31200"
            }
         },
         {
            "amount":200000000000,
            "target":{
               "key":"6babbb8c6b295f1719d38d5c701d261ad435bceb7511880e04428a6e26abad4200"
            }
         },
         {
            "amount":300000000000,
            "target":{
               "key":"d9a47554fdaea37cc0baa937df2230b6fec9f8440de1573bb43a84204b8070d200"
            }
         },
         {
            "amount":400000000000,
            "target":{
               "key":"9a92d6531c1743ab82efdcce076213ccebac8a5a8972722ea97e95c8b512583700"
            }
         },
         {
            "amount":400000000000,
            "target":{
               "key":"026281510a799e645feb08087c58b70c12cbd7448a90b6db868d84219493b9f600"
            }
         },
         {
            "amount":400000000000,
            "target":{
               "key":"dc6353b57a6c7ef4e55cfcd36bc5bcf84e5c27f6fa796d1bacb77c3786566fac00"
            }
         },
         {
            "amount":600000000000,
            "target":{
               "key":"dd6c59c2ecca53ccd1296d745e340f3e81c576b9eaa5afd87d677528003ee0ba00"
            }
         },
         {
            "amount":800000000000,
            "target":{
               "key":"19095724696643189f9e4d50685e886ccf41bbb0b5bada1287394a8a1121a9d400"
            }
         },
         {
            "amount":2000000000000,
            "target":{
               "key":"697d2a3eba77c819f2a7686e126e3bb6c0b1652bd772be24b9073235677c6b2600"
            }
         },
         {
            "amount":2000000000000,
            "target":{
               "key":"fdc6b23765ced0f4cd8ff2f82a4b4b20c2c460d4501cc1e3fa9c9ff255ad0a7f00"
            }
         },
         {
            "amount":3000000000000,
            "target":{
               "key":"9a2e6ffdc0abc75453e0efd25b578f7eb782a63e1b8451034f006012a69f4ca700"
            }
         },
         {
            "amount":5000000000000,
            "target":{
               "key":"12f25686ed987cba378ff3d80d9fe2dd4952d873607372e5671352a9118d262d00"
            }
         },
         {
            "amount":7000000000000,
            "target":{
               "key":"1b0dfcc21ef058c9100e7aa1a039bfcc69e58ffa2fc57c7b436d238b18a6d3dd00"
            }
         },
         {
            "amount":7000000000000,
            "target":{
               "key":"fdc8b67871199d340acf02f5e4309342aa48c289f0f1dd891b87470f7d35873e00"
            }
         },
         {
            "amount":10000000000000,
            "target":{
               "key":"1d903a6bbfa184f274f54621b718d5f354e51e97a98a2e90e438d394ba1e56b900"
            }
         },
         {
            "amount":40000000000000,
            "target":{
               "key":"5c7ee0a214126d421cad69456a179504bde0d26bd49ed4505691adc7846a280500"
            }
         }
      ],
      "extra": [ 1, 221, 108, 196, 58, 177, 194, 65, 163, 127, 241, 197, 54, 174, 218, 93, 120, 220, 207, 82, 18, 186, 16, 85, 55, 124, 128, 86, 95, 202, 183, 213, 23
      ],
      "signatures":[
         [
            "72cccc99dd1bbcb5d12a20210c062711b5e2280103073f5b1989dd3c401b300cb0cffa1a0bb7a2fadc79921a449c0a4b1f5968a709bfe5735a4762e64914d501"
         ]
      ]
   }
}</code></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.col-lg-4 -->
	</div>
</div>
