<?php
    include "./connection.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./home.php">HOBUN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
          $select = mysqli_query($conn, "SELECT * FROM kategori");
          while($row = mysqli_fetch_array($select)){
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="<?="kategori".$row['id_kategori']?>" data-bs-toggle="dropdown" aria-expanded="false">
            <?=strtoupper($row['jenis_kategori'])?>
          </a>
          <?php
            switch($row['jenis_kategori']){
              case 'primary':
          ?>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="./primary-page.php">Lokasi</a></li>
                  <li><a class="dropdown-item" href="./primary-page.php">Harga</a></li>
                  <!-- <li><hr class="dropdown-divider"></li> -->
                  <li><a class="dropdown-item" href="./primary-page.php">Luas Tanah</a></li> 
                  <li><a class="dropdown-item" href="./primary-page.php">Luas Bangunan</a></li>
                  <li><a class="dropdown-item" href="./primary-page.php">Jumlah Kamar Tidur</a></li>
                </ul>
          <?php
                break;
              case 'secondary':
          ?>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">secondary</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
          <?php
                break;
              case 'renovasi':
          ?>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Teras</a></li>
                  <li><a class="dropdown-item" href="#">Facade</a></li>
                  <!-- <li><hr class="dropdown-divider"></li> -->
                  <li><a class="dropdown-item" href="#">Garasi</a></li>
                  <li><a class="dropdown-item" href="#">Taman</a></li>
                  <li><a class="dropdown-item" href="#">Ruang Tamu</a></li>
                  <li><a class="dropdown-item" href="#">Kamar Tidur</a></li>
                  <li><a class="dropdown-item" href="#">Kamar Mandi</a></li>
                  <li><a class="dropdown-item" href="#">Dapur</a></li>
                  <li><a class="dropdown-item" href="#">Taman Belakang</a></li>
                  <li><a class="dropdown-item" href="#">Laundry Area</a></li>
                  <li><a class="dropdown-item" href="#">Tangga</a></li>
                  <li><a class="dropdown-item" href="#">Balkon</a></li>
                </ul>
          <?php
                break;
              case 'konstruksi':
          ?>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">konstruksi</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
          <?php
                break;
              case 'ruko':
          ?>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">ruko</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
          <?php
                break;
              case 'kavling':
          ?>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">kavling</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
          <?php
                break;
              case 'apartment':
          ?>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">apartment</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
        </li>
        <?php
                break;
              default:
                break;
            }
          }
        ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>