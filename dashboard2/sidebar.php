<?php
 error_reporting(E_ERROR | E_PARSE);
  require('header.php');

   require_once('../class_libs/HOMECLASS.php');

   $home = new HOMECLASS;

  
  
   
  

   
?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-image: url('../images/bg.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="../index.php">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="../images/logo2.jpg" alt="logo2" class="rounded-circle" style="width:100px; height: 100px;">
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree" style="background-color: #5D4037;">  
		  
		<li class="py-2">
          <a href="dashboard2.php" style="text-decoration: none;">
            <img src="../images/tilesicon.png" alt="tilesicon" style="width:25px; height:25px;">
			<h4 class="text-white fw-bold" style="display:inline-block; text-decoration: none;">Dashboard</h4>
          </a>
        </li>  
          
        <li class="py-2">
          <a href="tasks.php" style="text-decoration: none;">
            <img src="../images/tasks.png" alt="tasks" style="width:25px; height:325x;">
			<h4 class="text-white fw-bold" style="display:inline-block; text-decoration: none;">Tasks</h4>
          </a>
        </li> 
        
		 
        
            
        
       
      </ul>
    </section>
	
	
  </aside>