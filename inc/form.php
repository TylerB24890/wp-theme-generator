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
