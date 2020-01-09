
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kelas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="in-kelas.php">Input Kelas</a></li>
            <li><a href="data-kelas.php">Data Kelas</a></li>
          </ul>
        </li>
        
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mata Pelajaran <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="in-mapel.php">Input Mata Pelajaran</a></li>
            <li><a href="data-mapel.php">Data Mata Pelajaran</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Guru Kelas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="in-guru.php">Input Guru Kelas</a></li>
            <li><a href="data-guru.php">Data Guru Kelas</a></li>
          </ul>
        </li>
      	
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Siswa <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="in-siswa.php">Input Siswa</a></li>
            <li><a href="data-siswa.php">Data Siswa</a></li>
          </ul>
        </li>
        

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="laporan-nilai.php">Laporan Nilai</a></li>
          </ul>
        </li>
        
            <li><a href="database.php">Database</a></li>

      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Selamat Datang, <b style="color:blue;"><?php echo $_SESSION['nama'];?></b> <span class="glyphicon glyphicon-cog"></span></a>
          <ul class="dropdown-menu">
            <li><a href="r-pass.php" >Rubah Password</a></li>
            <li role="separator.php" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 

