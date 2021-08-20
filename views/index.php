<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

<head>
    <title>Toppers</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <!-- <nav class="navbar navbar-dark bg-primary">
        <li class="nav-items"><a class="nav-href" href="/default">Home</a></li>
        <li class="nav-items"><a class="nav-href" href="/news">News</a></li>
        <li class="nav-items"><a class="nav-href" href="/contact">Contact</a></li>
        <li class="nav-items"><a class="nav-href" href="/logout">logout</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-items right-item"><a href="/img"><img src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" alt="Profile" width="50" height="50"></a></li>
    </nav> -->
    <form class="form-inline my-2 my-lg-0" style="text-align: center;">
      <input class="form-control mr-sm-2" type="textarea"  placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div class="main">
        <?php
        foreach ($_GET['data']['posts'] as $key => $value) {
            echo "<div class='posts'>";
            echo "<p>" . $value['content'] . "</p>";
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>