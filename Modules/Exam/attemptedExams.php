<body><?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");

 ?>
<?php include("conn.php"); ?>
<?php //include("includes/header.php"); ?>   

<?php include('student-sidenav-header.php')
?>

                <div class="app-content">
                    <div class="app-content-header">
                      <h1 class="app-content-headerText">Attempted Exams</h1>
                    </div>
                    
                    <div class="app-content-actions">
                      
                    <div class="products-area-wrapper tableView">
                      <div class="products-header">
                        <div class="product-cell">Exam</div>
                        <div class="product-cell">Description</div>
                        <div class="product-cell">Action</div>
                      </div>
                      <?php 
                    $selTakenExam = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE exmne_id='$exmneId' ORDER BY ea.examat_id  ");

                    if($selTakenExam->rowCount() > 0)
                    {
                        while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="products-row">
                        <div class="product-cell"><span>
                           
                               
                                <?php echo $selTakenExamRow['ex_title']; ?>
                           </span></div>

                            <div class="product-cell"><span><?php echo $selTakenExamRow['ex_description']; ?></span></div>


                            
                            <div class="product-cell"><span>
                            <a class="btn btn-primary" href="home.php?page=result&id=<?php echo $selTakenExamRow['ex_id']; ?>" >
                               View Result
                               
                            </a></span></div>
                            </div>

                        <?php }
                    }
                    else
                    { ?>
                        <a href="#" class="pl-3">You are not taking exam yet</a>
                    <?php }
                    
                   ?>
                    
                    </div>
                  </div>
            </section>
          
        </main>
    </section>
   
     </div> 
  </div>    
</body>
<!-- SCRIPT -->
<script src="table.js"></script>
</html>