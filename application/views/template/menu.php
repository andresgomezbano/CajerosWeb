<nav class="top-bar" data-topbar> 
    <ul class="title-area"> 
        <li class="name"> 
            <h1><a href="#">My Site</a></h1> 
        </li> 
    </ul> 
    <section class="top-bar-section"> 
        <!-- Right Nav Section --> 
        <ul class="left"> 
            <!--li>
                <a href="#">Right Button Active</a>
            </li--> 
            <li class="has-dropdown"> 
                <a href="#" >Editar</a> 
                <ul class="dropdown"> 
                    <li class="has-dropdown">
                        <a href="#">Banco</a>
                        <ul class="dropdown"> 
                            <li><a href="<?=site_url("banco/nuevo")?>">Nuevo</a></li>
                            <li><a href="<?=site_url("banco")?>">Consultar</a></li>
                        </ul>
                        
                    <li class="has-dropdown">
                        <a href="#">Cajero</a>
                        <ul class="dropdown"> 
                            <li><a href="<?=site_url("cajero/nuevo")?>">Nuevo</a></li>
                            <li><a href="<?=site_url("cajero")?>">Consultar</a></li>
                        </ul>
                    </li>
                        
                    </li>
                    
                </ul>
            </li> 
        </ul> 
        <!-- Left Nav Section --> 
        <ul class="left"> 
            <li><a href="<?=site_url("cajero/mapa")?>">Mapa</a></li> 
        </ul>
    </section> 
</nav>