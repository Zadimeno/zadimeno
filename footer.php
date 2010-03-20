	<?php /* K2 Hook */ do_action('template_after_content'); ?>

	<div class="clear"></div>
</div> <!-- Close Page -->

<hr />

<?php /* K2 Hook */ do_action('template_before_footer'); ?>

<div id="footer">

	<?php locate_template( array('blocks/k2-footer.php'), true ); ?>
	
	<?php /* K2 Hook */ do_action('template_footer'); ?>
	<br />
	<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.5/bg/">Текстовете са под лиценз BY-NC-ND</a>.
</div><!-- #footer -->

<?php wp_footer(); ?>

</body>
</html> 
