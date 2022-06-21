<?php

$routes = $rout->getRout();

$arr = $rout->getPathlist();

echo "<pre>";

$str = str_replace(['/', '{', '}'], ['\/', '(?<', '>[\w-]*)'], $arr);
foreach ($str as $key => $value) {
    $pattern = '/^' . $value . '$/m';
    $m = preg_match($pattern, $request->getPath(), $out_matches);
    if ($m) {
        $key_route = $key;
    }
    foreach ($out_matches as $k => $v) {
        if (is_int($k)) {
            unset($out_matches[$k]);
            array_unshift($out_matches, $request->setMatch($out_matches));
            $o = $request->getMatch();
            foreach ($o as $kk => $vv) {
                if (is_int($kk)) {
                    unset($o[$kk]);
                }
            }
        }
    }
}


$requestMethod = $request->getRequestmethod();
$match_request = $request->getMatch();
$match_request[] = $request->getPath();

$patth_all_route = $rout->getPathlist();
$requestController = $patth_all_route[$key_route];

//$allRequest=$request->getMatch();
if (isset($requestController)) {
    if (array_key_exists($requestController, $routes[$requestMethod])) {
        $class = "Controller\\{$routes[$requestMethod][$requestController]["controller"]}";
        if (class_exists($class)) {
            $object = new $class;
            if (method_exists($class, $routes[$requestMethod][$requestController]["method"])) {
                $object->{$routes[$requestMethod][$requestController]["method"]}($request);
            } else {
                die("not found method");
            }
        } else {
            die("not found class");
        }
    } else {
        die("route not fond");
    }
} else {
    die("route empity");
}




