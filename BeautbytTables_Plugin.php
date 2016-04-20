<?php


include_once('BeautbytTables_LifeCycle.php');

class BeautbytTables_Plugin extends BeautbytTables_LifeCycle {

    /**
     * See: http://plugin.michael-simpson.com/?page_id=31
     * @return array of option meta data.
     */
    public function getOptionMetaData() {
        //  http://plugin.michael-simpson.com/?page_id=31
        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
            'ATextInput' => array(__('Enter in some text', 'my-awesome-plugin')),
            'AmAwesome' => array(__('I like this awesome plugin', 'my-awesome-plugin'), 'false', 'true'),
            'CanDoSomething' => array(__('Which user role can do something', 'my-awesome-plugin'),
                                        'Administrator', 'Editor', 'Author', 'Contributor', 'Subscriber', 'Anyone')
        );
    }

//    protected function getOptionValueI18nString($optionValue) {
//        $i18nValue = parent::getOptionValueI18nString($optionValue);
//        return $i18nValue;
//    }

    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }

    public function getPluginDisplayName() {
        return 'Beautbyt Tables';
    }

    protected function getMainPluginFileName() {
        return 'beautbyt-tables.php';
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Called by install() to create any database tables if needed.
     * Best Practice:
     * (1) Prefix all table names with $wpdb->prefix
     * (2) make table names lower case only
     * @return void
     */
    protected function installDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
        //            `id` INTEGER NOT NULL");
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Drop plugin-created tables on uninstall.
     * @return void
     */
    protected function unInstallDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
    }


    /**
     * Perform actions when upgrading from version X to version Y
     * See: http://plugin.michael-simpson.com/?page_id=35
     * @return void
     */
    public function upgrade() {
    }

    public function addActionsAndFilters() {

        // Add options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        // add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));

        // Example adding a script & style just for the options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        //        if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
        //            wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        //            wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        }


        // Add Actions & Filters
        // http://plugin.michael-simpson.com/?page_id=37


        // Adding scripts & styles to all pages
        // Examples:
        //        wp_enqueue_script('jquery');
        wp_enqueue_style('my-style', plugins_url('/css/ttables.css', __FILE__));
        //        wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));


        // Register short codes
        // http://plugin.michael-simpson.com/?page_id=39

		function ttable_func( $atts ) {
			ob_start();
			?>
			<div class="glossovers padding-top"> <div class="glossover clearfix text-uppercase border-top padding-bottom" itemscope="" itemtype="http://schema.org/Product">
	<span class="hide" itemprop="name"><?php the_title('', '', true); ?></span>
</div>
<div class="clearfix border" itemprop="review" itemscope="" itemtype="http://schema.org/Review">
	<div itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
		<meta content="55" itemprop="worstRating">
		<meta content="87" itemprop="ratingValue">
		<meta content="100" itemprop="bestRating">
	</div>
		<span class="hide" itemprop="author">Beaut by T</span>
	<div class="col-md-7 col-lg-6 border-right-md border-right-lg p-a-0 col-xs-12">
		<div class="clearfix">
			<div class="col-xs-4 col-sm-5 col-md-13 col-lg-12 padding-none border-right">
				<img class="img-responsive" src="<?php echo $atts['image']; ?>" width="150" height="150">
			</div>
		<div class="col-xs-8 col-sm-19 col-md-11 col-lg-12 padding-none text-center ">
			<div class="glossover-grade p-t-md p-b-md">
				<span class="glossover-score grade thin"><?php echo $atts['rating']; ?></span>
			</div>
		</div>
	</div>
</div>
<div class="clearfix visible-xs"></div>
	<div class="col-sm-24 col-md-17 col-lg-18 border-top-xs border-top-sm">
		<div class="glossover-breakdown">
			<div class="row">
				<div class="col-md-12 padding-horz-small">
					<div class="table-row">
						<div class="table-cell fixed-cell text-right" style="min-width: 94px">Aplicación</div>
						<div class="table-cell">
							<div class="glossover-bar-outline">
								<div class="glossover-bar" style="width:  <?php echo $atts['aplicacion'] * 20; ?>%;"></div>
							</div>
						</div>
						<div class="table-cell fixed-cell" style="min-width: 28px"> <?php echo $atts['aplicacion']; ?></div>
					</div>
					<div class="table-row">
						<div class="table-cell fixed-cell text-right" style="min-width: 94px">Pigmentación</div>
						<div class="table-cell">
							<div class="glossover-bar-outline">
								<div class="glossover-bar" style="width: <?php echo $atts['pigmentacion'] * 20; ?>%;"></div>
							</div>
						</div>
						<div class="table-cell fixed-cell" style="min-width: 28px"> <?php echo $atts['pigmentacion']; ?></div>
					</div>
					<div class="table-row">
						<div class="table-cell fixed-cell text-right" style="min-width: 94px">Textura</div>
						<div class="table-cell">
							<div class="glossover-bar-outline">
							<div class="glossover-bar" style="width: <?php echo $atts['textura'] * 20; ?>%"></div>
						</div>
					</div>
					<div class="table-cell fixed-cell" style="min-width: 28px"> <?php echo $atts['textura']; ?></div>
				</div>
			</div>
			<div class="col-md-12 padding-horz-small">
				<div class="table-row">
					<div class="table-cell fixed-cell text-right" style="min-width: 94px">Durabilidad</div>
					<div class="table-cell">
						<div class="glossover-bar-outline">
							<div class="glossover-bar" style="width:<?php echo $atts['durabilidad'] * 20; ?>%;"></div>
						</div>
					</div>
					<div class="table-cell fixed-cell" style="min-width: 28px"> <?php echo $atts['durabilidad']; ?></div>
				</div>
				<div class="table-row">


					<div class="table-cell fixed-cell text-right" style="min-width: 94px">Producto</div>
						<div class="table-cell">
							<div class="glossover-bar-outline">
								<div class="glossover-bar" style="width: <?php echo $atts['producto'] * 20; ?>%;"></div>
							</div>
						</div>
						<div class="table-cell fixed-cell" style="min-width: 28px"> <?php echo $atts['producto']; ?></div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
			<?php
			return ob_get_clean();

		}

		add_shortcode( 'Ttable', 'ttable_func' );


        // Register AJAX hooks
        // http://plugin.michael-simpson.com/?page_id=41

    }


}
