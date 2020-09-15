<form action="phptojson.php" method="post">

Enter php metadata
<br> <br>
<textarea type="text" rows = "20" cols = "100" name="formMovie">
</textarea>
<br> <br>
<input type="submit" name="formSubmit" value="Submit">

</form>

<?php
  if(isset($_POST['formSubmit']) && $_POST['formSubmit'] == "Submit") 
  {
    $metadata = $_POST['formMovie'];
    
    echo json_encode($metadata);
  }
?>