<?php include_once('inc/header.php'); ?>

    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1 class="text-center">WP Base Theme Generator - Beta</h1>

            <p style="margin-bottom: 30px;">
                Generate a <i>very basic</i> WordPress theme built on top of the <a href="http://getbootstrap.com/">Twitter Bootstrap</a> framework. The generated theme will include a robust package.json file with a preconfigured Gruntfile for preprocessing SCSS and other helpful functions, as well as a few useful PHP snippets. The theme will <b>not</b> include any prebuilt templates or pages, but rather give you the starting point to do so yourself.
             </p>

             <p class="text-center" style="margin-bottom: 30px;">
                 <a href="http://elexicon.com/our-work/">View some of the projects using this base theme!</a>
             </p>

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

                <div class="form-group">
                    <label>Theme Structure:</label>
                    <div class="radio">
                        <label><input type="radio" name="structure" value="procedural" checked /> Procedural PHP</label>
                    </div>

                    <div class="radio">
                        <label><input type="radio" name="structure" value="oop" /> Object Oriented PHP - Beta</label>
                    </div>
                </div>

                <!--
                <div class="form-group checkboxes">
                    <label>Theme Framework:</label>
                    <div class="checkbox">
                        <label><input type="checkbox" name="framework[]" value="bootstrap3" /> Twitter Bootstrap V 3.3.6</label> - <a href="http://getbootstrap.com/">View</a>
                    </div>

                    <div class="checkbox">
                        <label><input type="checkbox" name="framework[]" value="bootstrap4" /> Twitter Bootstrap V 4.0.0-alpha.x</label> - <a href="https://v4-alpha.getbootstrap.com/">View</a>
                    </div>

                    <div class="checkbox">
                        <label><input type="checkbox" name="framework[]" value="foundation" /> Zurb Foundation 6</label> - <a href="http://foundation.zurb.com/">View</a>
                    </div>
                </div>
                -->
                <div class="form-group submit">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="submit" name="submit_theme" class="btn btn-primary" value="Build Theme"  tabindex="6"/>
                            <input type="reset" name="clear_theme" class="btn btn-danger" value="Start Over" />
                        </div>
                        <div class="col-sm-6">
                            <span><b>Themes Generated:</b> <span id="theme-count" style="display: inline;"><?php echo Create_Theme::count_themes_generated(); ?></span></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php include_once('inc/footer.php'); ?>
