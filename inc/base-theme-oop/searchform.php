<form role="search" method="get" name="s" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <input type="text" class="form-control search-form" placeholder="<?php _e('Search...', '{%THEME_SLUG%}'); ?>" name="s" tabindex="-1">
        <span class="input-group-btn">
            <button id="search" class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </span>
    </div>
</form>
