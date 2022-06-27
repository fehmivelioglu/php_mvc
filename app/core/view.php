<?
class View{
    protected $viewModel;
    protected $viewFile;

    public function __construct($viewFile,$viewModel)
    {
        $this->viewFile = $viewFile;
        $this->viewModel = $viewModel;
    }

    public function Render(){
        if(file_exists(VIEW.$this->viewFile.'.php')){ 
            extract($this->viewModel);
            ob_start();
            ob_get_clean();
            include_once(VIEW.$this->viewFile.'.php');
        }
    }
}
?>