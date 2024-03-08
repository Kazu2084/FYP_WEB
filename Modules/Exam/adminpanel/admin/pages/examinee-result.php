<!-- <link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>EXAMINEE RESULT</div>
                    </div>
                </div>
            </div>         -->
            <body>
<? include('../../../Common/teacher-sidenav-header.php');?>
            <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Report</h1>
    </div>


        <div class="app-content-actions">
            
        <div class="products-area-wrapper tableView">
                    <div class="products-header">
                    <div class="product-cell"><span>Fullname</span></div>
                    <div class="product-cell"><span>Exam Name</span></div>
                    <div class="product-cell"><span>Scores</span></div>
                    <div class="product-cell"><span>Ratings</span></div>
                      </div>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM examinee_tbl et INNER JOIN exam_attempt ea ON et.exmne_id = ea.exmne_id ORDER BY ea.examat_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                       <div class="products-row">
                                        <div class="product-cell"><span><?php echo $selExmneRow['exmne_fullname']; ?></span></div>
                                        <div class="product-cell"><span>
                                             <?php 
                                                $eid = $selExmneRow['exmne_id'];
                                                $selExName = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id=ea.exam_id WHERE  ea.exmne_id='$eid' ")->fetch(PDO::FETCH_ASSOC);
                                                $exam_id = $selExName['ex_id'];
                                                echo $selExName['ex_title'];
                                              ?>
                                           </span></div>
                                           <div class="product-cell"><span>
                                                    <?php 
                                                    $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                      ?>
                                                <span>
                                                    <?php echo $selScore->rowCount(); ?>
                                                    <?php 
                                                        $over  = $selExName['ex_questlimit_display'];
                                                     ?>
                                                </span> / <?php echo $over; ?>
                                                </span></div>
                                           <div class="product-cell"><span>
                                              <?php 
                                                    $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                ?>
                                                <span>
                                                    <?php 
                                                        $score = $selScore->rowCount();
                                                        $ans = $score / $over * 100;
                                                        echo number_format($ans,2);
                                                        // echo "$ans";
                                                        echo "%";
                                                        
                                                     ?>
                                                 </span> 
                                                </span></div>
                                                
                                           <td>
                                           <!-- <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['exmne_id']; ?>" class="btn btn-sm btn-primary">Print Result</a>

                                           </td> -->
                                        </td>
                                        </div>
                                    <?php }
                                }
                                else
                                { ?>
                                    <div class="products-row">
                                    <div class="product-cell"><span>
                                        <h3 class="p-3">No Course Found</h3>
                                        </span></div>
                                </div>
                                <?php }
                               ?>
                            </div>
                  </div>
                    </div>
                </div>
            </div>
      
        
</div>
         
