<?php

function is_logged_in_user()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username__user')) {
        redirect('login');
    }
}

function is_logged_in_admin()
{

    $ci = get_instance();
    if (!$ci->session->userdata('username__admin')) {
        redirect('ladmin');
    }
}
