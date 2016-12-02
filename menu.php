<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">        
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Agenda de Contatos</a>
    </div>
    <?php
      if(!isset($_SESSION['auth']))
        {
        
          ?>
          <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" name="login" method="POST" action="login.php">
              <div class="form-group">
                <input type="text" name="email" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>
              <button type="submit" class="btn btn-success" value="submit">Login</button>
            </form>
          </div>
          <?php
          } else {
            ?>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="contact.php">Meus Contatos</a></li>
                <li><a href="addcontact.php">Adicionar Contato</a></li>
              </ul>
              <div id="navbar" class="navbar-collapse collapse" style="float: right;margin-top:10px">
                <a href="logout.php"><button type="submit" class="btn btn-danger" value="submit">Logout</button></a>
              </div>
            </div>
            <?php
          }
          ?>
  </div>
</nav>

   
