<?php
require_once realpath("./controller.php");
if (isset($_GET['function']))
{
    $data = $_GET;
}else {
    $data = $_POST;
}

if (!isset($data['function'])) {
    die("function missing!");
}

$controller = new Controller(); // 新建controller把controller啟動起來

switch ($data["function"]) {
    case 'login':
        # code...
        $controller->login($data);
        break;
    case 'logout':
        # code...
        $controller->logout();
        break;
    case 'add_user':
        # code...
        $controller->add_user($data);
        break;

}
?>
