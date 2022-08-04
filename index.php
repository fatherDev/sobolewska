<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> data-barba="wrapper">
  <div data-scroll-container>
  <div class="page-cover"></div>
  <div id="barba-container" data-barba="container">
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <?php echo \Roots\view(\Roots\app('sage.view'), \Roots\app('sage.data'))->render(); ?>


    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
    </div>
    </div>
  </body>
</html>
