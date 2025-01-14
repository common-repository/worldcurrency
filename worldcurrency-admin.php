<?php
// This file is called on Admin pages

	if (function_exists('add_options_page')) {
		add_options_page('WorldCurrency Settings', 'WorldCurrency', 'update_plugins', basename(__FILE__), 'worldcurrency_admin_page');
	}

	function worldcurrency_admin_page(){

		// get the localcurrency options
		$dt_wc_options = get_option('dt_wc_options');

		// Post the form
		if (isset($_POST['dt_wc_options_submit']) && check_admin_referer('worldcurrency_admin_page_submit')) {

			$dt_wc_options['historic_rates']		= isset($_POST['historic_rates']) ? 'true' : 'false';
			$dt_wc_options['hide_if_same']			= isset($_POST['hide_if_same']) ? 'true' : 'false';
			$dt_wc_options['plugin_link']			= isset($_POST['plugin_link']) ? 'true' : 'false';
			$dt_wc_options['yahoo_link']			= isset($_POST['yahoo_link']) ? 'true' : 'false';
			$dt_wc_options['plugin_priority'] 		= absint($_POST['plugin_priority']);
			$dt_wc_options['output_format'] 		= $_POST['output_format'];
			$dt_wc_options['thousands_separator'] 	= $_POST['thousands_separator'];
			$dt_wc_options['decimal_separator'] 	= $_POST['decimal_separator'];
			$dt_wc_options['additional_css'] 		= $_POST['additional_css'];
			$dt_wc_options['bottom_select']			= isset($_POST['bottom_select']) ? 'true' : 'false';
			$dt_wc_options['include_jquery']		= isset($_POST['include_jquery']) ? 'true' : 'false';
			$dt_wc_options['include_always']		= isset($_POST['include_always']) ? 'true' : 'false';
			$dt_wc_options['jquery_no_conflict']	= isset($_POST['jquery_no_conflict']) ? 'true' : 'false';
			$dt_wc_options['ajax_over_ssl']			= isset($_POST['ajax_over_ssl']) ? 'true' : 'false';

			update_option('dt_wc_options', $dt_wc_options);

			echo '<div id="message" class="updated"><p><strong>Options saved.</strong></p></div>';
		}

		if (isset($_POST['dt_wc_options_reset']) && check_admin_referer('worldcurrency_admin_page_submit')) {
			dt_wc_createOptions(true);
			echo '<div id="message" class="updated"><p><strong>Options resetted</strong></p></div>';
			$dt_wc_options = get_option('dt_wc_options');
		}

		// now drop out of php to create the HTML for the Options page
	?>

		<style type="text/css">
			.dt_wc_list {
				list-style-type: disc;
				padding-left: 30px;
				margin-top: 10px;
			}
		</style>

		<div class="wrap">
			<h2>WorldCurrency Settings</h2>
			<div id="poststuff">

				<form name="worldcurrency_options_form" action="" method="post">

				<div class="stuffbox">
					<h3>General Settings</h3>
					<div class="inside">

						<?php if (function_exists('wp_nonce_field')) {wp_nonce_field('worldcurrency_admin_page_submit'); }?>

						<p>
							<h4>
								Use historic exchange rates:
								<input type="checkbox" name="historic_rates" id="historic_rates" <?php if ($dt_wc_options['historic_rates']=='true') {echo 'checked="checked"';}?> />
							</h4>
							By default, the plugin displays the visitor's local currency based on the current exchange rate.<br />
							Select this parameter if you want the use the exchange rate at the time of the post, rather than the current one.<br />
							This default option can be overridden by a parameter directly in the shorttag.
						</p>

						<p>
							<h4>
								Hide conversion if same currency as origin value:
								<input type="checkbox" name="hide_if_same" id="hide_if_same" <?php if ($dt_wc_options['hide_if_same']=='true') {echo 'checked="checked"';}?> />
							</h4>
							Does not show the conversion if the origin value currency and the user local currency are the same
						</p>

						<p>
							<h4>
								Output format:
								<input type="text" size="80" name="output_format" value="<?php echo $dt_wc_options['output_format']; ?>" />
							</h4>
							Controls the format of the output.<br />
							Any string can be specified, with one or more of these parameters:
							<ul class="dt_wc_list">
								<li>%exchange_rate% - shows the numeric value the exchange rate</li>
								<li>%from_value% - shows the numeric value of origin currency</li>
								<li>%from_symbol% - shows the symbol of the origin currency (ie: € or $)</li>
								<li>%from_code% - shows the code of the origin currency (ie: EUR or USD)</li>
								<li>%from_name% - shows the full name of the origin currency (ie: 'Euro (EUR)')</li>
								<li>%to_value% - shows the numeric value of the conversion</li>
								<li>%to_symbol% - shows the symbol of the target currency (ie: € or $)</li>
								<li>%to_code% - shows the code of the target currency (ie: EUR or USD)</li>
								<li>%to_name% - shows the full name of the target currency (ie: 'Euro (EUR)')</li>
							</ul>
						</p>

						<p>
							<h4>
								Thousands separator:
								<input type="text" size="80" name="thousands_separator" value="<?php echo isset($dt_wc_options['thousands_separator']) ? $dt_wc_options['thousands_separator'] : '.'; ?>" />
							</h4>
							The character used to separate the thousands in the output (usually , or .)
						</p>

						<p>
							<h4>
								Decimals separator:
								<input type="text" size="80" name="decimal_separator" value="<?php echo isset($dt_wc_options['decimal_separator']) ? $dt_wc_options['decimal_separator'] : ','; ?>" />
							</h4>
							The character used to separate the decimal numbers in the output (usually , or .)
						</p>

						<p>
							<h4>
								Bottom currency select box:
								<input type="checkbox" name="bottom_select" id="bottom_select" <?php if ($dt_wc_options['bottom_select']=='true') {echo 'checked="checked"';}?> />
							</h4>
							Automatically puts a currency selection box at the bottom of every page/post that has currency conversions in them.
						</p>

						<p>
							<h4>
								Plugin link:
								<input type="checkbox" name="plugin_link" id="plugin_link" <?php if ($dt_wc_options['plugin_link']=='true') {echo 'checked="checked"';}?> />
							</h4>
							By default, a link to the plugin home page is included near the currency selection box.<br />
							Deselect this parameter if you want to disable the link, but <u>keep in mind that leaving the link is one the best ways to support this plugin</u>.
						</p>

						<p>
							<h4>
								Yahoo link:
								<input type="checkbox" name="yahoo_link" id="yahoo_link" <?php if ($dt_wc_options['yahoo_link']=='true') {echo 'checked="checked"';}?> />
							</h4>
							By legal requirement a link to Yahoo! Finance will be shown near the currency selection box.<br />
							Disable this only if you want to put this link elsewhere (ie: footer).
						</p>

						<p>
							<h4>
								Additional CSS styles:<br />
								<textarea name="additional_css" style="width:90%;height:250px;"><?php echo $dt_wc_options['additional_css']; ?></textarea>
							</h4>
							It is possible to change/set the styles of the converted values (.worldcurrency) and of the selection box (.worldcurrency_selection_box). Only for advanced users ;)
						</p>

						<div style="clear:both"></div>
					</div>
				</div>


				<!-- Usage Section -->
				<div class="stuffbox">
					<h3>Technical Settings</h3>
					<div class="inside">

						<p>
							<h4>
								Include jQuery:
								<input type="checkbox" name="include_jquery" id="include_jquery" <?php if ($dt_wc_options['include_jquery']=='true') {echo 'checked="checked"';}?> />
							</h4>
							This plugin uses and includes jQuery, if you already have jQuery included in your blog pages (by theme or other plugins), you may want to disable this.
						</p>

						<p>
							<h4>
								jQuery no conflict:
								<input type="checkbox" name="jquery_no_conflict" id="jquery_no_conflict" <?php if ($dt_wc_options['jquery_no_conflict']=='true') {echo 'checked="checked"';}?> />
							</h4>
							Uses "jQuery" instead of "$" for calling jQuery functions. Useful also if you have a noconflict version of jQuery included by other themes/plugins
						</p>

						<p>
							<h4>
								Always include the script:
								<input type="checkbox" name="include_always" id="include_always" <?php if ($dt_wc_options['include_always']=='true') {echo 'checked="checked"';}?> />
							</h4>
							Always include the script in the page. Useful if you want to use the currency conversions also in other parts than pages/posts. (in pages/posts you can force the script presence with a wc_force=1 custom fields)
						</p>

						<p>
							<h4>
								Ajax over SSL:
								<input type="checkbox" name="ajax_over_ssl" id="ajax_over_ssl" <?php if ($dt_wc_options['ajax_over_ssl']=='true') {echo 'checked="checked"';}?> />
							</h4>
							Flag this if your site runs over SSL and you want worldcurrency ajax queries run over SSL too.
						</p>

						<p>
							<h4>
								Plugin firing priority:
								<input type="text" size="4" name="plugin_priority" value="<?php echo $dt_wc_options['plugin_priority']; ?>" />
							</h4>
							Controls the order that this plugin fires, to help resolve conflicts with other plugins.<br />
							10 is the default priority, change the value (probably to higher values) only if you have
							some problems.
						</p>

					</div>
				</div>

				<!-- Show Update Button -->
				<div class="submit">
					<input type="submit" name="dt_wc_options_submit" value="Update Options &raquo;"/>
					<input type="submit" name="dt_wc_options_reset" value="Reset Options &raquo;"/>
				</div>

				</form>

				<!-- Usage Section -->
				<div class="stuffbox">
					<h3>Usage</h3>
					<div class="inside">
						<p>
							Enter any currency values you want converted with the [worldcurrency] shorttag.<br /> <br />
							<code style="padding:5px;margin:10px;">
								[worldcurrency curr="EUR" value="25"]
							</code><br /><br />
							in united states this will show: ($30)
						</p>
						<p>
							Parameters:
							<ul style="font-size:1em; margin:12px 40px; list-style:disc">
						  		<li>curr="***" 				-> the name of the value currency</li>
						  		<li>value="***"				-> the value used for exchange</li>
						  		<li>historic="true / false"	-> (optional) override main plugin setting</li>
						  	</ul>
						</p>
						<p>
							You can also put this shorttag in pages/posts:<br /><br />
							<code style="padding:5px;margin:10px;">
								[worldcurrencybox]
							</code><br /><br />
							Or this HTML code anywhere else:<br /><br />
							<code style="padding:5px;margin:10px;">
								&lt;div class="worldcurrency_selection_box_placeholder"&gt;&lt;/div&gt;
							</code><br /><br />
							wherever you want the <b>currency selection box</b> to be shown (or select the option above to show it automatically at the bottom of the post)<br />
							<br />
							There is also a <b>Widget</b> (for the sidebar) wich shows the Currency Selection Box only if there are currencies on the page.
					</div>
				</div>


				<!-- Thank You Section -->
				<div class="stuffbox">
					<h3>Thank You</h3>
					<div class="inside">
						<div style="float:right;margin-top:20px;">
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="6CUNDYFWV4NUW">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
							</form>
						</div>

						<p>Thank you for using the WorldCurrency plugin. If you like this plugin, you may like to:</p>
						<ul style="font-size:1em; margin:12px 40px; list-style:disc">
							<li>Rate this plugin on the <a href="http://wordpress.org/extend/plugins/worldcurrency/" target="_blank">WordPress plugin directory</a></li>
							<li>Link to the <a href="http://www.cometicucinoilweb.it/blog/en/worldcurrency/" target="_blank">plugin's home page</a> so others can find out about it</li>
							<li>Support ongoing development by <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6CUNDYFWV4NUW">making a donation</a></li>
						</ul>

						<p>This plugin was created thanks to:</p>
						<ul style="font-size:1em; margin:12px 40px; list-style:disc">
							<li>Many ideas and some code from <a href="http://www.jobsinchina.com/resources/wordpress-plugin-localcurrency" target="_blank">LocalCurrency</a> by Stephen Cronin</li>
							<li>IP2C (<a href="http://firestats.cc/wiki/ip2c" target="_blank">http://firestats.cc/wiki/ip2c</a>) to determine user's country</li>
							<li>Yahoo! Finance (<a href="http://finance.yahoo.com" target="_blank">http://finance.yahoo.com</a>) for conversion rates</li>
						</ul>
						<p><small>Copyright <?php echo date('Y'); ?> by Daniele Tieghi. Released under the GNU General Public License (version 2 or later).  Updates since v1.16 provided by <a href="https://jonscaife.com">Jon Scaife</a></small></p>
					</div>
				</div>

			</div> <!-- end id="poststuff" -->
		</div> <!-- end class="wrap" -->


	<?php
	}

?>