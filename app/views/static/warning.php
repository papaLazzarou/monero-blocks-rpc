<div>
<h1>Prepare for the hardfork - Block 1009827 </h1>
<h4><a href="http://myrcraft.com/xmr.html">Monero Forkening Countdown Clock by our community member <strong>jwinterm</strong></a></h4>
<hr/>

<h4> Thanks <strong>debruyne</strong> for <a href="https://bitcointalk.org/index.php?topic=753252.msg14222154#msg14222154">compiling the following information (bitcointalk link)</a> </h4>

<hr/>
<p>
<a href="https://github.com/monero-project/bitmonero/releases/tag/v0.9.2"> Monero v0.9.2 - Hydrogen Helix - released! (Urgent and important bug fixes for the upcoming hard fork)</a>
<br/><br/>
<b>This has urgent and important bug fixes to 0.9.0 Hydrogen Helix:</b>
<ul style="font-size:1.2em;margin-top:-35px;padding-top:0px;">
<li>Major performance and size improvements to the LMDB database implementation</li>
<li>Urgent and important bug fixes for the upcoming hard fork</li>
<li>Huge bug fixes to the database hard fork handling</li>
<li>New simplewallet flag to restore from keys</li>
<li>Initial work on a wallet library / API</li>
<li>Updated in-source block headers</li>
</ul>
</p>

<p>
<b>General hardfork information:</b>
<br/>
Background:
<br/>
<a href="https://forum.getmonero.org/4/academic-and-technical/303/a-formal-approach-towards-better-hard-fork-management">A formal approach towards better hard fork management (forum.getmonero.org)</a>
<br/>
<br/>
What are the change(s) with the upcoming hard fork on the 20th of March?
<ul style="font-size:1.3em;">
	<li>
		Blocktime is bumped from 1 to 2 minutes. See:
		<a href="https://forum.getmonero.org/20/general-discussion/2401/increasing-the-block-time">Increasing the block time (forum.getmonero.org)</a>
	</li>
	<li>
		Minimum blocksize is bumped to 60 KB. See:
		<a href="https://forum.getmonero.org/20/general-discussion/2409/increasing-the-minimum-block-size">Increasing the minimum block size (forum.getmonero.org)</a>
	</li>
	<li>
		Finally, the recommendations from the MRL team stated in MRL-0004, of which the minimum mixin >= 3 is probably the most salient. See:
		<a href="https://lab.getmonero.org/pubs/MRL-0004.pdf">MRL-0004: Improving Obfuscation in the CryptoNote Protocol (PDF)</a>
	</li>
</ul>
</p>
<p>
P.S. Due to variance the hard fork will likely be on the 21th or 22th of March. A specific block height was determined for the hardfork, not a specific date. The specific blockheight for the hardfork can be found here:

<a href="https://github.com/monero-project/bitmonero/blob/master/src/cryptonote_core/blockchain.cpp#L83"> version 2 starts from block 1009827 (github.com)</a>

</p>

</div>
