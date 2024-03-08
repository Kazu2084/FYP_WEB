<!-- <div class="app-main__outer">
        <div class="app-main__inner"> -->

<body>
  <? include('../../../Common/teacher-sidenav-header.php'); ?>
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Ranking</h1>
      
    </div>


        <div class="app-content-actions">


  <?php

  @$exam_id = $_GET['exam_id'];


  if ($exam_id != "") {
    $selEx = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exam_id' ")->fetch(PDO::FETCH_ASSOC);
    $exam_course = $selEx['cou_id'];



    $selExmne = $conn->query("SELECT * FROM examinee_tbl et  WHERE exmne_course='$exam_course'  ");


    ?>
    
      
        <div class="products-area-wrapper tableView">
        <h5> Exam Name :
        <?php echo $selEx['ex_title']; ?><br></h5>
          <div class="products-header">

            <div class="product-cell">Examinee</div>
            <div class="product-cell">Score / Over</div>
            <div class="product-cell">Percentage</div>

          </div>
    
    <!-- <div class="table-responsive">
      <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
        <tbody>
          <thead>
            <tr>
              <th width="25%">Examinee Fullname</div>
              <th>Score / Over</div>
              <th>Percentage</div>
            </tr>
          </thead> -->
          <?php
          while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
            <?php
            $exmneId = $selExmneRow['exmne_id'];
            $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ORDER BY ea.exans_id DESC");

            $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmneId' AND exam_id='$exam_id' ");

            $over = $selEx['ex_questlimit_display'];


            @$score = $selScore->rowCount();
            if($over!=0)
            {
              @$ans = $score / $over * 100;
            }
          

            ?>
             <div class="products-row">
              <div class="product-cell"><span>

                <?php echo $selExmneRow['exmne_fullname']; ?>
              </span></div>

              <div class="product-cell"><span>
                <?php
                if ($selAttempt->rowCount() == 0) {
                  echo "No answer yet";
                } else if ($selScore->rowCount() > 0) {
                  echo $totScore = $selScore->rowCount();
                  echo " / ";
                  echo $over;
                } else {
                  echo $totScore = $selScore->rowCount();
                  echo " / ";
                  echo $over;
                }




                ?>
              </span></div>
              <div class="product-cell"><span>
                <?php
                if ($selAttempt->rowCount() == 0) {
                  echo "No answer yet";
                } else {
                  echo number_format($ans, 2); ?>%
                  <?php
                }

                ?>
              </span></div>
              </div>
          <?php }
          ?>
        </tbody>
      </table>
    </div>



    <?php
  } else { ?>
    <!-- <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>RANKING BY EXAM</b></div>
                    </div>
                </div> -->
    </div>

    <!-- <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-header">ExAM List
        </div>
        <div class="table-responsive">
          <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
            <thead> -->
            <div class="app-content-actions">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
            
                <div class="product-cell">Exam Title</div>
                <div class="product-cell">Course</div>
                <div class="product-cell">Description</div>
                <div class="product-cell">Action</div>
  </div>
            
           
              <?php
              $selExam = $conn->query("SELECT * FROM exam_tbl ORDER BY ex_id DESC ");
              if ($selExam->rowCount() > 0) {
                while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                  <div class="products-row">
                  <div class="product-cell"><span>
                      <?php echo $selExamRow['ex_title']; ?>
                    </span></div>
                    <div class="product-cell"><span>
                      <?php
                      $courseId = $selExamRow['cou_id'];
                      $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$courseId' ");
                      while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                        echo $selCourseRow['cou_name'];
                      }
                      ?>
                    </span></div>
                    <div class="product-cell"><span>
                      <?php echo $selExamRow['ex_description']; ?>
                    </span></div>
                    <div class="product-cell"><span>
                      <a href="?page=ranking-exam&exam_id=<?php echo $selExamRow['ex_id']; ?>"
                        class="btn btn-success btn-sm">View</a>
                    </span></div>
                    </div>

                <?php }
              } else { ?>
                <div class="products-row">
                <div class="product-cell"><span>
                    <h3 class="p-3">No Exam Found</h3>
                  </span></div>
              </div>
              <?php }
              ?>
          
        </div>
      </div>
   
      </div>
      </div> </div>
  <?php }

  ?>




  </div>