<?php defined('BASEPATH') OR exit('No direct script access allowed');


    if ( ! function_exists('first_error'))
    {
        function first_error()
        {   
            $ci =& get_instance();
            $ci->load->library('form_validation');
            return $ci->form_validation->first_error();
        }

    }

    if ( ! function_exists('hash_password'))
    {
        function hash_password($pass)
        {   
            if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {

                $unique = md5(uniqid(rand(), true));
                $unique = substr($unique, 0, 22);

                $salt = '$2y$12$' . $unique;
                $hash = crypt($pass, $salt);
                $hash = substr($hash,-32);
                $pref = substr($unique,0,5);
                $suff = substr($unique,-17);

                return '$4rc0d3$'.$pref.$hash.$suff;;
            }
        }

    }

    if ( ! function_exists('verify_password'))
    {
        function verify_password($pass_us,$pass_db)
        {   
            $pass_db = str_replace('$4rc0d3$','',$pass_db);

            $prefix = substr($pass_db,0,5);
            $suffix = substr($pass_db,-17);
            $unique = $prefix.$suffix;

            $hash = str_replace($prefix,'',$pass_db);
            $hash = str_replace($suffix,'',$hash);
            $hash = '$2y$12$'.substr($unique,0,strlen($unique)-1).$hash;

            $user = crypt($pass_us, '$2y$12$'.$unique);
            return ($user == $hash);
        }

    }


    if ( ! function_exists('set_message'))
    {
        function set_message($type,$msg)
        {   
            $ci =& get_instance();

            $ci->session->set_flashdata('flash_message',
                '<div class="alert alert-'.$type.'">'.$msg.'</div>');
        }

    }

    if ( ! function_exists('get_message'))
    {
        function get_message()
        {   
            $ci =& get_instance();

            return $ci->session->flashdata('flash_message');
        }

    }

    if ( ! function_exists('set_lastdata'))
    {
        function set_lastdata($default)
        {   
            $ci =& get_instance();

            $ci->session->set_flashdata('flash_lastdata',$default);
        }

    }

    if ( ! function_exists('get_lastdata'))
    {
        function get_lastdata($default = array())
        {   
            $ci =& get_instance();

            if (count($default) > 0){
                $data1 = $default;
            }
            else{
                $data1 = array();
            }

            $data2 = $ci->session->flashdata('flash_lastdata');
            if (count($data2) == 0){
                $data2 = array();
            }

            $data = array_merge($data1,$data2);
            return $data;
     
        }

    }


    if ( ! function_exists('set_session'))
    {
        function set_session($key,$val)
        {   
            $ci =& get_instance();

            $ci->session->set_userdata($key,$val);
        }

    }

    if ( ! function_exists('session'))
    {
        function session($key)
        {   
            $ci =& get_instance();

            return $ci->session->userdata($key);
        }
    }