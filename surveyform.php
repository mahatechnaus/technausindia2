<?php
$surveyJSON = file_get_contents('survey-questions.json');
$survey = json_decode($surveyJSON, true);
$currentQuestionId = 1;
if (isset($_POST['next'])) {
    $currentQuestionId = $_POST['currentQuestionId'];
}
$currentQuestion = $survey[$currentQuestionId];
?>

<div id="respmessage" class="respmessage" style="display: none;">Please submit your answer</div>

<form action="#" method="post" id="surveyformid" name="surveyformid" class="technaus-contact-form">

    <div id="question<?php echo $currentQuestionId; ?>" class="card-3d">
        <div class="card-body">
            <h4 class="card-title text-left" style="margin-left: 50px;">
                <?php echo $currentQuestion['question']; ?>
            </h4>
            <div class="form-group text-left" style="margin-left: 70px;">
                <div class="form-check mb-2">

                <?php foreach ($currentQuestion['options'] as $option => $nextQuestionId): ?>
    <input class="form-check-input" type="radio" name="response"
        id="<?php echo 'option_' . $nextQuestionId; ?>" value="<?php echo $option; ?>"
        data-next-question="<?php echo $nextQuestionId; ?>" required>
    <label for="<?php echo 'option_' . $nextQuestionId; ?>">
        <?php echo $option; ?>
    </label><br>
<?php endforeach; ?>



                    <!-- <?php foreach ($currentQuestion['options'] as $option => $nextQuestionId): ?>
                        <input class="form-check-input" type="radio" name="response"
                            id="<?php echo 'option_' . $nextQuestionId; ?>" value="<?php echo $option; ?>" required>
                        <label for="<?php echo 'option_' . $nextQuestionId; ?>">
                            <?php echo $option; ?>
                        </label><br>
                    <?php endforeach; ?> -->
                </div>
            </div>
        </div>
    </div>
    <input id="currentQuestionId" type="hidden" name="currentQuestionId" value="1" />
    <button type="submit" id="nextButton" name="next"
        class="btn technaus-second-background-color rounded-0 text-white btn-block p-3 mt-5">Next</button>
    <button type="button" id="backButton" class="btn btn-secondary rounded-0 text-white btn-block p-3 mt-3" <?php if ($currentQuestionId == 1)
        echo 'style="display: none;"'; ?>>Back</button>
</form>

<script>
  $(function () {
    $('#surveyformid').submit(function () {
        var selectedResponse = $('input[name="response"]:checked');
        if (selectedResponse) {
            var nextQuestionId = selectedResponse.data('next-question');
            $('#currentQuestionId').val(nextQuestionId);
        }
    });
});

</script>