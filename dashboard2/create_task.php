
    <?php
        error_reporting(E_ERROR | E_PARSE);

       $old = $_POST;
       require('sidebar.php');
       require_once('../class_libs/TASKSCLASS.php');
       $add_task = new TASKSCLASS;

     
      if(isset($_POST['add_task'])){
          $task_add = $add_task->Task_add();
          
           if($task_add['status'] == 'error'){
             $errors = $task_add['message'];
         }
          if($task_add['status'] == 'success'){
             $success = $task_add['message'];
         }  
      
      }
     
      
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h5 class="text-dark fw-bold fs-1">Create Task</h5>
           <!-- Button trigger modal -->
           <div class="d-flex justify-content-end my-3">
                <!-- Button trigger modal -->
                 <a href="tasks.php" class="btn btn-dark">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                     </svg>
                 </a>
           </div>
      </div>
      
     <div>
          <?php
            if(isset($success)){
          ?>
          <div class="alert alert-success fw-bold" role="alert" name="success">
            <?php print $success['success']; ?>
          </div>
          <?php
             header('Refresh:1,url=tasks.php');
             }
          ?>  
      </div>
      <div class="container">
        <div class="row">
           <div class="col-9 mx-auto">   
             <form method="post">  
                <div class="form-floating my-3">
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $old['name']?? ''; ?>">
                      <label for="name">Name</label>
                </div>
                <p class="text-dark" style="font-size:15px;"> <?php echo $errors['name']??'' ?></p>
                 
               <div class="form-floating my-3">
                      <input type="text" class="form-control" id="title" name="title" value="<?php echo $old['title']?? ''; ?>">
                      <label for="title">Task Title</label>
                </div>
                <p class="text-dark" style="font-size:15px;"> <?php echo $errors['title']??'' ?></p>
                 
                <div class="form-floating my-3">
                      <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo $old['deadline']?? ''; ?>">
                      <label for="deadline">Task Deadline</label>
                </div>
                <p class="text-dark" style="font-size:15px;"> <?php echo $errors['deadline']??'' ?></p>
               
                <div class="form-floating my-3">
                   <textarea id="description" name="description" class="form-control" style="height: 500px;"><?php echo $old['description']?? ''; ?></textarea>
                   <label for="description">Task Description</label>
                </div>
                <p class="text-dark" style="font-size:15px;"> <?php echo $errors['description']??'' ?></p>
                 <div class="d-flex justify-content-center">
                     <button type="submit" class="btn btn-dark me-2" style="padding:10px 30px;" name="add_task">Submit</button> 
                 </div>  
             </form>   
           </div>
        </div>  
      </div>
        
      
          
         
              
        <canvas width="900" height="380"></canvas>
    </main>
  </div>
</div>
    

<?php
  require('footer.php');  
?>