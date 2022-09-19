---
description: Default layout

'[session]':
    security: all

'[staticMenu mainMenu]':
    code: main-menu

'[staticMenu footerMenu]':
    code: footer-menu

'[newsletter]': {  }

'[localePicker]':
---
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ App::getLocale() }}" class="h-100">
<head>
    @partial('head')
</head>
<body class="d-flex flex-column h-100 {{ $this->page->bodyClass }}">

    <header class="header">
        @partial('header')
    </header>

    <main role="main">
        <div id="page-wrapper">
	    <div id="locale">
                <p>
                    <a href="#" data-request="localePicker::onSwitchLocale" data-request-data="locale: 'en'">English</a> |  
                    <a href="#" data-request="localePicker::onSwitchLocale" data-request-data="locale: 'es_CR'">Español</a>
                </p>
            </div>
            @page
        </div>
    </main>

    <footer class="footer mt-auto">
        @partial('footer')
    </footer>
    <div id="notification">
        @partial('flash')
    </div>
    @partial('eucookiebanner')
    @partial('scripts')
</body>
</html>
