<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress Theme Maker - By Tyler Bailey</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>

    </header>

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center">Elexicon Base Theme</h1>

            <form name="build_theme" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label>Theme Name:</label>
                    <input type="text" name="theme_name" class="form-control" placeholder="i.e. Elexicon" />
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
                    <input type="submit" name="submit_theme" class="btn btn-primary" value="Build Theme" />
                    <input type="reset" name="clear_theme" class="btn btn-danger" value="Start Over" />
                </div>
            </form>
        </div>
    </div>

    <footer>

    </footer>

    <script type="text/javascript" src="//code.jquery.com/jquery-3.2.1.min.js" defer></script>
    <script type="text/javascript">window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js" defer></script>
    <script type="text/javascript" src="js/theme-maker.js" defer></script>
</body>
</html>
