<?php include("head.php"); ?>


<?php

    $MiToken = MiToken($RinteraUser, "Search");
    if ($MiToken == '') {
        $MiToken = MiToken_Init($RinteraUser, "Search");
    }

// echo "Token: ".$MiToken."";
?>





<?php
include("header.php");
?>

<section id='Busqueda' style='
background-color: <?php echo Preference("ColorPrincipal", "", ""); ?>;
'>

<table width=100%><tr><td>
    <?php

    if (isset($_GET['q'])) {

        echo '
    <input id="InputBusqueda" list="busquedas"     data-min-length="1"
    style="

        background-color: '.Preference("ColorPrincipal", "", "").';
        

    "
    class="InputBusqueda flexdatalist" type="text" placeholder="¿Que Información necesitas?"  value="' . VarClean($_GET['q']) . '">
    ';
    } else {
        echo '
    <input id="InputBusqueda" list="busquedas"  data-min-length="1"
    style="

        background-color: '.Preference("ColorPrincipal", "", "").';
       

    "
    class="InputBusqueda flexdatalist" type="text" placeholder="¿Que Información necesitas?" >
    ';
    }

    if (isset($_GET['i1'])) {
        Toast("Guardado correctamente " . VarClean($_GET['q']), 1, "");
    }
    if (isset($_GET['e1'])) {
        Toast("ERROR:Al localizar el Reporte " . VarClean($_GET['e1']), 2, "");
    }
    // Toast("No se ha localizado tu Reporte ".$IdRep,2,"");


    ?>

</section>
</td><td width=50px align=right valign=middle 
style='
background-color: <?php echo Preference("ColorPrincipal", "", ""); ?>;
'
>
<button  class="Mbtn btn-Success"  onclick="Search();" style="
background-color:  <?php echo Preference("ColorResaltado", "", ""); ?>;
box-shadow: 0 3px  #4d4c49;

"> 
<img src='icons/busqueda.png' style='width:50px;'></button>

</td></table>
<div style='
background-color: <?php echo Preference("ColorPrincipal", "", ""); ?>;
text-align: center;
color: white;
font-size: 10pt;  height:22px;

-webkit-box-shadow: 1px 5px 5px -3px rgba(0,0,0,0.75);
-moz-box-shadow: 1px 5px 5px -3px rgba(0,0,0,0.75);
box-shadow: 1px 5px 5px -3px rgba(0,0,0,0.75);
margin-top: -2px;
'>
    <div id='PreloaderBuscando' style='display:none;'>
        Buscando <img src='img/loader_bar.gif'>
    </div>
</div>

<section id='Resultados'>
    Resutlado de la buqueda

</section>

<?php

if (UserAdmin($RinteraUser) == TRUE) {
    echo "<div class='btnMas' title='Haz clic aquí para crear un nuevo reporte'>
    <a href='nuevo.php' > <img src='src/mas.png' style='width:100%;'>
    </a>
    </div>";

}
?>

<div id='Footer'>
    <b>Rintera<b>: Es un proyecto para la gestion de reportes a traves de consultas a la base de datos con variables integradas. El entorno ideal para gestionar la data de tu proyecto

</div>


<?php
echo "
<script> 
$('.InputBusqueda').css('background-color','".Preference("ColorPrincipal", "", "")."');
$('.InputBusqueda').css('color','white');
</script>
";
echo "
    <script>
    function Search(){
        var busqueda = $('#InputBusqueda').val();
       
            $('#PreloaderBuscando').show();                
            $.ajax({
                url: 'search.php',
                type: 'post',        
                data: {IdUser:'" . $RinteraUser . "', Token: '" . $MiToken . "',
                    busqueda:busqueda

                },
            success: function(data){
                $('#Resultados').html(data);
                $('#PreloaderBuscando').hide();
            }
            });
       


            
    }
    Search();
    </script>

";

include ("footer.php");
?>
