
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <?php wp_head();?>

      <header>
            <div class='container'>
                  <?php
                  wp_nav_menu(
                        array(
                              'theme_location' => 'top-menu',
                              'menu_class' => 'header-menu',
                        )
                  );
                  ?>
            </div>
      </header>

</head>
<body>
