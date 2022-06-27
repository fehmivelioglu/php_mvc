<?
require_once(CORE.'controller.php');
class HomeController extends Controller{
    public function IndexAction(){
        $this->view('home/index');
    }
}
?>