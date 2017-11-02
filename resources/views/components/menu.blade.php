<nav id="menu" class="navbar navbar-default">
    <ul class="nav navbar-nav">
        <li class="{{ $current_menu=='preinscription' ? 'active' : '' }}"><a href="/intra/preinscriptions">Pré-inscriptions</a></li>
        <li class="{{ $current_menu=='stagiaire' ? 'active' : '' }}"><a href="/intra/stagiaires">Stagiaires</a></li>
        <li class="{{ $current_menu=='employeur' ? 'active' : '' }}"><a href="/intra/employeurs">Employeurs</a></li>
        <li class="{{ $current_menu=='formateur' ? 'active' : '' }}"><a href="/intra/formateurs">Formateurs</a></li>
        <li class="{{ $current_menu=='module' ? 'active' : '' }}"><a href="/intra/modules">Modules</a></li>
        <li class="{{ $current_menu=='session' ? 'active' : '' }}"><a href="/intra/sessions">Sessions</a></li>
        <li class="{{ $current_menu=='inscription' ? 'active' : '' }}"><a href="/intra/inscriptions">Inscriptions</a></li>
        <li class="{{ $current_menu=='financeur' ? 'active' : '' }}"><a href="/intra/financeurs">Financeurs</a></li>
        <li class="{{ $current_menu=='dataExtraction' ? 'active' : '' }}"><a href="/intra/print/dataExtraction">Extractions</a></li>
    </ul>
</nav>
