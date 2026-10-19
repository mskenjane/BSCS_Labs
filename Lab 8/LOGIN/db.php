<?php

$dbHost = 'aws-0-ap-northeast-2.pooler.supabase.com';
$dbUsername = 'postgres.yjxqdixzveijjrxhqaru';
$dbPassword = 'kWcJGqfWJzxlOAtm';

$conn = pg_connect("host=$dbHost port=5432 dbname=postgres user=$dbUsername password=$dbPassword sslmode=require");

if (!$conn){
    exit('Database Connect Failed.');
}

?>