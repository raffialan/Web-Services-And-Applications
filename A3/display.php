<?php
/*
 * ------------------------------------------------------------------------------
 * Assignment 3
 * Written by: (Raffi Alan Bezirjian) -> 29538690
 * For SOEN 287 – Summer 2019
 * -----------------------------------------------------------------------------
 */
session_start();
$countVisit = 0;
if(isset($_COOKIE['countVisit'])){
    $countVisit = $_COOKIE['countVisit'];
    $countVisit ++;
    }
    setcookie('countVisit', $countVisit,  time()+ (60));




if (isset($_POST["ChangeStyle"])) {
    
    $selectBox = filter_var($_POST["fbg"], FILTER_SANITIZE_STRING);
    $slider = filter_var($_POST["font"], FILTER_SANITIZE_STRING);
    $color = filter_var($_POST["bbc"], FILTER_SANITIZE_STRING);

if(!empty($_POST["vehicle"])){
    $checkbox = filter_var($_POST["vehicle"], FILTER_SANITIZE_STRING);
    //echo $checkbox;
    $_SESSION["checkbox"] = checkbox;
}else{
    $_SESSION["checkbox"] = 'none';
}

    
    $_SESSION["selectBox"] = $selectBox;
    $_SESSION["slider"] = $slider;
    $_SESSION["color"] = $color;

    $checkbox = $_SESSION["checkbox"];


    //$checkbox1 = $_SESSION["checkbox"];

   // echo $checkbox1;

    // echo $selectBox . $slider . $color .$checkbox;

     echo "select box : " .$selectBox ."<br>";
     echo "slider  : " .$slider ."<br>";
     echo "color  : " .$color ."<br>";


   // if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirm_password"])) {

    

    
    require_once ("Process.php");
    $member = new Process();
    $member->changeStyle();
    
}



?>
<!DOCTYPE html>
<html>
<head>
<style>
p {
  text-align: center;
  font-size: 30px;
  margin-top: 0px;
}


html,
        body {
            height: 100%;
        }

        html {
            display: table;
            margin: auto;
        }

    

        h1 {
            color: maroon;
            margin-left: 40px;
        }

        label {
            font-weight: bold;
        }

        .field_set_customer_info {
            border-color: red;
            border-style: solid;
            background-color: rgb(233, 177, 177);
        }

        .field_set_car_info {
            border-color: green;
            border-style: solid;
            background-color: rgb(220, 224, 233);
        }

        .legend_set_customer_info {
            color: red;

        }

        .legend_set_car_info {
            color: green;

        }



</style>
<title>PHP Change Style Page</title>

<link rel="stylesheet" type="text/css" media="screen" href="style.php">
</head>
<body>

<p id="countdown"></p>
<p id="current"></p>

<?

if($countVisit == 0){
    echo "Welcome, you are new here!";
    } else {
    
    echo "Hello again, this is visit number: $countVisit";
    
    }
        
    ?>

    <form name="frmRegistration" method="post" action="">
        

        <fieldset id=field_set_customer_info>


            <legend class=legend_set_customer_info>Change Style</legend>
            <p>
                <label>Select Body Background Color :</label><br>
                <select name="fbg">
                    <option value="white">white</option>
                    <option value="pink">pink</option>
                    <option value="SkyBlue">SkyBlue</option>
                </select>
            </p>


            <p>
                <label>Change font Color :</label><br>
                <input type="color" id="bbc" name="bbc" value="#e66465">
            </p>

            <p>
                <label>Change Font Size : </label>
                <input type="range" min="15" max="100" step="1" value="1" id="foo" name="font" onchange='document.getElementById("bar").value = "Slider Value = " + document.getElementById("foo").value;'/><br>
                <input type="text" name="bar" id="bar" value="Slider Value = 1" disabled />
            </p>
            <p>
                <label>Select Vehical</label>
                <input type="checkbox" name="vehicle" value="car">car<br>
            </p>


        </fieldset>

      

        <p>


            Change Style

        </p>
        <p>
        <input type="submit" name="ChangeStyle" value="ChangeStyle" class="btnRegisterDisplay">
        
            
        </p>

    </form>

<script>

var timeleft = 60;
var currenttime = localStorage.getItem('seconds');
 if(currenttime>1){
     timeleft = currenttime;
 }



var downloadTimer = setInterval(function(){
  //document.getElementById("countdown").innerHTML = localStorage.getItem('seconds') + " seconds remaining";
  document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
  localStorage.setItem('seconds',timeleft);
  timeleft -= 1;
  
  if(timeleft <= 0){
  
    clearInterval(downloadTimer);
    localStorage.clear();
    document.getElementById("countdown").innerHTML = "The cookies have been deleted."


  }
}, 1000);

</script>



</body>
</html>


