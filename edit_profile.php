<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Edit Profil</h2>
    <form id="editProfileForm" action="proses_editprofile.php" method="post">
        <input type="hidden" id="userId" name="id" value="1"> 
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Update Profil">
    </form>
</body>
</html>
