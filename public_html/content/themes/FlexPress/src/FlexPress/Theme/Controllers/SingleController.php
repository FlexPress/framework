<?php

namespace FlexPress\Theme\Controllers;

class SingleController extends AbstractBaseController
{

    /**
     *
     * Index Action
     *
     * @param $request
     * @return mixed|void
     * @author Tim Perry
     *
     */
    public function indexAction($request)
    {

        $context = $this->getContext();
        $this->render('single.html.twig', $context);

    }
}
