<?php

namespace BilbioModule\Model\Po;

use BiblioModule\Model\Po\basePO;

/**
 * 
 * @author julien.keruzec
 *
 */
class CataloguePO extends basePO {

	/**
	 * 
	 * @var int
	 */
	protected $id;
	
	/**
	 * 
	 * @var String
	 */
	protected $code;

	/**
	 * 
	 * @var String
	 */
	protected $description;



	/**
	 * 
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 
	 * @param unknown $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

}
