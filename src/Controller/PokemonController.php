<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/pokemon', name: 'pokemon_')]
final class PokemonController extends AbstractController
{
    #[Route('/liste', name: 'liste')]
    public function liste(PokemonRepository $pokemonRepository): Response
    {
        $pokemons = $pokemonRepository->findAll();
        return $this->render('pokemon/liste.html.twig',compact('pokemons'));
    }

    #[Route('/capture/{id}', name: 'capture',requirements: ['id' => '\d+'])]
    public function capture(Pokemon $pokemon,EntityManagerInterface $entityManager): Response
    {
        {
            // Inversion du statut
            $pokemon->setEstCapture(!$pokemon->isEstCapture());

            // Enregistrement en base
            $entityManager->flush();

            // Redirection vers la liste
            return $this->redirectToRoute('pokemon_liste');
        }
    }

    #[Route('/details/{id}', name: 'details', requirements: ['id'=>'\d+'])]
    public function details(Pokemon $pokemon): Response
    {
        return $this->render('pokemon/details.html.twig',compact('pokemon'));
    }
    #[Route('/tri/{filter}', name: 'tri',requirements: ['filter'=>'[a-zA-Z]+'])]
    public function tri(PokemonRepository $pokemonRepository,string $filter): Response
    {
        switch (strtolower($filter)) {
            case 'asc':
                $pokemons = $pokemonRepository->findAllOrderedByNameAsc();
                break;
            case 'desc':
                $pokemons = $pokemonRepository->findAllOrderedByNameDesc();
                break;
            case 'captured':
                $pokemons = $pokemonRepository->findAllCaptured();
                break;
            default:
                throw $this->createNotFoundException("Filtre inconnu : $filter");
        }

        return $this->render('pokemon/liste.html.twig',compact('pokemons'));
    }

}
