<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:../index.php");

 ?>
 <?php include("conn.php"); ?>

<body>
<?php include('student-sidenav-header.php')?>
<?php 
  //  @$page = $_GET['page'];


  //  if($page != '')
  //  {
  //    if($page == "exam")
  //    {
  //      include("pages/exam.php");
  //    }
  //    else if($page == "result")
  //    {
  //      include("pages/result.php");
  //    }
  //    else if($page == "myscores")
  //    {
  //      include("pages/myscores.php");
  //    }
     
  //  }
  //  else
  //  {
  //    include("pages/home.php"); 
  //  }


 ?> 


                <div class="app-content">
                    <div class="app-content-header">
                      <h1 class="app-content-headerText">All Exams</h1>
                    </div>
                    
                    <div class="app-content-actions">
                      
                    <div class="products-area-wrapper tableView">
                      <div class="products-header">
                        <div class="product-cell">Exam</div>
                        <div class="product-cell">Description</div>
                        <div class="product-cell">Action</div>
                      </div>
                      <?php 
                        
                        if($selExam->rowCount() > 0)
                        {
                            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                <div class="products-row">
                            <div class="product-cell"><span>
                                
                                    <?php 
                                        $lenthOfTxt = strlen($selExamRow['ex_title']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($selExamRow['ex_title'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $selExamRow['ex_title'];
                                        }
                                     ?>
                                 
                                 </span></div>
                                 <div class="product-cell"><span>
                                
                                    <?php 
                                        $lenthOfTxt = strlen($selExamRow['ex_description']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($selExamRow['ex_description'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $selExamRow['ex_description'];
                                        }
                                     ?>
                                 
                                 </span></div>
                                 <div class="product-cell"><span>
                                 <a class = "btn btn-primary" href="#" id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>"  >Start Now
                                   
                                 </a>
                                 </span></div>
                                      </div>
                            <?php }
                        }
                        else
                        { ?>
                            <a href="#">
                                <i class="metismenu-icon"></i>No Exam's @ the moment
                            </a>
                        <?php }
                     ?>
                            <!-- <div class="products-row">
                              <div class="product-cell"><span><?php //echo $selTakenExamRow['ex_title']; ?></span></div>
                              <div class="product-cell"><span><?php //echo $selTakenExamRow['ex_description']; ?></span></div>
                              <div class="product-cell"><span><?php //echo $selTakenExamRow['ex_title']; ?></span></div>
                              <div class="product-cell"><span><button name="view_result" type="submit" class="btn btn-primary btn-sm" href="exam.php?page=result&id=<?php echo $selTakenExamRow['ex_id']; ?>" >
                        Take Exam</button></span></div>
                            </div> -->
                       
            
                    </div>
                  </div>
            </section>
          
        </main>
    </section>
   
     </div> 
  </div>    
  <?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>
<script src="js/jquery.js"></script>
</body>
<!-- SCRIPT -->


</html>

