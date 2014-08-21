<?php

namespace FlexPress\Theme\Search;

use FlexPress\Components\Search\AbstractSearch;

class SearchManager extends AbstractSearch
{

    /**
     *
     * Derived function used to get the searchable post types
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    protected function getSearchablePostTypes()
    {
        return array('post', 'page');
    }

    /**
     *
     *  Derived function used to output the results in a custom format
     *
     * @return mixed
     * @author Tim Perry
     *
     */
    public function outputResults()
    {
        while ($this->havePosts()) {
            $post = $this->thePost();

            echo '<p>' . $post->post_title, '</p>';
            // You should make sure timber is enabled and then move this to a partial view like this:
            /**
             * $context = \Timber::getContext();
             * $context['post'] = $post;
             *
             * \Timber::render('partials/search-results.twig', $context);
             */

        }
    }
}
