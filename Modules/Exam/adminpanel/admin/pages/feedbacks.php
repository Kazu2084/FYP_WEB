<!-- <div class="app-main__outer">
        <div class="app-main__inner">
                <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>RANKING BY EXAM</b></div>
                    </div>
                </div>
                </div>  -->
                <body>
<? include('../../../Common/admin-sidenav-header.php');?>
            <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Feedback</h1>
    </div>


        <div class="app-content-actions">
        <div class="products-area-wrapper tableView">
                    <div class="products-header">
                    <div class="product-cell"><span>Examinee</span></div>
                    <div class="product-cell"><span>Feedbacks</span></div>
                    <div class="product-cell"><span>Date</span></div>
                      </div>
                 <!-- <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Feedback's List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4" width="20%">Examinee</th>
                                <th class="text-left ">Feedbacks</th>
                                <th class="text-center" width="15%">Date</th>
                            </tr>
                            </thead>
                            <tbody> -->
                              <?php 
                                $selExam = $conn->query("SELECT * FROM feedbacks_tbl ORDER BY fb_id DESC ");
                                if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <div class="products-row">
                                        <div class="product-cell"><span><?php echo $selExamRow['fb_exmne_as']; ?></span></div>
                                        <div class="product-cell"><span><?php echo $selExamRow['fb_feedbacks']; ?></span></div>
                                        <div class="product-cell"><span><?php echo $selExamRow['fb_date']; ?></span></div>
                                    </div>

                                    <?php }
                                }
                                else
                                { ?>
                                    <div class="products-row">
                                    <div class="product-cell"><span>
                                        <h3 class="p-3">No Feedback found</h3>
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
         


















