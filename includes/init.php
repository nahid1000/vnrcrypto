<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('ROOT_DIR', realpath($_SERVER['DOCUMENT_ROOT']. DS ));

require_once(ROOT_DIR . "/includes/functions.php");
require_once(ROOT_DIR . "/includes/config.php");
require_once(ROOT_DIR . "/includes/db.php");
require_once(ROOT_DIR . "/includes/users.php");
require_once(ROOT_DIR . "/includes/miner.php");
require_once(ROOT_DIR . "/includes/settings.php");
require_once(ROOT_DIR . "/includes/payments.php");
require_once(ROOT_DIR . "/includes/referrals.php");
require_once(ROOT_DIR . "/includes/profits.php");
require_once(ROOT_DIR . "/includes/plans.php");
require_once(ROOT_DIR . "/includes/tickets.php");
require_once(ROOT_DIR . "/includes/coins.php");
require_once(ROOT_DIR . "/includes/session.php");
?>