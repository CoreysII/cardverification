document.getElementById('verificationForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const cardNumber = document.getElementById('cardNumber').value;
    const expiryDate = document.getElementById('expiryDate').value;
    const cvv = document.getElementById('cvv').value;

    // Basic validation (for demonstration purposes)
    if (cardNumber.length !== 16 || !/^\d+$/.test(cardNumber)) {
        displayMessage('Invalid card number. Please enter a 16-digit card number.');
        return;
    }

    if (!/^\d{2}\/\d{2}$/.test(expiryDate)) {
        displayMessage('Invalid expiry date. Please enter in MM/YY format.');
        return;
    }

    if (cvv.length !== 3 || !/^\d+$/.test(cvv)) {
        displayMessage('Invalid CVV. Please enter a 3-digit CVV.');
        return;
    }

    // If all validations pass, submit the form
    document.getElementById('verificationForm').submit();
});

function displayMessage(message, isSuccess = false) {
    const messageDiv = document.getElementById('message');
    messageDiv.textContent = message;
    messageDiv.style.color = isSuccess ? 'green' : 'red';
}