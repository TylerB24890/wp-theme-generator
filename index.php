<?php include_once('inc/header.php'); ?>

  <div class="splash">
    <div class="container-fluid">
      <div class="col-md-12">
        <a class="logo" href="http://elexicon.com" style="width: auto;"><img src="images/elexicon-logo.svg" onerror="this.src='images/flat-logo.png'; this.onerror=null;" alt="Elexicon, Inc." title="elexicon-logo" style="max-width: 100%;
          width: 500px; height: auto;"></a>
      </div>
      <div class="col-md-5 flex">
        <h1 style="font-size: 50px; padding: 0; margin: 30px 0;">Lexi Starter Theme</h1>

        <p>
          Building custom WordPress themes can be redundant and annoyingly repetitive. The Lexi Theme Generator aims to eliminate the annoying stuff we repeat every time we develop a new theme. This generator will give you a solid framework for building your theme from ground up.
        </p>

        <p>
          Based on the <a href="http://theme-generator.elexicon.com/lexi.zip">Lexi Framework</a>, the Lexi Starter Theme is complete with <a href="https://getcomposer.org/">Composer</a>, <a href="https://webpack.js.org/">Webpack</a>, and <a href="https://getbootstrap.com">Bootstrap 4</a> to help you develop fast and efficiently.
        </p>

        <h2 style="font-size: 38px; padding: 0; margin: 30px 0 0px; font-weight: bolder;">NEW!</h2>
        <h3 style="margin: 0;">
          You can now include Lexi in <b>ANY</b> theme! Download the zip file <a href="http://theme-generator.elexicon.com/lexi.zip">here</a> and read the <code>README.md</code> file for installation instructions!
        </h3>
        <a class="btn btn-default btn-primary" href="http://theme-generator.elexicon.com/lexi.zip" style="background: #091f52; border-color: #1b305f; font-size: 24px; margin: 15px 0;">Download Lexi</a>

        <div style="margin: 30px 0;">
          <h2><a href="/docs/">Read the Docs!</a></h2>
          <p style="font-size: 14px;">
            <b>Notice:</b> This theme contains several dependencies and it is highly recommended to review the documentation before moving foward.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-md-offset-1">
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
