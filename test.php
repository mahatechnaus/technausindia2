<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Quote Form</title>
</head>
<body>
    <form class="technaus-contact-form" id="quoteForm" method="POST" action="process_form.php">
        <div class="form-group">
            <input type="text" id="name" name="name" class="form-control rounded-0 p-3" placeholder="Name" required>
        </div>
        <div class="form-group">
            <input type="email" id="email" name="email" class="form-control rounded-0 p-3" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="tel" id="mobile" name="mobile" class="form-control rounded-0 p-3" placeholder="Mobile" required>
        </div>
        <div class="form-group">
            <select class="form-control rounded-0 p-3" id="category" name="category" style="height: auto;" required>
                <option value="" selected disabled>Select Category</option>
                <option value="ressolarcat">Residential Solar</option>
                <option value="comsolarcat">Commercial Solar</option>
                <option value="batterycat">Battery Storage</option>
                <option value="evchargingcat">EV Charging</option>
            </select>
        </div>
        <div class="form-group">
            <textarea class="form-control rounded-0 p-3" id="message" name="message" placeholder="Message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn technaus-second-background-color rounded-0 text-white btn-block p-3">Get Quote</button>
    </form>
</body>
</html>
