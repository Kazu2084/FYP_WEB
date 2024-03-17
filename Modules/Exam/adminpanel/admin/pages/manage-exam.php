<!-- <div class="app-main__outer">
        <div class="app-main__inner"> -->
<!-- <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE EXAM</div>
                    </div>
                </div>
            </div>         -->
            

<body>
    <? include('../../../Common/teacher-sidenav-header.php'); ?>
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Manage Exam</h1>
            <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalForExam">Add Exam</a>
        </div>


        <div class="app-content-actions">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="product-cell">Exam Title</div>
                    <div class="product-cell">Subject</div>
                    <div class="product-cell">Description</div>
                    <div class="product-cell">Time limit</div>
                    <div class="product-cell">Display limit</div>
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
                                    $selCourse = $conn->query("SELECT * FROM courses WHERE cou_id='$courseId' ");
                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                                        echo $selCourseRow['cou_name'];
                                    }
                                    ?>
                                </span></div>
                            <div class="product-cell"><span>
                                    <?php echo $selExamRow['ex_description']; ?>
                                </span></div>
                            <div class="product-cell"><span>
                                    <?php echo $selExamRow['ex_time_limit']; ?>
                                </span></div>
                            <div class="product-cell"><span>
                                    <?php echo $selExamRow['ex_questlimit_display']; ?>
                                </span></div>
                            <div class="product-cell"><span>
                                    <a href="manage-exam.php?id=<?php echo $selExamRow['ex_id']; ?>" type="button"
                                        class="btn btn-primary btn-sm">Manage</a>
                                    <button type="button" id="deleteExam" data-id='<?php echo $selExamRow['ex_id']; ?>'
                                        class="btn btn-danger btn-sm">Delete</button>
                                </span>
                                <?php
                                ?>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="products-row">
                        <div class="product-cell"><span>
                                <h6 class="p-3">No Exam Found</h6>
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