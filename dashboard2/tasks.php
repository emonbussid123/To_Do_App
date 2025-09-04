<?php
   error_reporting(E_ERROR | E_PARSE);
   
   require('sidebar.php'); 
   require('../class_libs/TASKSCLASS.php');
   
   
   $old = $_POST;
   
   $tasks = new TASKSCLASS;
   
   $rows = $tasks->index();
  
   
  
   
   if(isset($_POST['DeletedID'])){
       $delete = $tasks->Delete_task();
       
       if($delete['status'] == 'success'){
           $success = $delete['message'];
       }  
   
   }
   
   
   ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div>
                        <?php
                     if(isset($success)){
                      ?>
                        <div class="alert alert-success" role="alert" name="success">
                            <?php print $success['success']; ?>
                        </div>
                        <?php
                     header('Refresh:1,url=tasks.php');
                     }
                     ?>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h5 class="text-dark fw-bold fs-1">Tasks' Lists</h5>
                        <div class="d-flex justify-content-end my-3">
                            <!-- Button trigger modal -->
                            <a href="dashboard2.php" class="btn btn-light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                                </svg>
                            </a>
                            <a href="create_task.php" class="btn btn-dark ms-3">
                                Add Task
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <table class="table table-secondary table-hover">
                        <tr>
                            <th class="fs-5">SL</th>
                            <th class="fs-5">Name</th>
                            <th class="fs-5">Task Title</th>
                            <th class="fs-5">Task Description</th>
                            <th class="fs-5">Task Deadline</th>
                            <th class="fs-5">Task Status</th>
                            <th></th>
                        </tr>
                        <?php 
                     if(mysqli_num_rows($rows) > 0){
                         $x = 1;
                         while($row = mysqli_fetch_assoc($rows)){
                         
                     ?>
                        <tr>
                            <td>
                                <?php 
                           $x = $row['id'];
                           echo $x++;
                           ?>
                            </td>
                            <td>
                                <h6 class="my-1 fs-5"><?php echo $row['name'];?></h6>
                            </td>
                            <td>
                                <h6 class="my-1 fs-5"><?php echo $row['title'];?></h6>
                            </td>
                            <td>
                                <h6 class="fs-5"><?php echo $row['description'];?></h6>
                            </td>
                            <td>
                                <h6 class="fs-5"><?php echo $row['deadline'];?></h6>
                            </td>
                            <td>
                                <?php if($row['status'] == 0){
					                  echo '<h6 class="fs-5">Task Incomplete</h6>';
				                  }elseif($row['status'] == 1){
					                  echo '<h6 class="fs-5">Task Complete</h6>';
				                  }
                                ?>
                            </td>
                            <td>
                                <a href="update_task.php?id=<?php echo $row['id']; ?>" name="edit_task" class="btn btn-danger btn-sm me-2 rounded-pill py-3">
                                    <h6 class="text-dark my-0">Edit Task</h6>
                                </a>
                                <button class="btn btn-warning btn-sm rounded-pill py-3 mt-2" onclick="if(!confirm('Do you want to delete <?php echo $row['title'];?> task?')){
                            return event.preventDefault();                                              
                          }else{
                            deleteTask(<?php echo $row['id']?>);                                              
                          }">
                                    <h6 class="text-light my-0">Delete Task</h6>
                                </button>
                            </td>
                        </tr>
                        <?php 
                     }
                     }else{
                     ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                <h5>No data available</h5>
                            </td>
                        </tr>
                        <?php
                     }
                     ?>
                    </table>
                    <form class="d-none" id="Deletedform" method="post">
                        <input type="hidden" id="DeletedID" name="DeletedID">
                    </form>

                    <form class="d-none" id="statusform" method="post">
                        <input type="hidden" id="statusID" name="statusID">
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<?php
   require('footer.php');  
   ?>

<script>
    function deleteTask(x) {
        document.querySelector('#DeletedID').value = x;
        document.querySelector('#Deletedform').submit();
    }

    function statusproduct(x) {
        document.querySelector('#statusID').value = x;
        document.querySelector('#statusform').submit();
    }

</script>
