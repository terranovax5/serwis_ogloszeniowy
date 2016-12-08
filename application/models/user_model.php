<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Nazwa tabeli, z której będziemy korzystać w modelu
    public $table = 'users';

    /**
     * Logowanie użytkownika
     * Sprawdza, czy użytkownik o podanym adresie email i haśle istnieje w bazie danych
     *
     * @access    public
     * @return    mixed
     */
    public function login($email, $password)
    {
        // Jeśli w bazie zostanie znaleziony użytkownik o podanym adresie email i haśle,
        // to wynik zostanie zwrócony do kontrolera w postaci tablicy, w innym wypadku otrzymamy pusty wynik.
        $user = $this->db->where(array('email' => $email, 'password' => $password))->get('users')->row_array();
            return $user;
    }

    public function rejestracja($nick, $email, $password, $telefon)
    {
        $this->db->trans_start();
        $array = array('email' => $email);

        $dane = array('email' => $email, 'password' => $password, 'nick' => $nick, 'telefon' => $telefon);
        if (!$users = $this->db->where($array)->get('users')->row_array()) {
            if ($this->db->insert('users', $dane)) {
                $this->db->trans_complete();
                return "Uzytkownik został dodany!";
            }
        } else {
            return false;
        }

    }



}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */