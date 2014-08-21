<?php

namespace FlexPress\Theme\DependencyInjection;

use FlexPress\Components\Search\QueryBuilders\Text as TextQueryBuilder;
use FlexPress\Theme\Controllers\FrontPageController;
use FlexPress\Theme\Controllers\PageController;
use FlexPress\Theme\Controllers\SearchController;
use FlexPress\Theme\Controllers\SingleController;
use FlexPress\Theme\Fields\FlexibleLayoutProxy;
use FlexPress\Theme\FlexPress;
use FlexPress\Components\Hooks\Hooker;
use FlexPress\Components\Layouts\Fields\FlexibleLayout;
use FlexPress\Components\Routing\Route;
use FlexPress\Components\Routing\Router;
use FlexPress\Components\Templating\Functions as TemplatingFunctions;
use FlexPress\Components\Taxonomy\Helper as TaxonomyHelper;
use FlexPress\Components\PostType\Helper as PostTypeHelper;
use FlexPress\Components\ACF\Helper as ACFHelper;
use FlexPress\Components\Shortcode\Helper as ShortcodeHelper;
use FlexPress\Components\ImageSize\Helper as ImageSizeHelper;
use FlexPress\Components\Layouts\Controller as LayoutController;
use FlexPress\Theme\Search\SearchManager;
use Symfony\Component\HttpFoundation\Request;

class DependencyInjectionContainer extends \Pimple
{

    /**
     *
     * Adds the configs for the theme using pimple
     *
     * @author Tim Perry
     *
     */
    public function init()
    {

        $this->addWPConfigs();
        $this->addSPLConfigs();
        $this->addControllerConfigs();
        $this->addFieldGroupConfigs();
        $this->addFieldConfigs();
        $this->addImageSizeConfigs();
        $this->addLayoutConfigs();
        $this->addModelConfigs();
        $this->addPostTypeConfigs();
        $this->addTaxonomyConfigs();
        $this->addTemplateFunctionConfigs();
        $this->addHookableConfigs();
        $this->addSearchConfigs();
        $this->addBaseThemeConfigs();

    }

    /**
     *
     * Adds standard wordpress configs
     *
     * @author Tim Perry
     *
     */
    protected function addWPConfigs()
    {

        $this["databaseAdapter"] = function () {
            return $GLOBALS['wpdb'];
        };

        $this["query"] = $this->factory(
            function () {
                return new \WP_Query();
            }
        );

    }

    /**
     *
     * Adds SPL configs e.g. queue
     *
     * @author Tim Perry
     *
     */
    protected function addSPLConfigs()
    {

        $this['queue'] = $this->factory(
            function () {
                return new \SplQueue();
            }
        );

        $this['objectStorage'] = $this->factory(
            function () {
                return new \SplObjectStorage();
            }
        );

    }

    /**
     *
     * Adds the controller configs
     *
     * @author Tim Perry
     *
     */
    protected function addControllerConfigs()
    {

        $this['pageController'] = function ($c) {
            return new PageController($c);
        };

        $this['frontPageController'] = function ($c) {
            return new FrontPageController($c);
        };

        $this['searchController'] = function ($c) {
            return new SearchController($c);
        };

        $this['singleController'] = function ($c) {
            return new SingleController($c);
        };

    }

    /**
     *
     * Adds the acf field group configs
     *
     * @author Tim Perry
     *
     */
    protected function addFieldGroupConfigs()
    {
        // TODO: add acf field group configs
    }

    /**
     *
     * Adds the acf field configs
     *
     * @author Tim Perry
     *
     */
    protected function addFieldConfigs()
    {

        $this["flexibleLayoutProxy"] = function ($c) {
            return new FlexibleLayoutProxy($c);
        };

    }

    /**
     *
     * Adds the image size configs
     *
     * @author Tim Perry
     *
     */
    protected function addImageSizeConfigs()
    {
        // TODO: add image size configs
    }

    /**
     *
     * Adds all the layout related configs
     *
     * @author Tim Perry
     *
     */
    protected function addLayoutConfigs()
    {


        $this["layoutController"] = function ($c) {
            return new LayoutController(array( // Add your layouts here
            ));
        };

        $this["flexibleLayout"] = function ($c) {
            return new FlexibleLayout($c["layoutController"]);
        };

    }

    /**
     *
     * Adds the orm model configs
     *
     * @author Tim Perry
     *
     */
    protected function addModelConfigs()
    {
        // TODO: add model configs
    }

    /**
     *
     * Adds the post type configs
     *
     * @author Tim Perry
     *
     */
    protected function addPostTypeConfigs()
    {
        // TODO: add post type configs
    }

    /**
     *
     * Adds the taxonomy configs
     *
     * @author Tim Perry
     *
     */
    protected function addTaxonomyConfigs()
    {
        // TODO: add taxonomy configs
    }

    /**
     *
     * Adds the twig template function cofnigs
     *
     * @author Tim Perry
     *
     */
    protected function addTemplateFunctionConfigs()
    {
        // TODO: add twig template function configs
    }

    /**
     *
     * Adds the hookable configs
     *
     * @author Tim Perry
     *
     */
    protected function addHookableConfigs()
    {
        // TODO: add hookable configs
    }

    /**
     *
     * Adds the search configs
     *
     * @author Tim Perry
     *
     */
    protected function addSearchConfigs()
    {

        $this['textQueryBuilder'] = function () {
            return new TextQueryBuilder();
        };

        $this['searchManager'] = function ($c) {
            return new SearchManager($c['databaseAdapter'], $c['queue'], $c['request'], array(
                $c['textQueryBuilder']
            ));
        };

    }

    /**
     *
     * Adds the base theme configs
     *
     * @author Tim Perry
     *
     */
    protected function addBaseThemeConfigs()
    {

        $this["request"] = function () {
            return Request::createFromGlobals();
        };

        $this['route'] = $this->factory(
            function ($c) {
                return new Route($c['queue'], $c, $c['request']);
            }
        );

        $this['router'] = function ($c) {
            return new Router($c['queue'], $c['route']);
        };

        $this['hooker'] = function ($c) {
            return new Hooker($c['objectStorage'], array());
        };

        $this['templatingFunctions'] = function ($c) {
            return new TemplatingFunctions($c['objectStorage'], array());
        };

        $this['taxonomyHelper'] = function ($c) {
            return new TaxonomyHelper($c['objectStorage'], array());
        };

        $this['postTypeHelper'] = function ($c) {
            return new PostTypeHelper($c['objectStorage'], array());
        };

        $this['ACFHelper'] = function ($c) {
            return new ACFHelper($c['objectStorage'], $c['objectStorage'], array(), array(
                /**
                 * enable this if you want to use the layouts functionality, you will also
                 * need to install the advanced custom fields flexible fields plugin
                 */
                //$c["flexibleLayoutProxy"]
            ));
        };

        $this['shortcodeHelper'] = function ($c) {
            return new ShortcodeHelper($c['objectStorage'], array());
        };

        $this['imageSizeHelper'] = function ($c) {
            return new ImageSizeHelper($c['objectStorage'], array());
        };

        $this['FlexPress'] = function ($c) {
            return new FlexPress(
                $c,
                $c['router'],
                $c['hooker'],
                $c['templatingFunctions'],
                $c['taxonomyHelper'],
                $c['postTypeHelper'],
                $c['ACFHelper'],
                $c['shortcodeHelper'],
                $c['imageSizeHelper']
            );
        };

    }
}
