<?php
require("rintera-config.php");
require("components.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login by Rintera</title>


    <script src="lib/jquery-3.3.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">


    <?php
    $dir = "";
    echo '
             

<script src="lib/jquery-3.3.1.js"></script> 
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="lib/jquery.toast.min.css">
<script type="text/javascript" src="lib/jquery.toast.min.js"></script>
<link rel="stylesheet" type="text/css" href="lib/datatables.min.css"/> 
<script type="text/javascript" src="lib/datatables.min.js"></script>
<script src="lib/jquery.modalpdz.js"></script> 
<link rel="stylesheet" href="lib/jquery.modalcsspdz.css" />
<link rel="stylesheet" href="src/default.css" />
';


    ?>

    <style>
        body {
            /* background-image: var(--RinteraBackground); */
            /* background-size: 200%; */
            background-color: #919191;
            /* background-blend-mode: screen; */

        }

        #Login,
        #Login2 {
            width: 40%;
            background-color: white;
            position: absolute;
            left: 29%;
            top: 25%;
            padding: 14px;
            border-radius: 10px;

            -webkit-box-shadow: 1px 7px 13px 1px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 1px 7px 13px 1px rgba(0, 0, 0, 0.75);
            box-shadow: 1px 7px 13px 1px rgba(0, 0, 0, 0.75);
        }
    </style>
</head>

<body>
    <div id='Login'>


        <form class="form-signin" style='text-align:center;' method='POST' action=''>

            <h3><b>RINTERA:</b> Identificate!</h3>
            <label for="txtIdUser" class="sr-only">IdUser</label>
            <input type="text" id="txtIdUser" name="txtIdUser" class="form-control" placeholder="IdUser" required autofocus>
            <label for="txtNIP" class="sr-only">Password</label><br>
            <input type="password" id="txtNIP" name="txtNIP" class="form-control" placeholder="Password" required>
            <br>
            <input name='FormLogin' type='submit' class="btn btn-lg btn-primary btn-block" Value="Entrar">
            <br><br>
        </form>

    </div>
    <?php


    if (isset($_POST['FormLogin'])) {

        $txtIdUser = VarClean($_POST['txtIdUser']);
        $txtNIP = VarClean($_POST['txtNIP']);

        //Prearamos el Query
        if ($UsuariosForaneaos == "FALSE") {
            $sql = "select * from users WHERE IdUser ='" . $txtIdUser . "'";
        } else {
            $sql = $QueryUsuariosForaneos . " and IdUser='" . $txtIdUser . "'";
        }

        $rc = $dbUser->query($sql);
        // var_dump($dbUser);
        // echo $sql;
        if ($f = $rc->fetch_array()) {
            // var_dump($f);

            if ($f['NIP'] == $txtNIP) {

                $IdUser = $f['IdUser'];    // variable de entorno      
                session_name($SesionName);
                session_start();
                // session_regenerate_id();    
                // echo "Id: ".session_id();            


                $_SESSION['RinteraUser'] = $f['IdUser']; //session		
                $_SESSION['RinteraUserName'] = $f['UserName']; //session		
                $RinteraUser = $f['IdUser'];
                global $RinteraUser; //generalize       

                Historia($RinteraUser, 'RinteraLogin', 'Acceso Rintera' . InfoEquipo() . '');
                SESSION_init(session_id(), $RinteraUser, $SesionName, InfoEquipo(), "");




                echo '<script>window.location.replace("index.php?home=")</script>'; 

            } else {
                Toast("Password  Incorrecto", 2, "");
            }
        } else {
            Toast("Usuario  Incorrecto", 2, "");
        }
    }

    ?>



    <?php
    echo '

<script src="lib/popper.min.js"></script>
<script src="lib/jquery-3.5.1.slim.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>';

    ?>
</body>

</html>