<?php include_once('inc/header.php'); ?>

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-center">Elexicon Theme Generator 2.0</h1>

            <p style="margin-bottom: 15px;">
                Building custom WordPress themes can be redundant and annoyingly repetitive. The <a href="http://elexicon.com">Elexicon</a> Theme Generator aims to eliminate the annoying stuff we repeat every time we develop a new theme. This generator will give you a solid framework for building your theme from ground up. Complete with <a href="https://getcomposer.org/">Composer</a>, <a href="https://webpack.js.org/">webpack</a>, and <a href="https://getbootstrap.com">Bootstrap 4</a>, the Elexicon Theme Generator will start you off building your theme right.
             </p>

             <div class="text-center" style="margin: 30px 0 60px;">
               <h2><a href="/docs/">Read the Docs!</a></h2>
               <p style="font-size: 14px;">
                 <b>Notice:</b> This theme contains several dependencies and it is highly recommended to review the documentation before moving foward.
               </p>
             </div>

            <?php if(isset($resp)) : ?>
                <div style="color: red; margin: 30px 0;">
                    <h3><?php echo $resp; ?></h3>
                </div>
            <?php endif; ?>

            <form name="build_theme" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Theme Name:<span class="req">*</span></label>
                    <input type="text" name="theme_name" class="form-control" placeholder="i.e. Elexicon" tabindex="1" required />
                </div>

                <div style="position: absolute; left: -9999px;">
                    <input type="text" name="email" />
                </div>

                <div class="form-group">
                    <label>Theme Slug:<span class="req">*</span></label>
                    <input type="text" name="theme_slug" class="form-control" placeholder="i.e. elexicon" tabindex="2" required />
                </div>

                <div class="form-group">
                    <label>Theme Prefix:<span class="req">*</span></label>
                    <input type="text" name="theme_prefix" class="form-control" placeholder="i.e. elx" tabindex="3" required />
                    <p class="help-block">
                        Used for internationalization and prefixing theme specific functions
                    </p>
                </div>

                <div class="form-group">
                    <label>Theme Author:</label>
                    <input type="text" name="theme_author" class="form-control" placeholder="i.e. Tyler Bailey" tabindex="4" />
                </div>

                <div class="form-group">
                    <label>Theme Description:</label>
                    <textarea name="theme_description" class="form-control" placeholder="i.e. A very basic theme based on the Twitter Bootstrap CSS framework." style="min-height: 100px;" tabindex="5"></textarea>
                </div>

                <div class="form-group submit">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="submit" name="submit_theme" class="btn btn-primary" value="Build Theme"  tabindex="6"/>
                            <input type="reset" name="clear_theme" class="btn btn-danger" value="Start Over" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php include_once('inc/footer.php'); ?>
