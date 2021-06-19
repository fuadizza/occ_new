<?php


function is_logged_in()
{
    $ci = get_instance(); //mengambil librarry ci

    if (!$ci->session->userdata('id')) {
        redirect('auth');
    } else {
        $level = $ci->session->userdata('level');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];

        $userLevel = $ci->db->get_where('user_level', ['level_user' => $level, 'menu_id' => $menu_id]);

        if ($userLevel->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
