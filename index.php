<?php include_once('inc/header.php'); ?>

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center">Base WP Theme Generator</h1>

            <p>
                Generate a <i>very basic</i> WordPress theme built on top of the <a href="http://getbootstrap.com/">Twitter Bootstrap</a> framework. The generated theme will include a robust package.json file with a preconfigured Gruntfile for preprocessing SCSS and other helpful functions, as well as a few useful PHP snippets. The theme will <b>not</b> include any prebuilt templates or pages, but rather give you the starting point to do so yourself.
             </p>

            <?php if(isset($resp)) : ?>
                <div style="color: red; margin: 30px 0;">
                    <h3><?php echo $resp; ?></h3>
                </div>
            <?php endif; ?>

            <form name="build_theme" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Theme Name:</label>
                    <input type="text" name="theme_name" class="form-control" placeholder="i.e. Elexicon" />
                </div>

                <div style="position: absolute; left: -9999px;">
                    <input type="text" name="email" />
                </div>

                <div class="form-group">
                    <label>Theme Slug:</label>
                    <input type="text" name="theme_slug" class="form-control" placeholder="i.e. elexicon" />
                </div>

                <div class="form-group">
                    <label>Theme Prefix:</label>
                    <input type="text" name="theme_prefix" class="form-control" placeholder="i.e. elx" />
                    <p class="help-block">
                        Used to for internationalization and prefixing theme specific functions
                    </p>
                </div>

                <div class="form-group">
                    <label>Theme Author:</label>
                    <input type="text" name="theme_author" class="form-control" placeholder="i.e. Tyler Bailey" />
                </div>

                <div class="form-group">
                    <input type="submit" name="submit_theme" class="btn btn-primary" value="Build Theme" />
                    <input type="reset" name="clear_theme" class="btn btn-danger" value="Start Over" />
                </div>
            </form>
        </div>
    </div>

<?php include_once('inc/footer.php'); ?>
