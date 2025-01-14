=== WorldCurrency ===
Contributors: WhiteCubes, JonScaife
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6CUNDYFWV4NUW
Tags: currency, exchange rates, currency converter, currency rates, travel, financial, eCommerce
Requires at least: 2.8.0
Tested up to: 4.4
Stable tag: 1.24

Recognises users by IP address and shows them converted values in their local currency, you can write post/pages in multiple currencies.

== Description ==
Show currency values to readers in their local currency, you can use multiple currencies per post.
[worldcurrency curr="THB" value="120"] will became ($3.50) in United States and (€3) from Europe)

More information may be found on the [plugin's homepage](http://www.cometicucinoilweb.it/blog/en/worldcurrency-plugin-for-wordpress/)

= Why Use It? =
It is really useful (especially for travel and commerce blogs) to show prices in the currency of the reader, so they can easily appreciate the value.
With this plugin you can obtain something like this: The price of the green curry was of 120 bath (€3)

= Features: =
* Determines the reader's country via IP address, using [IP2C](http://firestats.cc/wiki/ip2c)
* Obtains exchange rates from [Yahoo! Finance](http://finance.yahoo.com/)
* Uses AJAX so that converting currency values doesn't delay page load times
* Caches exchange rates locally to minimize calls to Yahoo! Finance
* Only does something if there is a currency value in the post
* Allows you to specify different currencies per post/page
* It is possible to totally personalize the output format, for example: EUR 2 | €2 | (~2 EUR)
* Gives site owner the choice of using current or historic (at publishing time) rates (globally or also per single conversion/post).
* Allows visitors to change their currency via a selection box
* Currency selection box widget available
* Currency selection box shorttag available [worldcurrencybox]
* The currency selection box may be put anywhere via html placeholder
* It is possible to choose to hide conversion if target and origin currency are the same
* It is possible to choose to make ajax calls over SSL
* It is possible to choose the decimal and thousands separator for the output format
* It is possible to force the target currency per each conversion

= How To Use (once plugin is installed) =
Enter any currency values you want converted with the [worldcurrency] shorttag. 
	  
	[worldcurrency curr="EUR" value="25"]
		in united states will show: 
			($30)
  
Parameters:
  
  		curr="***" 				-> the name of the value currency
  		value="***"				-> the value used for exchange
  		target="***" 			-> the name of the target currency (if you want to force it)
  		historic="true|false"	-> (optional) override main plugin setting

If you want to show the currency selection box anywhere in the post/page use:

	[worldcurrencybox]
	  
= Compatibility: =
* This plugin is tested on Wordpress 4.4, and many earlier 3.x and 4.x versions.

= Support: =
This plugin is not officially supported because is made and updated in free time, but leave a comment on the [plugin's homepage](http://www.cometicucinoilweb.it/blog/en/worldcurrency-plugin-for-wordpress/) and I may help ;)

= Disclaimer =
This plugin is released under the [GPL licence](http://www.gnu.org/copyleft/gpl.html). I do not accept any responsibility for any damages or losses, direct or indirect, that may arise from using the plugin or these instructions. This software is provided as is, with absolutely no warranty. Please refer to the full version of the GPL license for more information.

== Installation ==
1. Download the plugin file and unzip it.
2. Upload the `worldcurrency` folder to the `wp-content/plugins/` folder.
3. Activate the WorldCurrency plugin within WordPress.

Alternatively, you can install the plugin automatically through the WordPress Admin interface by going to Plugins -> Add New and searching for WorldCurrency.

== Upgrade Notice ==
1. Download the plugin file and unzip it.
2. Upload the `worldcurrency` folder to the `wp-content/plugins/` folder, overwriting the existing files.
3. Go to the plugin settings and Update or Reset them to be sure that new settings are saved.

Alternatively, you can update this plugin through the WordPress Admin interface.

If the update includes a new currency that you need, it will appear only after a day because currency rates are cached.
If you are using historic rates than you have to delete "wc_rates" custom field from the post to have it refreshed with the new currency
(but keep in mind that this will refresh also the other exchange rates)

== Frequently Asked Questions ==

= Will the plugin have extra features in the future =
Extra features may be implemented if I find them useful/interesting and if I have time to develop them.
Feel free to propose them.

=I use the shortcode in another plugin (like wp-table-reloaded) and the conversions are not working=
This is because in these cases the WorldCurrency plugin is not aware of the presence of these conversions and the necessary code is not loaded.
You can add a wc_force = 1 custom field to posts or pages to force the loading of the necessary code in this cases.

== Screenshots ==
There are no screenshots for this plugin, but there is a full demo on the [Plugin's Homepage](http://www.cometicucinoilweb.it/blog/en/worldcurrency-plugin-for-wordpress/)

== Changelog ==

= 1.24 (30 December 2015) =
* Fix: Regression in ip2c.php which resulted in incorrected region lookup
* Added: Settings link on the plugins page directly to the plugin settings

= 1.23 (30 December 2015) =
* Fix: Bug in version numbering

= 1.22 (30 December 2015) =
* Fix: Corrected several additional typos in description and admin page

= 1.21 (30 December 2015) =
* Change: Updated the ip2c database from http://software77.net/geo-ip/
* Change: Modified comment header so that apostrophe doesn't cause incorrect colour coding when editing
* Fix: Corrected several minor typos

= 1.20 (12 January 2015) =
* Fix: Fix for servers which are ipv6 and ipv4, converts all visitor addresses to pure ipv4 format.  Plugin has no support for native ipv6 at this time (the ip2c database is ipv4 only)

= 1.19 (12 January 2015) =
* Fix: Corrected error in readme

= 1.18 (12 January 2015) =
* Fix: Corrected Bulgarian Leva code from BGL to BGN

= 1.17 (12 January 2015) =
* Fix: Corrected typo on the admin pages which showed incorrect shortcode (should be curr= not cur=)

= 1.16 (12 January 2015) =
* Fix: getting rates from yahoo has been fixed
* Fix: Getting currency rates over SSL address had extra s (httpss), now correctly https
* Added: Wrapper function for cases where jQuery is loaded defer or async
* Change: by default a dot is now used for decimal, and comma for thousand separator
* Change: by default jQuery is used in no conflict mode
* Change: the default format of output is smaller and tidier with just symbol and value (e.g. $40)
* Change: Updated the ip2c database from http://software77.net/geo-ip/

= 1.15 (13 June 2012) =
* Added: new tag parameter target="" to force target currency

= 1.14 (22 March 2012) =
* Added: new configuration parameter to force the script presence on every page

= 1.10 (10 March 2012) =
* Added: it is possible to add "wc_force" = 1 custom field to post to force the loading of worldcurrency code, in case of conflict with other plugins

= 1.9 (29 February 2012) =
* Added: is now possible to choose the decimal and thousands separator for the output formatting

= 1.8 (29 February 2012) =
* Fix: ajax was not working if wordpress admin is under forced SSL with: define('FORCE_SSL_LOGIN', true);
* Added: possibility to choose to make ajax calls over SSL
* Added: Fijian dollar (FJD) - if using historic rates you should delete "wc_rates" custom field in each post to have it updated with the new currency

= 1.7 (28 February 2012) =
* Fix: now plugin uses wordpress ajax handler and should work also with wp-config.php in different locations

= 1.6 (22 February 2012) =
* Added option to use a jQuery.noconflict to increase compatibility with other themes/plugins

= 1.5 (21 February 2012) =
* Hides the widget if no currency on page/post

= 1.4 (20 February 2012) =
* Aesthetic improvements

= 1.2 (20 February 2012) =
* Minor corrections
* Possibility to choose to hide conversion if target and origin currency are the same

= 1.1 (20 February 2012) =
* Minor improvements and Currency selection box shorttag

= 1.0 (19 February 2012) =
* Initial Release

== Credits ==
* Built on ideas and small code portions from [LocalCurrency by Stephen Cronin](http://www.jobsinchina.com/resources/wordpress-plugin-localcurrency)
* This plugin uses [IP2C](http://firestats.cc/wiki/ip2c) to determine which country the visitor is from.
* This plugin uses [Yahoo! Finance](http://finance.yahoo.com/) to determine the exchange rates.
* Updates since version 1.16 by Jon Scaife (https://jonscaife.com, https://diymediahome.org)