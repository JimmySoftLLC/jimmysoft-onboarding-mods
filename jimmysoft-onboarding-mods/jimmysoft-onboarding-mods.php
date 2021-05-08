<?php

	/**
	 * Plugin Name: JimmySoft user variables
	 * Plugin URI: https://embroiderywaresoftware.com
	 * Description: This plugin if for resending licenses, generate renewal license, and look at user data and orders.
	 * Version: 2.0.0
	 * Author: Jim Bailey
	 * Author URI: https://jimmysoftllc.com
	 * License: GPL2
	 */

	add_action('admin_menu', 'test_button_menu');

	function test_button_menu(){
		add_menu_page('My Plugin Settings 3', 'Jimmysoft user variables', 'administrator','my-plugin-settings-3', 'my_plugin_settings_page_3', 'dashicons-admin-generic');
	}

	add_action( 'admin_init', 'my_plugin_settings_3' );

	function my_plugin_settings_3() {
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_date_start' );
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_date_end' );
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_user_id' );
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_trial_email_log' );
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_trial_issue_date' );
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_trial_expire_date' );
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_purchase_issue_date' );
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_purchase_expire_date' );	
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_use_email_id' );	
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_renewal_issue_date' );
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_renewal_expire_date' );	
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_renewal_coupon_amount' );
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_renewal_coupon_code' );	
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_mod_license_code' );	
		register_setting( 'my-plugin-settings-group-3', 'jimmysoft_order_id' );			
	}

	function  my_plugin_settings_page_3() {
		?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<style>
				@media(min-width: 600px) {
					.flex-parent1 {
						display: flex;
						flex-direction: row;
						justify-content: flex-start;
						align-items: strecth;
						align-items: left;
					}
				}

				.flex-parent1 {
					padding: 2px;
				}

				.item-1 {
					width: 100%;
					flex: 1;
					order: 1;
				}

				.item-2 {
					width: 100%;
					flex: 1;
					order: 2;
				}

				.item-3 {
					width: 100%;
					flex: 1;
					order: 3;
				}

				.item-4 {
					width: 100%;
					flex: 1;
					order: 4;
				}
				
				.item-5 {
					width: 100%;
					flex: 1;
					order: 5;
				}

				.ew-main {
					margin-left: 0.75rem;
					margin-right: 0.75rem;
					margin-top: 1rem;
					margin-bottom: 1rem;
				}

				.ew-section {
					width: 100%;
					height: auto;
					padding: 20px;
					margin: 0;
					margin-top: 20px;
					margin-bottom: 20px;
					box-shadow: 4px 4px 20px gray;
					border-radius: 10px;
					box-sizing: border-box;
				}
				
				textarea {
					display: block;
					width:100%
				}

				body {
					font-family: Roboto, arial, sans-serif, serif;
				}

				img.ew-logo {
					width: 100%;
					height: auto;
					box-sizing: border-box;
				}

				h1 {
					text-align: left;
					font-size: 20px;
					<!--color: darkblue;-->
					line-height: 25px;
					text-shadow: 2px 2px 8px gray;
				}

				h2 {
					text-align: left;
					font-size: 18px;
					<!--color: darkblue;-->
					line-height: 25px;
					text-shadow: 4px 4px 8px gray;
				}

				p {
					text-align: left;
					font-size: 16px;
					<!--color: darkblue;-->
					line-height: 25px;
				}

				b {
					text-shadow: 2px 2px 8px gray;
				}

				<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

			</style>
		</head>

		<body>
			<!--first form for the entry fields-->
			<div class="ew-main">
				<div class="ew-section">
					<h2>Modify Onboarding User Details</h2>
					<form method="post" action="options.php">
						<?php settings_fields( 'my-plugin-settings-group-3' ); ?>
						<?php do_settings_sections( 'my-plugin-settings-group-3' ); ?>
						<div class="flex-parent1">
							<div class="item-1">
								<p>
									Start date
									<input type="text" name="jimmysoft_mod_date_start" value="<?php echo esc_attr( get_option('jimmysoft_mod_date_start') ); ?>" />
								</p>
							</div>
							<div class="item-2">
								<p>
									End date
									<input type="text" name="jimmysoft_mod_date_end" value="<?php echo esc_attr( get_option('jimmysoft_mod_date_end') ); ?>" />
								</p>
							</div>
						</div>

						<div class="flex-parent1">
							<div class="item-1">
								<p>
									<input name="jimmysoft_mod_use_email_id" type="checkbox" value="1" id="use_email_id" <?php checked( '1', get_option( 'jimmysoft_mod_use_email_id' ) ); ?> />
									Use email instead of ID?
								</p>
							</div>
						</div>

						<div class="flex-parent1">
							<div class="item-1">
								<p>
									User ID
									<input type="text" name="jimmysoft_mod_user_id" value="<?php echo esc_attr( get_option('jimmysoft_mod_user_id') ); ?>" />
								</p>
							</div>
							<div class="item-2">
								<p>
									Trial email log
									<input type="text" name="jimmysoft_mod_trial_email_log" value="<?php echo esc_attr( get_option('jimmysoft_mod_trial_email_log') ); ?>" />
								</p>
							</div>
						</div>
				
						<div class="flex-parent1">
							<div class="item-1">
								<p>
									Trial issue date
									<input type="text" name="jimmysoft_mod_trial_issue_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_trial_issue_date') ); ?>" />
								</p>
							</div>
							<div class="item-2">
								<p>
									Trial expire date
									<input type="text" name="jimmysoft_mod_trial_expire_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_trial_expire_date') ); ?>" />
								</p>
							</div>
						</div>
						
						<div class="flex-parent1">
							<div class="item-1">
								<p>
									Purchase issue date
									<input type="text" name="jimmysoft_mod_purchase_issue_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_purchase_issue_date') ); ?>" />
								</p>
							</div>
							<div class="item-2">
								<p>
									Purchase expire date
									<input type="text" name="jimmysoft_mod_purchase_expire_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_purchase_expire_date') ); ?>" />
								</p>
							</div>
						</div>
						
						<div class="flex-parent1">
							<div class="item-1">
								<p>
									Renewel issue date
									<input type="text" name="jimmysoft_mod_renewal_issue_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_renewal_issue_date') ); ?>" />
								</p>
							</div>
							<div class="item-2">
								<p>
									Renewel expire date
									<input type="text" name="jimmysoft_mod_renewal_expire_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_renewal_expire_date') ); ?>" />
								</p>
							</div>
						</div>
						
						<div class="flex-parent1">
							<div class="item-1">
								<p>
									Renewel coupon amount
									<input type="text" name="jimmysoft_mod_renewal_coupon_amount" value="<?php echo esc_attr( get_option('jimmysoft_mod_renewal_coupon_amount') ); ?>" />
								</p>
							</div>
							<div class="item-2">
								<p>
									Renewel coupon code
									<input type="text" name="jimmysoft_mod_renewal_coupon_code" value="<?php echo esc_attr( get_option('jimmysoft_mod_renewal_coupon_code') ); ?>" />
								</p>
							</div>
						</div>
						
						<div class="flex-parent1">
							<div class="item-1">
								<p>
									Order ID
									<input type="text" name="jimmysoft_order_id" value="<?php echo esc_attr( get_option('jimmysoft_order_id') ); ?>" />
								</p>
							</div>
							<div class="item-2">
								<p>
									License Code
									<input type="text" name="jimmysoft_mod_license_code" value="<?php echo esc_attr( get_option('jimmysoft_mod_license_code') ); ?>" />
								</p>
							</div>
						</div>
						
						<table style="height: 30px;" width="540">
							<tbody>
								<tr>
									<td style="width: 100px;"><?php submit_button(); ?> </td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
				<!--second form for action buttons-->
							
				<div class="ew-section">
					<form method="post" action="options.php?page=my-plugin-settings-3">
					
						<div class="flex-parent1">
							<div class="item-1">
								<p>
									<?php submit_button('Get orders by date','primary','get_orders_in_range');?>
								</p>
							</div>
							<div class="item-2">
								<p>
									<?php submit_button('Get users','primary','get_users_button');?>
								</p>
							</div>
							<div class="item-3">
								<p>
									<?php submit_button('Get user info','primary','get_user_info_button');?>
								</p>
							</div>
							<div class="item-4">
								<p>
									<?php submit_button('Get user orders','primary','get_orders_for_user');?>
								</p>
							</div>
							<div class="item-5">
								<p>
									<?php submit_button('Set user info','primary','set_user_info_button');?>
								</p>
							</div>
						</div>
					
						<div class="flex-parent1">
							<div class="item-1">
								<p>
									<?php submit_button('Create Renewal License','primary','create_renewal_license');?>	
								</p>
							</div>
							<div class="item-2">
								<p>
									<?php submit_button('Create Order ID License Trial','primary','create_order_id_license_trial');?>
								</p>
							</div>
							<div class="item-2">
								<p>
									<?php submit_button('Create Order ID License Purchased','primary','create_order_id_license_purchased');?>
								</p>
							</div>
							<div class="item-3">
								<p>
									<?php submit_button('Resend Existing License','primary','resend_existing_license');?>
								</p>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

			<!-- Latest compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		</body>

		</html>
		<?php

		if (isset($_POST['get_user_info_button'])) {	
			get_user_info_button();
		}	
		
		if (isset($_POST['set_user_info_button'])) {	
			set_user_info_button();
		}
		
		if (isset($_POST['get_users_button'])) {	
			get_users_button();
		}

		if (isset($_POST['get_orders_in_range'])) {	
			get_orders_in_range();
		}	
		
		if (isset($_POST['get_orders_for_user'])) {	
			get_orders_for_user();
		}	
		
		if (isset($_POST['create_renewal_license'])) {	
			create_renewal_license();
		}
		
		if (isset($_POST['create_order_id_license_trial'])) {	
			create_order_id_license_trial();
		}
		
		if (isset($_POST['create_order_id_license_purchased'])) {	
			create_order_id_license_purchased();
		}
		
		if (isset($_POST['resend_existing_license'])) {	
			resend_existing_license();
		}				
	}

	function get_user_info_button(){
		$user_id="";
		if (get_option('jimmysoft_mod_use_email_id')=='1'){
			$userinstance = get_user_by( 'email', get_option('jimmysoft_mod_user_id') );
			$user_id = $userinstance->id;
		}else{
			$user_id=get_option('jimmysoft_mod_user_id');
		}
		$user_info = get_userdata($user_id);	
		update_option('jimmysoft_mod_trial_email_log',$user_info->ew_trial_email_log);
		update_option('jimmysoft_mod_trial_issue_date',$user_info->ew_trial_date);
		update_option('jimmysoft_mod_trial_expire_date',$user_info->ew_trial_expire_date);
		update_option('jimmysoft_mod_purchase_issue_date',$user_info->ew_purchase_date);
		update_option('jimmysoft_mod_purchase_expire_date',$user_info->ew_purchase_expire_date);
		update_option('jimmysoft_mod_renewal_issue_date',$user_info->ew_renewal_issue_date);
		update_option('jimmysoft_mod_renewal_expire_date',$user_info->ew_renewal_expire_date);
		update_option('jimmysoft_mod_renewal_coupon_amount',$user_info->ew_renewal_coupon_amount);
		update_option('jimmysoft_mod_renewal_coupon_code',$user_info->ew_renewal_coupon_code);
		update_option('jimmysoft_mod_license_code',$user_info->ew_license_code);
		echo '<script>parent.window.location.reload(true);</script>';
	}
	
	function set_user_info_button(){
		$user_id="";
		if (get_option('jimmysoft_mod_use_email_id')=='1'){
			$userinstance = get_user_by( 'email', get_option('jimmysoft_mod_user_id') );
			$user_id = $userinstance->ID;
		}else{
			$user_id=get_option('jimmysoft_mod_user_id');
		}
		if ( is_plugin_active( 'jimmysoft-webpage-tools/jimmysoft-webpage-tools.php' ) ) { 
			replace_metadata($user_id, 'ew_trial_email_log',get_option('jimmysoft_mod_trial_email_log'));
			replace_metadata($user_id, 'ew_trial_date',get_option('jimmysoft_mod_trial_issue_date'));
			replace_metadata($user_id, 'ew_trial_expire_date',get_option('jimmysoft_mod_trial_expire_date'));
			replace_metadata($user_id, 'ew_purchase_date',get_option('jimmysoft_mod_purchase_issue_date'));
			replace_metadata($user_id, 'ew_purchase_expire_date',get_option('jimmysoft_mod_purchase_expire_date'));		
			replace_metadata($user_id, 'ew_renewal_issue_date',get_option('jimmysoft_mod_renewal_issue_date'));
			replace_metadata($user_id, 'ew_renewal_expire_date',get_option('jimmysoft_mod_renewal_expire_date'));
			replace_metadata($user_id, 'ew_renewal_coupon_amount',get_option('jimmysoft_mod_renewal_coupon_amount'));
			replace_metadata($user_id, 'ew_renewal_coupon_code',get_option('jimmysoft_mod_renewal_coupon_code'));
			replace_metadata($user_id, 'ew_license_code',get_option('jimmysoft_mod_license_code'));
		}
		get_user_info_button();
	}
	
	function get_users_button(){
		$message = get_users_meta();
		?>
			<div class="ew-main">
				<div class="ew-section">
					<div class="flex-parent1">
						<div class="item-1">
							<p>
								<textarea id="my_text_area" class="text" cols="100" rows="20"><?php echo $message ?></textarea>
							</p>
						</div>
					</div>
				</div>
			</div>
		<?php	
	}  

	function get_orders_in_range(){
		$order_dates_start = date_create(get_option('jimmysoft_mod_date_start'));	
		$order_dates_end = date_create(get_option('jimmysoft_mod_date_end'));	
		$order_range = $order_dates_start->format('Y-m-d').'...'.$order_dates_end->format('Y-m-d');
		$customer_orders = wc_get_orders( array('limit' => -1,'date_paid' => $order_range) );
		$message = '';
		foreach ($customer_orders as $order) {
			$my_order = new WC_Order( $order->ID );
			$user_id = $my_order->get_user_ID();
			$user_info = get_userdata($user_id);
			$message .= 'Order ID:   '.$order->id .chr(13) . chr(10);
			$message .= 'User ID:   '.$user_info->id .chr(13) . chr(10);
			$message .= 'Name:   '.$user_info->first_name.' '.$user_info->last_name.chr(13) . chr(10);
			$message .= 'Email:   '.$user_info->user_email .chr(13) . chr(10);
			$message .= 'Trial issue/expire date:   '.$user_info->ew_trial_date .'    '. $user_info->ew_trial_expire_date.chr(13) . chr(10);
			$message .= 'Purchase issue/expire date:   '.$user_info->ew_purchase_date .'    '. $user_info->ew_purchase_expire_date.chr(13) . chr(10);
			$message .= 'Trial email log:   '.$user_info->ew_trial_email_log .chr(13) . chr(10);
			$items = $order->get_items();
			$message .= 'Order Date:   '.$my_order->get_date_created().chr(13) . chr(10);
			foreach ($items as $item) {
				$product_id = $item['product_id'];
				$product = wc_get_product( $item['product_id'] );
				$message .= 'Product:   '.$product->get_sku().'   '.$product->get_name() .chr(13) . chr(10);
			}
			$message .= chr(13) . chr(10);				
		} 
		?>
			<div class="ew-main">
				<div class="ew-section">
					<div class="flex-parent1">
						<div class="item-1">
							<p>
								<textarea id="my_text_area" class="text" cols="100" rows="20"><?php echo $message ?></textarea>
							</p>
						</div>
					</div>
				</div>
			</div>
		<?php		
	}

	function get_users_meta(){
		$blogusers = get_users();
		$message = 'Users count:   '.count($blogusers).chr(13) . chr(10).chr(13) . chr(10);
		foreach($blogusers as $user){
			$message .= 'User ID:   '.$user->id .chr(13) . chr(10);
			$message .= 'Name:   '.$user->first_name.' '.$user->last_name.chr(13) . chr(10);
			$message .= 'Email:   '.$user->user_email .chr(13) . chr(10);			
			$message .= 'Trial issue/expire date:   '.$user->ew_trial_date .'    '. $user->ew_trial_expire_date.chr(13) . chr(10);
			$message .= 'Purchase issue/expire date:   '.$user->ew_purchase_date .'    '. $user->ew_purchase_expire_date.chr(13) . chr(10);
			$message .= 'Trial email log:   '.$user->ew_trial_email_log .chr(13) . chr(10);	
			$message .= chr(13) . chr(10);			
		}		
	return $message;
	}

	function get_orders_for_user(){
		$user_id="";
		if (get_option('jimmysoft_mod_use_email_id')=='1'){
			$userinstance = get_user_by( 'email', get_option('jimmysoft_mod_user_id') );
			$user_id = $userinstance->ID;
		}else{
			$user_id=get_option('jimmysoft_mod_user_id');
		}
		$customer_orders = wc_get_orders( array('limit' => -1,'customer_id' => $user_id) );
		foreach ($customer_orders as $my_order){
			$items = $my_order->get_items();
			$message .= 'Order Date:   '.$my_order->get_date_created().chr(13) . chr(10);
			foreach ($items as $item) {
				$product_id = $item['product_id'];
				$product = wc_get_product( $item['product_id'] );
				//$message .= 'Product:   '.$product->get_sku().'   '.$product->get_name() .chr(13) . chr(10);
				$message .= 'Product:   '.$product->get_name() .chr(13) . chr(10);
			}
			$message .= chr(13) . chr(10);
		}
		?>
			<div class="ew-main">
				<div class="ew-section">
					<div class="flex-parent1">
						<div class="item-1">
							<p>
								<textarea id="my_text_area" class="text" cols="100" rows="20"><?php echo $message ?></textarea>
							</p>
						</div>
					</div>
				</div>
			</div>
		<?php	
	}

	function create_order_id_license_trial(){
		Sendout_license_email_trial(get_option('jimmysoft_order_id'));			
	}
	
	function create_order_id_license_purchased(){
		Sendout_license_email_purchased(get_option('jimmysoft_order_id'));			
	}
	
	function create_renewal_license(){
		$user_id="";
		if (get_option('jimmysoft_mod_use_email_id')=='1'){
			$userinstance = get_user_by( 'email', get_option('jimmysoft_mod_user_id') );
			$user_id = $userinstance->ID;
		}else{
			$user_id=get_option('jimmysoft_mod_user_id');
		}
		$user_info = get_userdata($user_id);
		$email = $user_info->user_email;
		$first_name = ucfirst($user_info->first_name);
		$date = new DateTime(get_option('jimmysoft_mod_renewal_issue_date'));
		$coupon_amount = get_option('jimmysoft_mod_renewal_coupon_amount');
		sendout_renewal_license($first_name,$user_id,$email,$date,$coupon_amount);
	}
	
	function resend_existing_license(){
		$user_id="";
		if (get_option('jimmysoft_mod_use_email_id')=='1'){
			$userinstance = get_user_by( 'email', get_option('jimmysoft_mod_user_id') );
			$user_id = $userinstance->ID;
		}else{
			$user_id=get_option('jimmysoft_mod_user_id');
		}
		$user_info = get_userdata($user_id);
		$email = $user_info->user_email;
		$first_name = ucfirst($user_info->first_name);
		$date = new DateTime(get_option('jimmysoft_mod_renewal_issue_date'));	
		resend_license($user_id);
	}
	
	function send_out_gift_certificates(){
		
	}	
?>
