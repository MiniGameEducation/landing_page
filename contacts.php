<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Admin</title>
</head>
<body>
    <h2>Contact Admin</h2>
    <form id="contactForm">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <script>
        // Mengirim data ke API saat formulir diserahkan
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir untuk disubmit secara default

            // Mendapatkan data dari formulir
            var formData = new FormData(this);

            // Mengirim data ke API menggunakan fetch
            fetch('submit_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                alert(data.message); // Menampilkan pesan dari server
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again later.');
            });
        });
    </script>
</body>
</html>
