<?php
include("start.php");
class Conectar
{
    public static function conecta()
    {
        $con = mysqli_connect("localhost", "root", "","consol");
        return $con;
    }
}

class Registros{

    private $datos;
    private $datos2;
    private $datos3;

    public function __construct()
    {
        $this->datos = array();

    }

    public function registerUser($name_user,$email_user,$age_user,$phone_user,$address_user,$sector,$tip,$password)
    {
        $cs = "select * from user where user_email = '$email_user'";
        $resultado = mysqli_num_rows(mysqli_query(Conectar::conecta(),$cs ));
        if($resultado  > 0){
            echo "<script type='text/javascript'>
            alert('Ya está registrado');
            window.location='register_user.php';
            </script>";
        }
        else{
        $password = md5($password);
        $sql = "insert into user values(' ','$name_user','$email_user','$age_user','$phone_user','$address_user','$sector','$tip','$password')";
        mysqli_query(Conectar::conecta(),$sql);
        echo "<script type='text/javascript'>
            alert('El registro ha sido añadido satisfactoriamente');
            window.location='register_user.php';
            </script>";
        }
        
    }

    public function registerPersonal($name_user,$phone_user,$address_user,$age_user,$status_civil,$pray_user,$name_guest_user,$phone_guest_user,$comment_guest_user,$sector,$supervisor,$lider,$id)
    {

        $sql = "insert into user_personal values(' ','$name_user','$phone_user','$address_user','$age_user','$status_civil','$pray_user','$name_guest_user','$phone_guest_user','$comment_guest_user','$sector','$supervisor','$lider','$id')";
        mysqli_query(Conectar::conecta(),$sql);
        echo "<script type='text/javascript'>
            alert('El registro ha sido añadido satisfactoriamente');
            window.location='register_user_personal.php';
            </script>";

            //  if (mysqli_query(Conectar::conecta(), $sql)) {
            //      echo "New record created successfully";
            //  } else {
            //      echo "Error: " . $sql . "<br>" . mysqli_error(Conectar::conecta());
            //  }
    }

    public function registerTip($name_tip,$comment_tip)
    {

        $sql = "insert into tip_user values(' ','$name_tip','$comment_tip')";
        mysqli_query(Conectar::conecta(),$sql);
        echo "<script type='text/javascript'>
            alert('El registro ha sido añadido satisfactoriamente');
            window.location='tipo.php';
            </script>";

            //  if (mysqli_query(Conectar::conecta(), $sql)) {
            //      echo "New record created successfully";
            //  } else {
            //      echo "Error: " . $sql . "<br>" . mysqli_error(Conectar::conecta());
            //  }
    }

    public function registerSector($number_sector,$name_sector,$address_sector)
    {
        $sql = "insert into sector values(' ','$number_sector','$name_sector','$address_sector')";
        mysqli_query(Conectar::conecta(),$sql);
        echo "<script type='text/javascript'>
            alert('El registro ha sido añadido satisfactoriamente');
            window.location='sector.php';
            </script>";
    }

    public function listTip()
    {
        $sql = "select * from tip_user";
        $res = mysqli_query(Conectar::conecta(),$sql);
        while ($reg = mysqli_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }
        return $this->datos;
    }

    public function listSector()
    {
        $sql = "select * from sector";
        $res = mysqli_query(Conectar::conecta(),$sql);
        while ($reg = mysqli_fetch_assoc($res))
        {
            $this->datos2[] = $reg;
        }
        return $this->datos2;
    }

    public function listSupervisor()
    {
        $sql = "select * from user where user_tip ='2'";
        $res = mysqli_query(Conectar::conecta(),$sql);
        while ($reg = mysqli_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }
        return $this->datos;
    }

    public function listLider()
    {
        $sql = "select * from user where user_tip ='3'";
        $res = mysqli_query(Conectar::conecta(),$sql);
        while ($reg = mysqli_fetch_assoc($res))
        {
            $this->datos3[] = $reg;
        }
        return $this->datos3;
    }

    public function login($email,$password)
    {
        $password = md5(trim($password));
        $email = trim($email);
        $sql = "select * from user where user_email = '$email' and user_password ='$password' ";
        $res = mysqli_query(Conectar::conecta(),$sql);
        if($row = mysqli_fetch_array($res)){
            echo "<script type='text/javascript'>
            window.location='index.php';
            </script>";

            $_SESSION["k_username"] = $row['user_name'];
			$_SESSION["id"]         =$row['id_user'];
			$_SESSION["tipo"]       = $row['user_tip'];
             } else {
                echo "<script type='text/javascript'>
            alert('Error de usuario o password');
            window.location='login.php';
            </script>";
           }  
    }

    public function countSector()
    {
        $sql = "select count(*) as contador from sector";
        $res = mysqli_query(Conectar::conecta(),$sql);
        while ($reg = mysqli_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }
        return $this->datos;
    }

    public function countSupervisor()
    {
        $sql = "select count(*) as contador from user where user_tip ='2'";
        $res = mysqli_query(Conectar::conecta(),$sql);
        while ($reg = mysqli_fetch_assoc($res))
        {
            $this->datos2[] = $reg;
        }
        return $this->datos2;
    }

    public function countLideres()
    {
        $sql = "select count(*) as contador from user where user_tip ='3'";
        $res = mysqli_query(Conectar::conecta(),$sql);
        while ($reg = mysqli_fetch_assoc($res))
        {
            $this->datos3[] = $reg;
        }
        return $this->datos3;
    }

    public function listarPersonal(){
        $sql = "select * from user_personal ";
        $res = mysqli_query(Conectar::conecta(),$sql);
        while ($reg = mysqli_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }
        return $this->datos;
    }

}
