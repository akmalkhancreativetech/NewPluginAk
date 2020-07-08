<div class="wrap">
    <h1>New Plugin Ak Cpt</h1>
    <?php settings_errors(); ?>

    <form action="options.php" method="post">
        <?php
            settings_fields('new_plugin_ak_cpt_settings');
            do_settings_sections('new_plugin_ak_cpt');
            submit_button();
        ?>
    </form>
</div>
