<script type="text/javascript">
  function preventBack() { window.history.forward(); }
  setTimeout("preventBack()", 0);
  window.onunload = function () { null };
</script>
<?php
$examId = $_GET['id'];
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
$selExamTimeLimit = $selExam['ex_time_limit'];
$exDisplayLimit = $selExam['ex_questlimit_display'];
?>

<body>
  <?php include("conn.php"); ?>
  <?php //include("includes/header.php"); ?>

  <?php //include('student-sidenav-header.php')
  ?>


  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Exam</h1>
      <form name="cd">
        <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
        <label>Remaining Time : </label>
        <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text"
          class="clock" id="txt" value="00:00" size="5" readonly="true" />
      </form>
    </div>

    <div class="app-content-actions"></div>

   

  <div class="col-md-12 p-0 mb-4">
    <form method="post" id="submitAnswerFrm">
      <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $examId; ?>">
      <input type="hidden" name="examAction" id="examAction">
      <table class="align-middle mb-0 table table-borderless" id="tableList">
        <?php
        $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' ORDER BY rand() LIMIT $exDisplayLimit ");
        if ($selQuest->rowCount() > 0) {
          $i = 1;
          while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
            <?php $questId = $selQuestRow['eqt_id']; ?>
            <tr>
              <td>
                <p><b>
                    <?php echo $i++; ?> .
                    <?php echo $selQuestRow['exam_question']; ?>
                  </b></p>
                <div class="col-md-4 float-left">
                  <div class="form-group pl-4 ">
                    <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch1']; ?>"
                      class="form-check-input" type="radio" value="" id="invalidCheck" required>

                    <label class="form-check-label" for="invalidCheck">
                      <?php echo $selQuestRow['exam_ch1']; ?>
                    </label>
                  </div>

                  <div class="form-group pl-4">
                    <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch2']; ?>"
                      class="form-check-input" type="radio" value="" id="invalidCheck" required>

                    <label class="form-check-label" for="invalidCheck">
                      <?php echo $selQuestRow['exam_ch2']; ?>
                    </label>
                  </div>
                </div>
                <div class="col-md-8 float-left">
                  <div class="form-group pl-4">
                    <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch3']; ?>"
                      class="form-check-input" type="radio" value="" id="invalidCheck" required>

                    <label class="form-check-label" for="invalidCheck">
                      <?php echo $selQuestRow['exam_ch3']; ?>
                    </label>
                  </div>

                  <div class="form-group pl-4">
                    <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch4']; ?>"
                      class="form-check-input" type="radio" value="" id="invalidCheck" required>

                    <label class="form-check-label" for="invalidCheck">
                      <?php echo $selQuestRow['exam_ch4']; ?>
                    </label>
                  </div>
                </div>
      </div>


      </td>
      </tr>

    <?php }
          ?>
    <tr>
      <td style="padding: 20px;">
        <button type="button" class="btn btn-primary" id="resetExamFrm">Reset</button>
        <input name="submit" type="submit" value="Submit" class="btn btn-primary float-right"
          id="submitAnswerFrmBtn">
      </td>
    </tr>

    <?php
        } else { ?>
    <b>No question at this moment</b>
  <?php }
        ?>
  </table>

  </form>
  </div>
  </div>