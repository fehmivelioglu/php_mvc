<?
require_once(CORE.'view.php');
class Controller{
    protected $view;

    public function view($viewName,$model=[]){
        $this->view = new View($viewName,$model);     
        return $this->view->Render();
    }

    public function redirect($path){
        header("Location: {$path}");
    }
}
?>