<?php

// Make sure we are called from index.php
if (!defined('SECURITY')) die('Hacking attempt');

// Include markdown library
use \Michelf\Markdown;

// Fetch active news to display
$aNews = $news->getAllActive();
foreach ($aNews as $key => $aData) {
  // Transform Markdown content to HTML
  $aNews[$key]['content'] = Markdown::defaultTransform($aData['content']);
}

// Load news entries for Desktop site and unauthenticated users
$smarty->assign("NEWS", $aNews);
$smarty->assign("CONTENT", "default.tpl");
?>
