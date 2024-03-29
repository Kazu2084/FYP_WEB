<body>
    <?php include 'student-sidenav-header.php'?>
<div class="modal fade" id="feedbacksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addFeebacks" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Feedbacks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Feedback as</label><br>
            <?php 
            $query = $conn->query("SELECT * FROM student_info WHERE exmne_id='$exmneId' ");
               $selMe = mysqli_fetch_array($query);
             ?>
            <input type="radio" name="asMe" value="<?php echo $selMe['exmne_fullname']; ?>"> <?php echo $selMe['exmne_fullname']; ?> <br>
            <input type="radio" name="asMe" value="Anonymous"> Anonymous
            
          </div>
          <div class="form-group">
           <textarea name="myFeedbacks" class="form-control" rows="3" placeholder="Input your feedback here.."></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>
</body>
</html>
<?php 
	session_start();
 include("conn.php");
 extract($_POST);


// $exmneSess = $_SESSION['examineeSession']['exmne_id'];
$exmneSess = $_SESSION['student_id'];
 $selMyFeedbacks = $conn->query("SELECT * FROM feedbacks_tbl WHERE exmne_id='$exmneSess' ");

 if($selMyFeedbacks->rowCount() >= 3)
 {
 	$res = array("res" => "limit");
 }
 else
 {
 	$date = date("F d, Y");
 	$insFedd = $conn->query("INSERT INTO feedbacks_tbl(exmne_id,fb_exmne_as,fb_feedbacks,fb_date) VALUES('$exmneSess','$asMe','$myFeedbacks','$date') ");

 	if($insFedd)
 	{
 		$res = array("res" => "success");
 	}
 	else
 	{
 		$res = array("res" => "failed");
 	}
 }


 echo json_encode($res);
 ?>