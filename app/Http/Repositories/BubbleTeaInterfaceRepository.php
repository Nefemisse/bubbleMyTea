<?php

namespace App\Repositories;

use App\Models\BubbleTeas;

interface BubbleTeaInterfaceRepository {

	// Afficher le panier
	public function show();

	// Ajouter un produit au panier
	public function add(BubbleTeas $bubbleTea, $quantity);

	// Retirer un produit du panier
	public function remove(BubbleTeas $bubbleTea);

	// Vider le panier
	public function empty();

}

?>