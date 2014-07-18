<nav class="top-bar" data-topbar> 
    <ul class="title-area"> 
        <li class="name"> 
            <h1><a href="<?=site_url("/")?>">UbicATM</a></h1> 
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul> 
    <section class="top-bar-section"> 
        <!-- Right Nav Section --> 
        <ul class="left"> 
            <!--li>
                <a href="#">Right Button Active</a>
            </li--> 
            <li class="has-dropdown"> 
                <a href="#"><i class="fi-burst"></i> Banco</a>
                <ul class="dropdown"> 
                    <li><a href="<?=site_url("banco/nuevo")?>">Nuevo</a></li>
                    <li><a href="<?=site_url("banco")?>">Consultar</a></li>
                </ul>
            </li>
            <li class="has-dropdown"> 
                <a href="#" ><i class="fi-credit-card"></i> Cajero</a> 
                <ul class="dropdown"> 
                    <li><a href="<?=site_url("cajero/nuevo")?>">Nuevo</a></li>
                    <li><a href="<?=site_url("cajero")?>">Consultar</a></li>
                    <li><a href="<?=site_url("cajero/subir")?>">Subir</a></li>                    
                </ul>
            </li> 
        </ul> 
        <!-- Left Nav Section --> 
        <ul class="left"> 
            <li><a href="<?=site_url("cajero/mapa")?>"><i class="fi-map"></i> Mapa</a></li> 
        </ul>
        <ul class="left"> 
            <li><a href="<?=site_url("cajero/cercanos")?>"><i class="fi-share"></i> Cercanos</a></li> 
        </ul>
    </section> 
</nav>