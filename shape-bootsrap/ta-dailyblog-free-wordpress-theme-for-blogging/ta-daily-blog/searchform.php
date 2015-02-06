<?php
/**
 * @package TA DailyBlog
 *
 * Search Form Template
 */
?>
 
<form method="get" class="form-search" action="<?php echo home_url( '/' ); ?>">
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group">
				<input type="text" class="form-control search-query" name="s" placeholder="<?php esc_attr_e('search here &hellip;', 'ta_daily_blog'); ?>" />
				<span class="input-group-btn">
					<button type="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('search', 'ta_daily_blog'); ?>"><?php _e('Search', 'ta_daily_blog'); ?></button>
				</span>
			</div>
		</div>
	</div>
</form>