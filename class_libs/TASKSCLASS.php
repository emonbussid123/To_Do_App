<?php
 error_reporting(E_ERROR | E_PARSE);
require_once('DATABASECLASS.php');

class TASKSCLASS extends DATABASECLASS{

    public function index(){
           
           $connection = $this->connection;
           //print_r($Connection);
    
           $view_tasks_query = "SELECT * FROM tasks";
    
           $result = $connection->query($view_tasks_query);
    
           if($connection->error){
               die('Table Error:'.$connection->error);
           }   
     
           return $result;
     
           
 }
    

public function Task_add(){
     
     
      $name = $_POST['name'];
      $title = $_POST['title'];
      $deadline= $_POST['deadline'];
      $description = trim($_POST['description']);
      
       $errors = [];
     
        if(strlen($name)== 0){
              $errors['name'] = 'Please input your name ...'; 
          }else{
            if(strlen($name) < 5){
              $errors['name'] = 'Minimum 5 characters needed ...'; 
          }
        }
        
      if(strlen($title)== 0){
              $errors['title'] = 'Please insert your task title ...'; 
          }else{
            if(strlen($title) < 10){
              $errors['name'] = 'Minimum 10 characters needed ...'; 
          }
        }
    
       if(strlen($deadline)== 0){
              $errors['deadline'] = 'Please insert your task deadline ...'; 
          }
        
    
        if(empty($description)){
              $errors['description'] = 'Please insert your task description ...'; 
          }
        
    if(count($errors) > 0){
			return [
				'status' => 'error',
				'message' => $errors
			];
		}
    
        $connection = $this->connection;
        
    
          
           $success = []; 
           
    
          
        
           
           $DESCRIPTION = $connection->real_escape_string($description);
        
          
           $insert_tasks_query = "INSERT INTO tasks(name, title, deadline,  description)VALUES('$name','$title','$deadline','$description')";
        
           $result = $connection->query($insert_tasks_query);
           
           if($connection->error){
               die('Table Error:'.$connection->error);
           }

          $success['success'] = 'Product created successfully!';
               
          return[
           'status' => 'success',
           'message' => $success
          ]; 
           
            
            
          
     
           
 }
    
     public function targetData($id){
           
           #$sku = $_GET['sku'];
        
           $connection = $this->connection;
           //print_r($Connection);
    
           $view_tasks_query = "SELECT * FROM tasks WHERE id='$id'";
    
           $result = $connection->query($view_tasks_query);
    
           if($connection->error){
               die('Table Error:'.$connection->error);
           }   
     
           if($result->num_rows == 0){
               header('Location:tasks.php');
           }
        
        
           return $result->fetch_assoc();
     
           
 }
    
    public function Task_edit(){
    $Update_task_id = $_POST['update_task_id'];   
    $name = $_POST['name'];
    $title = $_POST['title'];
    $deadline= $_POST['deadline'];
    $description = $_POST['description'];

    $errors = [];

    // Validation
    if(strlen($name) == 0){
        $errors['name'] = 'Please input your name ...'; 
    } elseif(strlen($name) < 5){
        $errors['name'] = 'Minimum 5 characters needed ...'; 
    }

    if(strlen($title) == 0){
        $errors['title'] = 'Please insert your task title ...'; 
    } elseif(strlen($title) < 10){
        $errors['title'] = 'Minimum 10 characters needed ...'; 
    }

    if(strlen($deadline) == 0){
        $errors['deadline'] = 'Please insert your task deadline ...'; 
    }

    if(strlen($description) == 0){
        $errors['description'] = 'Please insert your task description ...'; 
    }

    if(count($errors) > 0){
        return [
            'status' => 'error',
            'message' => $errors
        ];
    }

    $connection = $this->connection;

    $sql_select = "SELECT * FROM tasks WHERE id='$Update_task_id'";
    $result = $connection->query($sql_select);

    if($connection->error){
        return [
            'status' => 'error',
            'message' => ['database' => $connection->error]
        ];
    }

    $getEditData = $result->fetch_assoc();
    $date = $getEditData['deadline'];
    $cross_date = date('Y-m-d', strtotime($getEditData['updated_at']));

    $cross_timestamp = strtotime($cross_date);
    $date_timestamp  = strtotime($date);

    if ($cross_timestamp == $date_timestamp) {
        $status = 1;
    } elseif ($cross_timestamp > $date_timestamp) {
        $status = 0;
    } else {
        $status = 0;
    }

    // Update task
    $sql_update = "UPDATE tasks SET name='$name', title='$title', deadline='$deadline', description='$description', status='$status' WHERE id='$Update_task_id'";
    $update_result = $connection->query($sql_update);

    if($connection->error){
        return [
            'status' => 'error',
            'message' => ['database' => $connection->error]
        ];
    }

    return [
        'status' => 'success',
        'message' => 'Task updated successfully!'
    ];
}

    
    
    
    public function Delete_task(){
           $Task_id = $_POST['DeletedID'];
           $connection = $this->connection;
           //print_r($Connection);
    
           $view_tasks_query = "SELECT * FROM tasks WHERE id='$Task_id'";
    
           $result = $connection->query($view_tasks_query);
    
           if($connection->error){
               die('Table Error:'.$connection->error);
           }   
     
           if($result->num_rows == 1){
               $getData = $result->fetch_assoc();
               $Delete_tasks = "DELETE FROM tasks WHERE id='$Task_id'";
    
               $result = $connection->query($Delete_tasks);
    
               if($connection->error){
                   die('Table Error:'.$connection->error);
               }   
               
    
               $success['success'] = 'Deleted successfully!';
     
               return[
                   'status' => 'success',
                   'message' => $success
               ];
     
           }
     
           
 }
    
   
}

?>
