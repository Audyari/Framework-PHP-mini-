<?php   
class HomeController extends Controller
{

    public function index()
    {
      $user = $this->model('User');
      return $this->view('home', ['user' => $user->name, 'age' => $user->age]);
    }

    public function about()
    {
     echo "About";
    }

   
}
