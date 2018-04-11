<?php
//Définition des variables de connexion
class Param {
	public static $user = 'root';
	// mettre $pass=''
  public static $pass = '';
	// supprimer :8889 de $dsn car numero du port pour mac
	public static $dsn = 'mysql:host=localhost;dbname=perrint_vlib;charset=utf8';
}