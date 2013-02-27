<?php

namespace BiblioModule\Model\Ps;

use BiblioModule\Tech\ServiceHandler;

/**
 * 
 * @author julien.keruzec
 *
 */
class CrudEntityPS extends ServiceHandler {
	
	/**
	 * 
	 * @param unknown $entity
	 */
	public function create($entity) {
		$this->getDocumentManager()->persist($entity);	
	}
	
	/**
	 * 
	 * @param unknown $entity
	 */
	public function remove($entity) {
		$this->getDocumentManager()->remove($entity);
	}
	
	/**
	 * 
	 * @param unknown $entity
	 */
	public function detach($entity) {
		$this->getDocumentManager()->detach($entity);
	}
	
	/**
	 * 
	 * @param unknown $detachedEntity
	 */
	public function merge($detachedEntity) {
		$this->getDocumentManager()->merge($detachedEntity);
	}
	
	/**
	 * 
	 * @param string $entity
	 */
	public function commit($entity = null) {
		$this->getDocumentManager()->flush($entity);
	}
	
	
}