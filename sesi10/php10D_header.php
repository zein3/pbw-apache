<style>
    header {
        width: 100%;
        background-color: black;
    }

    ul {
        display: flex;
        flex-direction: row;
        
    }

    nav ul li {
        padding: 0.4rem 1.3rem;
        list-style-type: none;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
    }

    .active {
        background-color: red;
    }
</style>
<header>
    <nav>
        <ul>
            <li class="active">
                <a href="#">Data Meeting</a>
            </li>
            <li>
                <a href="./php10D_logout.php">Logout</a>
            </li>
        </ul>
    </nav>
</header>