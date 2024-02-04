<?php

	
	class UniformatLeve2Manager extends DBManager {

		public function addUniformatLevel2(Uniformat2 $Uniformat2){
			$query       = $this->db->prepare( "INSERT INTO uniformat_level2 (level1_id, name) VALUES (:level1_id,:name);" );
			return $query->execute( array(
                "level1_id" => $Uniformat2->getLevel2Id(),
				"name" => $Uniformat2->getName(),
			) );
		}

		public function editUnoformat2(Uniformat2 $Uniformat2){
			$query       = $this->db->prepare( "UPDATE `uniformat_level2` SET `name`= :name;" );
			return $query->execute( array(			
				"name" 			=> $Uniformat2->getName(),
				
			) );
		}

		public function deleteUniformat2($id) {
        	$query = $this->db->prepare("DELETE FROM `uniformat_level2` WHERE `id` = :id;");
        	return $query->execute(['id' => $id]);
    	}


	}

?>