<?php

namespace FlexPress\Theme\Controllers;

class FrontPageController extends AbstractBaseController
{

    /**
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
        $this->render('front-page.twig', $context);
    }
}
