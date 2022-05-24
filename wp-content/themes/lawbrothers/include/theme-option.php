<?php
add_action( 'admin_menu', 'wph_create_settings' );
//add_action( 'admin_footer', 'media_fields' );
add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );

function wph_create_settings() {
	$page_title = 'Theme Option';
	$menu_title = 'Theme Option';
	$capability = 'manage_options';
	$slug = 'themeoption';
	$callback = 'wph_settings_content';
	$icon = 'dashicons-admin-customizer';
	$position = 80;
	add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
}
function wph_settings_content() {  ?>
<div class="wrap">
    <h1>Theme Option</h1>
    <?php settings_errors(); ?>
    <form method="POST">
        <input style="width: 40%" id="drms" name="drms" type="text"> <input style="width: 19%"
            class="button themeoption-media" id="drms_button" name="drms_button" type="button" value="Upload" />
        <div class="tab">
            <?php get_tab_list(); ?>
        </div>
        <?php get_options_fields(); ?>
        <?php
			submit_button();
			?>
    </form>
    <style>
    /* Style the tab */
    .tab {
        float: left;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 30%;
        height: 300px;
    }

    /* Style the buttons inside the tab */
    .tab li {
        display: block;
        background-color: inherit;
        color: black;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab li:hover {
        background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        float: left;
        padding: 0px 12px;
        border: 1px solid #ccc;
        width: 70%;
        border-left: none;
        height: 300px;
    }
    </style>
    <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
</div> <?php
}
function get_options_fields(){
	$fields = array(
		array(
			'label' => 'Facebook Page',
			'id' => 'iimo_facebook_page_url',
			'type' => 'text',
			'placeholder' => 'Enter Facebook Page Url',
			'group'   => 'social'
		),
		array(
			'label' => 'Logo',
			'id' => 'iimo_logo',
			'type' => 'media',
			'placeholder' => 'Please upload logo here',
			'group'   => 'Header'
		)
	);
	if( !empty($fields) ){
		foreach ($fields as $field ) {
			?>
<div id="<?php echo $field['group'] ?>" class="tabcontent">
    <input style="width: 40%" id="drms" name="drms" type="text"> <input style="width: 19%"
        class="button themeoption-media" id="drms_button" name="drms_button" type="button" value="Upload" />
</div>
<?php
		}
	}
}
function get_tab_list(){
	$fields = array(
		array(
			'label' => 'Facebook Page',
			'id' => 'iimo_facebook_page_url',
			'type' => 'text',
			'placeholder' => 'Enter Facebook Page Url',
			'group'   => 'social'
		),
		array(
			'label' => 'Logo',
			'id' => 'iimo_logo',
			'type' => 'media',
			'placeholder' => 'Please upload logo here',
			'group'   => 'Header'
		)
	);
	if( !empty($fields) ){
		foreach ($fields as $field ) {
			?><li class="tablinks" onclick="openCity(event, '<?php echo $field['group'] ?>')"><?php echo $field['group'] ?></li><?php
		}
	}
}