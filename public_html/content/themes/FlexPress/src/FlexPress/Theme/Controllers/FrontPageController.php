<?php

namespace FlexPress\Theme\Controllers;

use FlexPress\Components\Controller\AbstractTimberController;

class FrontPageController extends AbstractTimberController
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
        $this->render('front-page.twig', $context);
    }
}
