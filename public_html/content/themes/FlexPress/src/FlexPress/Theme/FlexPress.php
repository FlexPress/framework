<?php

namespace FlexPress\Theme;

use FlexPress\Components\Theme\AbstractTheme;

class FlexPress extends AbstractTheme {

    /**
     *
     * Add support for post thumbnails
     *
     */
    public function afterSetupTheme()
    {
        parent::afterSetupTheme();
        add_theme_support('post-thumbnails');

    }

    /**
     * Used to add routes to the theme
     *
     * @return mixed
     */
    protected function setupRoutes()
    {

        // Standard search
        $this->router->addRoute(
            'searchController',
            function () {
                return is_search();
            }
        );

        // 404
        $this->router->addRoute(
            'pageController@pageNotFoundAction',
            function () {
                return is_404();
            }
        );

        // Front page
        $this->router->addRoute(
            'frontPageController',
            function () {
                return is_front_page();
            }
        );

        // Single news
        $this->router->addRoute(
            'singleController',
            function () {
                return is_single();
            }
        );

        // Standard page
        $this->router->addRoute(
            'pageController',
            function () {
                return is_page();
            }

        );

    }

}
