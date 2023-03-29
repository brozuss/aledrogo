<body>
   
  <!-- Header -->
<header class="header">
    <nav>
      <a href="../main/home.php"><img src="../images/alledrogo-logo.png" alt="logo" class="logob"> </a>
      <ul>
          <!-- Favourites -->
          <li><i>
              <div class="dropdown">
                  <button class="dropbtn">ULUBIONE</button>
                  <div class="dropdown-content">
                    <!-- lista rozwijana polubionych produktów -->
                      
                  </div>
              </div>
          </i></li>
          <!-- ACCOUNT -->
          <li><i>
              <div class="dropdown">
                  <!-- DEPENDS ON BEING LOGGED -->
                    <!-- NOT LOGGED/ -->
                    <?php if(empty($_SESSION['user'])) : ?>
                      <a href="../main/auth.php"><p>ZALOGUJ SIĘ</p></a>
                    <!-- LOGGED -->
                    <?php else: ?>
                      <a href="../main/account.php"><button class="dropbtn">KONTO</button></a>
                      <div class="dropdown-content">
                        <a href="../main/account.php"><p>KONTO</p></a>
                        <a href="../main/auctions.php"><p>OGŁOSZENIA</p></a>
                        <a href="../main/orders.php"><p>ZAMÓWIENIA</p></a>
                        <a href="../phpconfig/logout.php"><p>WYLOGUJ SIĘ</p></a>
                    <?php endif; ?>
                      </div>
              </div>
          </i></li>
  
      </ul>
      </nav>
  </header>