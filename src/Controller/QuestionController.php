<?php
/**
 * Created by PhpStorm.
 * User: Krzysztof
 * Date: 13.09.2020
 * Time: 17:25
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
{
    /**
     *
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('What a bewitching controller w have conjur');
    }

    /**
     * @Route("/questions/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'Future page to show the question "%s"!',
            ucwords(str_replace('-', ' ', $slug))
        ));
    }
}