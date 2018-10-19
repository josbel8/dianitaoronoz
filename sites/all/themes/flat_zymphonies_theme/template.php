<?php
//~ drupal_add_css(drupal_get_path('theme', 'flat_zymphonies_theme') .'/css/text-block-special.css');
//~ drupal_add_css(drupal_get_path('theme', 'flat_zymphonies_theme') .'/css/responsive.css');
//~ drupal_add_js(drupal_get_path('theme', 'flat_zymphonies_theme') .'/js/librerias.js');
?>
<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */

function flat_zymphonies_theme_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function flat_zymphonies_theme_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Use CSS to hide titile .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // comment below line to hide current page to breadcrumb
    $breadcrumb[] = drupal_get_title();
    $output .= '<nav class="breadcrumb">' . implode(' » ', $breadcrumb) . '</nav>';
    return $output;
  }
}

/**
 * Override or insert variables into the page template.
 */
function flat_zymphonies_theme_preprocess_page(&$vars) {
  if (isset($vars['main_menu'])) {
    $vars['main_menu'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'main-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['main_menu'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'secondary-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_menu'] = FALSE;
  }

  if (isset($vars['node'])) {
    // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
     $vars['theme_hook_suggestions'][] = 'page__'. str_replace('_', '--', $vars['node']->type);
  }

}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function flat_zymphonies_theme_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function flat_zymphonies_theme_preprocess_node(&$variables) {
  $node = $variables['node'];
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }

  if ($blocks = block_get_blocks_by_region('special_content')) {
    $variables['first_block'] = $blocks;
    $variables['first_block']['#theme_wrappers'] = array('region');
    $variables['first_block']['#region'] = 'special_content';
  }
  if ($blocks = block_get_blocks_by_region('special_frame')) {
    $variables['first_frame'] = $blocks;
    $variables['first_frame']['#theme_wrappers'] = array('region');
    $variables['first_frame']['#region'] = 'special_frame';
  }
}

function medical_page_alter($page) {
  // <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
    'name' =>  'viewport',
    'content' =>  'width=device-width'
    )
  );
  drupal_add_html_head($viewport, 'viewport');
}

function flat_zymphonies_theme_link($vars) {
  // Allow #fragment links to be used via 'http://current/#fragment'
  if (strpos($vars['path'], 'http://current/#') === 0) {
    $vars['options']['fragment'] = str_replace('http://current/#', '', $vars['path']);
    $vars['path'] = '';
  }

  return '<a href="' . check_plain(url($vars['path'], $vars['options'])) . '"' . drupal_attributes($vars['options']['attributes']) . '>' . ($vars['options']['html'] ? $vars['text'] : check_plain($vars['text'])) . '</a>';
}

function flat_zymphonies_theme_form_alter(&$form, &$form_state, $form_id) {
  switch($form_id) {
    case 'comment_node_blog_form':
      $form['author']['homepage']['#access'] = FALSE;
      break;
    case 'comment_node_article_form':
      $form['author']['homepage']['#access'] = FALSE;
      break;
  }
}

function flat_zymphonies_theme_preprocess_html(&$vars) {
  // Setup IE meta tag to force IE rendering mode
  $meta_ie_render_engine = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' =>  'viewport',
      'content' => 'width=device-width, initial-scale=1',
    )
  );
  // Add header meta tag for IE to head
  drupal_add_html_head($meta_ie_render_engine, 'meta_ie_render_engine');
}
