<?php
  echo '/uploads/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>testing place</title>
  <style>
    #parent {
      width: 500px;
      height: 500px;
      background-color: red;
      position: relative;
    }

    #child {
      width: 50px;
      height: 50px;
      background-color: blue;
      float: left;
      transition: 2s linear;
      position: absolute;
      left: 0;
    }
    #child2 {
      width: 50px;
      height: 50px;
      background-color: purple;
      float: right;
      transition: 2s linear;
      position: absolute;
      right: 0;
    }
    p {
      position: relative;
    }

    @keyframes sliding{
        from {left: 0;}
        to {right: 0;}
    }
    .to-right {
      position: absolute;
      animation: sliding 2s linear alternate;

    
    }
    .float-left {
      float: left;
    }
  </style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <br/>
    <input type="file" multiple name="images[]">
    <button type="submit" name="submit">cek</button>
</form>
<?php
  if(isset($_POST['submit'])){
    $count = count($_FILES['images']['name']);
    for($i=0; $i<$count; $i++){
      echo $_FILES['images']['name'][$i];
      echo "<br/>";
    }
  }
?>


  <div id="parent">
    <div id="child">

    </div>
    <div id="child2">

    </div>
    <div>
      <p onclick="change()">click</p>
    </div>
  </div>
</body>
<script>
  const parent = document.getElementById("parent");
  const child = document.getElementById("child");
  const child2 = document.getElementById("child2");
  // alert(window.clientWidth);
  function change(){
    if(child.style.left == "0px" || child.style.left == 0){
      child.style.left = parent.offsetWidth-child.offsetWidth + "px";
      child2.style.right = parent.offsetWidth-child.offsetWidth + "px";
    }else {
      child.style.left =  "0px";
      child2.style.right = "0px";
    }

  }
</script>
</html>