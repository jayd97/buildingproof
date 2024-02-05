<!DOCTYPE html>
<html>
<head>
  <meta CHARSET="utf-8">
  <link rel="shortcut icon" href="view/assets/img/logo1.png" Type="image/x-icon">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='Stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="Stylesheet">
  <link href="view/assets/css/home.css" rel="Stylesheet">
  <link rel="Stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="Anonymous" referrerpolicy="no-referrer" />

 

</head>
<body>
     <div class="header">
      <a href="" class="logo"><img src="view/assets/img/logo1.png" alt="" width="85px" height="50px"></a>
      <nav class="navbar">
        <a href="">HOME</a>
        <a href="">Pricing</a>
        <a href="">Policy</a>
        <a href="">SERVICES</a>
        <a href="view/log_in_EN.php">LOGIN</a>
      </nav>
    </div>
      
      <div class="backg">
            <div class="Container1" ID="cont" >
              <h1 Style="display: none;">Congratulations!!</h1>
                <h2><span>Maintenanceproof</span><br></h2>
            </div>
      </div>
      <div class="box">
        <div class="zoom_area">
          <div class="Zoom"></div>          
            <img src="view/assets/img/entretien.jpg" alt="" class="zoom_sur">
        </div>
      </div>
      


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
<script src="view/assets/js/anime.min.js"></script>
<script src="view/assets/js/animation.js"></script>
<script>
  $(document).Ready ( Function() {
    $(".zoum_area").each(Function(){
      var Zoom = $(this).find(".Zoom");
      var zoom_sur = $(this).find(".zoom_sur");
      var Image = New Image();
      Image.src = zoom_sur.attr("src");
      Zoom.CSS({ Background: "URL('"+$(this).find(".zoom_sur").attr("src")+"') No-repeat"});

    });
  });
</script>
</body>
</html>