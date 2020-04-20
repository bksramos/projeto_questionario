<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="/dashboard">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Documentos</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="/documentos/add">Adicionar Documentos</a></li>
                    <li><a class="" href="/documentos/responder">Avaliar Documentos</a></li>
                    <li><a class="" href="/documentos/editar">Editar Avaliação</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_desktop"></i>
                    <span>Indicadores</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="/indicadores/geral">Geral</a></li>
                    <li><a class="" href="/indicadores/organization">Organizações</a></li>
                    <li><a class="" href="/indicadores/knowledge">Conhecimentos</a></li>
                </ul>
            </li>
{{--            <li>--}}
{{--                <a class="" href="widgets.html">--}}
{{--                    <i class="icon_genius"></i>--}}
{{--                    <span>Widgets</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a class="" href="chart-chartjs.html">--}}
{{--                    <i class="icon_piechart"></i>--}}
{{--                    <span>Charts</span>--}}

{{--                </a>--}}

{{--            </li>--}}

            @hasrole('admin')
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_table"></i>
                    <span>Usuários</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('admin.users.index')}}">Editar Usuários</a></li>
                    <li><a class="" href="basic_table.html">Basic Table</a></li>
                </ul>
            </li>
            @endhasrole

{{--            <li class="sub-menu">--}}
{{--                <a href="javascript:;" class="">--}}
{{--                    <i class="icon_documents_alt"></i>--}}
{{--                    <span>Pages</span>--}}
{{--                    <span class="menu-arrow arrow_carrot-right"></span>--}}
{{--                </a>--}}
{{--                <ul class="sub">--}}
{{--                    <li><a class="" href="profile.html">Profile</a></li>--}}
{{--                    <li><a class="" href="login.html"><span>Login Page</span></a></li>--}}
{{--                    <li><a class="" href="contact.html"><span>Contact Page</span></a></li>--}}
{{--                    <li><a class="" href="blank.html">Blank Page</a></li>--}}
{{--                    <li><a class="" href="404.html">404 Error</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
