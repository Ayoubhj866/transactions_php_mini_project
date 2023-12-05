<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC-PATERN</title>

    <!-- alert style css -->
    <link rel="stylesheet" href="/css/alert.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- phosphor icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

</head>

<body>
    <!-- HEADER START -->
    <header>
        <div class="px-3 py-2 text-bg-dark border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                    <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        logo
                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="/" class="nav-link text-secondary">
                                <i class="ph-bold ph-house"></i>
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="/transactions" class="nav-link text-secondary link-active">
                                <i class="ph-bold ph-hand-coins"></i>
                                Transactions
                            </a>
                        </li>

                        <li>
                            <a href="/users" class="nav-link text-secondary">
                                <i class="ph-bold ph-user"></i>
                                Users
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
        <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-center">
                <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <?php if ($currentUser === false) : ?>
                        <a href="/login" type="button" class="btn btn-light text-dark me-2">Login</a>
                        <a href="/register" type="button" class="btn btn-primary">Sign-up</a>
                    <?php else : ?>
                        <a href="/logout" type="button" class="btn btn-danger">Logout</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END -->

    <div class="container py-5">

        <!-- {{{ALERT CONTAINER START }}} -->
        <div class="alertContainer" id="alertContainer">
            <div class="alert-icon">
                <i style="cursor: pointer;" class="icon ph-bold ph-warning icon-animation"></i>
            </div>
            <div class="alert-text">
                <!-- alert message -->
            </div>
            <div class="alert-cancel">
                <i style="cursor: pointer;" class="cancel-icon ph-bold ph-x"></i>
            </div>
        </div>
        <!-- {{{ALERT CONTAINER END }}} -->

        <!-- {{{ALERT CONTAINER START }}} -->
        <div class="container">
            <?php
            $crumbs = explode("/", $_SERVER["REQUEST_URI"]);
            $crumb_links = "";
            $link = null;

            // foreach ($crumbs as $crumb) {
            //     if (!empty($crumb)) {
            //         $link = $link . '/' . $crumb;
            //         $display = ucwords(str_replace(array('-', '_'), ' ', $crumb));
            //         $crumb_links .= '<li><a href="' . $link . '">' . $display . '</a></li>';
            //     }
            // }
            ?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo $crumb_links; ?>
                    </li>
                </ol>
            </nav>


        </div>
        <!-- {{{ALERT CONTAINER END }}} -->

        <div class="d-grid gap-3" style="grid-template-columns: 1fr;">
            <!-- *****Page content start****** -->
            <?= $pageContent ?? "Empty" ?>
            <!-- *****Page content end****** -->
        </div>


    </div>

    <script src="/js/alert.js"></script>
</body>

</html>