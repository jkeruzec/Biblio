<?php

namespace BiblioModule\Model\Po;


/**
 * Classe mère de tous les PO
 * @author julien.keruzec
 *
 */
class basePO {
	
	/**
	 * Utilise la reflection pour retourner le nom de la classe
	 * @return string nom de la classe
	 */
	public function getRepositoryName() {
		$reflection = new \ReflectionClass($this);
		return $reflection->getName();
	}
	
}