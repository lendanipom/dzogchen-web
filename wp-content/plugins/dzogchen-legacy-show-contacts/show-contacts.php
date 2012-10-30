<?php
	/*
	Plugin Name: Dzogchen Legacy Show Contacts
	Description: Displays a table of contacts in database filled from legacy dzogchen web.
	*/
	function show_contacts(){
		try{
			$out = "<table>";
			$pdo = new PDO('mysql:host=localhost;dbname=www','dzogchen','dzogchen');
			$pdo->exec('SET NAMES "utf8"');
			$result = $pdo->query('select * from mail_users order by prijmeni');
			while($row = $result->fetch()){
				$out = $out . "<tr><td>" . $row['jmeno'] . "</td><td>" . $row['prijmeni'] . "</td><td>"
					. $row['mesto'] . "</td><td>" . $row['tel'] . "</td><td>" . $row['mail'] . "</tr>";	
			}
			$out = $out . "</table>";
			return $out;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	
	}
	function related_articles(){
		$out = '<div class="right-box" id="right-articles"> <h1>Nejnovější články</h1> <div class="right-box-inner scroll-pane">';
		$recentPosts = new WP_Query();
		$recentPosts->query('showposts=5');
		while ($recentPosts->have_posts()){
			$recentPosts->the_post();
			$out = $out . '<h2><a href="' . the_permalink() . the_title() . '</a></h2>'; //<span class="published">' . get_the_date('j.n.Y') . '</span><div style="clear: both;"></div>' . the_excerpt();  
		}
		$out = $out . ' </div></div>';
		return $out;
	}
	function some_link(){
	}
	add_shortcode('some_link','some_link');
	add_shortcode('related_articles','related_articles');
	add_shortcode('show_contacts','show_contacts');
?>
