<?php

namespace FlexPress\Theme\Controllers;

use FlexPress\Components\Controller\AbstractTimberController;

class SearchController extends AbstractTimberController
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
        $context["Search"] = $this->dic['Search'];
        $this->render('search.twig', $context);
    }
}
