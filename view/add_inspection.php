<?php 
session_start();

include "../model/DBManager.class.php";
include "../controller/dbConnection.php";
include "../view/header.php";
include "../view/sidebar.php";

 if (isset($_SESSION['valid']) == true) {

 	$_SESSION['property_edit'] = false ;
    $_SESSION['propertyId'] = null;
    $_SESSION['inspection_edit'] = false ;
    $_SESSION['inspectionId'] = null;
 
    $current_user_name      = $_SESSION['user_name'] ;
    $current_user_id        = $_SESSION['user_id'];
    $current_password       = $_SESSION['user_password'];
    $current_user_type      = $_SESSION['user_type'];
    $current_user_email     = $_SESSION['user_email'];
    $current_user_status    = $_SESSION['user_status'];


    $query    = $db2->query( "SELECT*FROM uniformat_level1 ");
    $Uniformat1     = $query->fetchAll( PDO::FETCH_ASSOC );
    $query2    = $db2->query( "SELECT*FROM uniformat_level2");
    $Uniformat2     = $query2->fetchAll( PDO::FETCH_ASSOC );
    $query3    = $db2->query( "SELECT*FROM uniformat_level3 ");
    $Uniformat3     = $query3->fetchAll( PDO::FETCH_ASSOC );
    
   

    $_SESSION['property_edit'] = false ;
    $_SESSION['propertyId'] = null;

    $id 			      = "";
    $propertyName			      = "";
    $address			      = "";
    $propertyType			      = "";
    $landSurface 			      = "";
    $buildingSurface 			      = "";
    $unitNumber			      = "";
    $floorNumber			      = "";
    $basement 			      = "";
    $majorElement 			      = "";
    $elementGroup 			      = "";
    $description 			      = "";
    $observation			      = "";
    $individualElement			      = "";
    $action			      = "";
    $location			      = "";
    $cost 			      = "";
    $term 			      = "";
    $image1 			      = "";
    $image2 			      = "";
    $conclusion 			      = "";
    $inspector			      = "";
    $dateOfInspection 			      = "";
    $status 			      = "";
    $user_id= "";
    		
		  
    }else{
    die("Page Not Available !");
  }



?>
         <div class="text">Inspection</div>
        </div>
        <div class="position-absolute top-0 end-0">
            <nav class="navbar bg-transparent">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit"><i class='bx bx-search'></i></button>
                    </form>
                    <a href="unit.php" class="btn btn-warning ms-3" >Ajouter une inspection</a>
                </div>
            </nav>
        </div>
         
        <div class="affichage">
        </div>
        <div class="row" id="row">
        	<div class="col-sm-12" id="detail" style="width: 93%;margin-left: 50px;">
                <div class="card bg-transparent">
                            <div class="card-body">
                                <div class="prophead">
                                    <h5 class="card-title">Unit Details</h5>
                                    
                                </div>
                                <div class="scroller">
                                    <div class="card" style="width: 100%;">
                                        <div class="card-body ">

    <form enctype="multipart/form-data" action="../controller/InspectionController.php" method="POST">
    <table class="table table-bordered border-secondary" id="tbl">
        <tbody>
            <!-- Basic Information -->
            <tr>
                <td class="td-title">Nom de la propriété :</td>
                <td> 
					  <select name="propertyName" id="properrtyName">
                        <?php 

                            $query    = $db2->query( "SELECT id, user_id, propertyName, address, numberOfFloors, numberOfUnits, propertyImage, image1, image2, image3, image4, image5, length, breadth, height, depth, totalSquareFeet, currentValue, dateOfConstruction, buildingMaterialStructure, lastRenovationDate, propertyCertification, commonAreas, facilities, amenities, accessibility, securitySystem, accessControlSystem, parkingSpots, parkingFee, parkingAmount, parkingAmountMonthly, image, building_name, property_type, location, region, manager_id, land_breadth, land_length, square_feet, features_selection_list, building_certification, type_of_rent, rent, rate_per_square_feet, lease_date, status FROM property WHERE user_id = $current_user_id");
                            $properties     = $query->fetchAll( PDO::FETCH_ASSOC );

                            foreach ($properties as $property) {
                                ?>
                                    <option value="<?php echo $property['id'];?>"><?php echo $property['propertyName'];?></option>

                                <?php
                            }

                        ?>
					  </select>
            </tr>
            <tr>
                <td class="td-title">Adresse</td>
                <td><input type="text" id="address" name="address" value="<?php echo $address;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Type de propriété</td>
                <td><input type="text" id="propertyType" name="propertyType" value="<?php echo $propertyType;?>"></td>
            </tr>

         
            <tr>
                <td class="td-title">Superficie du terrain</td>
                <td><input type="number" id="landSurface" name="landSurface" value="<?php echo $landSurface;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Superficie du bâtiment</td>
                <td><input type="number" name="buildingSurface" id="buildingSurface" value="<?php echo $buildingSurface;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Numéro d'unité</td>
                <td><input type="number" name="unitNumber" id="unitNumber" value="<?php echo $unitNumber;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Niveau</td>
                <td><input type="number" name="floorNumber" id="floorNumber" value="<?php echo $floorNumber;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Sous-sol</td>
                <td>
                  <select type="text" name="basement" id="basement">
                    <option value="<?php echo $basement;?>">Oui</option>
                    <option value="<?php echo $basement;?>">Non</option>
                  </select>
                </td>
            </tr>
            <tr>
                <td class="td-title">Élément majeur</td>
                <td>
                  <select type="text" name="majorElement" id="majorElement">
                    <option desabled selected value="">Sélectionnez un élément</option>
                   <?php foreach($Uniformat1 as $Uniformat1S)   { ?>
                    <option value="<?php echo $Uniformat1S['name'];   ?>"><?php echo $Uniformat1S['name'];   ?></option>


                    <?php } ?>
                  </select>
                </td>
            </tr>
            <tr>
                <td class="td-title">Groupe d'élements</td>
                <td>
                  <select type="text" name="elementGroup" id="elementGroup">
                    <option desabled selected value="">Sélectionnez un élément</option>
                   <?php foreach($Uniformat2 as $Uniformat2S)   { ?>
                    <option value="<?php echo $Uniformat2S['name'];   ?>"><?php echo $Uniformat2S['name'];   ?></option>


                    <?php } ?>
                  </select>
                </td>
            </tr>
            <tr>
                <td class="td-title">Description</td>
                <td><input type="text" name="description" id="description" value="<?php echo $description;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Observation</td>
                <td><input type="text" name="observation" id="observation" value="<?php echo $observation;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Élement individuel</td>
                <td>
                  <select type="text" name="individualElement" id="individualElement">
                    <option desabled selected value="">Sélectionnez un élément</option>
                   <?php foreach($Uniformat3 as $Uniformat3S)   { ?>
                    <option value="<?php echo $Uniformat3S['name'];   ?>"><?php echo $Uniformat3S['name'];   ?></option>


                    <?php } ?>
                  </select>
                </td>
            </tr>
            <tr>
            <tr>
                <td class="td-title">Action</td>
                <td><input type="text" name="action" id="action" value="<?php echo $action;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Localisation</td>
                <td><input type="text" name="location" id="location" value="<?php echo $location;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Coûts</td>
                <td>
                  <select type="text" name="cost" id="cost">
                  <option value="<?php echo $cost;?>"> 0 - $5000,00</option>
                  <option value="<?php echo $cost;?>"> $5000,00 - $10.000,00</option>
                  <option value="<?php echo $cost;?>"> $10.000,00 - $20.000,00</option>
                  <option value="<?php echo $cost;?>"> $20.000,00 - $50.000,00</option>
                  <option value="<?php echo $cost;?>"> + $50.000,00</option>
                  </select>
                </td>
            </tr>
            <tr>
                <td class="td-title">Échéance</td>
                <td><input type="text" name="term" id="term" value="<?php echo $term;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Image 1</td>
                <td><input type="file"  name="image1" id="image1"></td>
            </tr>
            <tr>
                <td class="td-title">Image 2</td>
                <td><input type="file"  name="image2" id="image2"></td>
            </tr>
            <tr>
                <td class="td-title">Conclusion</td>
                <td><input type="text" name="conclusion" id="conclusion" value="<?php echo $conclusion;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Inspecteur</td>
                <td><input type="text" name="inspector" id="inspector" value="<?php echo $inspector;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Date d'inspection</td>
                <td><input type="date" name="dateOfInspection" id="dateOfInspection" value="<?php echo $dateOfInspection;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Statut</td>
                <td><input type="text" name="status" id="status" value="<?php echo $status;?>"></td>
            </tr>
          
            
            <!-- Add more rows for other fields -->
        </tbody>
    </table>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user_id;?>">
<input type="submit" id="Add_inspection" name="Add_inspection" value="+ Inspection">


    
    
</form>
	</div>
</div></div></div></div></div></div>
        </div>
      

      
    
                    
         


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../view/assets/js/main.js"></script>
        <script>

        </script>

    </section>
</body>
</html>
