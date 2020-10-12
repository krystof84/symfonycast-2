<?php
/**
 * Created by PhpStorm.
 * User: Krzysztof
 * Date: 13.09.2020
 * Time: 17:25
 */

namespace App\Controller;


use App\Service\MarkdownHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends AbstractController
{
    /**
     *
     * @Route("/", name="app_homepage")
     */
    public function homepage(Environment $twigEnvironment)
    {
//        $html = $twigEnvironment->render('question/homepage.html.twig');
//        return new Response($html);

        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     */
    public function show($slug, MarkdownHelper $markdownHelper)
    {
        $answers = [
            'Make sure your cat is sitting `purrrfectly` still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

        $questionText = 'I\'ve been turned into a cat, any *thoughts* on how to turn back? While I\'m **adorable**, I don\'t really care for cat food.';
        $parsedQuestionText = $markdownHelper->parse($questionText);


        return $this->render('question/show.html.twig', [
            'question' =>  ucwords(str_replace('-', ' ', $slug)),
            'questionText' => $parsedQuestionText,
            'answers'  => $answers
        ]);

    }
}