<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "projet");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['Ajouter'])) {
  	// Get image name
  	$image = $_FILES['profile']['name'];
  	// Get text
  	
      $nom = $_POST['nom'];
      $email = $_POST['email'];
      $pass = $_POST['password'];

  	// image file directory
  	$target = "usersImage/".basename($image);

  	$sql = "INSERT INTO users (profileImage,Nom,email,passwordUser) VALUES ('$image', '$nom','$email','$pass')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="style7.css">
    <title></title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
        <div class="sent">
            <div class="alert-success">
                <span>Hello <?php echo $nom; ?>, Welcome to the Monument Store</span>
            </div> 
        </div>
           
            <div  class="g1">
               <a> <button id="button" onclick="showhide()" style=" background-color: rgb(82, 197, 82); color:white;width: 115px;
                border: rgb(82, 197, 82); margin-left: 6px;"><i class="fas fa-sliders-h" style="font-size: 40px;"></i></button></a>
                <div id="newpost"  class="hidden" style="margin-top: 5px; color:white; font-size:15px;">
                    <h3>Store</h3>
                </div>  
            </div>
                <div  class="g1">
                <a> <button id="button" onclick="showhide1()" style=" background-color: rgb(82, 197, 82); color:white;width: 115px;
                    border: rgb(82, 197, 82); margin-left: 7px;"><i class="fa-solid fa-users" style="font-size: 40px;"></i></button>
                    <div id="newpost1"  class="hidden1" style="margin-top: 5px; color:white; font-size:15px;">
                        <h3>Utilisateurs</h3>
                    </div>  
                </div>
                <div  class="g1">
                    <button id="button" onclick="showhide2()" style=" background-color: rgb(82, 197, 82); color:white;width: 115px;
                    border:#4d9754; rgb(82, 197, 82); margin-left: 7px;"><i class="fa-solid fa-circle-info" style="font-size: 40px;"></i></button>
                    <div id="newpost2"  class="hidden2" style="margin-top: 5px; color:white; font-size:15px;">
                        <h3>Logs</h3>
                    </div>  
                </div>
                <div  class="g1">
                    <button id="button" onclick="showhide3()" style=" background-color: rgb(82, 197, 82); color:white;width: 115px;
                    border: rgb(82, 197, 82); margin-left: 8px;"><i class="fa-solid fa-right-from-bracket" style="font-size: 40px;"></i></button>
                    <div id="newpost3"  class="hidden3" style="margin-top: 5px; color:white; font-size:15px;">
                        <h3>Deconnexion</h3>
                    </div>  
                </div>

               
              
             
        </div>

    
        
        <div class="formulaire">
        
        <form method="post" action ="user.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div class="image">
            <input type="file" name="profile" id="profile" onchange=displayImage(this) style=" display:none ;">
            <img src="plus2.png" id="profileDisplay" onclick=triggerClick() alt="">
            </div>
            <div class="text_field">
                <input type="text" placeholder="Nom"  name="nom" id="nom"  required>
            </div>
            <div class="text_field">
                <input type="text" placeholder="E-mail" name="email" id="email" required>
            </div>
            <div class="text_field">
                <input type="password"placeholder="Mot de passe" name="password" id="password" required>
            </div>
            <div class="submit">
            <input type="submit" name="Ajouter" value="Ajouter"></div>
        </form>
         </div>
         

    
    <div class="content">
    <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "<div id='img_div'>";
              echo "<img src='usersImage/".$row['profileImage']."' >";
              echo "<div id='text_div'>";
              echo "<p>".$row['Nom']."</p>";
              echo "<p>".$row['email']."</p>";
              echo "</div>";
          echo "</div>";

        }
      ?>
    </div>
    
           
    </div>
    </div>
    
    

    <script src="script7.js"></script>
</body>

</html>