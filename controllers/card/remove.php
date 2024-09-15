<?php
if (isset($_SESSION['card'][$_GET['id']]))
{
unset($_SESSION['card'][$_GET['id']]);
redirect('card');
}
redirect("shop");