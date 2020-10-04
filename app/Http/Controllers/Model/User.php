<?php
namespace App\Models;
require_once( __DIR__ ."/../Libs/jwt.php");
use Illuminate\Database\Eloquent\Model;

class User extends BaseModel
{
    private $options = [
        'cost' => 10
    ];

    public function __construct(){
        parent::__construct();
        $this->table="users";
        $this->fillable = array_merge($this->fillable, array(
           "name",
           "email",
           "password"
        ));
    }

    

    public function login($username, $password){
     
        $data=User::where('username',$username)->get();//sau khi select du lieu nay dang [{}] 
        $user=$this->castToModel($data, $this);//cast thanh user model
        if (!is_null($user)) {
            if (($password==$user->password)) {
                return generateJWT(array(
                    "email" => $user->email,
                    "id" => $user->id,
            
                ));
            }
           
        }
        return null;
    }
    public static function getuser() {
        return [
            'detail' => User::find(1)
        ];
    }
    
}
