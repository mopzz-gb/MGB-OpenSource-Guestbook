{HEADER}
	
<header class="site-header">
	{TITLE}
</header>

<nav class="main-nav">

    <button class="nav-toggle" aria-label="Menü öffnen">☰</button>

    <ul class="nav-links">
        <li>
            <a href="newentry.php{PARAMLANG_A}" title="{LANG_NEW_ENTRY_DESCR}">
                {LANG_NEW_ENTRY}
            </a>
        </li>
        <li>
            <a href="email.php?id=admin{PARAMLANG_B}" title="{LANG_CONTACT_DESCR}">
                {LANG_CONTACT}
            </a>
        </li>
    </ul>

</nav>

<!-- <nav class="main-nav">
	<a href="newentry.php{PARAMLANG_A}" title="{LANG_NEW_ENTRY_DESCR}">{LANG_NEW_ENTRY}</a> | <a href="email.php?id=admin{PARAMLANG_B}" title="{LANG_CONTACT_DESCR}">{LANG_CONTACT}</a></span>
</nav> -->

<main class="guestbook-content">
	{TEMPLATE_ANNOUNCEMENT_MESSAGE}

	<div class="entry-meta">

		<div class="entry-count">
			{LANG_HOW_MANY_ENTRIES}
		</div>

		<nav class="pagination top">
			{TEMPLATE_SCROLLING_FUNCTION}
		</nav>

	</div>
	
	<section class="entries">
		{TEMPLATE_ENTRIES}
	</section>
	
	<nav class="pagination bottom">
    {TEMPLATE_SCROLLING_FUNCTION}
	</nav>

</main>

{TEMPLATE_FOOTER}