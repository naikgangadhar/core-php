<!DOCTYPE html>
<html>
<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
<style>
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
    <?php include 'navbar.php'; ?>

    <form class="form-inline my-2 my-lg-0" style="width:600px; margin:0 auto; padding-top: 20px;" method="post" action="/uploadpost">
      <textarea class="form-control mr-sm-2" type="textarea" style="height:100px;width:900px;text-align:top;margin-bottom: 8px;border-radius: 20px;" name = "post"  placeholder="Something in your Mind"></textarea>
      <button class="btn btn-outline-success my-2 my-sm-0" style="margin: 534px;" type="submit">Post</button>
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