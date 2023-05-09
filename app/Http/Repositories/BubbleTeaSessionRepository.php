<?php

namespace App\Repositories;

use App\Models\BubbleTeas;

class BubbleTeaSessionRepository implements BubbleTeaInterfaceRepository  {

	# Afficher le panier
	public function show () {
		return view("bubbleTea.show"); // resources\views\basket\show.blade.php
	}

	# Ajouter/Mettre à jour un produit du panier
	public function add (BubbleTeas $bubbleTea, $quantity) {		
		$bubbleTea = session()->get("bubbleTea"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$bubbleTeas_details = [
			'name' => $bubbleTea->name,
			'price' => $bubbleTea->price,
			'quantity' => $quantity,
			// 'temperature' => $bubbleTea->temperature,
			// 'description' => $bubbleTea->description,
			// 'sugar_quantity' => $bubbleTea->sugar_quantity,
		];
		
		$bubbleTea[$bubbleTea->id] = $bubbleTeas_details; // On ajoute ou on met à jour le produit au panier
		session()->put("bubbleTea", $bubbleTea); // On enregistre le panier
	}

	# Retirer un produit du panier
	public function remove (Product $bubbleTea) {
		$bubbleTea = session()->get("bubbleTea"); // On récupère le panier en session
		unset($bubbleTea[$bubbleTea->id]); // On supprime le produit du tableau $bubbleTea
		session()->put("bubbleTea", $bubbleTea); // On enregistre le panier
	}

	# Vider le panier
	public function empty () {
		session()->forget("bubbleTea"); // On supprime le panier en session
	}

}

?>