
<?php     include("head.php"); ?>

<div id='PreLoader'>
    <div id='Loader'>
        <img src='img/loader_classic.gif'><br>      
    </div>
</div>


<?php
//TOKENS
$MiToken = MiToken($RinteraUser, "Nuevo");
if ($MiToken == ''){
    $MiToken = MiToken_Init($RinteraUser, "Nuevo");
}
// echo "Token: ".$MiToken;




include ("header.php");

?>


<?php
if (UserAdmin($RinteraUser)==TRUE){
  
   
    echo "<div id='NuevoReporte' >";
    echo "<h3 style='text-align: center;
    color: #fff;
    background-color: rgb(24, 149, 198);
    font-size: 13pt;
    padding: 10px; margin-bottom:0px;
    font-family: ExtraBold'>Preparar un nuevo Reporte!:</h3>";
    echo "<div id='R' style='background-color: #fdf6e7;
    padding: 10px;'></div>";

    
   echo '
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8" style="" >
        
        ';

        echo "<br><label>Nombre del Reporte:</label>";
        echo "<input class='form-control' type='text' name='rep_name' id='rep_name'>";

        echo "<br><label>Descripción del Reporte:</label>";
        echo "<input class='form-control' type='text' name='rep_description' id='rep_description'>";

        echo '<br>
        <label>Consulta a la Base de Datos: (solo comillas dobles )  <br>
        
        <b>Ejemplo:</b> 
        <cite>select * from mitabla where parametro=<b style="color:blue">{var1}</b>  and otroparametro=1</cite>
        </label>
        <textarea  id="rep_query" rows=10 style="background-color: #272822;
        color: #cccc82;"
        class="Query form-control"></textarea>
        ';

        
        echo "<br><label>¿Que base de datos usara la consulta? </label> <select id='db' class='form-control' name='db'>";
        $r= $db0 -> query("select * from dbs where Active=1");    
        while($finfo = $r -> fetch_array()) {   
            echo "<option value='".$finfo['IdCon']."'>".$finfo['ConName']."</opion>";
        }
        unset($r); unset($finfo);
        echo "</select>";


        echo "<br><label>Orientación</label><br>";
        echo "<select name='Orientacion' class='form-control' id='Orientacion'>";
        echo "<option value='L'>Horizontal</option>";
        echo "<option value='P'>Vertical</option>";
        echo "</select>";

        echo "<br><label>Tamaño de Pagina</label><br>";
        echo "<select name='PageSize' class='form-control' id='PageSize'>";
        echo "<option value='0'>Carta</option>";
        echo "<option value='1'>Oficio</option>";
        echo "</select>
        
        
        
        ";
        
        echo '
        </div>
        <div class="col-sm-4" 
        style="
        background-color: #eceeee;
        height:100%;
        "
        >
        <center><b style="color: #ff7800;
        font-size: 10pt;">Configuracion de las variables:</b></center>
        <div id="accordion">
        <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
            style="
            display: block;
            width: 100%;
        "
            >
                {var1}
            </button>
            </h5>
        </div>
    
        <div id="collapseOne" style="background-color:rgb(218, 220, 221);"
         class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
            
            <br><label>¿Utilizaras var1?</label>
            <select name="var1" class="form-control"  style="background-color:orange; color:white;" id="var1" >
            <option value="0" selected>NO</option>
            <option value="1">SI</option>
            </select>
            

            <br><label>Tipo:</label>
            <select name="var1_type"  id="var1_type" class="form-control">
            <option value="text" selected>Texto</option>
            <option value="number">Numero</option>
            <option value="date">Fecha</option>
            </select>

            <br><label>Texto para mostrar:</label>
            <input type="text" class="form-control" name="var1_label" id="var1_label">

            <br><label>Consulta de llenado:</label>
            <textarea name="var1_sql" id="var1_sql" class="Query form-control" style="background-color: #c3c6b1;
            color: #304a4d;"></textarea>






            </div>
        </div>
        </div>


        <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
            style="
            display: block;
            width: 100%;
        "
            >
                {var2}
            </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="background-color:rgb(218, 220, 221);">
            <div class="card-body">

            
            <br><label>¿Utilizaras var2?</label>
            <select name="var2" id="var2" class="form-control"  style="background-color:orange; color:white;" >
            <option value="0" selected>NO</option>
            <option value="1">SI</option>
            </select>
            

            <br><label>Tipo:</label>
            <select name="var2_type" id="var2_type" class="form-control">
            <option value="text" selected>Texto</option>
            <option value="number">Numero</option>
            <option value="date">Fecha</option>
            </select>

            <br><label>Texto para mostrar:</label>
            <input type="text" class="form-control" name="var2_label" id="var2_label">

            <br><label>Consulta de llenado:</label>
            <textarea name="var2_sql" id="var2_sql" class="Query form-control" style="background-color: #c3c6b1;
            color: #304a4d;"></textarea>



            </div>
        </div>
        </div>
        <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
            style="
            display: block;
            width: 100%;
        "
            >
                {var3}
            </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="background-color:rgb(218, 220, 221);"> 
            <div class="card-body">
            <br><label>¿Utilizaras var3?</label>
            <select name="var3" id="var3" class="form-control"  style="background-color:orange; color:white;" >
            <option value="0" selected>NO</option>
            <option value="1">SI</option>
            </select>
            

            <br><label>Tipo:</label>
            <select name="var3_type" id="var3_type" class="form-control">
            <option value="text" selected>Texto</option>
            <option value="number">Numero</option>
            <option value="date">Fecha</option>
            </select>

            <br><label>Texto para mostrar:</label>
            <input type="text" class="form-control" name="var3_label" id="var3_label">

            <br><label>Consulta de llenado:</label>
            <textarea name="var3_sql" id="var3_sql" class="Query form-control" style="background-color: #c3c6b1;
            color: #304a4d;"></textarea>



            </div>
        </div>
        </div>

        
    </div>';
    echo "<br><label>Formato:</label><br>";
    echo "<select name='Formato' id='Formato' class='form-control'>";
    echo "<option value='0'>HTML</option>";
    echo "<option value='1'>DataTable</option>";
    echo "<option value='2'>PDF</option>";
    echo "<option value='3'>Excel</option>";
    echo "<option value='4'>Word</option>";

    echo "</select>";




    if ($UsuariosForaneaos == "FALSE"){
        echo "<br><label>Usuario Administrador: <a href='users.php' title='Haga clic para administrar los usuarios'><img src='icons/user_add.png' style='width:17px;'></a></label><br>";
        echo "<select name='ReporteIdUser' id='ReporteIdUser' class='form-control'>";
        echo "<option value=''>Seleccione</option>";         
    } else {
        echo "<br><label>Usuario Administrador: </label><br>";
        echo "<select name='ReporteIdUser' id='ReporteIdUser' class='form-control'>";
        echo "<option value=''>Seleccione</option>";        
    }
       

    if ($UsuariosForaneaos == "FALSE") {
        $sql = "select * from users";
    } else {
        $sql = $QueryUsuariosForaneos . " order by UserName";
    }
    echo $sql;
    $rc = $dbUser->query($sql);    
    if ($dbUser->query($sql) == TRUE){
        // echo "OK";
        while($fu= $rc -> fetch_array()) {   
                echo "<option value='".$fu['IdUser']."' title='IdUser=".$fu['IdUser']."'>".$fu['UserName']."</option>";
        }

    } else {
        Toast("ERROR al obtener la lista de usuarios",3,"");
    }

    
    
         

    
    // echo $sql;
    
    echo "</select>";


    echo '
        <br><br><br>';
        echo "
        <script>
        
        function SendData(){   
            var rep_name = $('#rep_name').val();
            var rep_descripcion = $('#rep_description').val();
            var rep_query = $('#rep_query').val();
            var db = $('#db').val();
            var Orientacion = $('#Orientacion').val();
            var PageSize = $('#PageSize').val();
            var Formato = $('#Formato').val();

            //Var1
            var var1 = $('#var1').val();
            var var1_type = $('#var1_type').val();
            var var1_label = $('#var1_label').val();
            var var1_sql = $('#var1_sql').val();


            //Var2
            var var2 = $('#var2').val();
            var var2_type = $('#var2_type').val();
            var var2_label = $('#var2_label').val();
            var var2_sql = $('#var2_sql').val();


            //Var3
            var var3 = $('#var3').val();
            var var3_type = $('#var3_type').val();
            var var3_label = $('#var3_label').val();
            var var3_sql = $('#var3_sql').val();

            var ReporteIdUser = $('#ReporteIdUser').val();


            $('#PreLoader').show();
            $.ajax({
                url: 'newdata.php',
                type: 'post',        
                data: {IdUser:'".$RinteraUser."', Token: '".$MiToken."',
                    rep_name: rep_name,
                    rep_descripcion: rep_descripcion,
                    rep_query: rep_query,
                    db: db,
                    Orientacion: Orientacion,
                    PageSize: PageSize,
                    var1:var1,
                    var1_type:var1_type,
                    var1_label:var1_label,
                    var1_sql:var1_sql,

                    var2:var2,
                    var2_type:var2_type,
                    var2_label:var2_label,
                    var2_sql:var2_sql,

                    var3:var3,
                    var3_type:var3_type,
                    var3_label:var3_label,
                    var3_sql:var3_sql,
                    Formato:Formato,
                    ReporteIdUser:ReporteIdUser


        
                },
                success: function(data){
                    $('#R').html(data);
                    $('#PreLoader').hide();
                }
            });
            
        }
        
        
        </script>
        ";

        
        // if (MiToken_valida($MiToken, $RinteraUser, "Nuevo")==TRUE){//Valido
            echo '
                <center><button class="Mbtn btn-Success" style="font-size:20pt;font-family:ExtraBold" onclick="SendData();">Guardar</button></center>
                ';
        
        // } else { //No Valido
            

        // }
    
    echo '
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </div>
</div>';
    //echo "</form>";
    
} else {
    LocationFull("index.php");
}
?>



<?php include ("footer.php"); ?>