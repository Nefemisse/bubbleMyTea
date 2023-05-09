<?php

namespace App\Http\Controllers;

use App\Models\BubbleTeas;

use Illuminate\Http\Request;
use App\Repositories\BubbleTeaInterfaceRepository;

class BasketController extends Controller
{

	protected $bubbleTeaRepository; // L'instance BubbleTeaSessionRepository

	public function __construct(BubbleTeaInterfaceRepository $bubbleTeaRepository)
	{
		$this->bubbleTeaRepository = $bubbleTeaRepository;
	}

	# Affichage du panier
	public function show()
	{
		return view("bubbleTea.show"); // resources\views\basket\show.blade.php
	}

	# Ajout d'un produit au panier
	public function add(BubbleTeas $bubbleTea, Request $request)
	{

		// Validation de la requête
		$this->validate($request, [
			"quantity" => "numeric|min:1"
		]);

		// Ajout/Mise à jour du produit au panier avec sa quantité
		$this->bubbleTeaRepository->add($bubbleTea, $request->quantity);

		// Redirection vers le panier avec un message
		return redirect()->route("bubbleTea.show")->withMessage("Produit ajouté au panier");
	}

	// Suppression d'un produit du panier
	public function remove(BubbleTeas $bubbleTea)
	{

		// Suppression du produit du panier par son identifiant
		$this->bubbleTeaRepository->remove($bubbleTea);

		// Redirection vers le panier
		return back()->withMessage("Bubble Tea retiré du panier");
	}

	// Vider la panier
	public function empty()
	{

		// Suppression des informations du panier en session
		$this->bubbleTeaRepository->empty();

		// Redirection vers le panier
		return back()->withMessage("Panier vidé");
	}
}
