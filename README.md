// This exemple  is a small system of sprot polling. The  goal was what can I do in a 8 houres 
1.	Description
•	Backend:
I created a folder named 'backend'.
In ‘backend’ there is a file ‘admin.php’.
In this file there are a left side menu and content.
In the menu there are 4 buttons, 3 for selection the events and 1 for import JSON file.
In the content, there are all events fetched from data base.
For every event you can click ‘view’ to view all detail of event or ‘X’ to delete.
For adding an event click ‘Add event’ and it will redirect to a form.
In data base there are 2 tables one for events and one for polling. 
•	Frontend:
I created a 3 files ‘index.php’, ’all.php’ and poll.php.
In Index.php there are a slider show, a random poll event and last 10 events fetched from data base and about and contact side.

In index.php,in vote side at right ,there are chart (default empty 0 vote for any event)

1.	Development tools
•	Software
              Photoshop for editing the images
              Sublime Text3 for editing the code
              Xampp local server
              PhpMyadmin to ménage the data base
•	Languages
Html5, css3, Bootstrap
Jquery and plugin (responsiveslides.js, Chart.js )
Php
2.	How to run

•	Import the data base ‘sports_poll’

•	Copy ‘sport’ folder in the server

•	Tape this link /sport/backend/admin.php

•	To import the JSON fle click on ‘import JSON’

•	Tape this link /sports_poll to see the result