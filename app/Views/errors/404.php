<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Page Not Found</title>

    <!-- 404 css style -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-body-tertiary ">
    <div style="min-height: 100vh;" class="container d-flex justify-content-center align-items-center flex-column">
        <h1><strong class="text-danger">Error 404 </strong> Page not found</h1>
        <a href="<?= $_SESSION['back'] ?? "/"?>">Back to home page</a>
    </div>
</body>

</html>