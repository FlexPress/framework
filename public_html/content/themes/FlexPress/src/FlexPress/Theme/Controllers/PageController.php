<?php

namespace FlexPress\Theme\Controllers;

use FlexPress\Components\Controller\TimberController;

class PageController extends AbstractTimberController
{

    /**
     *
     * @param $request
     * @return mixed|void
     * @author Tim Perry
     *
     */
    public function indexAction($request)
    {

        $context = \Timber::get_context();
        $this->render('page.twig', $context);

    }

    public function pageNotFoundAction($request)
    {

        $context = \Timber::get_context();
        $this->render('page--404.twig', $context);

    }

    public function newsAction($request)
    {

        $context = \Timber::get_context();
        $this->render('page--news.twig', $context);

    }

}
