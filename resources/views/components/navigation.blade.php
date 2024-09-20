<nav class="container-wide">
    <ul>
        <li @class(['current' => true])>
            <a href="/"><span class="logo"><h1>XYZ</h1></a></span>
        </li>

        <li @class(['current' => false])>
            <a href="">Classement</a>
        </li>

        <li @class(['current' => false])>
            <a href="">+ Contribuer</a>
        </li>
    </ul>

    <ul class="nav-right">
        <li @class(['current' => false])>
            <a href="/profile">Profil</a>
        </li>
        <li>
            <form action="logout" method="post">
                @csrf
                <button type="submit">Se déconnecter</button>
            </form>
        </li>
    </ul>
</nav>