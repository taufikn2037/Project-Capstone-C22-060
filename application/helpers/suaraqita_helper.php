<?php

function is_logged_in_user()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username__user')) {
        redirect('login');
    } elseif ($ci->session->userdata('id_role') != 2) {
        redirect('blocked');
    }
}

function is_logged_in_admin()
{

    $ci = get_instance();
    if (!$ci->session->userdata('username__admin')) {
        redirect('ladmin');
    } elseif ($ci->session->userdata('id_role') != 1) {
        redirect('blocked');
    }
}

function is_logged_in_petugas()
{

    $ci = get_instance();
    if (!$ci->session->userdata('username__admin')) {
        redirect('ladmin');
    } elseif ($ci->session->userdata('id_role') != 3) {
        redirect('blocked');
    }
}
