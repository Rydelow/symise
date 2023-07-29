  <?php require_once("../../../wp-config.php");
  global $wpdb;
  if (empty($_SESSION['webenquiry'])) {
    wp_redirect(site_url());
    exit();
  }
  if (empty($_POST)) {
    wp_redirect(site_url());
    exit();
  }

  die();
 
