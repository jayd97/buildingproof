<?php 
session_start();

include "../model/DBManager.class.php";
include "../controller/dbConnection.php";
include "header.php";
include "sidebar.php";

if (isset($_SESSION['valid']) == true) {


    $current_user_name      = $_SESSION['user_name'] ;
    $current_user_id        = $_SESSION['user_id'];
    $current_password       = $_SESSION['user_password'];
    $current_user_type      = $_SESSION['user_type'];
    $current_user_email     = $_SESSION['user_email'];
    $current_user_status    = $_SESSION['user_status'];


    $query    = $db2->query( "SELECT id, property_id, unit_number, unit_type, floor_number, address, occupancy_status, unit_image, number_of_images, image1, image2, image3, image4, image5, length, breadth, total_area, number_of_bedrooms, number_of_bathrooms, number_of_windows, furnished, equipped_with, unit_feature, camion_size, type_of_heating, description, purchase_price, mortgage_balance, monthly_mortgage, property_tax, unit_name, building_name_id, unit_status, location, region, land_length, land_breadth, unit_area, number_of_seats, parking_space, parking_type, user_id FROM unit WHERE user_id = $current_user_id");
    $unit     = $query->fetchAll( PDO::FETCH_ASSOC );

    $_SESSION['property_edit'] = false ;
    $_SESSION['propertyId'] = null;

    $_SESSION['unit_edit'] = false ;
    $_SESSION['unitId'] = null;

  }else{
    die("Page Not Available !");
  }

?>

            <div class="text">Unités</div>
        </div>
        <div class="position-absolute top-0 end-0">
            <nav class="navbar bg-transparent">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit"><i class='bx bx-search'></i></button>
                    </form>
                    <a href="add_unit.php" class="btn btn-warning ms-3" >+ Unité</a>
                </div>
            </nav>
        </div>
            
        <div class="affichage">
        </div>
        <div class="row" id="row" style="margin-left: 10px;">
            <div class="col-sm-6 mb-2 mb-sm-0" id="toutes">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Unités</h5>
                           <div class="scroller">
                                <?php foreach ($unit as $units) { ?>
                                    <form>
                                        <a href="#" onclick="clickProperty(event)" class="text-decoration-none">
                                            <div class="card mb-3 " style="max-width: 545px; max-height: 110px;" id="general-card">
                                                <div class="row g-0">
                                                    <div class="col-md-4" style="justify-content: center; align-items:center; display:flex; padding:10px">
                                                        <?php  
                                                            $img = $units['unit_image'];
                                                            if($img == null){
                                                                $img = "../controller/UnitImage/no_building.jpg";
                                                            }else{
                                                                $img = "../controller/".$img;
                                                            }
                                                        ?>
                                                        <img src="<?php echo $img;?>" class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title" name=""><?php echo $units['unit_number']; ?></h5>
                                                            <p class="card-text" name=""><?php echo $units['address']; ?></p>
                                                            <!-- Use id="unit_id" for the hidden paragraph -->
                                                            <p style="display: none;" id="unit_id"><?php echo $units['id']; ?></p>
                                                            <p style="display: none;" id="property_id"><?php echo $units['property_id']; ?></p>
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
        var unitId = event.currentTarget.querySelector('#unit_id').innerText;

        var propertyId = event.currentTarget.querySelector('#property_id').innerText;
        // Use AJAX to send unitId to the server
        $.ajax({
            type: 'POST',
            url: 'unitprocess.php', // Replace with the actual server-side processing script
            data: { unitId: unitId },
            dataType: 'json', // Expect JSON response
            success: function(response) {
                // Handle the server's response
                console.log(response);

                // Update HTML elements with fetched data (adjust as needed)
                document.getElementById("u_t").innerText                    = response.unit_type;     
                document.getElementById("u_n").innerText                    = response.unit_number;
                document.getElementById("u_f").innerText = response.floor_number;
                document.getElementById("u_address").innerText = response.address;
                document.getElementById("u_occup").innerText = response.occupancy_status;
                document.getElementById("u_length").innerText                    = response.length;     
                document.getElementById("u_breadth").innerText                    = response.breadth;
                document.getElementById("u_area").innerText = response.total_area;
                document.getElementById("u_bed").innerText = response.number_of_bedrooms;
                document.getElementById("u_bath").innerText = response.number_of_bathrooms;
                document.getElementById("u_win").innerText = response.number_of_windows;
                document.getElementById("u_fur").innerText = response.furnished;
                document.getElementById("u_feat").innerText = response.unit_feature;
                document.getElementById("u_heating").innerText = response.type_of_heating;
                document.getElementById("u_des").innerText = response.description;
                document.getElementById("u_price").innerText = response.purchase_price;
                document.getElementById("u_mortage").innerText = response.mortgage_balance;
                document.getElementById("u_monthmort").innerText = response.monthly_mortgage;
                document.getElementById("u_tax").innerText = response.property_tax;
                document.getElementById("u_name").innerText = response.unit_name;
                document.getElementById("u_parking").innerText = response.parking_space;
                document.getElementById("u_parkingtype").innerText = response.parking_type;

                 // display images
                
                 if(response.image1!= ""){
                   
                   document.getElementById("img1").src= "../controller/"+response.image1;
                    
                }else{
                  document.getElementById("img1").src = "../controller/UnitImage/no_building.jpg";
                }
                if(response.image2!= ""){
                   
                   document.getElementById("img2").src= "../controller/"+response.image2;
                    
                }else{
                  document.getElementById("img2").src = "../controller/UnitImage/no_building.jpg";
                }

                if(response.image3!= ""){
                   
                   document.getElementById("img3").src= "../controller/"+response.image3;
                    
                }else{
                  document.getElementById("img3").src = "../controller/UnitImage/no_building.jpg";
                }
                if(response.image4!= ""){
                   
                   document.getElementById("img4").src= "../controller/"+response.image4;
                    
                }else{
                  document.getElementById("img4").src = "../controller/UnitImage/no_building.jpg";
                }

               
               
            },
            error: function() {
                alert('Error occurred during the AJAX request.');
            }
        });

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

                // Update HTML elements with fetched data (adjust as needed)
                document.getElementById("p_n").innerText                    = propertyDetails.propertyName;
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
            <div class="col-sm-2" id="detail">
                <div class="card bg-transparent">
                            <div class="card-body">
                                <div class="prophead">
                                    <h5 class="card-title">Vue d'ensemble</h5>
                                    <div>
                                        <button type="button" class="btn btn-warning show-form" onclick="edit()"><i class='bx bx-edit' ></i></button>
                                        <script type="text/javascript">
                                            function edit() {
                                                // Redirect to add_property.php
                                                window.location.href = 'edit_unit.php';
                                            }
                                        </script>
                                        <button type="button" class="btn btn-warning"><i class='bx bx-trash'></i></button>
                                    </div>
                                </div>
                                <div class="scroller">
                                    <div class="card" style="width: 100%;">
                                        <div class="card-body">

                                            <table class="table table-bordered border-secondary" id="tbl">
                                                <tbody>
                                                    <tr>
                                                        <td class="td-title">Nom de la propriété :</td>
                                                        <td class="td-content" id="p_n"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Type de l'unité :</td>
                                                        <td class="td-content" id="u_t"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Numéro de l'unité :</td>
                                                        <td class="td-content" id="u_n"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Nom de l'unité :</td>
                                                        <td class="td-content" id="u_name"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Numéro de niveau :</td>
                                                        <td class="td-content" id="u_f"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Adresse :</td>
                                                        <td class="td-content" id="u_address"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Occupé ? </td>
                                                        <td class="td-content" id="u_occup"></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                           
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
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            Détails supplémentaires
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <table class="table table-bordered border-secondary" id="tbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="td-title">Longueur :</td>
                                                                        <td class="td-content" id="u_length"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Largeur :</td>
                                                                        <td class="td-content" id="u_breadth"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Total de pieds carrés :</td>
                                                                        <td class="td-content" id="u_area"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Nombre de chambres :</td>
                                                                        <td class="td-content" id="u_bed"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Nombre de salles de bain :</td>
                                                                        <td class="td-content" id="u_bath"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Nombre de fenêtres :</td>
                                                                        <td class="td-content" id="u_win"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Meublé :</td>
                                                                        <td class="td-content" id="u_fur"></td>
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
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            Autres détails
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <table class="table table-bordered border-secondary" id="tbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="td-title">Caractéristiques</td>
                                                                        <td class="td-content" id="u_feat"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Type de chauffage</td>
                                                                        <td class="td-content" id="u_heating"></td>
                                                                    </tr>
                                                                   
                                                                    <tr>
                                                                        <td class="td-title">Description</td>
                                                                        <td class="td-content" id="u_des"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                        aria-expanded="false" aria-controls="flush-collapseThree">
                                                        Détails financiers
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                    <table class="table table-bordered border-secondary" id="tbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="td-title">Prix d'achat</td>
                                                                        <td class="td-content" id="u_price"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Solde hypothécaire</td>
                                                                        <td class="td-content" id="u_mortage"></td>
                                                                    </tr>
                                                                   
                                                                    <tr>
                                                                        <td class="td-title">Hypothèque mensuelle</td>
                                                                        <td class="td-content" id="u_monthmort"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Taxe de la propriété</td>
                                                                        <td class="td-content" id="u_tax"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                                        aria-expanded="false" aria-controls="flush-collapseFour">
                                                        Stationnement
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                    <table class="table table-bordered border-secondary" id="tbl">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="td-title">Nombre de places</td>
                                                                        <td class="td-content" id="u_parking"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title">Type de stationnement</td>
                                                                        <td class="td-content" id="u_parkingtype"></td>
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
        <script src="assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/anime.min.js"></script>

    </section>
</body>
</html>
