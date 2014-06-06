<nav class="top-bar" data-topbar> 
    <ul class="title-area"> 
        <li class="name"> 
            <h1><a href="#">My Site</a></h1> 
        </li> 
        <li class="toggle-topbar menu-icon">
            <a href="#">Menu</a>
        </li> 
    </ul> 
    <section class="top-bar-section"> 
        <!-- Right Nav Section --> 
        <ul class="right"> 
            <li>
                <a href="#">Right Button Active</a>
            </li> 
            <li class="has-dropdown"> 
                <a href="#" >Editar</a> 
                <ul class="dropdown"> 
                    <li class="has-dropdown">
                        <a href="#">Materia</a>
                        <ul class="dropdown"> 
                            <li><a href="<?=site_url("materia")?>">Consultar</a></li>
                            <li><a href="<?=site_url("materia/nuevo")?>">Nuevo</a></li>
                        </ul>
                    </li>
                </ul>
            </li> 
        </ul> 
        <!-- Left Nav Section --> 
        <ul class="left"> 
            <li><a href="#">Left Nav Button</a></li> 
        </ul>
    </section> 
</nav>