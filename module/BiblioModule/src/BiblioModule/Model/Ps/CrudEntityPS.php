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
	 * @param object $entity
	 */
	public function create($entity) {
		$this->getDocumentManager()->persist($entity);	
	}
	
	/**
	 * 
	 * @param object $entity
	 */
	public function remove($entity) {
		$this->getDocumentManager()->remove($entity);
	}
	
	/**
	 * 
	 * @param object $entity
	 */
	public function detach($entity) {
		$this->getDocumentManager()->detach($entity);
	}
	
	/**
	 * 
	 * @param object $detachedEntity
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
	
	/**
	 * 
	 * @param object $entity
	 * @param int $id
	 * @return object entity
	 */
	public function findByID($entity, $id) {
		return $this->getDocumentManager()->find($entity, $id);
	}
	
	
}