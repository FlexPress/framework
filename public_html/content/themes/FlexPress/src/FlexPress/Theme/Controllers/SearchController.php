<?php

namespace FlexPress\Theme\Controllers;

class SearchController extends AbstractBaseController
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
        $context["Search"] = $this->dic['Search'];

        $this->render('search.twig', $context);
    }
}
