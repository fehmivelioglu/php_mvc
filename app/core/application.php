<?
class Application
{
    protected $controller = 'HomeController';
    protected $action = 'IndexAction';
    protected $parameters = array();

    public function __construct()
    {
        $this->ParseURL();
        if (file_exists(CONTROLLER . $this->controller . '.php')) {
            require_once(CONTROLLER . $this->controller . '.php');
            $this->controller = new $this->controller;
            if (method_exists($this->controller, $this->action)) {
                call_user_func_array([$this->controller, $this->action], $this->parameters);
            } else {
                // echo $this->controller, $this->action;
                echo 'Action bulunamadı.';
            }
        } else {
            echo 'Controller bulunamadı.';
        }
    }

    // parseurl fonksiyonu router-api gateway gibi kullanılabilir. url alınır ve explode edilir
    // 0 => controller , 1=> action , 2=> parametreler

    protected function ParseURL()
    {
        $request = trim($_SERVER['REQUEST_URI'], '/'); // $request = trim($_SERVER['REQUEST_URI']);
        if (!empty($request)) {
            $url = explode('/', $request);
            array_splice($url, 0, 2);
            print_r($url);
            echo '<br>Controller : ' . $url[0] . '<br>Action : ' . $url[1];
            $this->controller = isset($url[0]) && $url[0] != '' ? $url[0] . 'Controller' : 'HomeController';
            $this->action = isset($url[1]) && $url[1] != '' ? $url[1] . 'Action' : 'IndexAction';
            unset($url[0], $url[1]);
            $this->parameters = !empty($url) ? array_values($url) : array();
        } else {
            $this->controller = 'HomeController';
            $this->action = 'IndexAction';
            $this->parameters = array();
        }
    }
}
