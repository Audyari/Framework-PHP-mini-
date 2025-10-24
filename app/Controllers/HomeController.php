<?php
class HomeController extends Controller
{

  public function index()
  {
   echo "Hello World";
  }

  public function about()
  {
    echo "About";
  }

  public function users()
  {
    $userModel = $this->model('User');
    $users = $userModel->index();


    $data = [
        'title' => 'Daftar Users',
        'users' => $users
    ];


    return $this->view('home', $data);
  }

  public function allUsers()
  {
    $userModel = $this->model('User');
    $users = $userModel->getAllUser();

    $data = [
        'title' => 'Daftar Users',
        'users' => $users
    ];

    return $this->view('home', $data);
  }
}
