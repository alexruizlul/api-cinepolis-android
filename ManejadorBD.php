<?php

class ManejadorBD {

	private $db;
	private $host;
	private $user;
	private $pass;
	private $result;

	function __construct() {
		$this->db = 'appcinepolis';
		$this->host = 'localhost';
		$this->user = 'root';
		$this->pass = '';
		$this->port = '3307';

		$this->result = new \stdClass();
		$this->result->code = 200;
		$this->result->msg = 'Success';
		$this->result->output = array();
	}

	private function open() {
		$link = mysqli_connect($this->host, $this->user, $this->pass, $this->db, $this->port) or die('Error connecting to DB');
		return $link;
	}

	private function close($link) {
		return mysqli_close($link);
	}

	public function showAll() {
		try {
			$link = $this->open();

			$qry = "SELECT * FROM funciones";

			$r = mysqli_query($link, $qry);

			while( $result[] = mysqli_fetch_array( $r, MYSQLI_ASSOC ) );

			foreach ($result as $value) {
				if($value) {
					array_push($this->result->output, $value);
				}
			}

			$this->close($link);
		} catch (Exception $e) {
			$this->result->code = 500;
			$this->result->msg = 'Failed: '.$e;
		}

		return $this->result;
	}

	public function find($id) {
		try {
			$link = $this->open();

			$qry = "SELECT * FROM funciones JOIN horarios USING(id_funcion)  WHERE id_funcion=".$id;

			$r = mysqli_query($link, $qry);

			while( $result[] = mysqli_fetch_array( $r, MYSQLI_ASSOC ) );

			foreach ($result as $value) {
				if($value) {
					array_push($this->result->output, $value);
				}
			}

			$this->close($link);
		} catch (Exception $e) {
			$this->result->code = 500;
			$this->result->msg = 'Failed: '.$e;
		}

		return $this->result;
	}

	public function hours($id) {
		try {
			$link = $this->open();

			$qry = "SELECT * FROM horarios WHERE id_funcion=".$id;

			$r = mysqli_query($link, $qry);

			while( $result[] = mysqli_fetch_array( $r, MYSQLI_ASSOC ) );

			foreach ($result as $value) {
				if($value) {
					array_push($this->result->output, $value);
				}
			}

			$this->close($link);
		} catch (Exception $e) {
			$this->result->code = 500;
			$this->result->msg = 'Failed: '.$e;
		}

		return $this->result;
	}

	public function buy($id, $amount, $date, $tickets, $user) {
		try {
			$link = $this->open();

			$qry = "INSERT INTO compras VALUES(NULL,$amount,'$date','$tickets',$user,$id)";

			$r = mysqli_query($link, $qry);

			if($r) {
				array_push($this->result->output, 'Ok');
			}

			$this->close($link);
		} catch (Exception $e) {
			$this->result->code = 500;
			$this->result->msg = 'Failed: '.$e;
		}

		return $this->result;
	}

	public function showTickets() {
		try {
			$link = $this->open();

			$qry = "SELECT * FROM compras";

			$r = mysqli_query($link, $qry);

			while( $result[] = mysqli_fetch_array( $r, MYSQLI_ASSOC ) );

			foreach ($result as $value) {
				if($value) {
					array_push($this->result->output, $value);
				}
			}

			$this->close($link);
		} catch (Exception $e) {
			$this->result->code = 500;
			$this->result->msg = 'Failed: '.$e;
		}

		return $this->result;
	} 

}

?>