<?php 
   
    require_once('../../controllers/Teacher/MessageStudentController.php');
     
     error_reporting( error_reporting() & ~E_NOTICE );
    $page_title = 'Message to Student'; 
    include ("../../includes/headerTeacher.php");
     
    if(!empty($errors)){
		echo '<h1>Error!</h1>
		<p class="error">There are problems with this form. Please correct the following errors:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
	}
    
    echo "<p class='backButton'><a class='backButton' href='ClassroomDetail.php'>Back</a></p>";
    if(isset($message)){
   		echo "<span style='color:green;'>".$message."</span>";
    }
    
    if($student != null && $subject != null)
    {
        
        echo '<ul id="classDetail">
          <li>Subject: '.$subject->name .'</li>
          <li>Level: '.$subject->level->name.'</li>
          <li>Section: '. $_GET['section'] .' </li>
          <li>Year: '. $_GET['year'] .' </li>
        </ul> '; 
        
        echo '<ul id="classDetail">
          <li>First Name: '.$student->firstName .'</li>
          <li>Last Name: '.$student->lastName.'</li>
          <li>Gender: '.$student->gender.'</li>
        </ul> '; 
        
        
        echo '<form action="" method="POST">
        
            <p id="textform">Which email do you want send a message to?</p>
            <input type="checkbox" name="emailAddress[]" value="'. $student->emailStudent .'" /> '. $student->emailStudent .'
            <input type="checkbox" name="emailAddress[]" value="'. $student->emailParent .'" /> '.$student->emailParent .'<br />
            <p> Subject: <input type="text" name="emailSubject" size=50	maxlength=100 required value="'. $_POST['emailSubject'].'"> </p>            
            <p> Message: <textarea name="emailBody" cols="50" rows="6" maxlength=400 required>'. $_POST['emailBody'] .'</textarea> </p>
            <p> <button  type="submit" name="formSubmit" >Send</button></p>
        </form>';
    
    }
    else{ 
        // If no records were returned.
	    echo '<p>The student does not exist or was deleted</p>';
    }
    
?>

<?php
    include ("../../includes/footer.php");
?>



