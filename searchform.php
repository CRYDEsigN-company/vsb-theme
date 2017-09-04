<form role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <label class="screen-reader-text form-control" for="s"><?php _x( 'Search for:', 'label' ); ?></label>

        <input  class="form-control" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" aria-label="Input group example" aria-describedby="btnGroupAddon" placeholder="Поиск..."/>

        <span class="input-group-btn">
			<input class="btn btn-secondary btn-danger" type="button" type="submit" id="searchsubmit"
            value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
        </span>
        
    </div>
</form>