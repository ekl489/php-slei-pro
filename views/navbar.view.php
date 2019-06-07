<ul class="nav nav-pills nav-lg">
    <li class="nav-item">
    <a class="nav-link disabled text-primary" href="#"><strong>slei.pro</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/forumn">Forumn</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/play">Play</a>
  </li>
  <li class="nav-item" <?php if(!$clientSession->isLoggedIn()){ echo 'styles="display: none;"'; }?>>
    <a class="nav-link" href="/login">Login</a>
  </li>
  <li class="nav-item" <?php if(!$clientSession->isLoggedIn()){ echo 'styles="display: none;"'; }?>>
    <a class="nav-link" href="/account">Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/account">
      LoggedIn: <?php echo $clientSession->isLoggedIn() ? 'YES' : 'NO'; ?>
    </a>
  </li>
  
</ul>



