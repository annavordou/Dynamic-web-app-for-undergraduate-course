window.onbeforeunload = function() {
    fetch('logout.php', {
        method: 'POST',
        credentials: 'same-origin'
    }).then(function(response) {
        // Ελέγχουμε τον κώδικα απόκρισης HTTP
        if (response.ok) {
            console.log('Αποσύνδεση επιτυχής.');
        } else {
            console.error('Πρόβλημα κατά την αποσύνδεση.');
        }
    }).catch(function(error) {
        console.error('Πρόβλημα κατά την αποσύνδεση:', error);
    });
};
