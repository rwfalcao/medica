<?php
  function renderFooter(){
    echo '
    <footer>
      <div class="menu">
        <div class="menu-item selected">
          <a href="list-users.php">
            <i class="fa fa-user" aria-hidden="true"></i>
          </a>
        </div>
        <div class="menu-item ">
          <a href="list-meds.php">
            <i class="fa fa-medkit" aria-hidden="true"></i>
          </a>
        </div>
        <div class="menu-item ">
          <a href="list-rotinas.php">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </footer>';

  }
 ?>
