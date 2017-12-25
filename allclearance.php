<!DOCTYPE html>
<html>
<head>
  <title>Student - Online School Portal </title>
  <?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
  <div class="wrapper">
    <?php include "inc/registrar_navbar.php"; ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>Student</h1>
      </section>
      <section class="content">
       <div class="row">
        <div class="col-md-7">
          <div class="box box-success">
            <div class="box-body">
              <div class="form-group">
                <label>Search Student by Grade Level:</label>
                <select style="width: 30%;" onchange="getstudent()" class="form-control" id="gradelevel" name="gradelevel">
                  <?php 
                  $yl = mysqli_query($con, "SELECT * FROM tblyearlevel order by yearlevel asc")or die(mysqli_error($con));
                  while($rowyl = mysqli_fetch_array($yl)) { 
                    ?>
                    <option value="<?php echo $rowyl['id']; ?>"><?php echo $rowyl['yearlevel']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="displaystudent"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include "inc/script.php"; ?>
    <?php include "inc/modal.php"; ?>

    <script>
      $(document).ready(function(){
        getstudent();
      })

      function getstudent()
      {
        var gradelevel = $("#gradelevel").val();
        $.ajax({
          type : "POST",
          url : "crud_function.php",
          data : { studbygrdlvl:'1', type:'0', gradelevel },
          success : function(res){
            $(".displaystudent").html(res);
          }
        })
      }
    </script>
  </div>
</body>
</html>