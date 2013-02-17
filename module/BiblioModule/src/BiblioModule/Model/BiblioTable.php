<?php
namespace Biblio\Model;

use Zend\Db\TableGateway\TableGateway;

class BiblioTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function getBiblio($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function saveBiblio(Biblio $Biblio)
	{
		$data = array(
				'artist' => $Biblio->artist,
				'title'  => $Biblio->title,
		);

		$id = (int)$Biblio->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getBiblio($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}

	public function deleteBiblio($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}
}
