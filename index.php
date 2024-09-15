<?php 
//Front Control
session_start();
$config = require_once 'src/config.php';
require_once Root_Path.'src/functions.php';
require_once Root_Path.'src/db.php';
require_once Root_Path.'src/DBFUNC.php';
if(isset($_GET["page"]))
{
switch ($_GET["page"])
{
    case 'home':
        require_once 'views/home.php';
        break;
    case 'about':
        require_once 'views/about.php';
        break;
    case 'contact':
        require_once 'views/contact.php';
        break;
    case 'login':
        require_once 'views/login.php';
        break;
    case 'register':
        require_once 'views/register.php';
        break;
    case 'shop-single':
        require_once 'views/shop-single.php';
        break;
    case 'shop':
        require_once 'views/shop.php';
        break;
    case 'send-message':
        require_once 'controllers/send-message.php';
        break;
    case 'check-register':
        require_once 'controllers/check-register.php';
        break;
    case 'session':
        require_once 'controllers/session.php';
        break;
    case 'check-login':
        require_once 'controllers/check-login.php';
        break;
    case 'logout':
        require_once 'controllers/logout.php';
        break;
    case 'add-to-card':
        require_once 'controllers/card/add-to-card.php';
        break;
    case 'card':
        require_once 'views/card.php';
        break;
    case 'card-remove':
        require_once 'controllers/card/remove.php';
        break;
    case 'checkout':
        require_once 'views/checkout.php';
        break;
    case 'save-order':
        require_once 'controllers/order/save.php';
        break;
    case 'orders':
        require_once 'views/orders.php';
        break;
    case 'show-order':
        require_once 'views/show-order.php';
        break;
    case 'dashboard':
        require_once 'dashboard/slider/starter.php';
        break;
    case 'addslider':
        require_once 'dashboard/slider/add-slider.php';
        break;
    case 'categoriesdashboard':
        require_once 'dashboard/categories/starter.php';
        break;
    case 'add-category':
        require_once 'dashboard/categories/add-category.php';
        break;
    case 'productsdashboard':
        require_once 'dashboard/products/starter.php';
        break;
    case 'add-product':
        require_once 'dashboard/products/add-product.php';
        break;
    case 'search':
        require_once 'views/search.php';
        break;
        
    case 'uploads':
        require_once 'dashboard/slider/uploads';
        break;
    case 'insert-slider':
        require_once 'dashboard/slider/insert.php';
        break;
    
    default:
        require_once 'views/404.php';
          
}
}
else{
  require_once 'views/home.php';
}