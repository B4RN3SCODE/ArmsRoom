<?php

foreach($da2062->_soldierData as $idx => $soldierData) {

?>
	<!-- DA-2062 -->

	<section class="sheet padding-10mm">
		<table class="DA-2062">
			<tbody><tr class="border-bold tall">
				<td colspan="8">
					<b style="font-size:10pt;">HAND RECEIPT / ANNEX NUMBER</b>
					<br>
					<small>
						For use of this form, see DA PAM 710-2-1.<br>
						The proponent agency is ODCSLOG.
					</small>
				</td>
				<td colspan="8">
					FROM:<br>
					<span class="handwritten big">HHC &nbsp;Co. Arms Room</span>
				</td>
				<td colspan="8">
					TO:<br>
					<span class="handwritten big"><?php echo $soldierData["NAME"]; ?></span></td>
				<td colspan="3">HAND RECEIPT NUMBER</td>
			</tr>
			<tr class="tall">
				<td colspan="2" class="center">
					<small>FOR<br>ANNEX/CR<br>ONLY</small>
				</td>
				<td colspan="5">END ITEM STOCK NUMBER</td>
				<td colspan="7">END ITEM DESCRIPTION</td>
				<td colspan="6">PUBLICATION NUMBER</td>
				<td colspan="4">PUBLICATION DATE</td>
				<td colspan="3">QUANTITY</td>
			</tr>
			<tr class="center short">
				<td colspan="6" rowspan="2">STOCK NUMBER<br><br><i>a.</i></td>
				<td colspan="11" rowspan="2">ITEM DESCRIPTION<br><br><i>b.</i></td>
				<td colspan="1" rowspan="2">*<br><br><i>c.</i></td>
				<td colspan="1" rowspan="2">SEC<br><br><i>d.</i></td>
				<td colspan="1" rowspan="2">UI<br><br><i>e.</i></td>
				<td colspan="1" rowspan="2">
					<small>QTY AUTH</small>
					<br><i>f.</i></td>
				<td colspan="6"><span style="float:left; margin-right:-20px;">g.</span>QUANTITY</td>
			</tr>
			<tr class="center extra short">
				<td colspan="1">A</td>
				<td colspan="1">B</td>
				<td colspan="1">C</td>
				<td colspan="1">D</td>
				<td colspan="1">E</td>
				<td colspan="1">F</td>
			</tr>

			<!-- BEGIN ISSUED ITEMS -->
		<?php foreach($soldierData as $prop => $val) {
			if($prop != "POS" && $prop != "NAME" && $prop != "RACK" && $prop != "NUMISSUED") { ?>

				<tr class="center v-center">
					<td colspan="6"><?php echo $soldierData["RACK"]; ?></td>
					<td colspan="2" style="border-right-width:0;"><?php echo $prop; ?></td>
					<td colspan="9" style="border-left-width:0;"><?php echo $val; ?></td>
					<td colspan="1"></td>
					<td colspan="1">U</td>
					<td colspan="1">EA</td>
					<td colspan="1">1</td>
					<td colspan="1">1</td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
				</tr>

		<?php }
		}
		?>
		<?php for($i = $soldierData["NUMISSUED"]; $i < 16; $i++) { ?>

				<tr class="center v-center">
					<td colspan="6"></td>
					<td colspan="2" style="border-right-width:0;"></td>
					<td colspan="9" style="border-left-width:0;"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"></td>
				</tr>

		<?php } ?>
						<!-- END ISSUED ITEMS -->

			<tr class="extra tall">
				<td colspan="27">
					* WHEN USED AS A:
					<ul>
						<li>HAND RECEIPT, enter Hand Receipt Annex Number</li>
						<li>HAND RECEIPT FOR QUARTERS FURNITURE, enter Condition Codes</li>
						<li>HAND RECEIPT ANNEX/COMPONENTS RECEIPT, enter Accounting Requirements Code (ARC)
							<div class="small" style="margin-right: 10px; float:right;">
								<b>PAGE &nbsp;&nbsp; _________ &nbsp;&nbsp; OF &nbsp;&nbsp; ________ &nbsp;&nbsp;
									PAGES</b>
							</div>
						</li>
					</ul>
				</td>
			</tr>
			<tr class="v-top" style="border-width: 0; border-top: 2pt solid #000">
				<td colspan="11" style="border-width:0;"><b style="font-size:10pt;">DA FORM 2062, JAN 82</b></td>
				<td colspan="9" style="border-width:0;">EDITION OF JAN 58 IS OBSOLETE</td>
				<td colspan="7" style="border-width:0; text-align:right;">
					<small>APD LC v2.10</small>
				</td>
			</tr>
		</tbody></table>
	</section>

<?php } ?>
