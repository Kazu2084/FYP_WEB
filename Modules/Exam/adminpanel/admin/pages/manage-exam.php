<body>
    <? include ('../../../Common/admin-sidenav-header.php'); ?>
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
                require_once "../../../../Connection/connection.php";
                $selExam = $con->query("SELECT * FROM exam_tbl ORDER BY ex_id DESC ");
                if ($selExam) {
                    if ($selExam->num_rows > 0) {
                        while ($selExamRow = $selExam->fetch_assoc()) { ?>
                            <div class="products-row">
                                <div class="product-cell"><span>
                                        <?php echo $selExamRow['ex_title']; ?>
                                    </span></div>
                                <div class="product-cell"><span>
                                        <?php
                                        $courseId = $selExamRow['cou_id'];
                                        $selCourse = $con->query("SELECT * FROM courses WHERE course_code='$courseId' ");
                                        while ($selCourseRow = $selCourse->fetch_assoc()) {
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
                    } else {
                        echo "No exams found.";
                    }
                } else {
                    echo "Error executing query: " . $con->error;
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>


    </div>