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
                    @includeIf("admin.layout.aside.main-item" ,["href" => "formulas " , "title" => trans('web.formulas') , "description" => trans('web.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "formulas" , "title" => trans('web.list') , "tooltip" => trans('web.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "formulas/create" , "title" => trans('web.add') , "tooltip" => trans('web.add-formulaormula'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "flash_cards" , "title" => trans('language.flash_cards') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "flash_cards" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "flash_cards/create" , "title" => trans('web.add') , "tooltip" => trans('language.add-flash_cards'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "flash_cards_items" , "title" => trans('language.flash_cards_items') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "flash_cards_items" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "flash_cards_items/create" , "title" => trans('web.add') , "tooltip" => trans('language.add-flash_cards_items'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "dictionaries" , "title" => trans('language.dictionaries') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "dictionaries" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "dictionaries/create" , "title" => trans('web.add') , "tooltip" => trans('language.add-dictionaries'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "knowledge_areas" , "title" => trans('language.knowledge_areas') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "knowledge_areas" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "knowledge_areas/create" , "title" => trans('web.add') , "tooltip" => trans('language.add-knowledge_areas'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "knowledge_area_questions" , "title" => trans('language.knowledge_area_questions') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "knowledge_area_questions" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "knowledge_area_questions/create" , "title" => trans('web.add') , "tooltip" => trans('language.add-knowledge_area_questions'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>


                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "exams" , "title" => trans('language.exams') , "description" => trans('language.exams')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "exams" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                    </ul>
                </li>




                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "ittos" , "title" => trans('language.ittos') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "ittos" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "ittos/create" , "title" => trans('web.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                @includeIf("admin.layout.aside.main-item" ,["href" => "ittos_sections" , "title" => trans('language.ittos_sections') , "description" => trans('language.list')])
                <ul aria-expanded="true" class="collapse">
                    <li>
                        @includeIf("admin.layout.aside.sub-item" ,["href" => "ittos_sections" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                    </li>
                    <li>
                        @includeIf("admin.layout.aside.sub-item" ,["href" => "ittos_sections/create" , "title" => trans('web.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                    </li>
                </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "ittos_sections_types" , "title" => trans('language.ittos_sections_types') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "ittos_sections_types" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "ittos_sections_types/create" , "title" => trans('web.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "ittos_sections_items" , "title" => trans('language.ittos_sections_items') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "ittos_sections_items" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "ittos_sections_items/create" , "title" => trans('web.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
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
                    @includeIf("admin.layout.aside.main-item" ,["href" => "products" , "title" => trans('language.products') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "products" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "products/create" , "title" => trans('web.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>
{{--    @includeIf("admin.layout.aside.sidebar-toggler")--}}
</aside>
