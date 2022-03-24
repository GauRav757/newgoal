<?php


    if(!isset($_GET['id'])){
        die("You cannot Edit");
    }
    $cid=$_GET['id'];


session_start();
 if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
   header('Location:login.php');
 }
 $id = $_SESSION['user_id']; 
 include('db/connect.php');
 $query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

$goalQuery = "SELECT * FROM goal";
    $goalResult = mysqli_query($conn,$goalQuery);
    
 if(mysqli_num_rows($goalResult)==0){
    die("No record found with this id");
}
else{
    $row = mysqli_fetch_assoc($goalResult);
}

?>
<!DOCTYPE html>
<html>
        <head>
            <title>Home goal</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        </head>
      <body>
            <?php include('include/nav.php');?>    
            <?php include('db/connect.php');?>  
            
            
           <div class="container">
             <div class="row justify-content-md-center">
               <div class="col-8">
                  <br>  
                   <form method="POST" action="db/edit-goal.php">
                       <input type="hidden" name="id" value="<?php echo $cid;?>">
                    
                       <label>Goal Title</label>
                    <div class="input-group">
                        <input type="text" value="<?php echo $row['title'];?>" class="form-control" name="title">
                    </div>
                    <br/>

                    <div class="date" style="float:left;">
                       <label for="" >Accomplish Date</label>
                       <input type="datetime-local" name="goal_accomplish_date" value="<?php echo $row['accomplish_date'];?>" class="form-control">
                  </div>   <br><br>   <br>  <br>

                      <label>Description</label>
                    <div class="input-group">
                    <input type="text"  class="form-control"  value="<?php echo $row['descriptions'];?>" name="descriptions"> </input>
                          
                  </div>
                    <br/>
                    <br/>
                     <label>Status</label>
                     <br>
                     <div class="set_status"style="float:left;">
                    <select class="form-select" name="goal_status"  value="<?php echo $row['status'];?>" aria-label="Default select example">
                      <option selected>Complete</option>
                      <option value="Complete">Complete</option>
                      <option value="Incomplete">Incomplete</option>
                      <option value="Running">Running</option>
                    </select>
                    </div>
                  
                  
                  <input type="hidden" name="id" value="<?php echo $id;?>" ?>
                    <button type="submit" class="btn btn-dark">Save</button>
                </form>
               <?php include('include/message.php'); ?>
          <div class="row justify-content-md-center"></div>
          <?php
          if(mysqli_num_rows($goalResult)==0){
            echo "<h3>No Goals found</h3>";
           }else{ ?>

           <table class="table">
             <!-- <thead>
               <th>Goal Title</th>
               <th>Action</th>
           </thead> -->
           <tbody>
             <?php while($row=mysqli_fetch_assoc($goalResult)) { ?>         
           <!-- <tr>   
             <td><?php echo $row['title'];?></td>
             <td> <a href="db/delete-goal.php?id=<?php echo $row['id']; ?>">
              <i class="fas fa-trash" style="color:red;"></i>  -->
            </a> <a href="edit-goal.php?id=<?php echo $row['id'];?>">
            <!-- <i class="fas fa-edit"></i></a></td> -->
           </tr>
           <!-- <i class="fa-solid fa-trash-can"></i> -->
           <?php } ?>
             </tbody>
             </table>
            
          <?php }
          ?>
      </div>
    </div>
  </div>
  
  

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/82f2c2ba8a.js" crossorigin="anonymous"></script>


  </body>
</html>