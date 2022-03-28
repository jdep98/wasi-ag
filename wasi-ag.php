<?php
/*
Plugin Name:  Wasi AG
Version: 1.0
Description: Enviar datos del cliente a Wasi.
Author: Muto Estudio
Author URI: https://www.mutoestudio.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: Muto
*/

defined( 'ABSPATH' ) or die( 'Unauthorized access!' );

add_action( 'cfdb7_before_save', 'techiepress_cf7_data' );

function techiepress_cf7_data( $form_data ) {

    $data = [
        'id_country' => $form_data['id_country'],
        'id_region' => $form_data['id_region'],
        'id_city' => $form_data['id_city'],
        'id_user' => $form_data['id_user'],
        'first_name' => $form_data['first_name'],
        'last_name' => $form_data['last_name'],
        'phone' => $form_data['phone'],
        'email' => $form_data['email'],
    ];

    $url = 'https://api.wasi.co/v1/client/add?id_company=2056213&wasi_token=2Yl8_SkVt_l72E_hLg2';

    $args = [
        'method' => 'POST',
        'body'   => $data,
    ];

    wp_remote_post( $url, $args );
     
}