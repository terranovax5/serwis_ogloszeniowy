<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model
{
    // Nazwa tabeli, z której będziemy korzystać w modelu
    public $table = 'advertisement';


    public function ads($kategoria)
    {
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->join($kategoria, $kategoria . '.ad_id = advertisement.id');
        return $this->db->get()->result_array();

    }

    public function ad($id)
    {
        $kategoria = $this->db->select('categories.name')->from('categories')->join('advertisement', 'categories.id = advertisement.category_id')->where('advertisement.id', $id)->get()->row_array();
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('id', $id);
        $this->db->join($kategoria['name'], $kategoria['name'] . '.ad_id = advertisement.id');
        return $this->db->get()->result_array();
    }

    public function photos($id)
    {
        $this->db->select('*');
        $this->db->from('photos');
        $this->db->where('ad_id', $id);
        return $this->db->get()->result_array();
    }

    public function kolumny($id)
    {
        $kategoria = $this->db->select('categories.name')->from('categories')->join('advertisement', 'categories.id = advertisement.category_id')->where('advertisement.id', $id)->get()->row_array();
        $result = $this->db->list_fields($kategoria['name']);
        foreach ($result as $field) {
            $data[] = $field;
        }
        return $data;
    }

    public function kolumny_kategorii($id)
    {
        $kategoria = $this->db->select('categories.name')->from('categories')->where('categories.id', $id)->get()->row_array();;
        $result = $this->db->list_fields($kategoria['name']);
        foreach ($result as $field) {
            $data[] = $field;
        }
        return $data;
    }

    public function kategorie()
    {
        return $this->db->select('*')->from('categories')->get()->result_array();
    }

    public function add_ad($tab, $tab2, $id_k)
    {

        $this->db->trans_start();
        $this->db->insert('advertisement', $tab);

        $id = $this->db->insert_id();
        $tab2['ad_id'] = $id;
        $kategoria = $this->db->select('categories.name')->from('categories')->where('categories.id', $id_k)->get()->row_array();;
        $this->db->insert($kategoria['name'], $tab2);
        $this->db->trans_complete();
        return $id;
    }

    public function my_ads($id)
    {
        return $this->db->where(array('user_id'=>$id))->get('advertisement')->result_array();
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */