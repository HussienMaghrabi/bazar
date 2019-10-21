<aside class="left-sidebar">
    <div class="scroll-sidebar" style="border-bottom: 1px solid #404854;">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @includeIf("admin.layout.aside.dash-board-item")
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "users " , "title" => trans('web.users') , "description" => trans('web.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "users" , "title" => trans('web.list') , "tooltip" => trans('web.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "users/create" , "title" => trans('web.add') , "tooltip" => trans('web.add-user'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "countries" , "title" => trans('language.countries') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "countries" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "countries/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "cities" , "title" => trans('language.cities') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "cities" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "cities/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>


                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "categories" , "title" => trans('language.categories') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "categories" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "categories/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "sliders" , "title" => trans('language.sliders') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "sliders" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "sliders/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "adv_sliders" , "title" => trans('language.adv_sliders') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "adv_sliders" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "adv_sliders/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "contacts" , "title" => trans('language.contact_uses') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "contacts" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "notifications" , "title" => trans('language.notifications') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "notifications" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                    </ul>
                </li>
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "terms" , "title" => trans('language.terms') , "description" => trans('language.terms')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "terms" , "title" => trans('language.show') , "tooltip" => trans('language.show') , "class" => "mdi mdi-view-list"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "about" , "title" => trans('language.about') , "description" => trans('language.about')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "about" , "title" => trans('language.show') , "tooltip" => trans('language.show') , "class" => "mdi mdi-view-list"])
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
{{--    @includeIf("admin.layout.aside.sidebar-toggler")--}}
</aside>
