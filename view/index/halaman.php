<?php
error_reporting(0);
@session_start();
switch ($_GET['page']) {
    case "home":
        include 'view/home/dashboard.php';
        break;

    case "barang":
        include 'view/master/data_barang.php';
        break;

    case "customer":
        include 'view/master/data_customer.php';
        break;

    case "kasir":
        include 'view/master/data_kasir.php';
        break;

    case "invoice-utama":
        include 'view/master/invoice_utama.php';
        break;

    case "view-detail":
        include 'view/master/view_detail.php';
        break;

    case "exit":
        include 'proses/logout.php';
        exit();
    // break;

    default:
        if (!empty($_GET['page'])) {
            echo `<script>$(document).ready(function() {
                alertify.error("Halaman yang anda minta tidak tersedia!");
            });</script>`;
        } else {
            include_once 'dashboard.php';
        }
        break;
}