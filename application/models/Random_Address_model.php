<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Random_Address_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
    }

    public function get_address_minmax_id($country_code,$state_code){

        if(!empty($state_code)){

             $query_sql = "SELECT MIN(id) AS min_id, MAX(id) AS max_id FROM address WHERE country_code = ? AND state_code = ?;";
            $query = $this->db->query($query_sql,array($country_code,$state_code));
             return $query->row();

        }else{

             $query_sql = "SELECT MIN(id) AS min_id, MAX(id) AS max_id FROM address WHERE country_code = ? ;";
            $query = $this->db->query($query_sql,array($country_code));
             return $query->row();

        }
    }

    public function get_random_address($country_code,$state_code,$random_id)
     {

        if(!empty($state_code)){

             $query_sql = "SELECT id, street, city, city_slug, state, state_slug, 
                            state_code, zip_code, phone, country, country_slug, 
                            country_code, latitude, longitude, gmt_created, gmt_modified
                            FROM address
                            WHERE country_code = ? AND state_code = ? AND id >= ?
                            LIMIT 1;";
       
            $query = $this->db->query($query_sql,array($country_code,$state_code,$random_id));
            return $query->row();

        }else{

              $query_sql = "SELECT id, street, city, city_slug, state, state_slug, 
                            state_code, zip_code, phone, country, country_slug, 
                            country_code, latitude, longitude, gmt_created, gmt_modified
                            FROM address
                            WHERE country_code = ? AND id >= ?
                            LIMIT 1;";
       
            $query = $this->db->query($query_sql,array($country_code,$random_id));
            return $query->row();

        }

     }

    public function get_state_list($country_code)
    {
            $query_sql = "select id, country, country_slug, country_code, state,state_slug,state_code from country_state where country_code=? order by state";
            $query = $this->db->query($query_sql,array($country_code));
            return $query->result();

    }

    public function get_country_list(){

            $query_sql = "select country,country_slug,country_code from country order by country asc";
            $query = $this->db->query($query_sql);
            return $query->result();

    }



    public function get_person_profile_minmax_id($country_code,$state_code){

        if('UK' == strtoupper($country_code)){
                    $country_code = 'gb';
            }

          if(!empty($state_code)){

                 $query_sql = "SELECT MIN(id) AS min_id, MAX(id) AS max_id FROM person_profile WHERE country_code = ? AND state_code = ?;";
                $query = $this->db->query($query_sql,array($country_code,$state_code));
                 return $query->row();

            }else{

                 $query_sql = "SELECT MIN(id) AS min_id, MAX(id) AS max_id FROM person_profile WHERE country_code = ? ;";
                $query = $this->db->query($query_sql,array($country_code));
                 return $query->row();

            }
      }

    public function get_person_profile($country_code,$state_code,$random_id)
    {

        if('UK' == strtoupper($country_code)){
                $country_code = 'gb';
        }

        if(empty($state_code))
        {
            $query_sql = "SELECT id,full_name, gender,birthday,ssn,state_code,country_code FROM person_profile
                            WHERE country_code = ? AND id >= ?
                            LIMIT 1;";
            $query = $this->db->query($query_sql,array($country_code,$random_id));
            return $query->row();

        }
        else
        {
             if('gb' == $country_code){
                $state_code = 'gb';
             }

           $query_sql = "SELECT id,full_name, gender,birthday,ssn,state_code,country_code FROM person_profile
                            WHERE country_code = ? AND state_code = ? AND id >= ?
                            LIMIT 1;";
            $query = $this->db->query($query_sql,array($country_code,$state_code,$random_id));
            return $query->row();

        }
        
    }

    public function get_creditcard_minmax_id($creditcard_type){

          if(!empty($creditcard_type)){

                 $query_sql = "SELECT MIN(id) AS min_id, MAX(id) AS max_id FROM person_profile_ext WHERE creditcard_type_slug = ?;";
                $query = $this->db->query($query_sql,array($creditcard_type));
                 return $query->row();

            }else{

                 $query_sql = "SELECT MIN(id) AS min_id, MAX(id) AS max_id FROM person_profile_ext;";
                $query = $this->db->query($query_sql);
                 return $query->row();

            }
      }

    public function get_creditcard($creditcard_type,$random_id){

        if(empty($creditcard_type)){
            $query_sql = 'SELECT creditcard_type,creditcard_type_slug,creditcard_number,creditcard_expire,creditcard_cvv FROM person_profile_ext WHERE id >= ?
                            LIMIT 1;';
            $query = $this->db->query($query_sql,$random_id);
            return $query->row();
        }else{
            $query_sql = 'SELECT creditcard_type,creditcard_type_slug,creditcard_number,creditcard_expire,creditcard_cvv FROM person_profile_ext WHERE creditcard_type_slug = ? AND id >= ? LIMIT 1;';
            $query = $this->db->query($query_sql,array($creditcard_type,$random_id));
            return $query->row();
        }

    }

    public function get_creditcard_brand_list(){
        
        $query_sql = 'select creditcard_type,creditcard_type_slug from creditcard_brand order by creditcard_type';
        $query = $this->db->query($query_sql);
        return $query->result();
    }

    public function get_major_cities($country_code){
        $query_sql = "select country,country_slug,country_code,state,state_slug,state_code,city,city_slug,pop from country_city where country_code = ? order by pop desc limit 23";
        $query = $this->db->query($query_sql, array($country_code));
        return $query->result();
    }

    public function get_address_minmax_id_by_city($country_code, $state_code, $city_slug){
        $query_sql = "SELECT MIN(id) AS min_id, MAX(id) AS max_id FROM address WHERE country_code = ? AND state_code = ? AND city_slug = ?";
        $query = $this->db->query($query_sql, array($country_code, $state_code, $city_slug));
        return $query->row();
    }

    public function get_random_address_by_city($country_code, $state_code, $city_slug, $random_id){
        $query_sql = "SELECT id, street, city, city_slug, state, state_slug, 
                      state_code, zip_code, phone, country, country_slug, 
                      country_code, latitude, longitude, gmt_created, gmt_modified
                      FROM address
                      WHERE country_code = ? AND state_code = ? AND city_slug = ? AND id >= ?
                      LIMIT 1";
        $query = $this->db->query($query_sql, array($country_code, $state_code, $city_slug, $random_id));
        return $query->row();
    }

} 