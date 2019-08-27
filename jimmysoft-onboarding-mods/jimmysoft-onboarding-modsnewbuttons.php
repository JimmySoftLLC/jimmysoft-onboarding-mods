<?php

	/**
	 * Plugin Name: JimmySoft test button
	 * Plugin URI: http://embroiderywaresoftware.com
	 * Description: This plugin allows you to change user details
	 * Version: 1.0.0
	 * Author: Jim Bailey
	 * Author URI: http://embroiderywaresoftware.com
	 * License: GPL2
	 */

	add_action('admin_menu', 'test_button_menu');

	function test_button_menu(){
		add_menu_page('My Plugin Settings 3', 'Jimmysoft user details', 'administrator','my-plugin-settings-3', 'my_plugin_settings_page_3', 'dashicons-admin-generic');
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
	}

	function  my_plugin_settings_page_3() {
		?>		
			<!--first form for the entry fields-->
			<div class="wrap">
				<h2>Modify Onboarding User Details</h2>
				<!--<form method="post" action="options.php">-->
				<form method="post" action="options.php?page=my-plugin-settings-3">
					<?php settings_fields( 'my-plugin-settings-group-3' ); ?>
					<?php do_settings_sections( 'my-plugin-settings-group-3' ); ?>
					<table style="height: 40px;" width="540">
						<tbody>
							<tr>
								<td style="width: 80px;"><p align="right">Start date</p></td>
								<td style="width: 100px;"><input type="text" name="jimmysoft_mod_date_start" value="<?php echo esc_attr( get_option('jimmysoft_mod_date_start') ); ?>" /></td>
								<td style="width: 80px;"><p align="right">End date</p></td>
								<td style="width: 100px;"><input type="text" name="jimmysoft_mod_date_end" value="<?php echo esc_attr( get_option('jimmysoft_mod_date_end') ); ?>" /></td>
							</tr>
						</tbody>
					</table>
					<table style="height: 40px;" width="540">
						<tbody>
							<tr>
								<td style="width: 80px;"><p align="right">User ID</p></td>
								<td style="width: 100px;"><input type="text" name="jimmysoft_mod_user_id" value="<?php echo esc_attr( get_option('jimmysoft_mod_user_id') ); ?>" /></td>
								<td style="width: 80px;"><p align="right">Trial email log</p></td>
								<td style="width: 100px;"><input type="text" name="jimmysoft_mod_trial_email_log" value="<?php echo esc_attr( get_option('jimmysoft_mod_trial_email_log') ); ?>" /></td>
							</tr>
						</tbody>
					</table>
					<input name="jimmysoft_mod_use_email_id" type="checkbox" value="1" id="use_email_id"<?php checked( '1', get_option( 'jimmysoft_mod_use_email_id' ) ); ?> /> 
					<label for="use_email_id">Use email instead of ID?</label>
					<table style="height: 40px;" width="540">
						<tbody>
							<tr>
								<td style="width: 80px;"><p align="right">Trial issue date</p></td>
								<td style="width: 100px;"><input type="text" name="jimmysoft_mod_trial_issue_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_trial_issue_date') ); ?>" /></td>
								<td style="width: 80px;"><p align="right">Trial expire date</p></td>
								<td style="width: 100px;"><input type="text" name="jimmysoft_mod_trial_expire_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_trial_expire_date') ); ?>" /></td>
							</tr>
						</tbody>
					</table>
					<table style="height: 40px;" width="540">
						<tbody>
							<tr>
								<td style="width: 80px;"><p align="right">Purchase issue date</p></td>
								<td style="width: 100px;"><input type="text" name="jimmysoft_mod_purchase_issue_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_purchase_issue_date') ); ?>" /></td>
								<td style="width: 80px;"><p align="right">Purchase expire date</p></td>
								<td style="width: 100px;"><input type="text" name="jimmysoft_mod_purchase_expire_date" value="<?php echo esc_attr( get_option('jimmysoft_mod_purchase_expire_date') ); ?>" /></td>
							</tr>
						</tbody>
					</table>
					<table style="height: 30px;" width="540">
						<tbody>
							<tr>
								<td style="width: 100px;"><?php submit_button('Get user info','primary','get_user_info_button');?></td>
								<td style="width: 100px;"><?php submit_button('Set user info','primary','set_user_info_button');?></td>
								<td style="width: 100px;"><?php submit_button('Get users','primary','get_users_button');?></td>
								<td style="width: 100px;"><?php submit_button('Get orders by date','primary','get_orders_in_range');?></td>
								<td style="width: 100px;"><?php submit_button('Get user orders','primary','get_orders_for_user');?></td>
								<td style="width: 100px;"><?php submit_button('Create Coupon','primary','create_coupon_test');?></td>
							</tr>
						</tbody>
					</table>					
									
				</form>	
			</div>
			<hr>
		<?php
		
		if (isset($_POST['get_user_info_button'])) {
			update_fields_from_form();
			get_user_info_button();
		}	
		
		if (isset($_POST['set_user_info_button'])) {
			update_fields_from_form();			
			set_user_info_button();
		}
		
		if (isset($_POST['get_users_button'])) {
			update_fields_from_form();			
			get_users_button();
		}

		if (isset($_POST['get_orders_in_range'])) {	
			update_fields_from_form();
			get_orders_in_range();
		}	
		
		if (isset($_POST['get_orders_for_user'])) {	
			update_fields_from_form();
			get_orders_for_user();
		}	

		if (isset($_POST['create_coupon_test'])) {	
			create_coupoon_test();
		}
	}

	function create_coupoon_test(){	
		$amount = '10';
		$coupon_code = 'testnow';
		$discount_type = 'percent';
		$expiry_date = '2018-01-20';
		create_coupon($amount,$coupon_code,$discount_type,$expiry_date);
	}

	function update_fields_from_form(){
		update_option('jimmysoft_mod_date_start',$_POST['jimmysoft_mod_date_start']);
		update_option('jimmysoft_mod_date_end',$_POST['jimmysoft_mod_date_end']);
		update_option('jimmysoft_mod_user_id',$_POST['jimmysoft_mod_user_id']);
		update_option('jimmysoft_mod_trial_email_log',$_POST['jimmysoft_mod_trial_email_log']);
		update_option('jimmysoft_mod_trial_issue_date',$_POST['jimmysoft_mod_trial_issue_date']);
		update_option('jimmysoft_mod_trial_expire_date',$_POST['jimmysoft_mod_trial_expire_date']);
		update_option('jimmysoft_mod_purchase_issue_date',$_POST['jimmysoft_mod_purchase_issue_date']);
		update_option('jimmysoft_mod_purchase_expire_date',$_POST['jimmysoft_mod_purchase_expire_date']);
		update_option('jimmysoft_mod_use_email_id',$_POST['jimmysoft_mod_use_email_id']);
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
		}
		get_user_info_button();
	}
	
	function get_users_button(){
		$message = get_users_meta();
		?>
			<textarea id = "my_text_area" class="text" cols="100" rows ="20" ><?php echo $message ?></textarea>
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
			<textarea id = "my_text_area" class="text" cols="100" rows ="20" ><?php echo $message ?></textarea>
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
				$message .= 'Product:   '.$product->get_sku().'   '.$product->get_name() .chr(13) . chr(10);
			}
			$message .= chr(13) . chr(10);
		}
		?>
			<textarea id = "my_text_area" class="text" cols="100" rows ="20" ><?php echo $message ?></textarea>
		<?php	
	}
?>