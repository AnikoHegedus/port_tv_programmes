<nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TV programmes from Port</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="navbar-nav nav">
                    <li class="{{Request::is('home') ? 'active' : ''}}">
                        <a href="/public/">Home</a>
                    </li>
                </ul>
            </div> <!-- nav collapse-->
        </div>
    </nav>