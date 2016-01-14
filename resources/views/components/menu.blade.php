<nav id="menu" class="navbar navbar-default">
    <ul class="nav navbar-nav">
        <li class="{{ $current_menu=='pre_inscription' ? 'active' : '' }}"><a href="#">Pré-inscriptions</a></li>
        <li class="{{ $current_menu=='stagiaire' ? 'active' : '' }}"><a href="/stagiaires">Stagiaires</a></li>
        <li class="{{ $current_menu=='employeur' ? 'active' : '' }}"><a href="/employeurs">Employeurs</a></li>
        <li class="{{ $current_menu=='formateur' ? 'active' : '' }}"><a href="/formateurs">Formateurs</a></li>
        <li class="{{ $current_menu=='module' ? 'active' : '' }}"><a href="/modules">Modules</a></li>
        <li class="{{ $current_menu=='session' ? 'active' : '' }}"><a href="/sessions">Sessions</a></li>
        <li class="{{ $current_menu=='inscription' ? 'active' : '' }}"><a href="/inscriptions">Inscriptions</a></li>
        <li class="{{ $current_menu=='financeur' ? 'active' : '' }}"><a href="/financeurs">Financeurs</a></li>
    </ul>
    <form method="get" action="universal_search.php" id="search-form" class="navbar-form navbar-right">
        <div class="form-group">
            <input id="search-input" name="search-input" type="text" placeholder="Recherche universelle" size="28" class="form-control"/>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" /></button>
        </div>
    </form>
</nav>
