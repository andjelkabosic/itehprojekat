
<?php include 'konekcija.php'  ?>
<?php include 'header.php'; 
include 'navigacija.php';


?>
   <body style="background-image:url(images/2.jpg); background-repeat: no-repeat;
   background-size: 100% 700px;">

<div style="margin-top: 8%;  margin-left: 35%; ">
      <h2>Proverite danasnji kurs</h2>
     <form method="GET" action="">
        <div class="form-group">
              <label for="iznos" class="cols-sm-2 control-label">Iznos : </label>
           
                <div class="input-group" style="width: 20%">
                  
                  <input type="text" class="form-control" name="iznos" id="iznos"  placeholder="Iznos"/>
                
              </div>
            </div>
     

       <div class="form-group">
              <label for="izvalute" class="cols-sm-2 control-label">Iz valute : </label>
           
                <div class="input-group" style="width: 20%">
                  
                  <input type="text" class="form-control" name="izvalute" id="izvalute"  placeholder="Iznos"/>
                
              </div>
            </div>

            <div class="form-group">
              <label for="uvalutu" class="cols-sm-2 control-label">U valutu : </label>
           
                <div class="input-group" style="width: 20%">
                  
                  <input type="text" class="form-control" name="uvalutu" id="uvalutu"  placeholder="Iznos"/>
                
              </div>
            </div>
          
           <div class="form-group ">
              <button type="submit" value="konvertuj" name="submit" id="button" class="btn btn-default btn-lg" style="border-radius: 12px;  border: 2px solid #9ccce5; margin-left: 15%; " >Konvertuj</button>
            </div>
        
     </form>


   <?php if (!empty ($_GET['iznos'])&&!empty ($_GET['izvalute'])&&!empty ($_GET['uvalutu'])){?>
    <?php
    $iznos = $_GET['iznos'];
    $izvalute = $_GET['izvalute'];
    $uvalutu = $_GET['uvalutu'];
    $url = 'https://api.kursna-lista.info/0e0156083e1ccc17dc40319ca542628a/konvertor/'.$izvalute.'/'.$uvalutu.'/'.$iznos;

     $curl = curl_init($url);

     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_POST, false);
    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $parsiran_json = json_decode ($curl_odgovor);

?>
<h2>Rezultat:</h2>
<p style="font-size: 20px;"><?php echo $iznos;?> <?php echo $izvalute;?> vredi <?php echo $parsiran_json->result->value;?> <?php echo $uvalutu;?>.</p>

<?php
}
?>
</div>

<img src="images/v1.png" style="height: 100px; width: 100px; margin-top: 25px; margin-left: 8px;">
<img src="images/v2.png" style="height: 100px; width: 100px; margin-top: 25px; margin-left: 84%;">


  <?php include 'footer.php'; ?>
</body>
</html>