<?php

	
	class UniformatLevel1Manager extends DBManager {

		public function addUniformatLevel1(Uniformat1 $Uniformat1){
			$query       = $this->db->prepare( "INSERT INTO uniformat_level1 (name) VALUES (:name);" );
			return $query->execute( array(
				"name" => $Uniformat1->getName(),
			) );
		}

		public function editUnoformat1(Uniformat1 $Uniformat1){
			$query       = $this->db->prepare( "UPDATE `uniformat_level1` SET `name`= :name;" );
			return $query->execute( array(			
				"name" 			=> $Uniformat1->getName(),
				
			) );
		}

		public function deleteUniformat1($id) {
        	$query = $this->db->prepare("DELETE FROM `` WHERE `id` = :id;");
        	return $query->execute(['id' => $id]);
    	}


	}

?>