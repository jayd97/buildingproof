<?php  

session_start();

include "../model/DBManager.class.php";
include "../controller/dbConnection.php";
include "../view/header.php";


 if (isset($_SESSION['valid']) == true) {


    $current_user_name      = $_SESSION['user_name'] ;
    $current_user_id        = $_SESSION['user_id'];
    $current_password       = $_SESSION['user_password'];
    $current_user_type      = $_SESSION['user_type'];
    $current_user_email     = $_SESSION['user_email'];
    $current_user_status    = $_SESSION['user_status'];

    $query    = $db2->query( "SELECT id, property_id, unit_id, property_manager, name, age, gender, occupation, date_of_birth, contact_number, email, base_rent, taxes, insurance, maintenance, additional_charges, net_payable, lease_starting_date, status FROM tenant WHERE name = '$current_user_name'");
    $tenant     = $query->fetchAll( PDO::FETCH_ASSOC );
    $_SESSION['property_edit'] = false ;
    $_SESSION['propertyId'] = null;

    $_SESSION['tenant_edit'] = false ;
    $_SESSION['tenantId'] = null;


  }else{
    die("Page Not Available !");
  }

?>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../view/assets/img/logo1.png" alt="Logo" width="34" height="24" class="d-inline-block align-text-top">
      Maintenanceproof
    </a>
    
  </div>
</nav>

<div class="portal" style=" padding-left: 20px; padding-top:10px;">
<h5>Accueil Portail locataire</h5>
<button data-bs-toggle="modal" data-bs-target="#staticBackdrop">Informations personnelles</button>
<!--   modal  -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Informations personnelles</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <?php foreach($tenant as $tenants) {?>
        <table class="table" style="border: gray 1px solid;">
         
          <tbody>
            <tr style="border: gray 1px solid;">
              <th>Nom</th>
              <td><?php echo  $tenants['name'] ;?></td>
              
            </tr>
            <tr style="border: gray 1px solid;">
              <th >Date de naissance</th>
              <td><?php echo  $tenants['date_of_birth'] ;?></td>
             
            </tr>
            <tr style="border: gray 1px solid;">
              <th>Numéro de téléphone</th>
              <td><?php echo  $tenants['contact_number'] ;?></td>
             
            </tr>
            <tr style="border: gray 1px solid;">
              <th>Occupation</th>
              <td><?php echo  $tenants['occupation'] ;?></td>
             
            </tr>
            <tr style="border: gray 1px solid;">
              <th>Adresse courriel</th>
              <td><?php echo  $tenants['email'] ;?></td>
             
            </tr>
          </tbody>
        </table>

      <?php } ?>
        
      </div>
      
    </div>
  </div>
</div>
<button data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Propriété</button>
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel1">Informations sur la propriété</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($tenant as $tenants) { 
        echo  $tenants['property_manager'] ;
        $pr = $tenants['property_id']; 
         
        $query2    = $db2->query( "SELECT id, propertyCategory, propertyType, propertyName, street, city, provinceState, zipCode, country, address, numberOfFloors, numberOfUnits, propertyImage, image1, image2, image3, image4, image5, length, breadth, height, depth, totalSquareFeet, currentValue, dateOfConstruction, buildingMaterialStructure, lastRenovationDate, propertyCertification, commonAreas, facilities, amenities, accessibility, securitySystem, accessControlSystem, parkingSpots, parkingFee, parkingAmount, parkingAmountMonthly, image, building_name, property_type, location, region, manager_id, land_breadth, land_length, square_feet, features_selection_list, building_certification, type_of_rent, rent, rate_per_square_feet, lease_date, status FROM property WHERE id = '$pr'");
        $property     = $query2->fetchAll( PDO::FETCH_ASSOC );
        ?>
        <?php foreach($property as $properties) { ?>

          <table class="table" style="border: gray 1px solid;">
         
         <tbody>
           <tr style="border: gray 1px solid;">
             <th>Nom de la propriété</th>
             <td><?php echo  $properties['propertyName'] ;?></td>
             
           </tr>
           <tr style="border: gray 1px solid;">
             <th >image</th>
             <?php  
                $img = $properties['propertyImage'];
                if($img == null){
                $img = "../controller/PropertyImage/no_building.jpg";
                }else{
                $img = "../controller/".$img;
                }
                ?>
             <td> <img src="<?php echo  $img?>" height="150px" width="260px"></td>
            
           </tr>
           <tr style="border: gray 1px solid;">
             <th>Nombre d'étages</th>
             <td><?php echo  $properties['numberOfFloors'] ;?></td>
             
           </tr>
           <tr style="border: gray 1px solid;">
             <th>Nombre d'unités</th>
             <td><?php echo  $properties['numberOfUnits'] ;?></td>
             
           </tr>
           
         </tbody>
       </table>

        
          <?php } ?>
      <?php } ?>
      </div>
      
    </div>
  </div>
</div>
<button>+ Message</button>
<button> + Demande</button>
</div> 
<div><h6 style="margin-top: 5px; margin-left: 20px;">La propriété</h6></div>
<?php foreach($tenant as $tenants) { 
        $pr = $tenants['property_id']; 
         
        $query2    = $db2->query( "SELECT id, propertyCategory, propertyType, propertyName, street, city, provinceState, zipCode, country, address, numberOfFloors, numberOfUnits, propertyImage, image1, image2, image3, image4, image5, length, breadth, height, depth, totalSquareFeet, currentValue, dateOfConstruction, buildingMaterialStructure, lastRenovationDate, propertyCertification, commonAreas, facilities, amenities, accessibility, securitySystem, accessControlSystem, parkingSpots, parkingFee, parkingAmount, parkingAmountMonthly, image, building_name, property_type, location, region, manager_id, land_breadth, land_length, square_feet, features_selection_list, building_certification, type_of_rent, rent, rate_per_square_feet, lease_date, status FROM property WHERE id = '$pr'");
        $property     = $query2->fetchAll( PDO::FETCH_ASSOC );
        ?>
        <?php foreach($property as $properties) { ?>
<div class="card mb-3" style="max-width: 100%; margin-top: 5px; margin-left: 20px;">
  <div class="row g-0">
    <div class="col-md-4">
    <?php  
                $img = $properties['propertyImage'];
                if($img == null){
                $img = "../controller/PropertyImage/no_building.jpg";
                }else{
                $img = "../controller/".$img;
                }
                ?>
      <img src="<?php echo  $img?>" height="250px" width="460px">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      
        <h5 class="card-title"><?php echo  $properties['propertyName'] ;?></h5>
        <table class="table">
  
  <tbody>
    <tr style="border: none; font-size:14px;">
      <th >Nombre d'étages</th>
      <td><?php echo  $properties['numberOfFloors'] ;?></td>
    </tr>
    <tr style="border: none; font-size:14px;">
      <th scope="row">Nombre d'unités</th>
      <td><?php echo  $properties['numberOfUnits'] ;?></td>
    </tr>
    <tr style="border: none; font-size:14px;">
      <th scope="row">Total de pieds carrés</th>
      <td><?php echo  $properties['totalSquareFeet'] ;?></td>
    </tr>
    <tr style="border: none; font-size:14px;">
      <th scope="row">Date de construction</th>
      <td><?php echo  $properties['dateOfConstruction'] ;?></td>
    </tr>
  </tbody>
</table>
       
        <?php } ?>
      <?php } ?>
      </div>
    </div>
  </div>
</div>
<div><h6 style="margin-top: 5px; margin-left: 20px;">L'unité</h6></div>
<?php foreach($tenant as $tenants) { 
        $unitid = $tenants['unit_id']; 
         
        $query3    = $db2->query( "SELECT*FROM unit WHERE id = '$unitid'");
        $unit     = $query3->fetchAll( PDO::FETCH_ASSOC );
        ?>
        <?php foreach($unit as $units) { ?>
<div class="card mb-3" style="max-width: 100%; margin-top: 5px; margin-left:20px">
  <div class="row g-0">
    <div class="col-md-4">
    <?php  
                $img = $units['unit_image'];
                if($img == null){
                $img = "../controller/UnitImage/no_building.jpg";
                }else{
                $img = "../controller/".$img;
                }
                ?>
      <img src="<?php echo  $img?>" height="250px" width="460px">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      
        <h5 class="card-title"><?php echo  $units['unit_number'] ;?></h5>
        <table class="table">
  
  <tbody>
    <tr style="border: none; font-size:14px;">
      <th >Adresse</th>
      <td><?php echo  $units['address'] ;?></td>
    </tr>
    <tr style="border: none;font-size:14px;">
      <th scope="row">Type d'unités</th>
      <td><?php echo  $units['unit_type'] ;?></td>
    </tr>
    <tr style="border: none;font-size:14px;">
      <th scope="row">Total de pieds carrés</th>
      <td><?php echo  $units['total_area'] ;?></td>
    </tr>
    <tr style="border: none;font-size:14px;">
      <th scope="row">Équipée avec</th>
      <td><?php echo  $units['equipped_with'] ;?></td>
    </tr>
    <tr style="border: none; font-size:14px;">
      <th scope="row">Autres images</th>
      <?php  
                $img1 = $units['image1'];
                if($img1 == null){
                $img1 = "../controller/UnitImage/no_building.jpg";
                }else{
                $img1 = "../controller/".$img1;
                }
                $img2 = $units['image2'];
                if($img2 == null){
                $img2 = "../controller/UnitImage/no_building.jpg";
                }else{
                $img2 = "../controller/".$img2;
                }
                $img3 = $units['image3'];
                if($img3 == null){
                $img3 = "../controller/UnitImage/no_building.jpg";
                }else{
                $img3 = "../controller/".$img3;
                }
                ?>


      <td><img src="<?php echo  $img1?>" height="100px" width="180px"> &nbsp;
      <img src="<?php echo  $img2?>" height="100px" width="180px">&nbsp;
      <img src="<?php echo  $img3?>" height="100px" width="180px"></td>
    </tr>

  </tbody>
</table>
       
        <?php } ?>
      <?php } ?>
      </div>
    </div>
  </div>
</div>


<div class="tenant-user" ><i class='bx bxs-user-circle'></i> <h6 style="margin-top: 8px;"> <?php echo  $current_user_name ;?></h6> 
<a style="text-decoration: none; margin-left:10px; color:orange; margin-top:5px" href="../index.html">Déconnexion</a></div>
<div class="expens"><h6 style="margin-left: 20px; margin-top:10px">Dépenses</h6></div>

<?php foreach($tenant as $tenants) {?>
<div class="tenant-header">
<div class="card mb-3" style="width: 15rem;">
  <div class="card-header">Loyer de base</div>
  <div class="card-body">
    <h4 class="card-title">$ <?php echo  $tenants['base_rent'] ;?></h4>
    
  </div>
</div>
<div class="card mb-3" id="card-tenant" style="width: 15rem;">
  <div class="card-header">Frais d'assurance</div>
  <div class="card-body">
    <h4 class="card-title">$ <?php echo  $tenants['insurance'] ;?></h4>
   
  </div>
</div>
<div class="card mb-3" style="width: 15rem;">
  <div class="card-header">Frais additionels</div>
  <div class="card-body">
    <h4 class="card-title">$ <?php echo  $tenants['additional_charges'] ;?></h4>
   
  </div>
</div>
<div class="card mb-3" style="width: 15rem;">
  <div class="card-header">Total des charges</div>
  <div class="card-body">
    <?php 
    $total =   $tenants['base_rent'] + $tenants['insurance'] + $tenants['additional_charges'];
    ?>
    <h4 class="card-title">$ <?php echo  $total ;?></h4>
    
  </div>
</div>
<div class="card mb-3" style="width: 15rem;">
  <div class="card-header">Début du bail</div>
  <div class="card-body">
    <h4 class="card-title"><?php echo  $tenants['lease_starting_date'] ;?></h4>
    
  </div>
</div>
<?php } ?>



</div>
<div class="fonctions">

<div style="margin-left: 40px; background-color: #CDCDCD"><h6>  Demandes:</h6></div>
<?php foreach($tenant as $tenants) {
$un= $tenants['unit_id']; 
$query3    = $db2->query( "SELECT id, building_components, priority,type_of_request, property_id, unit_id, picture, date, description_of_problem, location, region,
 status FROM request WHERE unit_id = '$un'");
$request     = $query3->fetchAll( PDO::FETCH_ASSOC );
 foreach($request as $requests) { ?>
  
  
<table class="table" style="margin-left: 20px; margin-right: 40px;">
  <thead style="background-color: orange;">
    <tr style="border: gray 1px solid;">
      <th scope="col">ID</th>
      <th scope="col">Composante</th>
      <th scope="col">Priorité</th>
      <th scope="col">Type de demande</th>
      <th scope="col">Date de la demande</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr style="border: gray 1px solid;">
      <th scope="row"><?php echo $requests['id']    ;?></th>
      <td><?php echo $requests['building_components']    ;?></td>
      <td><?php echo $requests['priority']    ;?></td>
      <td><?php echo $requests['type_of_request']    ;?></td>
      <td><?php echo $requests['date']    ;?></td>
      <?php 
      if($requests['status'] == "1"){
        $stat= "En cours"; 
      }else{
        $stat= "Términé";
      }
         ;?>
      <td><?php echo $stat    ;?></td>
    </tr>
  
  </tbody>
</table>
<?php } ?>
<?php } ?>

</div>
<div><h6 style="margin-left: 40px; margin-top:10px;  background-color: #CDCDCD">Messages:</h6></div>
<?php foreach($tenant as $tenants) {

$ten= $tenants['id']; 
$query4    = $db2->query( "SELECT*FROM  tenantmessage WHERE tenant_id = '$ten'");
$message     = $query4->fetchAll( PDO::FETCH_ASSOC );
 foreach($message as $messages) { ?>
<table style="width: 100%; margin-left:20px; ">
<tr style="border: gray 1px solid; width: 96%;">
  <td style="padding-left: 15px;"><?php echo $messages['message']    ;?></td>
  <td style="width: 10%;"><?php echo $messages['date']    ;?></td>
</tr>
</table>
<?php } ?>
<?php } ?>






<div><h6 style="margin-left: 40px; margin-top:20px;  background-color: #CDCDCD">Contacts:</h6></div>
<table class="table" style="margin-left: 20px; margin-right: 40px;">
  <thead>
    <tr style="border: gray 1px solid;">
      <th scope="col">Nom du contact</th>
      <th scope="col">Occupation</th>
      <th scope="col">Numéro de téléphone</th>
      <th scope="col">Adresse courriel</th>
     
    </tr>
  </thead>

  <tbody>
  <?php foreach($tenant as $tenants) {
  $prop= $tenants['property_id']; 
$query5    = $db2->query( "SELECT*FROM  add_contact WHERE property_id = '$prop'");
$contact     = $query5->fetchAll( PDO::FETCH_ASSOC );
 foreach($contact as $contacts) { ?>
    <tr style="border: gray 1px solid;">
 
      <td><?php echo $contacts['name']    ;?></td>
      <td><?php echo $contacts['occupation']    ;?></td>
      <td>$<?php echo $contacts['contact_number']    ;?></td>
      <td><?php echo $contacts['email']    ;?></td>
    
   
    </tr>
  
    <?php } ?>
    <?php } ?>
  </tbody>
</table>


<div><h6 style="margin-left: 40px; margin-top:20px;  background-color: #CDCDCD">Assurances:</h6></div>
 <table class="table" style="margin-left: 20px; margin-right: 40px;">
  <thead>
    <tr style="border: gray 1px solid;">
      <th scope="col">Fournisseur d'assurance</th>
      <th scope="col">Numéro de police d'assurance</th>
      <th scope="col">Montant couvert</th>
      <th scope="col">Date de début</th>
      <th scope="col">Date d'éxpiration</th>
      <th scope="col">Date de renouvlement</th>
      <th scope="col">Numéro du contact</th>
      <th scope="col">Adresse courriel</th>
    </tr>
  </thead>

  <tbody>
  <?php foreach($tenant as $tenants) {
  $un= $tenants['unit_id']; 
$query6    = $db2->query( "SELECT*FROM  unit_insurance WHERE unit_id = '$un'");
$assurance     = $query6->fetchAll( PDO::FETCH_ASSOC );
 foreach($assurance as $assurances) { ?>
    <tr style="border: gray 1px solid;">
 
      <td><?php echo $assurances['insurance_provider']    ;?></td>
      <td><?php echo $assurances['policy_number']    ;?></td>
      <td>$<?php echo $assurances['coverage_amount']    ;?></td>
      <td><?php echo $assurances['policy_effective']    ;?></td>
      <td><?php echo $assurances['policy_expiration']    ;?></td>
      <td><?php echo $assurances['renewal_date']    ;?></td>
      <td><?php echo $assurances['agent_phone']    ;?></td>
      <td><?php echo $assurances['agent_email']    ;?></td>
   
    </tr>
  
    <?php } ?>
    <?php } ?>
  </tbody>
</table>

<div><h6 style="margin-left: 40px; margin-top:20px; background-color: #CDCDCD">Stationnement:</h6></div>
<table class="table" style="margin-left: 20px; margin-right: 40px;">
  <thead>
    <tr style="border: gray 1px solid;">
      <th scope="col">Type de stationnement</th>
      <th scope="col">Nombre de places</th>
      <th scope="col">Numéro de place</th>
      <th scope="col">Frais mensuels</th>
      <th scope="col">Ouvert aux visiteurs ?</th>
      
    </tr>
  </thead>

  <tbody>
  <?php foreach($tenant as $tenants) {
  $un= $tenants['unit_id']; 
$query7    = $db2->query( "SELECT*FROM parking WHERE unit_id = '$un'");
$parking     = $query7->fetchAll( PDO::FETCH_ASSOC );
 foreach($parking as $parkings) { ?>
    <tr style="border: gray 1px solid;">
 
      <td><?php echo $parkings['parking_type']    ;?></td>
      <td><?php echo $parkings['numberOfSpots']    ;?></td>
      <td><?php echo $parkings['spotNumber']    ;?></td>
      <td>$<?php echo $parkings['parking_fee']    ;?></td>
      <td><?php echo $parkings['guest']    ;?></td>
     
   
    </tr>
  
    <?php } ?>
    <?php } ?>
  </tbody>
</table>

<div><h6 style="margin-left: 40px; margin-top:20px; background-color: #CDCDCD">Sécurité:</h6></div>
<table class="table" style="margin-left: 20px; margin-right: 40px;">
  <thead>
    <tr style="border: gray 1px solid;">
      <th scope="col">Présence de guarde</th>
      <th scope="col">Compagnie de sécurité</th>
      <th scope="col">Système de sécurité</th>
      <th scope="col">Carte d'accès</th>
      <th scope="col">Code sur clavier</th>
      
    </tr>
  </thead>

  <tbody>
  <?php foreach($tenant as $tenants) {
  $un= $tenants['unit_id']; 
$query8    = $db2->query( "SELECT*FROM security WHERE Unit_id = '$un'");
$security     = $query8->fetchAll( PDO::FETCH_ASSOC );
 foreach($security as $securities) { ?>
    <tr style="border: gray 1px solid;">
 
      <td><?php echo $securities['guard']    ;?></td>
      <td><?php echo $securities['company']    ;?></td>
      <td><?php echo $securities['Security_system']    ;?></td>
      <td><?php echo $securities['access_card']    ;?></td>
      <td><?php echo $securities['keyboard_code']    ;?></td>
      
     
   
    </tr>
  
    <?php } ?>
    <?php } ?>
  </tbody>
</table>
<div><h6 style="margin-left: 40px; margin-top:20px; background-color: #CDCDCD">Visiteurs:</h6></div>
<table class="table" style="margin-left: 20px; margin-right: 40px;">
  <thead>
    <tr style="border: gray 1px solid;">
      <th scope="col">Nom du visiteur</th>
      <th scope="col">Compagnie</th>
      <th scope="col">Raison de la visite</th>
      <th scope="col">Arrivée</th>
      <th scope="col">Départ</th>
      
    </tr>
  </thead>

  <tbody>
  <?php foreach($tenant as $tenants) {
  $un= $tenants['unit_id']; 
$query8    = $db2->query( "SELECT*FROM visitors WHERE unit_id  = '$un'");
$visitor     = $query8->fetchAll( PDO::FETCH_ASSOC );
 foreach($visitor as $visitors) { ?>
    <tr style="border: gray 1px solid;">
 
      <td><?php echo $visitors['visitor_name']    ;?></td>
      <td><?php echo $visitors['company_name']    ;?></td>
      <td><?php echo $visitors['purpose']    ;?></td>
      <td><?php echo $visitors['arrival']    ;?></td>
      <td><?php echo $visitors['departure']    ;?></td>
      
      
     
   
    </tr>
  
    <?php } ?>
    <?php } ?>
  </tbody>
</table>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

