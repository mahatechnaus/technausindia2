<div id="respmessage" class="respmessage" style="display: none;">Please submit your answer</div>

<?php 
$currentQuestionId = 1; 

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's choice for question 1
    $property = $_POST["property"];

    // Determine the next question based on the user's choice
    if ($property == "Own") {
        $currentQuestionId = 2; // Next question ID for this choice
    } elseif ($property == "Rent") {
        $currentQuestionId = 4; // Next question ID for this choice
    }
}
?>

<form action="" method="post" id="surveyformid" name="surveyformid" class="technaus-contact-form">

    <?php
    // Display the appropriate question based on the current question ID
    if ($currentQuestionId == 1) {
        // Display question 1
        echo '<div id="question1" class="card-3d">
            <div class="card-body">
                <h4 class="card-title text-left" style="margin-left: 50px;">1. Do you own or rent the property?</h4>
                <div class="form-group text-left" style="margin-left: 70px;">
                    <div class="form-check mb-2">
                        <input class="form-check-input " type="radio" name="property" id="ownProperty" value="Own" required>
                        <label class="form-check-label font-18" for="ownProperty">Own</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="property" id="rentProperty" value="Rent" required>
                        <label class="form-check-label font-18" for="rentProperty">Rent</label>
                    </div>
                </div>
            </div>
        </div>';
    } elseif ($currentQuestionId == 2) {
        // Display question 2
        echo '<div id="question2" class="card-3d">
            <div class="card-body">
                <h4 class="card-title text-left">2. How much is your average monthly electricity bill?</h4>
                <div class="form-group text-left" style="margin-left: 70px;">
                <div class="form-check mb-2">
                    <input class="form-check-input " type="radio" name="eb_amt" id="below2000" value="Below 2000"
                        required>
                    <label class="form-check-label font-18" for="below2000">Below 2000</label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="eb_amt" id="2000to3000" value="2000 - 3000"
                        required>
                    <label class="form-check-label font-18" for="2000to3000">2000 - 3000</label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="eb_amt" id="3000to4000" value="3000 - 4000"
                        required>
                    <label class="form-check-label font-18" for="3000to4000">3000 - 4000</label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="eb_amt" id="4000to5000" value="4000 - 5000"
                        required>
                    <label class="form-check-label font-18" for="4000to5000">4000 - 5000</label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="eb_amt" id="above5000" value="Above 5000"
                        required>
                    <label class="form-check-label font-18" for="above5000">Above 5000</label>
                </div>
            </div>
            </div>
        </div>';
    } elseif ($currentQuestionId == 4) {
        // Display question 4 for rent
        echo '<div id="question4_rent" class="card-3d">
            <div class="card-body">
                <h4 class="card-title">Unfortunately, the owner of the property needs to make the decision to install solar power. We are sorry we couldn\'t help you further.</h4>
                <div class="form-group">
                    <!-- Add your question 4 for rent form fields here -->
                </div>
            </div>
        </div>';
    } 
    ?>

    <!-- Add more question divs as needed -->
    <button type="button" id="nextButton" class="btn technaus-second-background-color rounded-0 text-white btn-block p-3 mt-5">Next</button>
   
    <button type="button" id="backButton"
        class="btn btn-secondary rounded-0 text-white btn-block p-3 mt-3"
        <?php if ($currentQuestionId == 1) echo 'style="display: none;"'; ?>>
        Back
</button>
</form>


<script>
    var currentQuestionId = <?php echo $currentQuestionId; ?>; // Initialize with the current question ID

    document.getElementById('nextButton').addEventListener('click', function () {
        // Find the currently visible question
        var currentQuestion = document.querySelector('.card-3d:not([style*="display: none"])');

        // Increment the current question ID
        currentQuestionId++;

        // Hide the current question and show the next question
        currentQuestion.style.display = 'none';
        var nextQuestion = document.getElementById('question' + currentQuestionId);
        if (nextQuestion) {
            nextQuestion.style.display = 'block';
        } else {
            // If there are no more questions, you can submit the form here
            document.getElementById('surveyformid').submit();
        }

        // Show the back button
        document.getElementById('backButton').style.display = 'block';
    });

    document.getElementById('backButton').addEventListener('click', function () {
        // Find the currently visible question
        var currentQuestion = document.querySelector('.card-3d:not([style*="display: none"])');

        // Decrement the current question ID
        currentQuestionId--;

        // Hide the current question and show the previous question
        currentQuestion.style.display = 'none';
        var previousQuestion = document.getElementById('question' + currentQuestionId);
        if (previousQuestion) {
            previousQuestion.style.display = 'block';
        }

        // Hide the back button if we're on the first question
        if (currentQuestionId === 1) {
            document.getElementById('backButton').style.display = 'none';
        }
    });
</script>
