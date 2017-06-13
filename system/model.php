<?php
namespace System;

class Model{
	protected $db;
	public $_tabela;

	public function __construct(){
		require (__DIR__ . '/../app/config/database.php');
		$this->db = new \PDO('mysql:host=' . $db['hostname'] . ';dbname=' . $db['database'], $db['username'], $db['password']);
	}
	
	// public function criar( $objeto ){
		// $class = get_class( $objeto );
		// $objeto = ( Array ) $objeto;

		// $dados = array();
		// foreach ($objeto as $key => $value) {
		// 	if ( $value != "" ) $dados[str_replace( $class, "", $key )] = $value;
		// }

		// $campos = implode(", ", array_keys( $dados ));
		// $valores = "'" . implode("','", array_values($dados))."'";
		
		// echo "INSERT INTO {$this->_tabela} (id, {$campos}) VALUES (NULL, {$valores})";
		
		// $sql = $this->db->query( "INSERT INTO 
		// 	{$this->_tabela} 
		// 	(id, {$campos}) 
		// 	VALUES 
		// 	(NULL, {$valores})" );

		// if (!$sql){
		// 	echo "<pre>";
		// 	print_r( $this->db->errorInfo() );
		// 	echo "</pre>";
		// }

		// die;

	// 	return;
	// }
	
	public function listar($class, Array $select = null ){
		$fields = ( isset($select['fields']) ? "{$select['fields']}" : "*");
		$join = ( isset($select['join']) ? "{$select['join']}" : "");
		$where = ( isset($select['where']) ? "WHERE {$select['where']}" : "");
		$limit = ( isset($select['limit']) ? "LIMIT {$select['limit']}" : "");
		$offset = ( isset($select['offset']) ? "OFFSET {$select['offset']}" : "");
		$orderby = ( isset($select['orderby']) ? "ORDER BY {$select['orderby']}" : "");
		
		$sql = $this->db->prepare( "SELECT {$fields} FROM {$this->_tabela} {$join} {$where} {$orderby} {$limit} {$offset}" );
			// echo "<pre>";
			// print_r($sql);
			// echo "</pre>";
			// die;
		$sql->setFetchMode(\PDO::FETCH_CLASS, $class);
		$sql->execute();

		//$sql->setFetchMode(\PDO::FETCH_ASSOC);
		return $sql->fetchAll();
	}

	public function listarUm($class, Array $select = null ){
		$fields = ( isset($select['fields']) ? "{$select['fields']}" : "*");
		$join = ( isset($select['join']) ? "{$select['join']}" : "");
		$where = ( isset($select['where']) ? "WHERE {$select['where']}" : "");
		$limit = ( isset($select['limit']) ? "LIMIT {$select['limit']}" : "");
		$offset = ( isset($select['offset']) ? "OFFSET {$select['offset']}" : "");
		$orderby = ( isset($select['orderby']) ? "ORDER BY {$select['orderby']}" : "");
		
		$sql = $this->db->prepare( "SELECT {$fields} FROM {$this->_tabela} {$join} {$where} {$orderby} {$limit} {$offset}" );

		// print_r($sql);die;
		$sql->setFetchMode(\PDO::FETCH_CLASS, $class);
		$sql->execute();

		//$sql->setFetchMode(\PDO::FETCH_ASSOC);
		return $sql->fetch();
	}
	
	// public function atualizar( Array $dados, $where ){
		// foreach ( $dados as $indice => $valor){
		// 	$campos[] = "{$indice} = '{$valor}'";
		// }
		// $campos = implode(", ", $campos);
		// $this->db->query( "UPDATE {$this->_tabela} SET {$campos} WHERE {$where}" );
		// return $campos;
	// }
	
	public function deletar( $where ){
		return $this->db->query( "DELETE FROM {$this->_tabela} WHERE {$where}" );
	}
}