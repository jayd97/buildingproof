<?php 
session_start();

include "../model/DBManager.class.php";
include "../controller/dbConnection.php";
include 'header.php';
include 'sidebar.php';


 if (isset($_SESSION['valid']) == true) {

 	$_SESSION['property_edit'] = false ;
    $_SESSION['propertyId'] = null;
 
    $current_user_name      = $_SESSION['user_name'] ;
    $current_user_id        = $_SESSION['user_id'];
    $current_password       = $_SESSION['user_password'];
    $current_user_type      = $_SESSION['user_type'];
    $current_user_email     = $_SESSION['user_email'];
    $current_user_status    = $_SESSION['user_status'];


    
    		$id 						= "";
            $propertyCategory = "";
    		$propertyType				= "";
    		$propertyName				= "";
            $street = "";
            $city = "";
            $provinceState = "";
            $zipCode="";
            $country = "";
    		$address					= "";
    		$numberOfFloors				= "";
    		$numberOfUnits				= "";
    		$length						= "";
		    $breadth					= "";
		    $height						= "";
		    $depth						= "";
		    $totalSquareFeet			= "";
		    $currentValue				= "";
		    $dateOfConstruction			= "";
		    $buildingMaterialStructure	= "";
		    $lastRenovationDate			= "";	   
		    $propertyCertification		= "";
		    $commonAreas				= "";
		    $facilities					= "";
		    $amenities					= "";
		    $accessibility				= "";
		    $securitySystem				= "";
		    $accessControlSystem		= "";
		    $parkingSpots				= "";
		    $parkingFee					= "";
		    $parkingAmount				= "";
		    $parkingAmountMonthly		= "";
		    $image						= "";
		    $building_name				= "";
		    $property_type				= "";
		    $location					= "";
		    $region						= "";
		    $manager_id					= "";
		    $land_breadth				= "";
		    $land_length				= "";
		    $square_feet				= "";
		    $features_selection_list	= "";
		    $building_certification		= "";
		    $type_of_rent				= "";
		    $rent						= "";
		    $rate_per_square_feet		= "";
		    $lease_date					= "";
		    $status 					= "";
    }else{
    die("Page Not Available !");
  }



?>

            <div class="text">Propriétés</div>
        </div>
        <div class="position-absolute top-0 end-0">
            <nav class="navbar bg-transparent">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit"><i class='bx bx-search'></i></button>
                    </form>
                    <a href="property.php" class="btn btn-warning ms-3" >Liste des propriétés</a>
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
                                    <h5 class="card-title">Détails de la propriété</h5>
                                    
                                </div>
                                <div class="scroller">
                                    <div class="card" style="width: 100%;">
                                        <div class="card-body ">

    <form enctype="multipart/form-data" action="../controller/PropertyController.php" method="POST">
    <table class="table table-bordered border-secondary" id="tbl">
        <tbody>
            <!-- Basic Information -->
            <tr>
                <td>Catégorie :</td>
                <td>
					  <select name="propertyCategory" id="propertyCategory">
					    <option value="Residentiel" <?php if($propertyCategory == "Residentiel") echo 'selected'; ?>>Residentiel</option>
						<option value="Commercial" <?php if($propertyCategory == "Commercial") echo 'selected'; ?>>Commercial</option>

					  </select>
            </tr>
            <tr>
                <td>Type de propriété :</td>
                <td>
					  <select name="propertyType" id="propertyType">
					    <option value="Apartment" <?php if($propertyType == "Apartment") echo 'selected'; ?>>Appartement</option>
						<option value="Condominium" <?php if($propertyType == "Condominium") echo 'selected'; ?>>Condo</option>
                        <option value="Office building" <?php if($propertyType == "Office building") echo 'selected'; ?>>Immeuble de bureaux</option>
                        <option value="Medical center" <?php if($propertyType == "Medical center") echo 'selected'; ?>>Centre médical</option>
                        <option value="Hotel" <?php if($propertyType == "Hotel") echo 'selected'; ?>>Hôtel</option>
                        <option value="Mall" <?php if($propertyType == "Mall") echo 'selected'; ?>>Centre commercial</option>
                        <option value="Retail store" <?php if($propertyType == "Retail store") echo 'selected'; ?>>Magasin de détail</option>
                        <option value="Multifamily Housing Building" <?php if($propertyType == "Multifamily Housing Building") echo 'selected'; ?>>Habitation multifamiliale</option>
                        <option value="Farm land" <?php if($propertyType == "Farm land") echo 'selected'; ?>>Terre agricole</option>
                        <option value="Warehouse" <?php if($propertyType == "Warehouse") echo 'selected'; ?>>Entrepôt</option>
                        <option value="Garage" <?php if($propertyType == "Garage") echo 'selected'; ?>>Garage</option>
                        <option value="Restaurent" <?php if($propertyType == "Restaurent") echo 'selected'; ?>>Restaurent</option>
                        <option value="Multifamilial land" <?php if($propertyType == "Multifamily land") echo 'selected'; ?>>Terrain multifamilial</option>
                        <option value="Industrial" <?php if($propertyType == "Industrial") echo 'selected'; ?>>Industriel</option>
                        <option value="Miscellaneous" <?php if($propertyType == "Miscellaneaus") echo 'selected'; ?>>Divers</option>
					  </select>
            </tr>
            <tr>
                <td>Nom de la propriété :</td>
                <td><input type="text" id="propertyName" name="propertyName" value="<?php echo $propertyName;?>"></td>
            </tr>
            <tr>
                <td>Rue :</td>
                <td><input type="text" id="street" name="street" value="<?php echo $street;?>"></td>
            </tr>
            <tr>
                <td>Ville</td>
                <td><input type="text" id="city" name="city" value="<?php echo $city;?>"></td>
            </tr>
            <tr>
                <td>Province</td>
                <td><input type="text" id="provinceState" name="provinceState" value="<?php echo $provinceState;?>"></td>
            </tr>
            <tr>
                <td>Code Postal</td>
                <td><input type="text" id="zipCode" name="zipCode" value="<?php echo $zipCode;?>"></td>
            </tr>
            <tr>
                <td>Pays</td>
                <td><input type="text" id="country" name="country" value="<?php echo $address;?>"></td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td><input type="text" id="address" name="address" value="<?php echo $address;?>"></td>
            </tr>

            <!-- Property Details -->
            <tr>
                <td>Nombre de niveaux</td>
                <td><input type="number" id="numberOfFloors" name="numberOfFloors" value="<?php echo $numberOfFloors;?>"></td>
            </tr>
            <tr>
                <td>Nombre d'unités</td>
                <td><input type="number" name="numberOfUnits" id="numberOfUnits" value="<?php echo $numberOfUnits;?>"></td>
            </tr>
            <tr>
                <td>Image de la propriété</td>
                <td> <input type="file"  name="propertyImage" id="propertyImage"></td>
            </tr>
            <tr>
                <td>Image 1</td>
                <td><input type="file"  name="image1" id="image1"></td>
            </tr>
            <tr>
                <td>Image 2</td>
                <td><input type="file"  name="image2" id="image2"></td>
            </tr>
            <tr>
                <td>Image 3</td>
                <td><input type="file"  name="image3" id="image3"></td>
            </tr>
            <tr>
                <td>Image 4</td>
                <td><input type="file"  name="image4" id="image4"></td>
            </tr>
            <tr>
                <td>Image 5</td>
                <td><input type="file"  name="image5" id="image5"></td>
            </tr>
            <tr>
                <td>Longueur</td>
                <td><input type="number" name="length" id="length" value="<?php echo $length;?>"></td>
            </tr>
            <tr>
                <td>Largeur</td>
                <td><input type="number" name="breadth" id="breadth" value="<?php echo $breadth;?>"></td>
            </tr>
            <tr>
                <td>Hauteur</td>
                <td><input type="number" name="height" id="height" value="<?php echo $height;?>"></td>
            </tr>
            <tr>
                <td>Profondeur</td>
                <td><input type="number" name="depth" id="depth" value="<?php echo $depth;?>"></td>
            </tr>
            <tr>
                <td>Total de pieds carrés</td>
                <td><input type="number" name="totalSquareFeet" id="totalSquareFeet" value="<?php echo $totalSquareFeet;?>"></td>
            </tr>
            <!-- Add more rows for other fields -->

            <!-- Financial Information -->
            <tr>
                <td>Valeur actuelle</td>
                <td><input type="number" name="currentValue" id="currentValue" value="<?php echo $currentValue;?>"></td>
            </tr>
            <tr>
                <td>Date de construction</td>
                <td><input type="date" name="dateOfConstruction" id="dateOfConstruction" value="<?php echo $dateOfConstruction;?>">></td>
            </tr>
            <tr>
                <td>Structure</td>
                <td><input type="text" name="buildingMaterialStructure" id="buildingMaterialStructure" value="<?php echo $buildingMaterialStructure;?>"></td>
            </tr>
            <tr>
                <td>Dernière date de rénovation</td>
                <td><input type="date" name="lastRenovationDate" id="lastRenovationDate" value="<?php echo $lastRenovationDate;?>"></td>
            </tr>
           
            <tr>
                <td>Aires communes</td>
                <td><input type="checkbox" id="commonAreas" name="commonAreas" value="Yes" <?php if($commonAreas == "Yes") echo 'checked'; ?>><label style="margin-left: -25%;" for="commonAreas"> Yes</label>
 				</td>
            </tr>

            <tr>
                <td>Facilitiés</td>
                <td><input type="checkbox" id="facilities" name="facilities" value="Yes" <?php if($facilities == "Yes") echo 'checked'; ?>><label style="margin-left: -25%;"  for="facilities"> Yes</label></td>
            </tr>
            <tr>
                <td>Agréments</td>
                <td><input type="checkbox" id="amenities" name="amenities" value="Yes" <?php if($amenities == "Yes") echo 'checked'; ?>><label style="margin-left: -25%;"  for="amenities"> Yes</label></td>
            </tr>
            <tr>
                <td>Accessibilité</td>
                <td><input type="checkbox" id="accessibility" name="accessibility" value="Yes" <?php if($accessibility == "Yes") echo 'checked'; ?>><label style="margin-left: -25%;"  for="accessibility"> Yes</label></td>
                
            </tr>
            <tr>
                <td>Système de sécurité</td>
                <td><input type="checkbox" id="securitySystem" name="securitySystem" value="Yes" <?php if($securitySystem == "Yes") echo 'checked'; ?>><label style="margin-left: -25%;"  for="securitySystem"> Yes</label></td>
                	
            </tr>
            <tr>
                <td>Système de contrôle d'accès</td>
                <td><input type="checkbox" id="accessControlSystem" name="accessControlSystem" value="Yes" <?php if($accessControlSystem == "Yes") echo 'checked'; ?>><label style="margin-left: -25%;"  for="accessControlSystem"> Yes</label></td>

            </tr>
            <tr>
                <td>Places de stationnement</td>
                <td><input type="number" name="parkingSpots" id="parkingSpots" value="<?php echo $parkingSpots;?>"></td>
            </tr>
            <tr>
                <td>Frais de stationnement</td>
                <td><input type="number" name="parkingFee" id="parkingFee" value="<?php echo $parkingFee;?>"></td>
            </tr>
            <tr>
                <td>Montant de stationnement</td>
                <td><input type="number" name="parkingAmount" id="parkingAmount" value="<?php echo $parkingAmount;?>"></td>
            </tr>
            <tr>
                <td>Montant mensuel de stationnement</td>
                <td><input type="number" name="parkingAmountMonthly" id="parkingAmountMonthly" value="<?php echo $parkingAmountMonthly;?>"></td>
            </tr>
            <!-- Add more rows for other fields -->

            <!-- Additional Information -->
           
            
            <tr>
                <td>Manager ID</td>
                <td>
                	<select name="manager_id" id="manager_id">
					    <option value="1" <?php if($manager_id == "1") echo 'selected'; ?>>Test</option>
					    <option value="2" <?php if($manager_id == "2") echo 'selected'; ?>>Test 2</option>
					 </select>
				</td>
            </tr>
            <tr>
                <td>Largeur du terrain</td>
                <td><input type="number" name="land_breadth" id="land_breadth" value="<?php echo $land_breadth;?>"></td>
            </tr>
            <tr>
                <td>Longueur du terrain</td>
                <td><input type="number" name="land_length" id="land_length" value="<?php echo $land_length;?>"></td>
            </tr>
            <tr>
                <td>Superficie en mètres carrés</td>
                <td><input type="number" name="square_feet" id="square_feet" value="<?php echo $square_feet;?>"></td>
            </tr>
            <tr>
                <td>Liste de caracteristiques</td>
                <td><input type="text" name="features_selection_list" id="features_selection_list" value="<?php echo $features_selection_list;?>"></td>
            </tr>
            
            <tr>
                <td>Type de loyer</td>
                <td><input type="text" name="type_of_rent" id="type_of_rent" value="<?php echo $type_of_rent;?>"></td>
            </tr>
            <tr>
                <td>Loyer</td>
                <td><input type="number" name="rent" id="rent" value="<?php echo $rent;?>"></td>
            </tr>
            <tr>
                <td>Taux par mètre carré</td>
                <td><input type="number" name="rate_per_square_feet" id="rate_per_square_feet" value="<?php echo $rate_per_square_feet;?>"></td>
            </tr>
            <tr>
                <td>Date du bail</td>
                <td><input type="date" name="lease_date" id="lease_date" value="<?php echo $lease_date;?>"></td>
            </tr>
            
            
            <!-- Add more rows for other fields -->
        </tbody>
    </table>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user_id;?>">
<input type="submit" id="Add_property" name="Add_property" value="+ Property">


    
    
</form>
	</div>
</div></div></div></div></div></div>
        </div>
        <script src="assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </section>
</body>
</html>
