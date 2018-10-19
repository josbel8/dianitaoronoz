<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<div class="header">
  <div class="menu-wrap">

    <span class='social'>
        <ul>
<!--
            <li class='ic-ig'><a href='https://www.instagram.com/dianitaoronoz'><img src='/sites/all/themes/flat_zymphonies_theme/images/logo-instagram.png'></a></li>
            <li class='ic-fb'><a href='https://www.facebook.com/Diana-Oronoz-1409152162445456'><img src='/sites/all/themes/flat_zymphonies_theme/images/logo-facebook.png'></a></li>
            <li class='ic-tw'><a href='https://twitter.com/dianitaoronoz'><img src='/sites/all/themes/flat_zymphonies_theme/images/logo-twitter.png'></a></li>
-->
            <li class='ic-ig-h'><a href='https://www.instagram.com/dianitaoronoz'><img src='/dianitaoronoz/sites/all/themes/flat_zymphonies_theme/images/logo-instagram.png'></a></li>
            <li class='ic-fb-h'><a href='https://www.facebook.com/Diana-Oronoz-1409152162445456'><img src='/dianitaoronoz/sites/all/themes/flat_zymphonies_theme/images/logo-facebook.png'></a></li>
            <li class='ic-tw-h'><a href='https://twitter.com/dianitaoronoz'><img src='/dianitaoronoz/sites/all/themes/flat_zymphonies_theme/images/logo-twitter.png'></a></li>
        </ul>
    </span>

    <div class="full-wrap logo-wrap clearfix">
      <?php if ($logo): ?>
        <div id="logo">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>"/></a>
        </div>
        <h1 id="site-title">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        </h1>
      <?php endif; ?>
      <nav id="main-menu"  role="navigation">
        <a class="nav-toggle" href="#">Navigation</a>
        <div class="menu-navigation-container">
            <?php if ($is_front): ?>
                <?php $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                print drupal_render($main_menu_tree);?>
            <?php endif; ?>
            <?php if (!$is_front):
                $tree = menu_tree_all_data('menu-menu-secundario');
                $tree = menu_tree_output($tree);
                print drupal_render($tree);
            endif; ?>

        </div>
      </nav>
    </div>
  </div>

  <?php if ($is_front): ?>
    <div class="homebanner">
      <?php print render($page['home_banner_text']); ?>
    </div>
  <?php endif; ?>

</div>

<?php if ($is_front): ?>
  <div id="home-top-block">
   <?php if ($page['home_top_block_01'] || $page['home_top_block_02'] || $page['home_top_block_03']): ?>
      <div id="top-area" class="page-wrap clearfix">
        <?php if ($page['home_top_block_01']): ?>
        <div class="column one"><?php print render($page['home_top_block_01']); ?></div>
        <?php endif; ?>
        <?php if ($page['home_top_block_02']): ?>
        <div class="column two"><?php print render($page['home_top_block_02']); ?></div>
        <?php endif; ?>
        <?php if ($page['home_top_block_03']): ?>
        <div class="column three"><?php print render($page['home_top_block_03']); ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>

<?php if (!$is_front): ?>
<div class="header-content">
    <div class="img-header-content">
<!--
        <div><img typeof="foaf:Image" src="/sites/all/themes/flat_zymphonies_theme/logo_small.png"></div>
-->
        <div><img typeof="foaf:Image" src="/dianitaoronoz/sites/all/themes/flat_zymphonies_theme/logo_small.png"></div>
    </div>
</div>
<?php endif; ?>


<div id="container">
  <div class="container-wrap">
    <div class="content-sidebar-wrap">
      <div id="content">
        <?php if (theme_get_setting('breadcrumbs')): ?>
          <div id="breadcrumbs">
            <?php if ($breadcrumb): print $breadcrumb; endif;?>
          </div>
        <?php endif; ?>

        <section id="post-content" role="main">
          <?php print $messages; ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><div class='orange_bar_content'></div><?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php print render($page['content']); ?>
        </section>
      </div>

        <!-- First sidebar -->
        <?php if (!$is_front && $page['sidebar_first']): ?>
            <aside id="sidebar-first"><?php print render($page['sidebar_first']); ?></aside>
        <?php endif; ?>

      </div>

      <!-- Second sidebar -->
      <?php if (!$is_front && $page['sidebar_second']): ?>
        <aside id="sidebar-second"><?php print render($page['sidebar_second']); ?></aside>
      <?php endif; ?>
  </div>
</div>



<?php if ($is_front): ?>

  <div class="parallax-block" id="home-block-one">
    <?php print render($page['home_block_01']); ?>
  </div>

  <div class="parallax-block two" id="home-block-two">
    <?php print render($page['home_block_02']); ?>
  </div>

  <div class="parallax-block" id="home-block-three">
    <?php print render($page['home_block_03']); ?>
  </div>

  <div class="parallax-block" id="home-block-four">
    <?php print render($page['home_block_04']); ?>
  </div>

<?php endif; ?>


<div id="home-bottom-block" class="footer_block bottom_widget">
<!--
<div><img typeof="foaf:Image" src="/sites/all/themes/flat_zymphonies_theme/logo_small.png"></div>
-->
<div><img typeof="foaf:Image" src="/dianitaoronoz/sites/all/themes/flat_zymphonies_theme/logo_small.png"></div>
<?php if ($page['testimonials_block_01'] || $page['testimonials_block_02'] || $page['testimonials_block_03']): ?>
  <div id="footer-area" class="full-wrap clearfix">
    <?php if ($page['testimonials_block_01']): ?>
    <div class="column"><?php print render($page['testimonials_block_01']); ?></div>
    <?php endif; ?>
    <?php if ($page['testimonials_block_02']): ?>
    <div class="column two"><?php print render($page['testimonials_block_02']); ?></div>
    <?php endif; ?>
    <?php if ($page['testimonials_block_03']): ?>
    <div class="column"><?php print render($page['testimonials_block_03']); ?></div>
    <?php endif; ?>
  </div>
<?php endif; ?>
</div>


<!-- Footer -->

<div id="footer">

  <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_forth']): ?>
    <div id="footer-area" class="clearfix">
      <?php if ($page['footer_first']): ?>
      <div class="column">&nbsp<?php print render($page['footer_first']); ?></div>
      <?php endif; ?>
      <?php if ($page['footer_second']): ?>
      <div class="column two"><?php print render($page['footer_second']); ?></div>
      <?php endif; ?>
      <?php //if ($page['footer_third']): ?>
      <div class="column">
          <div class='social'>
                <div class='ic-ig-f'><a href='https://www.instagram.com/dianitaoronoz'><img src='/dianitaoronoz/sites/all/themes/flat_zymphonies_theme/images/logo-instagram.png'></a></div>
                <div class='ic-fb-f'><a href='https://www.facebook.com/Diana-Oronoz-1409152162445456'><img src='/dianitaoronoz/sites/all/themes/flat_zymphonies_theme/images/logo-facebook.png'></a></div>
                <div class='ic-tw-f'><a href='https://twitter.com/dianitaoronoz'><img src='/dianitaoronoz/sites/all/themes/flat_zymphonies_theme/images/logo-twitter.png'></a></div>
<!--
            <ul>
                <li style='margin-left: 40px;'><a href='https://www.instagram.com/dianitaoronoz'><img src='/sites/all/themes/flat_zymphonies_theme/images/logo-instagram.png'></a></li>
                <li style='margin-left: -50px;'><a href='https://www.facebook.com/Diana-Oronoz-1409152162445456'><img src='/sites/all/themes/flat_zymphonies_theme/images/logo-facebook.png'></a></li>
                <li style='margin-left: -50px;'><a href='https://twitter.com/dianitaoronoz'><img src='/sites/all/themes/flat_zymphonies_theme/images/logo-twitter.png'></a></li>

            </ul>
-->
          </div>
          <?php //print render($page['footer_third']); ?>
      </div>
      <?php //endif; ?>
      <?php //if ($page['footer_forth']): ?>
<!--
      <div class="column"><?php //print render($page['footer_forth']); ?></div>
-->
      <?php //endif; ?>
    </div>
  <?php endif; ?>

<!--
  <div class="footer_credit">

    <div id="copyright" class="full-wrap clearfix"></div>

  </div>
-->

</div>
