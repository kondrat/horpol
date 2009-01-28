<?php
# /app/views/elements/email/text/user_confirm.ctp
?>
<b style="color:red">Hey</b> there <?= $username ?>, we will have you up and running in no time, but first we just need you to confirm your user account by clicking the link below:

<?= "<a href="?><?= $activate_url ?><?= '">' ?><?= $activate_url ?><?= '</a>' ?>

