
<!DOCTYPE html>
<html lang="en">
<html>
<?php

session_start();
include("dbcon.php");


include("importscript.php");



if(isset($_SESSION["uid"]))



{










if($_SESSION["getuser"] != 25) //ADMIN

{
  

        echo"<script>window.open('login2.php','_self')</script>";

        exit();

}





}


else

{


          echo"<script>window.open('login2.php','_self')</script>";
        exit();


}
 


?>

<head>

<?php if ($_SESSION['HorS']==1){?>
<link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
    <title>Halcyon | Main</title>

 <?php } ?>


<?php if ($_SESSION['HorS']==2){?>
<link rel="icon" type="image/png" href="img/favicon1-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="img/favicon1-16x16.png" sizes="16x16" />
<title>ShiptoShore | Main</title>

 <?php } ?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
       <link href="css/Fontmoken.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->


<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>


<style type="text/css">
  .container {
  width: 100%;
  margin: 0 auto;
  overflow: hidden;
  height: 100%;
}

</style>

</head>







<!--Navbar-->
<?php include 'banner.php' ?>



<body>


<br><br><br>
<div class="container" >

<div class="row" >


<div class="col-md-3" style="padding-bottom:20px;">




<!--.Card-->
<div class="card" style="background-color:#0099CC;border-radius:20px 20px 0px 0px;border:1px solid #424242; ">



    <!--Card content-->
    <div class="card-block">
        <!--Title-->
        <h4 class="card-title"><center><br><p style="color:white;font-weight: bold;"><?php echo  $_SESSION['pn']; ?></p></center></h4>
      
    </div>
    <!--/.Card content-->

</div>
<!--/.Card-->


<!--Accordion wrapper-->
<div class="accordion" id="accordion"  role="tablist" aria-multiselectable="true">





<?php
    


       $table21 = "select * from cor_progress WHERE  posId='".$_SESSION['posId']."' and  userId = '".$_SESSION['uid']."'";
           $run_query2b1 = mysqli_query($dbcon,$table21);

           while($rowpy = mysqli_fetch_assoc($run_query2b1))
           {
    
              
            $table211 = "select * from coursemodule WHERE  `courseid`='".$rowpy['courseId']."'";
           $run_query2b11 = mysqli_query($dbcon,$table211);

             while($rowpy1 = mysqli_fetch_assoc($run_query2b11))
             {
           
                $prox[]=$rowpy1['courseid'];
             }
           }



  
           $table2 = "select * from cor_progress WHERE  posId='".$_SESSION['posId']."' and  userId = '".$_SESSION['uid']."' and courseId IN (".implode(',',$prox).")";
           $run_query2b = mysqli_query($dbcon,$table2);





  
$x1=0;
           while($row = mysqli_fetch_assoc($run_query2b))

               {  
            
                 $x1=$x1+1;


$c="#c".$x1;
$cc="c".$x1;





?>



<div class="card">
        <div class="card-header" style="background-color:white;border:1px solid #424242;" role="tab" id="headingTwo">
            <a  onclick="blood('<?php echo $row["courseId"]; ?>')"  data-toggle="collapse" data-parent="#accordion" aria-expanded="false"  href="<?php echo $c; ?>" aria-controls="<?php echo $cc; ?>">

                <h5 class="mb-0">
              <center><p><?php echo $row['coursename']; ?></p><?php 




              if($row['status']=='Pending')
              {
                echo "<img src='img/pending.gif' height='50' width='150'>";
              }
                if($row['status']=='On-going')
              {
               echo "<img src='img/inprogress.gif' height='50' width='150'>"; 
              }
                if($row['status']=='Completed')
              {
                echo "<img src='img/completed.jpg' height='50' width='150'>";
              }






              ?> </center> 
<script>
      

      function blood(bad)
  {

v=bad;

destination="bloodcourse.php?v="+v;
var xhr=new XMLHttpRequest();
xhr.open("GET",destination,true);
xhr.send();
xhr.onreadystatechange=function() {
      if(xhr.readyState==4 && xhr.status==200) {
    
      }
     }



      }


  </script>
            </h5>
            </a>
        </div>
        <div  class="collapse" role="tabpanel" aria-labelledby="headingTwo" id="<?php echo $cc; ?>">
            <div class="card-block">
            
 
            <?php
              $table3 = "select * from coursemodule WHERE courseid =  '".$row['courseId']."'";
           $run_query2c = mysqli_query($dbcon,$table3);  

      

           
           while($row1 = mysqli_fetch_assoc($run_query2c))

               {


 $table31 = "select * from mdl_progress WHERE moduleId =  '".$row1['moduleid']."'";
           $run_query2c1 = mysqli_query($dbcon,$table31);  
           $sous=mysqli_fetch_assoc($run_query2c1);



if($sous['status']=='Pending')
{
echo '

<button style="width: 100%;background-color:#fdd835;"   id="'.$row1['moduleid'].'"  class="btn  btn-xs view_module"> '.$row1["modulename"].' </button><br>

';
}
if($sous['status']=='On-going')
{
  echo '

<button style="width: 100%;background-color:#00b0ff;"   id="'.$row1['moduleid'].'"  class="btn  btn-xs view_module"> '.$row1["modulename"].' </button><br>

';

}
if(($sous['status']=='Completed')||($sous['isFinish']=='1'))
{
  echo '

<button style="width: 100%;background-color:#00c853;"   id="'.$row1['moduleid'].'"  class="btn  btn-xs view_module"> '.$row1["modulename"].' </button><br>

';
}





               }
               ?>


            </div>
        </div>
    </div>

    <?php
}
?>

<div class="card" style="background-color:#0099CC;border-radius:0px 0px 20px 20px;border:1px solid #424242; ">



<br><br>




<!-- ////////////////////////////////////////////////////////////// -->



         


<!--/.Accordion wrapper-->




<!-- ////////////////////////////////////////////////////////////// -->


</div>
<!--/.Accordion wrapper-->

</div>
</div>

<div id="displaymod" class="col-md-9">





</div>







</div>
</div>
</body>


<?php include ("slider.php"); ?>


<script>
    



$(document).on('click', '.view_module', function()
      {  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax(
                {  
                     url:"startmodule.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#displaymod').html(data);                           
                  
                     }  
                });  
           }            
      });   

</script>

   <!-- SCRIPTS -->
   <!-- JQuery -->

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>


</html>