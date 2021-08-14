<!DOCTYPE html>
<html>
<style>
    ul {
        list-style-type: none;
        margin: 0px;
        padding: 10px;
        background-color: aquamarine;
        height: 50px;
    }

    .nav-items {
        display: inline;
        padding-left: 15px;
    }

    .right-item {
        float: right;
        padding-left: 30px;
    }

    img {
        border-radius: 50%;
    }

    .posts {
        margin-top: 10px;
        margin-bottom: 50px;
        margin-left: 25%;
        text-align: left;
        border: 1px solid;
        padding: 15px;
        width: 50%;
        height: 50px;
        background-color: grey;
        border-radius: 20px;
    }
</style>

<head>
    <title>Toppers</title>
</head>

<body>
    <ul>
        <li class="nav-items"><a href="/default">Home</a></li>
        <li class="nav-items"><a href="/news">News</a></li>
        <li class="nav-items"><a href="/contact">Contact</a></li>
        <li class="nav-items"><a href="/contact">Contact</a></li>
        <li class="nav-items right-item"><a href="/img"><img src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" alt="Profile" width="50" height="50"></a></li>
    </ul>

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