<div class="wrap about-wrap cp-wrap">

	<h1><?php _e( 'Welcome to', 'cp' ); ?> <?php echo $this->name; ?></h1>

	<div class="about-text">
		<?php
		printf( __( '%s has done a few things to get you on your way.', 'cp' ), $this->name );
		?>
		<br/>
		<?php
		_e( 'It’s created a couple of dynamic pages labeled ‘Field Trips’ & ‘Dashboard’ and added them to your navigation.', 'cp' );
		?>
		<br/>
		<?php
		printf( __( 'If these are not visible on your site and theme, you may need to check your %s.', 'cp' ), '<a href="' . admin_url( 'nav-menus.php' ) . '">' . __( 'Menu Settings', 'cp' ) . '</a>' );
		?>
		<br/>
		<?php
		printf( __( '%s has also installed - but not activated - MarketPress Lite.', 'cp' ), $this->name );
		?>
		<br/>
		<?php _e( 'For those of you who wish to sell your field trip you will need to activate and set up a payment gateway.  But more on that later.', 'cp' ); ?>
	</div>

	<h1><?php _e( 'Let’s Get Started', 'cp' ); ?></h1>

	<div class="changelog">
		<h3><?php _e( 'Step 1. Create a field trip', 'cp' ); ?></h3>

		<div class="about-text">
			<ul>
				<li><?php _e( 'Add field trip title and description', 'cp' ); ?></li>
				<li><?php _e( 'Assign field trip instructor or leader', 'cp' ); ?></li>
				<li><?php _e( 'Configure attendance and access settings', 'cp' ); ?></li>
				<!--<li><?php _e( 'Set up payment gateways for Paid Field Trips', 'cp' ); ?></li>-->
			</ul>

		</div>
		<br/>
		<!--<img alt="" src="<?php echo trailingslashit( $this->plugin_url ) . 'images/quick-setup-step-1.jpg'; ?>" class="image-66">-->
	</div>

	<div class="changelog">
		<h3><?php _e( 'Step 2. Add Field Trip Content', 'cp' ); ?></h3>

		<div class="about-text">
			<?php
			_e( 'Field trips have several stops (field locations). Stops are made up of elements these can be presented on a single page or over several pages . Elements include', 'cp' );
			?>
			<ul>
				<li><?php _e( 'Text, Video & Audio', 'cp' ); ?></li>
				<li><?php _e( 'File Upload and Download ', 'cp' ); ?></li>
				<li><?php _e( 'Multiple and Single Choice Questions', 'cp' ); ?></li>
				<li><?php _e( 'Test Response fields', 'cp' ); ?></li>
			</ul>

		</div>
		<!--<img alt="" src="<?php echo trailingslashit( $this->plugin_url ) . 'images/quick-setup-step-2.jpg'; ?>" class="image-66">-->

	</div>

	<div class="changelog">
		<h3><?php _e( 'Step 3. Enroll students', 'cp' ); ?></h3>

		<div class="about-text">
			<?php
			_e( 'Configure student enrollment, select to either:', 'cp' );
			?>
			<ul>
				<li><?php _e( 'Manually add students with or without passcode restriction', 'cp' ); ?></li>
				<li><?php _e( 'Enroll students  automatically after registration and/or payment', 'cp' ); ?></li>
			</ul>

		</div>

	</div>

	<div class="changelog">
		<h3><?php _e( 'Step 4. Publish your field trip!', 'cp' ); ?></h3>

		<div class="about-text">
			<?php
			_e( 'There are many other features in FieldPress, but those are the basics to get you up and running. Now it’s time to publish the field trip and watch your students learn', 'cp' );
			?>
			<br/><br/>

		</div>
		<!--<img alt="" src="<?php echo trailingslashit( $this->plugin_url ) . 'images/quick-setup-step-3.jpg'; ?>" class="image-66">-->

	</div>

	<div class="changelog">
		<h3><?php _e( 'Step 5. Field Trip Management', 'cp' ); ?></h3>

		<div class="about-text">
			<ul>
				<li><?php _e( 'Administer instructors and students', 'cp' ); ?></li>
				<li><?php _e( 'Manage Grading of the students submitted work for each stop', 'cp' ); ?></li>
				<li><?php _e( 'Generate Stop/Field Trip/Site-wide Reporting', 'cp' ); ?></li>
			</ul>


		</div>

		<?php
		if ( current_user_can( 'manage_options' ) && ! get_option( 'permalink_stop' ) ) {
			// toplevel_page_fields
			$screen = get_current_screen();

			$show_warning = false;

			if ( 'toplevel_page_fields' == $screen->id && isset( $_GET['quick_setup'] ) ) {
				$show_warning = true;
			}

			if ( $show_warning ) {
				// echo '<div class="error"><p>' . __('<strong>' . $this->name . ' is almost ready</strong>. You must <a href="options-permalink.php">update your permalink stop</a> to something other than the default for it to work.', 'cp') . '</p></div>';
				?>
				<div class="permalinks-error">
					<h4><?php _e( 'Pretty permalinks are required to use FieldPress.', 'cp' ); ?></h4>

					<p><?php _e( 'Click the button below to setup your permalinks.', 'cp' ); ?></p>
					<a href="<?php echo admin_url( 'options-permalink.php' ); ?>" class="button button-stops save-stop-button setup-permalinks-button"><?php _e( 'Setup Permalinks', 'cp' ); ?></a>
				</div>
			<?php
			}
		} else {
			?>
			<a href="<?php echo admin_url( 'admin.php?page=field_details' ); ?>" class="button button-stops save-stop-button start-field-button"><?php _e( 'Start building your own field trip now &rarr;', 'cp' ); ?></a>
		<?php
		}
		?>


	</div>


</div>
