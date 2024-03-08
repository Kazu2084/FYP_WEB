<!-- <link rel="stylesheet" type="text/css" href="css/mycss.css"> -->
<!-- <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE EXAMINEE</div>
                    </div>
                </div>
            </div>         -->
            <body>
<? include('../../../Common/teacher-sidenav-header.php');?>
            <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Manage Examinee</h1>
      <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalForAddExaminee">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Add Examinee
                                    </a>
    </div>


        <div class="app-content-actions">
        <div class="products-area-wrapper tableView">
        <div class="products-header">
          <div class="product-cell">Fullname</div>
          <div class="product-cell">Gender</div>
          <!-- <div class="product-cell">DOB</div> -->
          <div class="product-cell">Subject</div>
          <div class="product-cell">Year</div>
          <div class="product-cell">Email</div>
          <div class="product-cell">Status</div>
          <div class="product-cell">Action</div>
        </div>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM examinee_tbl ORDER BY exmne_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <div class="products-row">
              <div class="product-cell"><span>
                  <?php echo $selExmneRow['exmne_fullname']; ?>
                </span></div>
              <div class="product-cell"><span>
                  <?php echo $selExmneRow['exmne_gender']; ?>
                </span></div>
              <!-- <div class="product-cell"><span>
                  <?php //echo $selExmneRow['exmne_birthdate']; ?>
                </span></div> -->
              <div class="product-cell"><span>
                                            <?php 
                                                 $exmneCourse = $selExmneRow['exmne_course'];
                                                 $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
                                                 echo $selCourse['cou_name'];
                                             ?>
                                            </div>
                                            <div class="product-cell"><span>
                  <?php echo $selExmneRow['exmne_year_level']; ?>
                </span></div>
              <div class="product-cell"><span>
                  <?php echo $selExmneRow['exmne_email']; ?>
                </span></div>
              <div class="product-cell"><span>
                  <?php echo $selExmneRow['exmne_status']; ?>
                </span></div>
              <div class="product-cell"><span>
                                               <a href="update-examinee.php?id=<?php echo $selExmneRow['exmne_id']; ?>" class="btn btn-sm btn-primary">Update</a>

                                               </span></div>
            </div>
                                    <?php }
                                }
                                else
                                { ?>
                                    <div class="products-row">
            <div class="product-cell"><span>
                <h3 class="p-3">No Subject Found</h3>
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
         
