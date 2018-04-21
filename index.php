<?php include_once('inc/header.php'); ?>

  <div class="splash">
    <div class="container-fluid">
      <div class="col-md-6 flex">
        <a class="logo" href="http://elexicon.com"><img src="images/elexicon-logo.svg" onerror="this.src='images/flat-logo.png'; this.onerror=null;" alt="Elexicon, Inc." title="elexicon-logo"></a>
        <h1>Theme Generator 2.0</h1>

        <p>
          Building custom WordPress themes can be redundant and annoyingly repetitive. The <a href="http://elexicon.com">Elexicon</a> Theme Generator aims to eliminate the annoying stuff we repeat every time we develop a new theme. This generator will give you a solid framework for building your theme from ground up. Complete with <a href="https://getcomposer.org/">Composer</a>, <a href="https://webpack.js.org/">webpack</a>, and <a href="https://getbootstrap.com">Bootstrap 4</a>, the Elexicon Theme Generator will start you off building your theme right.
        </p>

        <div style="margin: 30px 0;">
          <h2><a href="/docs/">Read the Docs!</a></h2>
          <p style="font-size: 14px;">
            <b>Notice:</b> This theme contains several dependencies and it is highly recommended to review the documentation before moving foward.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <?php if(isset($resp)) : ?>
            <div style="color: red; margin: 30px 0;">
                <h3><?php echo $resp; ?></h3>
            </div>
        <?php endif; ?>
        <?php include_once('inc/form.php'); ?>
      </div>
    </div>
  </div>

<?php include_once('inc/footer.php'); ?>
