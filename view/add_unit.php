<?php 
session_start();

include "../model/DBManager.class.php";
include "../controller/dbConnection.php";
include "../view/header.php";
include "../view/sidebar.php";

 if (isset($_SESSION['valid']) == true) {

 	$_SESSION['property_edit'] = false ;
    $_SESSION['propertyId'] = null;
    $_SESSION['unit_edit'] = false ;
    $_SESSION['unitId'] = null;
 
    $current_user_name      = $_SESSION['user_name'] ;
    $current_user_id        = $_SESSION['user_id'];
    $current_password       = $_SESSION['user_password'];
    $current_user_type      = $_SESSION['user_type'];
    $current_user_email     = $_SESSION['user_email'];
    $current_user_status    = $_SESSION['user_status'];


    
    		$id 			      = "";
    		$propertyName	      = "";
    		$unitNumber		      = "";
    		$unitType		      = "";
    		$floorNumber	      = "";
    		$address		      = "";
    		$occupied		      = "";
		    $unitImage	          = "";
		    $image1		          = "";
		    $image2		          = "";
		    $image3			      = "";
		    $image4				  = "";
		    $image5			      = "";
		    $length	              = "";
		    $breadth			  = "";	   
		    $total_area		      = "";
		    $number_of_bedroom    = "";
		    $number_of_bathroom   = "";
		    $number_of_windows	  = "";
		    $furnished		      = "";
		    $equiped_with	      = "";
		    $unit_feature         = "";
		    $camion_size	      = "";
		    $type_of_heating      = "";
		    $description	      = "";
		    $purchase_price	      = "";
		    $mortgage_balance	  = "";
		    $monthly_mortgage	  = "";
		    $property_tax	      = "";
		    $unit_name		      = "";
		    $unit_status	      = "";
		  
    }else{
    die("Page Not Available !");
  }



?>

            <div class="text">Unité</div>
        </div>
        <div class="position-absolute top-0 end-0">
            <nav class="navbar bg-transparent">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit"><i class='bx bx-search'></i></button>
                    </form>
                    <a href="unit.php" class="btn btn-warning ms-3" >Liste des unités</a>
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

    <form enctype="multipart/form-data" action="../controller/UnitController.php" method="POST">
    <table class="table table-bordered border-secondary" id="tbl">
        <tbody>
            <!-- Basic Information -->
            <tr>
                <td class="td-title">Property Name :</td>
                <td> 
					  <select name="propertyName" id="propertyName">
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
                <td class="td-title">Unit Number</td>
                <td><input type="text" id="unitNumber" name="unitNumber" value="<?php echo $unitNumber;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Unit Type</td>
                <td><input type="text" id="unitType" name="unitType" value="<?php echo $unitType;?>"></td>
            </tr>

            <!-- Property Details -->
            <tr>
                <td class="td-title">Floor Number</td>
                <td><input type="text" id="floorNumber" name="floorNumber" value="<?php echo $floorNumber;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Address</td>
                <td><input type="text" name="address" id="address" value="<?php echo $address;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Occupied</td>
                <td>
                    <input type="checkbox" id="occupied" name="occupied" value="Yes" <?php if($occupied == "Yes") echo 'checked'; ?>><label style="margin-left: -25%;" for="occupied"> Yes</label>
                </td>
            </tr>
            <tr>
                <td class="td-title">Unit Image</td>
                <td> <input type="file"  name="unitImage" id="unitImage"></td>
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
                <td class="td-title">Image 3</td>
                <td><input type="file"  name="image3" id="image3"></td>
            </tr>
            <tr>
                <td class="td-title">Image 4</td>
                <td><input type="file"  name="image4" id="image4"></td>
            </tr>
            <tr>
                <td class="td-title">Image 5</td>
                <td><input type="file"  name="image5" id="image5"></td>
            </tr>
            <tr>
                <td class="td-title">Length</td>
                <td><input type="number" name="length" id="length" value="<?php echo $length;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Breadth</td>
                <td><input type="number" name="breadth" id="breadth" value="<?php echo $breadth;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Total Area</td>
                <td><input type="number" name="total_area" id="total_area" value="<?php echo $total_area;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Number of Bedrooms</td>
                <td><input type="number" name="number_of_bedroom" id="number_of_bedroom" value="<?php echo $number_of_bedroom;?>"></td>
            </tr>
            <tr>
                <td class="td-title">Number of Bathrooms</td>
                <td><input type="number" name="number_of_bathroom" id="number_of_bathroom" value="<?php echo $number_of_bathroom;?>"></td>
            </tr>
            <!-- Add more rows for other fields -->

            <!-- Financial Information -->
            <tr>
                <td class="td-title">Number of Windows</td>
                <td><input type="number" name="number_of_windows" id="number_of_windows" value="<?php echo $number_of_windows;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Furnished</td>
                <td><input type="checkbox" id="furnished" name="furnished" value="Yes" <?php if($furnished == "Yes") echo 'checked'; ?>><label style="margin-left: -25%;"  for="furnished"> Yes</label></td>
            </tr>

            <tr>
                <td class="td-title">Equipped With</td>
                <td><input type="text" name="equiped_with" id="equiped_with" value="<?php echo $equiped_with;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Unit Feature</td>
                <td><input type="text" name="unit_feature" id="unit_feature" value="<?php echo $unit_feature;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Camion Size</td>
                <td><input type="text" name="camion_size" id="camion_size" value="<?php echo $camion_size;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Type of Heating</td>
                <td><input type="text" name="type_of_heating" id="type_of_heating" value="<?php echo $type_of_heating;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Description</td>
                <td><input type="text" name="description" id="description" value="<?php echo $description;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Purchase Price</td>
                <td><input type="number" name="purchase_price" id="purchase_price" value="<?php echo $purchase_price;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Mortgage Balance</td>
                <td><input type="number" name="mortgage_balance" id="mortgage_balance" value="<?php echo $mortgage_balance;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Monthly Mortgage</td>
                <td><input type="number" name="monthly_mortgage" id="monthly_mortgage" value="<?php echo $monthly_mortgage;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Property Tax</td>
                <td><input type="number" name="property_tax" id="property_tax" value="<?php echo $property_tax;?>"></td>
            </tr>

            <tr>
                <td class="td-title">Unit Name</td>
                <td><input type="text" name="unit_name" id="unit_name" value="<?php echo $unit_name;?>"></td>
            </tr>

            <tr>
                <td>Unit Status</td>
                <td><input type="text" name="unit_status" id="unit_status" value="<?php echo $unit_status;?>"></td>
            </tr>
            
            
            <!-- Add more rows for other fields -->
        </tbody>
    </table>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user_id;?>">
<input type="submit" id="Add_unit" name="Add_unit" value="+ Unit">


    
    
</form>
	</div>
</div></div></div></div></div></div>
        </div>
       
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </section>
</body>
</html>
