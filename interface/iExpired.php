<?php 
interface iExpired{
	public function add_expired($name, $price, $qty, $expiredDate);
	public function del_expired($exp_id);
	public function all_expired();
}