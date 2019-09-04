<?php

$referrals = Referral::get_referrals_by_username($user->username);
$countrefs = Referral::count_refs($user->username);

?>