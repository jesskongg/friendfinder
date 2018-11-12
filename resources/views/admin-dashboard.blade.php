@extends('layouts.app')

<?php
if($user = Auth::guard('admin')->check())
{
    echo 'admin logged in';
}else{
echo 'not logged in';
}
echo '<br>';
if($user = Auth::guard('web')->check())
{
    echo 'user logged in';
}else{
echo 'user not logged in';
}
?>

<H1>FUTURE HOME OF ADMIN DASHBOARD</h1>
