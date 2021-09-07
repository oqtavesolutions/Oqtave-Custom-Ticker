<?php

// Config file path
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    global $wpdb;

// table name
    $table_name = $wpdb->prefix . 'oqtave_custom_ticker';
// sql
    $sql = "CREATE TABLE $table_name (
                                            id INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
                                            text TEXT NOT NULL,
                                            url TEXT ,
                                            new_window TEXT NOT NULL,
                                            no_follow TEXT NOT NULL,
                                            added_by TEXT NOT NULL,
                                            time TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
                                        )";
                                        
// create database if not exists
maybe_create_table( $table_name, $sql );
