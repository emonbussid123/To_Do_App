<?php
        
       error_reporting(E_ERROR | E_PARSE);

       require('sidebar.php');
    

       require_once('../class_libs/TASKSCLASS.php');
       $add_task = new TASKSCLASS;

       

      if(isset($_POST['edit_tasks'])){
          $old = $_POST;
          $tasks_edit = $add_task->Task_edit();
          header('Content-Type: application/json');
          echo json_encode($tasks_edit);
          exit;
          
           if($tasks_edit['status'] == 'error'){
             echo json_encode([
            'status' => 'error',
            'errors' => $tasks_edit['message']
        ]);
    } else {
        echo json_encode([
            'status' => 'success',
            'message' => 'Task updated successfully!'
        ]);
         }
          
      
      }
     
     $targetdata = $add_task->targetData($_GET['id']);

    ?>



<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h5 class="text-danger fw-bold fs-1">Update <span class="text-black"><?php echo $targetdata['name']; ?></span> Product</h5>
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

        <div id="message"></div>
        <div class="container">
            <div class="row">
                <div class="col-9 mx-auto">
                    <form method="post" id="updateTaskForm">
                        <input type="hidden" name="update_task_id" value="<?php echo $targetdata['id']?? ''; ?>">
                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $old['name']??$targetdata['name']?? ''; ?>">
                            <label for="name">Name</label>
                        </div>


                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $old['title']??$targetdata['title']?? ''; ?>">
                            <label for="title">Task Title</label>
                        </div>


                        <div class="form-floating my-3">
                            <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo $old['deadline']??$targetdata['deadline']?? ''; ?>">
                            <label for="deadline">Task Deadline</label>
                        </div>


                        <div class="form-floating my-3">
                            <textarea id="description" name="description" class="form-control" style="height: 500px;"><?php echo $old['description']??$targetdata['description']?? ''; ?></textarea>
                            <label for="description">Task Description</label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-dark me-2" style="padding:10px 30px;" name="edit_tasks">Update</button>
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
