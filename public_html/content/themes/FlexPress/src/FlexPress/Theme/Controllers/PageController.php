<?php

namespace FlexPress\Theme\Controllers;

class PageController extends AbstractBaseController
{

    /**
     *
     * Index action
     *
     * @param $request
     * @return mixed|void
     * @author Tim Perry
     *
     */
    public function indexAction($request)
    {

        $context = $this->getContext();
        $this->render('page.twig', $context);

    }

    /**
     *
     * Page not found action
     *
     * @param $request
     * @author Tim Perry
     *
     */
    public function pageNotFoundAction($request)
    {

        $context = $this->getContext();
        $this->render('page--404.twig', $context);

    }

    /**
     *
     * News page action
     *
     * @param $request
     * @author Tim Perry
     *
     */
    public function newsAction($request)
    {

        $context = $this->getContext();
        $this->render('page--news.twig', $context);

    }
}
