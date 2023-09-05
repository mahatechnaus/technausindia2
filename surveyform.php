<div id="respmessage" class="respmessage" style="display: none;">Please submit your answer</div>

<form action="" method="post" id="surveyformid" name="surveyformid" class="technaus-contact-form">
    <!-- Your form content here -->
    <!-- question 1 -->
    <div id="question1" class="card-3d">
    <div class="card-body">
        <h4 class="card-title">1. How much is your average monthly electricity bill?</h4>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input " type="radio" name="eb_amt" id="below2000" value="Below 2000" required>
                <label class="form-check-label font-18" for="below2000">Below 2000</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="eb_amt" id="2000to3000" value="2000 - 3000" required>
                <label class="form-check-label font-18" for="2000to3000">2000 - 3000</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="eb_amt" id="3000to4000" value="3000 - 4000" required>
                <label class="form-check-label font-18" for="3000to4000">3000 - 4000</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="eb_amt" id="4000to5000" value="4000 - 5000" required>
                <label class="form-check-label font-18" for="4000to5000">4000 - 5000</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="eb_amt" id="above5000" value="Above 5000" required>
                <label class="form-check-label font-18" for="above5000">Above 5000</label>
            </div>
        </div>

    </div>
</div>
<!-- question 2  -->
<div id="question2" class="card-3d" style="display: none;">
    <div class="card-body">
        <h4 class="card-title">2. Are you considering Solar for residential or commercial purposes?</h4>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input " type="radio" name="res_com" id="res_place" value="Residential" required>
                <label class="form-check-label font-18" for="below2000">Residential</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="res_com" id="com_place" value="Commercial" required>
                <label class="form-check-label font-18" for="2000to3000">Commercial</label>
            </div>
        </div>
    </div>
</div>
<!-- question 3  -->
<div id="question3" class="card-3d" style="display: none;">
    <div class="card-body">
        <h4 class="card-title">3. Do you own or rent the property?</h4>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input " type="radio" name="property" id="property" value="Own" required>
                <label class="form-check-label font-18" for="below2000">Own</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="property" id="property" value="Rent" required>
                <label class="form-check-label font-18" for="2000to3000">Rent</label>
            </div>
        </div>
    </div>
</div>

<!-- Add more question divs as needed -->
<button type="button" id="nextButton"
        class="btn technaus-second-background-color rounded-0 text-white btn-block p-3 mt-5">
        
        Next
    </button>
    <button type="button" id="backButton"
        class="btn btn-secondary rounded-0 text-white btn-block p-3 mt-3" style="display: none;">
        Back
    </button>
</form>

<script>
    var currentQuestionId = 1;

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

