
<?php  include 'config/app.php'  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            text-align: center;
        }
        h1 {
            color: #dc3545;
            font-size: 6em;
            margin-bottom: 10px;
        }
        p {
            color: #6c757d;
            font-size: 1.2em;
            margin-top: 0;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>Oops! Page not found</p>
        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <p>Return to <a href="<?php echo $config['app_url']; ?>login.php">home page</a>.</p>
    </div>
</body>
</html>
