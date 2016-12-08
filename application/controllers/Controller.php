<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ładujemy bibliotekę sesji
        $this->load->library('session');
    }


    public function start()
    {
        $this->load->view('partials/header');
        $this->load->view('start');
        $this->load->view('partials/footer');
    }

    public function ads($kategoria)
    {
        $this->load->model('model');
        $dane['ads'] = $this->model->ads($kategoria);


        $this->load->view('partials/header');
        $this->load->view('ads', $dane);
        $this->load->view('partials/footer');

    }


    public function ad($id)
    {
        $this->load->model('model');
        $dane['ad'] = $this->model->ad($id);
        $dane['photos'] = $this->model->photos($id);
        $dane['kolumny'] = $this->model->kolumny($id);

        $this->load->view('partials/header');
        $this->load->view('ad', $dane);
        $this->load->view('partials/footer');
    }

    public function add_ad()
    {
        $this->load->helper('form');
        $this->load->model('model');
        $dane['kategorie'] = $this->model->kategorie();
        $this->load->library('form_validation');


        $this->form_validation->set_rules('name', 'Tytuł', 'required');
        $this->form_validation->set_rules('adwarded', 'Wyróżnienie', 'required');
        //$this->form_validation->set_rules('photo', 'Zdjęcie', 'required');

        $this->form_validation->set_message('required', 'Pole  %s nie może zostać puste!');


        if ($this->form_validation->run() === FALSE) {

            $this->load->view('partials/header');
            $this->load->view('add_ad', $dane);
            $this->load->view('partials/footer');

        } else {
            // Jeśli walidacja formularza powiodła się

            $kategoria = $this->input->post('sel1');

            $kolumny = $this->model->kolumny_kategorii($kategoria);
            $tab['awarded'] = $this->input->post('adwarded');
            $tab['name'] = $this->input->post('name');
            $tab['cena'] = $this->input->post('cena');
            $tab['category_id'] = $this->input->post('sel1');
            $tab['user_id'] = $this->session->userdata('user_id')['id'];
            $tab['lokalizacja'] = $this->input->post('lokalizacja');
            $tab['short_description'] = $this->input->post('short_description');
            $tab['description'] = $this->input->post('description');
            $tab['photo'] = $this->input->post('photo');
            $tab['created_date'] = date('Y-m-j');

            $config['upload_path'] = './images/photos';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100000;
            $config['max_width'] = 10240;
            $config['max_height'] = 7680;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('photo')) {
                $error = array('error' => $this->upload->display_errors());

                return print_r($error);
            }
            $data = array('upload_data' => $this->upload->data());
            $tab['photo'] = $data['upload_data']['file_name'];


            foreach ($kolumny as $k) {
                if ($k == 'ad_id') {
                    continue;
                }
                $tab2[$k] = $this->input->post($k);
            }
            //print_r($tab);
            $ad = $this->model->add_ad($tab, $tab2, $kategoria);
            redirect('controller/ad/' . $ad);
        }

    }


    public
    function pola($id)
    {
        $this->load->model('model');
        $kolumny = $this->model->kolumny_kategorii($id);
        $text = "";
        foreach ($kolumny as $k) {
            if ($k == 'ad_id') {
                continue;
            }
            $text .= '               
                                   <div id="div_id_username" class="form-group required">
                                   <div class="col-md-12"></div>
                        <label for="id_username" class="control-label col-md-4  requiredField"> ' . $k . '<span
                                class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="name" maxlength="30"
                                  name="' . $k . '" placeholder="Podaj ' . $k . '" style="margin-bottom: 10px"
                                   type="text"/>
                        </div>
                    </div>
               
                                   ';
        }
        $this->session->set_userdata('pola', $text);
        echo $this->session->userdata('pola');

    }

    public function my_ads()
    {
        $this->load->helper('form');
        $this->load->model('model');
        // $dane["aukcje"] = $this->user_model->aukcje();
        $dane["ads"] = $this->model->my_ads($this->session->userdata('user_id')['id']);

        // Zwracamy widoki, przypisując do jednego z nich tablicę $data
        $this->load->view('partials/header');
        $this->load->view('my_ads', $dane);
        $this->load->view('partials/footer');
    }


    public function usun($id)
    {
        $kategoria = $this->db->select('categories.name')->from('categories')->join('advertisement', 'categories.id = advertisement.category_id')->where('advertisement.id', $id)->get()->row_array();


        $this->db->where('id', $id);
        $this->db->delete('advertisement');

        $this->db->where('id', $id);
        $this->db->delete($kategoria['name']);


        redirect('controller/my_ads');
    }

    public function przedluz($id)
    {
        $this->db->set('created_date', date('Y-m-j'));
        $this->db->where('id', $id);
        $this->db->update('advertisement');
        redirect('controller/my_ads');
    }


    public function add_photo()
    {
        $this->load->helper('form');

        $config['upload_path'] = './images/photos';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 10240;
        $config['max_height'] = 7680;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());

            return print_r($error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $tab['ad_id'] = $this->input->post('id');
            $tab['photo'] = $data['upload_data']['file_name'];
            $this->db->insert('photos', $tab);
            return redirect('controller/my_ads/');
        }
    }
    

}