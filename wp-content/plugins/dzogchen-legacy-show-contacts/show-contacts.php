<?php
	/*
	Plugin Name: Dzogchen Legacy Show Contacts
	Description: Displays a table of contacts in database filled from legacy dzogchen web.
	*/
	function show_contacts(){
		try{
			$out = "<table id=\"contacts-table\"><thead><tr><th>Jméno</th><th>Příjmení</th><th>Bydliště</th><th>Telefon</th><th>E-mail</th></tr></thead><tbody>";
			$pdo = new PDO('mysql:host=localhost;dbname=www','dzogchen','namkhainorbu');
			$pdo->exec('SET NAMES "utf8"');
			$result = $pdo->query('select * from mail_users order by prijmeni');
			while($row = $result->fetch()){
				$out = $out . "<tr><td>" . $row['jmeno'] . "</td><td>" . $row['prijmeni'] . "</td><td>"
					. $row['mesto'] . "</td><td>" . $row['tel'] . "</td><td>" . $row['mail'] . "</tr>";	
			}
			$out = $out . "</tbody></table>";
			return $out;
		} catch (Exception $e) {
			return $e->getMessage();
		}
return "";
	
	}
	add_shortcode('show_contacts','show_contacts');
?>
