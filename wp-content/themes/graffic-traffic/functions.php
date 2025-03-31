<?php




function graffic_traffic_enqueue_styles()
{

    wp_enqueue_style('graffic-traffic-style', get_stylesheet_uri());

    // Enqueue Swiper CSS
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), null);

    // Enqueue AOS (Animate on Scroll) CSS
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), null);

    // Enqueue main stylesheet
    wp_enqueue_style('graffic-traffic-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'));

    // Enqueue media queries stylesheet
    wp_enqueue_style('graffic-traffic-media', get_template_directory_uri() . '/css/media.css', array('graffic-traffic-style'), filemtime(get_template_directory() . '/css/media.css'));
}
add_action('wp_enqueue_scripts', 'graffic_traffic_enqueue_styles');


function enqueue_custom_scripts()
{
    // Enqueue jQuery
    wp_enqueue_script('jquery-3-6-0', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array('jquery'), '3.6.0', true);

    // Enqueue Swiper
    wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '11.0.0', true);

    // Enqueue AOS (Animate On Scroll)
    wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);

    // Enqueue custom script
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);

    // Enqueue AOS initialization
    wp_add_inline_script('aos', 'AOS.init();');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');





if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => true,
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'    => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'    => 'theme-general-settings',
    ));
}


function theme_register_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'theme-text-domain'),
        'footer'  => __('Footer Menu', 'theme-text-domain'),
    ));
}
add_action('after_setup_theme', 'theme_register_menus');




function handle_form_submission()
{
    if (isset($_POST['submit'])) {
        // Sanitize and collect form data
        // Sanitize the data
        $my_name = sanitize_text_field($_POST['my_name']);
        $my_project = sanitize_text_field($_POST['project']);
        $my_project_time = sanitize_text_field($_POST['time']);
        $my_project_budget = sanitize_text_field($_POST['budget']);
        $my_project_quality = sanitize_text_field($_POST['quality']);
        $my_email = sanitize_email($_POST['my_email']);
        $my_mobile = sanitize_text_field($_POST['my_mobile']);

        // Insert data into the database
        global $wpdb;
        $table_name = $wpdb->prefix . 'project_details'; // Assuming the custom table is already created

        // Insert into the database and retrieve the insert ID
        $inserted = $wpdb->insert($table_name, array(
            'my_name'    => $my_name,
            'my_email'   => $my_email,
            'my_mobile'  => $my_mobile,
            'project'  => $my_project,
            'time'  => $my_project_time,
            'budget'  => $my_project_budget,
            'quality'  => $my_project_quality
        ));

        // Check if the data was inserted
        if ($inserted) {
            // Get the inserted ID
            // $user_id = $wpdb->insert_id;

            // Prepare the email content
            $subject = 'Complete Your Project Form Submission';
            $message = 'Hi ' . $my_name . ",\n\n" .
                'Thank you for your Project submission.' .
                'Best regards,' . "\n" .
                'Graffic Traffic,';

            //Send the email
            $mail_sent = wp_mail($my_email, $subject, $message);

            if (! $mail_sent) {
                error_log('Email could not be sent. Please check your SMTP settings.');
            } else {
                error_log('Email sent successfully to ' . $my_email);
            }
        }

        // Redirect after form submission (only id in URL)
        //wp_redirect(location: home_url('/get-access/?id=' . urlencode($encrypted_id)));
        //exit;
    }
}
add_action('init', 'handle_form_submission');


function my_custom_admin_menu()
{
    add_menu_page(
        'Project Data',        // Page title
        'Project Data',        // Menu title
        'manage_options',       // Capability
        'project-data',        // Menu slug
        'display_project_data', // Callback function
        'dashicons-admin-users', // Icon URL
        6                       // Position
    );
}
add_action('admin_menu', 'my_custom_admin_menu');


// Display data from wp_your_gurdian_details table
function display_project_data()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'project_details'; // Table name

    // Get all records from the table
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    // Check if data exists
    if (! empty($results)) {
?>
        <h2>Project Data</h2>



        <table class="widefat fixed" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Project</th>
                    <th>Time</th>
                    <th>Budget</th>
                    <th>Quality</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row) { ?>
                    <tr>

                        <?php

                        ?>

                        <td><?php echo esc_html($row->my_name); ?></td>
                        <td><?php echo esc_html($row->my_email); ?></td>
                        <td><?php echo esc_html($row->my_mobile); ?></td>
                        <td><?php echo esc_html($row->project); ?></td>
                        <td><?php echo esc_html($row->time); ?> Days</td>
                        <td><?php echo esc_html($row->budget); ?> USD</td>
                        <!-- Rating logic -->
                        <td>
                            <?php
                            // Get the quality value
                            $value = $row->quality;

                            // Determine the rating based on the value
                            if ($value <= 500) {
                                echo 'Bad';
                            } elseif ($value <= 1000) {
                                echo 'Poor';
                            } elseif ($value <= 1500) {
                                echo 'Fair';
                            } elseif ($value <= 2000) {
                                echo 'Good';
                            } elseif ($value <= 2500) {
                                echo 'Very Good';
                            } else {
                                echo 'Excellent';
                            }
                            ?>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
<?php
    } else {
        echo '<p>No data found.</p>';
    }
}
