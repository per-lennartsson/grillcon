<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    "wrapper" => null,
    "class" => "rm-default rm-desktop",
 
    // Here comes the menu structure
    "items" => [

        "blog" => [
            "text"  =>"Blogg",
            "url"   => $this->di->get("url")->create("blogg"),
            "title" => "Developer blog",
            "mark-if-parent" => true,
        ],
        "arkiv" => [
            "text"  =>"Arkiv",
            "url"   => $this->di->get("url")->create("arkiv"),
            "title" => "GrillCon Arkiv",
            "mark-if-parent" => true,
        ],
        "about" => [
            "text"  =>"Om",
            "url"   => $this->di->get("url")->create("om-grillcon"),
            "title" => "Om GrillCon",
            "mark-if-parent" => true,
        ],
    ],
 


    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    "callback" => function ($url) {
        return !strcmp($url, $this->di->get("request")->getCurrentUrl(false));
    },



    /**
     * Callback to check if current page is a decendant of the menuitem,
     * this check applies for those menuitems that has the setting
     * "mark-if-parent" set to true.
     *
     */
    "is_parent" => function ($parent) {
        $url = $this->di->get("request")->getCurrentUrl(false);
        return !substr_compare($parent, $url, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
   /*
    "create_url" => function ($url) {
        return $this->di->get("url")->create($url);
    },
    */
];
