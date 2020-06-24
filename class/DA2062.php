<?php
/*
 * Builds 2062 from data
 *
 * @author		Tyler J Barnes
 * @contact		tylerb.code@gmail.com
 * @company		DogJaw Tech
 */

class DA2062 {

	// HHC, basic (see example data), ** CAN ADD MORE TYPES IN HERE **
	public $_malType;

	public $_headerData = [];
	public $_soldierData = [];


	public function __construct($header = array(), $soldier = array(), $maltype = "HHC") {

		try {

			$this->_malType = $maltype;

			$this->parseHeaderData($header);
			$this->parseSoldierData($soldier);


		} catch (Exception $e) { die("<span style=\"color:red\">{$e->getMessage()}</span>"); }


	}


	public function parseHeaderData($header) {

		if(empty($header) || count($header) < 1) { return false; }

		$this->parseHeadByMALType($header);

		return true;
	}


	public function parseSoldierData($soldier) {

		$this->parseSoldByMALType($soldier);
		return true;
	}



	public function parseHeadByMALType($data) {

		$func = "{$this->_malType}MAL";
		if(!method_exists($this, $func)) {
			throw new Exception("Bad MAL Type {$this->_malType}");
		}

		$this->$func($data);
	}


	public function parseSoldByMALType($data) {
		$func = "{$this->_malType}MALSoldierData";
		if(!method_exists($this, $func)) {
			throw new Exception("Bad MAL Type {$this->_malType}");
		}

		$this->$func($data);
	}


	public function basicMAL($header) {

		foreach($header as $idx => $head) {
			if(empty($head) || strlen(trim($head)) < 1) {
				throw new Exception("Header Data is fucked up");
			}

			$this->_headerData[$idx] = trim($head);
		}

	}


	public function HHCMAL($header) {

		$this->basicMAL($header);
	}



	public function HHCMALSoldierData($soldier) {

		foreach($soldier as $idx => $sold) {
			if(count($sold) < 4 || $sold[2] == "UNASSIGNED") continue;
			$this->_soldierData[] = $this->findHHCIssuedItems($sold);
		}
	}



	public function findHHCIssuedItems($soldier) {
		return array("POS" => "", "NAME" => "{$soldier[1]} {$soldier[2]}, {$soldier[3]}", "RACK" => $soldier[0],
						$soldier[4] => $soldier[5], $soldier[6] => $soldier[7], $soldier[8] => $soldier[9], $soldier[10] => $soldier[11], "NUMISSUED" => 4);
	}


	public function basicMALSoldierData($soldier) {

		if(empty($soldier) || count($soldier) < 1) { return false; }

		foreach($soldier as $idx => $sold) {
			if(count($soldier[$idx]) != count($this->_headerData)) {

				// TODO ADD IN LOGIC TO CHECK FOR EMPTYNESS
				//  --> cuz if its an actual soldier just missing data, need to fix
				continue;
				//throw new Exception("Bad data for Soldier(s) [ {$sold[1]}");
			}

			$this->_soldierData[] = $this->findBasicIssuedItems($sold);
		}

		return true;
	}



	public function findBasicIssuedItems($soldier) {

		$tmpSoldier = array(
			"POS"	=>	$soldier[0],
			"NAME"	=>	$soldier[1],
			"RACK"	=>	$soldier[2],
		);

		$numItemsIssued = 0;

		for($idx = 3; $idx < count($soldier); $idx++) {
			if(!empty($soldier[$idx]) && strlen(trim($soldier[$idx])) > 0) {
				$tmpSoldier[$this->_headerData[$idx]] = $soldier[$idx];
				$numItemsIssued++;
			}
		}

		$tmpSoldier["NUMISSUED"] = $numItemsIssued;

		return $tmpSoldier;
	}

}


?>
