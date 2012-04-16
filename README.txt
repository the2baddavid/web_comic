Web Comic for the 3rd Project for Web Programming Class

Folder:

modules -> holds persistent pieces of the site.  AKA, the pieces that
are the same on every page

database -> holds files for creating and accessing the database

comics-> holds all the pictures for the web-comic

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

index(home) page
	has latest comic
	has news

browse book page (link next to home button)
	links to page with all the books (cover picture,book title,synopsis)
	! option to add javascript here so that mouse over books will give drop
		down menu to select book

	will link to the page:
~~~~>	browse book chapter (will have ability for each book)

boring browse page (index at bottom)
	shows all comics and chapters and links

hidden admin page
	if users want to add pictures through web not the server then we will need this
	ability to change home page, ability to add comics and books, change news



~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Modules~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
MY WEB COMIC!

~~~~~~~~~~|~~~~~~~~~~~|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
~~~Home~~~|~~~~Books~~|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
~~~~~~~~~~|~~~~~~~~~~~|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Picture						|	news news news news
	of						|	news news news news
	Something					|	news news news news
	or						|	news news news news
	The						|	news news news news
	Latest						|	news news news news
	Comic						|	news news news news
							|	news news news news
							|	news news news news
							|	news news news news
							|	news news news news





admin - index 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


~~~~~~~~~~~~~~~~~~~~~~~~~Database~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

table1 - News
	key
	name of news article
	date stamp
	news 2000 characters should be enough

table2 - comics
	id
	book_name 50 char
        chapter int
	path in server

table3 - images
	key
	path in server

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~