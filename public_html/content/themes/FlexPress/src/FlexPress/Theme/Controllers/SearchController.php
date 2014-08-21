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
        $context["search"] = $this->dic['searchManager'];

        $this->render('search.twig', $context);
    }
}
