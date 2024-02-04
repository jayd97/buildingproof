<?php

	
	class UniformatLeve3Manager extends DBManager {

		public function addUniformatLevel3(Uniformat3 $Uniformat3){
			$query       = $this->db->prepare( "INSERT INTO uniformat_level3 (level2_id, name) VALUES (:level2_id,:name);" );
			return $query->execute( array(
                "level2_id" => $Uniformat3->getLevel3Id(),
				"name" => $Uniformat3->getName(),
			) );
		}

		public function editUnoformat3(Uniformat3 $Uniformat3){
			$query       = $this->db->prepare( "UPDATE `uniformat_level3` SET `name`= :name;" );
			return $query->execute( array(			
				"name" 			=> $Uniformat3->getName(),
				
			) );
		}

		public function deleteUniformat3($id) {
        	$query = $this->db->prepare("DELETE FROM `uniformat_level3` WHERE `id` = :id;");
        	return $query->execute(['id' => $id]);
    	}


	}

?>