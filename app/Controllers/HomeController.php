<?php   
class HomeController extends Controller
{

    public function index()
    {
      $user = $this->model('User');

      echo $user->name;

      return $this->view('home');
    }

   
}
