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
    
    $query    = $db2->query( "SELECT id, property_id, address, propertyType, landSurface, buildingSurface, unitNumber, floorNumber, basement, majorElement, elementGroup,
    description, observation, individualElement, action, location, cost, term,  image1, image2, conclusion, inspector, dateOfInspection, status, user_id FROM inspection WHERE user_id = $current_user_id");
    $inspection     = $query->fetchAll( PDO::FETCH_ASSOC );

    $_SESSION['property_edit'] = false ;
    $_SESSION['propertyId'] = null;

    $_SESSION['inspection_edit'] = false ;
    $_SESSION['inspectionId'] = null;

    

  }else{
    die("Page Not Available !");
  }


?>
<h5>Inspections</h5>
</div>
<div class="position-absolute top-0 end-0">
            <nav class="navbar bg-transparent">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit"><i class='bx bx-search'></i></button>
                    </form>
                    <a href="add_inspection.php" class="btn btn-warning ms-3" >+ inspection</a>
                </div>
            </nav>
        </div>
            
        <div class="affichage">
        </div>
        <div class="row" id="row" style="margin-left: 10px;">
            <div class="col-sm-6 mb-2 mb-sm-0" id="toutes">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Inspection</h5>
                           <div class="scroller">
                                <?php foreach ($inspection as $inspections) { ?>
                                    <form>
                                        <a href="#" onclick="clickInspection(event)" class="text-decoration-none">
                                            <div class="card mb-3 " style="max-width: 545px; max-height: 110px;" id="general-card">
                                                <div class="row g-0">
                                                    <div class="col-md-4" style="justify-content: center; align-items:center; display:flex; padding:10px">
                                                    <img src="" class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title" name="" id="inspection_id"><?php echo $inspections['id']; ?></h5>
                                                            <p class="card-text" name=""><?php echo $inspections['address']; ?></p>
                                                            <p style="display: none;" id="property_id"><?php echo $inspections['property_id']; ?></p>
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </form>
                                <?php } ?>
                                <script>
                                  function clickInspection(event) {
                                    // Prevent the default link behavior
                                    event.preventDefault();

                                    // Retrieve the property ID from the hidden paragraph using id
                                    var inspectionId = event.currentTarget.querySelector('#inspection_id').innerText;
                                    var propertyId = event.currentTarget.querySelector('#property_id').innerText;

                                   
                                    // Use AJAX to send unitId to the server
                                    $.ajax({
                                        type: 'POST',
                                        url: 'inspectionprocess.php', // Replace with the actual server-side processing script
                                        data: { inspectionId: inspectionId },
                                        dataType: 'json', // Expect JSON response
                                        success: function(response) {
                                            // Handle the server's response
                                            console.log(response);

                                            document.getElementById("i_a").innerText                    = response.address; 
                                            document.getElementById("p_t").innerText                    = response.propertyType; 
                                            document.getElementById("l_s").innerText                    = response.landSurface;  
                                            document.getElementById("b_s").innerText                    = response.buildingSurface; 
                                            document.getElementById("u_n").innerText                    = response.unitNumber;  
                                            document.getElementById("f_n").innerText                    = response.floorNumber; 
                                            document.getElementById("i_b").innerText                    = response.basement; 
                                            document.getElementById("m_e").innerText                    = response.majorElement; 
                                            document.getElementById("e_g").innerText                    = response.elementGroup;  
                                            document.getElementById("i_d").innerText                    = response.description; 
                                            document.getElementById("i_o").innerText                    = response.observation; 
                                            document.getElementById("i_e").innerText                    = response.individualElement; 
                                            document.getElementById("action").innerText                    = response.action; 
                                            document.getElementById("location").innerText                    = response.location;  
                                            document.getElementById("cost").innerText                    = response.cost; 
                                            document.getElementById("term").innerText                    = response.term; 

                                                                        
                                            if(response.image1!= null){
                                              
                                              document.getElementById("img1").src= "../controller/"+response.image1;
                                                
                                            }else{
                                              document.getElementById("img1").src = "../controller/InspectionImage/no_image.jpg";
                                            }
                                            if(response.image2!= null){
                                              
                                              document.getElementById("img2").src= "../controller/"+response.image2;
                                                
                                            }else{
                                              document.getElementById("img2").src = "../controller/InspectionImage/no_image.jpg";
                                            }


                                            document.getElementById("conclusion").innerText                    = response.conclusion;  
                                            document.getElementById("inspector").innerText                    = response.inspector; 
                                            document.getElementById("i_date").innerText                    = response.dateOfInspection; 


                                              
                                        }
                                      });

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
                                                window.location.href = 'edit_inspection.php';
                                            }
                                        </script>
                                        <button type="button" class="btn btn-warning"><i class='bx bx-trash'></i></button>
                                    </div>
                                </div>
                                <div class="scroller">
                                    <div class="card" style="width: 100%;">
                                        <div class="card-body">
                                          <h6>Propriété</h6>

                                            <table class="table table-bordered border-secondary" id="tbl">
                                                <tbody>
                                                    <tr>
                                                        <td class="td-title">Nom de la propriété :</td>
                                                        <td class="td-content" id="p_n"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">adresse:</td>
                                                        <td class="td-content" id="i_a"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Type de propriété :</td>
                                                        <td class="td-content" id="p_t"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Superficie du terrain :</td>
                                                        <td class="td-content" id="l_s"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Superficie du bâtiment :</td>
                                                        <td class="td-content" id="b_s"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Numéro d'unité :</td>
                                                        <td class="td-content" id="u_n"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Niveau numéro :</td>
                                                        <td class="td-content" id="f_n"></td>
                                                        <tr>
                                                        <td class="td-title">Sous-sol :</td>
                                                        <td class="td-content" id="i_b"></td>
                                                    </tr>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <h6> Détails de l'inspection</h6>
                                            <table class="table table-bordered border-secondary" id="tbl">
                                                <tbody>
                                                    <tr>
                                                        <td class="td-title">Élement Majeur :</td>
                                                        <td class="td-content" id="m_e"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Groupe d'élements:</td>
                                                        <td class="td-content" id="e_g"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Description :</td>
                                                        <td class="td-content" id="i_d"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Observations :</td>
                                                        <td class="td-content" id="i_o"></td>
                                                    </tr>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                            <h6>Élement inspécté</h6>
                                            <table class="table table-bordered border-secondary" id="tbl">
                                                <tbody>
                                                    <tr>
                                                        <td class="td-title">Élement Individuel :</td>
                                                        <td class="td-content" id="i_e"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Action:</td>
                                                        <td class="td-content" id="action"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Localisation :</td>
                                                        <td class="td-content" id="location"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Coût :</td>
                                                        <td class="td-content" id="cost"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Échéance :</td>
                                                        <td class="td-content" id="term"></td>
                                                    </tr>
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

                                            <table class="table table-bordered border-secondary" id="tbl">
                                                <tbody>
                                                    <tr>
                                                        <td class="td-title">Conclusion :</td>
                                                        <td class="td-content" id="conclusion"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Inspecteur :</td>
                                                        <td class="td-content" id="inspector"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title">Date d'inspection :</td>
                                                        <td class="td-content" id="i_date"></td>
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





<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../view/assets/js/main.js"></script>

    </section>
</body>
</html>