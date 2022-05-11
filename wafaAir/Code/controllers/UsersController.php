<?php

class UsersController
{
  public function auth()
  {
    if (isset($_POST['submit'])) {
      $data['username'] = $_POST['username'];
      $result = Users::login($data);
      echo ($_POST['username']);
      if ($result->username === $_POST['username'] && password_verify($_POST['password'], $result->password)) {
        // $_SESSION['']
        $_SESSION['logged'] = true;
        $_SESSION['username'] = $result->username;
        $_SESSION['role'] = $result->role;
        $_SESSION['id'] = $result->id;
        Redirect::to('home');
      } else {
        Session::set('Error', 'Username or password is incorrect');
        Redirect::to('login');
      }
    }
  }
  
  public function register()
  {
    if (isset($_POST['submit'])) {
      $options = [
        'cost' => 12
      ];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
      $data = array(
        'fullname' => $_POST['fullname'],
        'username' => $_POST['username'],
        'password' => $password,
      );
      $result = Users::createUser($data);
      if ($result === 'ok') {
        Session::set('success', 'account created');
        Redirect::to('login');
      } else {
        echo $result;
      }
    }
  }
  //   public function login(){

  //     if(isset($_POST['submit'])){
  //         $data =array(
  //             'email'=>$_POST['email'],
  //             'password'=>$_POST['password']

  //         );
  //         $result = User::login_user($data);

  //         if($result==='ok'){
  //             session_start();
  //             $_SESSION['user']=$_POST['email'];
  //              header('Location: home');

  //         }else{
  //             echo $result;




  //         }

  //  }

  // }

  public static function logout()
  {
    session_destroy();
  }
}
