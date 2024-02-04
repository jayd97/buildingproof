<?php 

session_start();

include "../model/DBManager.class.php";
include "../controller/dbConnection.php";
include 'header.php';
include 'sidebar.php';


 if (isset($_SESSION['valid']) == true) {
  


    $current_user_name      = $_SESSION['user_name'] ;
    $current_user_id        = $_SESSION['user_id'];
    $current_password       = $_SESSION['user_password'];
    $current_user_type      = $_SESSION['user_type'];
    $current_user_email     = $_SESSION['user_email'];
    $current_user_status    = $_SESSION['user_status'];


    $query    = $db2->query( "SELECT id, user_id, propertyCategory, propertyType, propertyName, street, city, provinceState, zipCode, country, address, numberOfFloors, numberOfUnits, propertyImage, image1, image2, image3, image4, image5, length, breadth, height, depth, totalSquareFeet, currentValue, dateOfConstruction, buildingMaterialStructure, lastRenovationDate, propertyCertification, commonAreas, facilities, amenities, accessibility, securitySystem, accessControlSystem, parkingSpots, parkingFee, parkingAmount, parkingAmountMonthly, image, building_name, property_type, location, region, manager_id, land_breadth, land_length, square_feet, features_selection_list, building_certification, type_of_rent, rent, rate_per_square_feet, lease_date, status FROM property WHERE user_id = $current_user_id");
    $property     = $query->fetchAll( PDO::FETCH_ASSOC );

    $_SESSION['property_edit'] = false ;
    $_SESSION['propertyId'] = null;

  }else{
    die("Page Not Available !");
  }


?>


        <div><h4 style="margin-left: 10px;">Propriétés</h4></div>
        </div>

        <div class="position-absolute top-0 end-0">
            <nav class="navbar bg-transparent">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit"><i class='bx bx-search'></i></button>
                    </form>
                    <a href="add_property.php" class="btn btn-warning ms-3" >+ Propriété</a>
                </div>
            </nav>
        </div>
          
        <div class="affichage">
       
        <div class="row" id="row" style="margin-left: 10px;">
            <div class="col-sm-6 mb-2 mb-sm-0" id="toutes">
                <div class="card ">
                    <div class="card-body">
                        <h6 class="card-title">Propriétés</h6>
                           <div class="scroller">
                                <?php foreach ($property as $properties) { ?>
                                    <form>
                                        <a href="#" onclick="clickProperty(event)" class="text-decoration-none">
                                            <div class="card mb-3 " id="general-card" style="max-width: 540px; max-height: 110px">
                                                <div class="row g-0">
                                                    <div class="col-md-4" style="justify-content: center; align-items:center; display:flex; padding:10px">
                                                        <?php  
                                                            $img = $properties['propertyImage'];
                                                            if($img == null){
                                                                $img = "../controller/PropertyImage/no_building.jpg";
                                                            }else{
                                                                $img = "../controller/".$img;
                                                            }
                                                        ?>
                                                        <img src="<?php echo $img;?>" class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h6 class="card-title" name=""><?php echo $properties['propertyName']; ?></h6>
                                                            <p class="card-text" name=""><i class='bx bx-map'></i>
                                                                <?php echo $properties['street']; ?>,
                                                            <?php echo $properties['city']; ?>, 
                                                            <?php echo $properties['provinceState']; ?>,
                                                            <?php echo $properties['zipCode']; ?>,
                                                            <?php echo $properties['country']; ?>
                                                        </p>
                                                            
                                                            <!-- Use id="property_id" for the hidden paragraph -->
                                                            <p style="display: none;" id="property_id"><?php echo $properties['id']; ?></p>
                                                            <p id="general-gategory" style="display:none"><?php echo $properties['propertyCategory']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </form>
                                <?php } ?>
                            <script>
    // Add a click event handler to the card element
    function clickProperty(event) {
        // Prevent the default link behavior
        event.preventDefault();

        // Retrieve the property ID from the hidden paragraph using id
        var propertyId = event.currentTarget.querySelector('#property_id').innerText;

        // Use AJAX to send propertyId to the server
        $.ajax({
            type: 'POST',
            url: 'process.php', // Replace with the actual server-side processing script
            data: { propertyId: propertyId },
            dataType: 'json', // Expect JSON response
            success: function(response) {
                // Handle the server's response
                console.log(response);
                var propertyDetails = response.propertyDetails;
                var unitDetails = response.unitDetails;
                var floorDetails = response.floorDetails;
                
                document.getElementById('cont').style.display= "none";
                document.getElementById('card-details').style.display= "block";
                // Update HTML elements with fetched data (adjust as needed)
                document.getElementById("p_n").innerText                    = propertyDetails.propertyName;
                document.getElementById("p_c").innerText             = propertyDetails.propertyCategory;
                document.getElementById("p_t").innerText                    = propertyDetails.propertyType;     
                document.getElementById("p_street").innerText                    = propertyDetails.street; 
                document.getElementById("p_city").innerText                    = propertyDetails.city; 
                document.getElementById("meteo_city").innerText                   = propertyDetails.city;
                document.getElementById("p_state").innerText                    = propertyDetails.provinceState; 
                document.getElementById("p_zip").innerText                    = propertyDetails.zipCode; 
                document.getElementById("p_country").innerText                    = propertyDetails.country; 
                
                document.getElementById("p_number_of_floors").innerText     = propertyDetails.numberOfFloors;
                document.getElementById("p_number_of_units").innerText      = propertyDetails.numberOfUnits;
                document.getElementById("p_length").innerText               = propertyDetails.length;
                document.getElementById("p_width").innerText                = propertyDetails.breadth;
                document.getElementById("p_height").innerText               = propertyDetails.height;
                document.getElementById("p_depth").innerText                = propertyDetails.depth;
                document.getElementById("p_total_square_feet").innerText    = propertyDetails.totalSquareFeet;
                document.getElementById("p_value").innerText = propertyDetails.currentValue;
                document.getElementById("p_dateconst").innerText = propertyDetails.dateOfConstruction;
                document.getElementById("p_structure").innerText = propertyDetails.buildingMaterialStructure;

                document.getElementById("p_carea").innerText = propertyDetails.commonAreas;
                document.getElementById("p_fac").innerText = propertyDetails.facilities;
                document.getElementById("p_agr").innerText = propertyDetails.amenities;
                document.getElementById("p_acces").innerText = propertyDetails.accessibility;
                document.getElementById("p_secu").innerText = propertyDetails.securitySystem;
                document.getElementById("p_secusyst").innerText = propertyDetails.accessControlSystem;

                document.getElementById("p_parkspot").innerText = propertyDetails.parkingSpots;
                document.getElementById("p_parkfee").innerText = propertyDetails.parkingFee;
                document.getElementById("p_parkamount").innerText = propertyDetails.parkingAmount;
                document.getElementById("p_parkmonth").innerText = propertyDetails.parkingAmountMonthly;

                document.getElementById("p_region").innerText = propertyDetails.region;
                document.getElementById("p_manager").innerText = propertyDetails.manager_id;
                document.getElementById("p_landb").innerText = propertyDetails.land_breadth;
                document.getElementById("p_landl").innerText = propertyDetails.land_length;
                document.getElementById("p_surface").innerText = propertyDetails.square_feet;
                document.getElementById("p_features").innerText = propertyDetails.features_selection_list;

                document.getElementById("p_renttype").innerText = propertyDetails.type_of_rent;
                document.getElementById("p_rent").innerText = propertyDetails.rent;
                document.getElementById("p_rate").innerText = propertyDetails.rate_per_square_feet;
                document.getElementById("p_leasedate").innerText = propertyDetails.lease_date;

                // make show properties dynamique 
               
             
                // display images
                
                if(propertyDetails.image1!= ""){
                   
                   document.getElementById("img1").src= "../controller/"+propertyDetails.image1;
                    
                }else{
                  document.getElementById("img1").src = "../controller/PropertyImage/no_building.jpg";
                }
                // image 2
                if(propertyDetails.image2!= ""){
                   
                   document.getElementById("img2").src= "../controller/"+propertyDetails.image2;
                    
                }else{
                  document.getElementById("img2").src = "../controller/PropertyImage/no_building.jpg";
                }
                if(propertyDetails.image3!= ""){
                   
                   document.getElementById("img3").src= "../controller/"+propertyDetails.image3;
                    
                }else{
                  document.getElementById("img3").src = "../controller/PropertyImage/no_building.jpg";
                }
                if(propertyDetails.image4!= ""){
                   
                   document.getElementById("img4").src= "../controller/"+propertyDetails.image4;
                    
                }else{
                  document.getElementById("img4").src = "../controller/PropertyImage/no_building.jpg";
                }
              

                if (unitDetails.unit_number != null) {
                    document.getElementById("u_t").innerText = unitDetails.unit_type;
                    document.getElementById("u_n").innerText = unitDetails.unit_number;
                    // ... update other elements with unit details ...
                }else{
                    document.getElementById("u_t").innerText = "";
                    document.getElementById("u_n").innerText = "";
                }

                if(floorDetails.Floor != null){
                    document.getElementById("p_floor").innerText = floorDetails.numberOfFloors;
                }else{
                    document.getElementById("p_floor").innerText = "";
                }
               
            },
            error: function() {
                alert('Error occurred during the AJAX request.');
            }
        });
    }
</script>

                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2" id="detail" style="z-index: 10000;">
                <div class="card bg-transparent" style="z-index: 10;">
                            <div class="card-body" style="z-index: 10;">
                                <div class="prophead" style="z-index: 10;">
                                    <h6 class="card-title">Vue d'ensemble</h6>
                                    <div style="z-index: 10;">
                                        <button type="button" class="btn btn-warning show-form" onclick="edit()"><i class='bx bx-edit' ></i></button>
                                        <script type="text/javascript">
                                            function edit() {
                                                // Redirect to add_property.php
                                                window.location.href = 'edit_property.php';
                                            }
                                        </script>
                                        <button type="button" class="btn btn-warning"><i class='bx bx-trash'></i></button>
                                    </div>
                                </div>
                                <div class="scroller">

                                    <div class="container" id="cont">
                                        <h2><span>MAINTENANCEPROOF</span><br></h2>
                                    </div>
                                    <div class="card" id="card-details" style="width: 100%;">
                                        <div class="card-body">
                                        <h6>Détails :</h6>
                                            <table class="table table-bordered border-secondary" id="tbl">
                                                <tbody>
                                                    <tr>
                                                        <td class="td-title" >Nom de la propriété</td>
                                                        <td class="td-content" id="p_n"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Catégorie</td>
                                                        <td class="td-content" id="p_c"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="td-title">Type de la propriété</td>
                                                        <td  class="td-content" id="p_t"></td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                            <h6>Adresse :</h6>
                                            <table class="table table-bordered border-secondary" id="tbl">
                                                <tbody>
                                                    <tr>
                                                        <td class="td-title" >Rue</td>
                                                        <td class="td-content" id="p_street"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Ville</td>
                                                        <td class="td-content" id="p_city" value=""></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="td-title">Province /État</td>
                                                        <td  class="td-content" id="p_state"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Code postal</td>
                                                        <td  class="td-content" id="p_zip"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Pays</td>
                                                        <td  class="td-content" id="p_country"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="pbox">
                                                <div class="propertybox">
                                                    <div class="meteo-com">
                                                        <h6>Météo</h6>
                                                        <button class="btn1">Voir les détails</button>
                                                    </div>
                                                      
                                                    <div class="widget-meteo">
                                                        
                                                        <div class="city-dis" >
                                                        <i class='bx bx-cloud-snow'></i>
                                                        <div id="meteo_city"></div>
                                                        

                                                        </div>
                                                    </div>
                                                    <div class="widget-meteo-display">
                                                        <div class="meteo-entete">
                                                        <img src="assets/img/alternence.png" width="100px" height="100px" class="weather-icon">
                                                        <h2 class="temp">---</h1>
                                                        </div>
                                                        <h3 class="city" style="text-align: center;">---</h2>
                                                        <h5 class="meteo" style="text-align: center;">---</h4>
                                                        <div class="details-weather">
                                                            <div class="col">
                                                                <img src="assets/img/humidite.png" width="40px" height="40px">
                                                                <div>
                                                                    <p class="humidity">---</p>
                                                                    <p>Humidité</p>

                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <img src="assets/img/vent.png" width="40px" height="40px">
                                                                <div>
                                                                    <p class="wind">---</p>
                                                                    <p>Vent</p>

                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <img src="assets/img/pression.png" width="40px" height="40px">
                                                                <div>
                                                                    <p class="pressure">---</p>
                                                                    <p>Pression</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                
                                                </div>
                                                <div class="propertybox">
                                                    <h6>Localisation</h6>
                                                    <div class="widget">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pbox">
                                                <div class="propertybox">
                                                    <h6>Image</h6>
                                                    <div class="pimg">
                                                        <img id="img1" src="" alt="">
                                                    </div>
                                                </div>
                                                <div class="propertybox">
                                                    <h6>Image</h6>
                                                    <div class="pimg">
                                                        <img id="img2" src="" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item" id="accord-1">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                           <h6> Détails supplémentaires</h6>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <table class="table table-bordered border-secondary" id="tbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="td-title">Nombre de niveaux</td>
                                                                        <td  class="td-content" id="p_number_of_floors"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Nombre d'unités</td>
                                                                        <td  class="td-content" id="p_number_of_units"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="pbox">
                                                                <div class="propertybox">
                                                                    <h6>Image</h6>
                                                                    <div class="pimg">
                                                                        <img id="img3" src="" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="propertybox">
                                                                    <h6>Image</h6>
                                                                    <div class="pimg">
                                                                        <img id="img4" src="" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item" id="accord-2">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            <h6>Dimensions de la propriété</h6>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <table class="table table-bordered border-secondary" id="tbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="td-title">Longueur en pi2</td>
                                                                        <td  class="td-content" id="p_length"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Largeur en pi2</td>
                                                                        <td  class="td-content" id="p_width"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Hauteur en pi2</td>
                                                                        <td  class="td-content" id="p_height"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Profondeur en pi2</td>
                                                                        <td  class="td-content" id="p_depth"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Total de pieds carrés</td>
                                                                        <td  class="td-content" id="p_total_square_feet"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item" id="accord-3">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                        aria-expanded="false" aria-controls="flush-collapseThree">
                                                        <h6>Autres détails</h6>
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        
                                                          <table class="table table-bordered border-secondary" id="tbl">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="td-title">Type d'unité</td>
                                                                    <td  class="td-content" id="u_t"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Numéro de l'unité</td>
                                                                    <td  class="td-content" id="u_n"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Nombre de niveau</td>
                                                                    <td  class="td-content" id="p_floor"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Valeur actuelle</td>
                                                                    <td  class="td-content" id="p_value"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Date de construction</td>
                                                                    <td  class="td-content" id="p_dateconst"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Structure</td>
                                                                    <td  class="td-content" id="p_structure"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <h6>Espaces :</h6>
                                                        <table class="table table-bordered border-secondary" id="tbl">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="td-title">Espaces communs</td>
                                                                    <td  class="td-content" id="p_carea"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Facilités</td>
                                                                    <td  class="td-content" id="p_fac"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Agréments</td>
                                                                    <td  class="td-content" id="p_agr"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Accessibilité</td>
                                                                    <td  class="td-content" id="p_acces"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Système de sécurité</td>
                                                                    <td  class="td-content" id="p_secu"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Système de controle d'accès</td>
                                                                    <td  class="td-content" id="p_secusyst"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <h6>Stationnement :</h6>
                                                        <table class="table table-bordered border-secondary" id="tbl">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="td-title">Places de stationneent</td>
                                                                    <td  class="td-content" id="p_parkspot"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Frais de stationnement</td>
                                                                    <td  class="td-content" id="p_parkfee"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Montant du stationnement</td>
                                                                    <td  class="td-content" id="p_parkamount"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-title">Montant mensuel</td>
                                                                    <td  class="td-content" id="p_parkmonth"></td>
                                                                </tr>
                                                              
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                                <div class="accordion-item" id="accord-4">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            <h6>Détails</h6>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <table class="table table-bordered border-secondary" id="tbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="td-title">Région</td>
                                                                        <td  class="td-content" id="p_region"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Directeur</td>
                                                                        <td  class="td-content" id="p_manager"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Largeur du terrain</td>
                                                                        <td  class="td-content" id="p_landb"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">longueur du terrain</td>
                                                                        <td  class="td-content" id="p_landl"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Superficie</td>
                                                                        <td  class="td-content" id="p_surface"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Caractéristiques</td>
                                                                        <td  class="td-content" id="p_features"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item" id="accord-5">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            <h6>Loyers et baux</h6>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <table class="table table-bordered border-secondary" id="tbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="td-title">Type de loyer</td>
                                                                        <td  class="td-content" id="p_renttype"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Loyer</td>
                                                                        <td  class="td-content" id="p_rent"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Taux par mètre carrée</td>
                                                                        <td  class="td-content" id="p_rate"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Date du bail</td>
                                                                        <td  class="td-content" id="p_leasedate"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <script src="assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/anime.min.js"></script>
       
        <script>
            // animation 
            const container=document.querySelector('.container'); 
             
            for (var i=0; i<=25; i++){
            const blocks=document.createElement('div');
            blocks.classList.add('block');
            container.appendChild(blocks);
            }
            function animateBlocks(){
                anime({
                    targets: '.block', 
                    translateX: function(){
                        return anime.random (-370, 370)
                    },
                    translateY: function(){
                        return anime.random (-130, 130)
                    },
                    scale: function(){
                        return anime.random (1, 3)
                    },
                    easing: 'linear',
                    duration: 3000,
                    delay:anime.stagger(10),
                    complete:animateBlocks,

                })
            }
            animateBlocks();
          // meteo widjet
          const apiKey="a4d05dfcd1ce24a0ba464f985472632b";
const apiUrl="https://api.openweathermap.org/data/2.5/weather?units=metric&q=";
const returnCity = document.querySelector("#p_city");
const weatherBtn = document.querySelector(".btn1");
const weatherIcon = document.querySelector(".weather-icon");
const met = document.querySelector('.meteo');
const background = document.querySelector('.widget-meteo-display');
async function checkWeather(city){
    const response = await fetch(apiUrl + city + `&appid=${apiKey}`);
    var data = await response.json(); 
    console.log(data);
    document.querySelector(".city").innerHTML = data.name;
document.querySelector(".temp").innerHTML = Math.round(data.main.temp) +"°C";
document.querySelector(".humidity").innerHTML = data.main.humidity +" %";
document.querySelector(".wind").innerHTML = data.wind.speed +" km/h";
document.querySelector(".pressure").innerHTML = data.main.pressure +" hPa";


if(data.weather[0].main == "Clouds"){
    weatherIcon.src = "assets/img/nuageux.png";
    background.style.backgroundImage="url('https://media2.giphy.com/media/fSXHTR5nSzKMOPVodt/200w.gif?cid=82a1493bfv3rdbb9gbpzye3dgsdhkbw6s2hhsvnlfr83kqk8&ep=v1_gifs_related&rid=200w.gif&ct=g')";
    met.innerHTML ="Temps nuageux"
} else if(data.weather[0].main == "Clear"){
    weatherIcon.src = "assets/img/soleil.png";
    background.style.backgroundImage="url('https://camo.envatousercontent.com/f2812db70244d55f8935c798f8dd47c2b9383f97/687474703a2f2f7777772e7073642d647564652e636f6d2f7475746f7269616c732f696d616765732f616e696d617465642d6769662f414e494d415445442d53554e4c494748542e676966')"
    met.innerHTML ="Temps ensoleillé"
}else if(data.weather[0].main == "Rain"){
    weatherIcon.src = "assets/img/pluie.png";
    background.style.backgroundImage="url('https://i.pinimg.com/originals/4a/29/92/4a2992052b953b29c9cf0f630a4a7dde.gif')"
    met.innerHTML ="Temps pluvieux"
}else if(data.weather[0].main == "Drizzle"){
    weatherIcon.src = "assets/img/alternence.png";
    background.style.backgroundImage="url('https://phoneky.co.uk/thumbs/screensavers/down/nature/sun_ma2my1rk.gif')"
    met.innerHTML ="Alternance soleil nuages"
}else if(data.weather[0].main == "Snow"){
    weatherIcon.src = "assets/img/neige.png";
    background.style.backgroundImage="url('https://camo.envatousercontent.com/649ecc2b0cd7d405c390054c3e7fca8b141da55d/68747470733a2f2f73746f726167652e676f6f676c65617069732e636f6d2f6772617068696372697665722d3134393830352e61707073706f742e636f6d2f73726564612f416e696d61746564536e6f772f5265616479546573745f30392e676966')";
    met.innerHTML ="Temps neigeux"
}
}
weatherBtn.addEventListener("click", ()=>{
    
    console.log((returnCity).textContent);
    checkWeather((returnCity).textContent);
    document.querySelector(".widget-meteo").style.display="none";
    document.querySelector(".widget-meteo-display").style.display="block";
})



        </script>

    </section>
</body>
</html>
