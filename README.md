README - Simple Contact Form Ver. 0.1.0 Alpha not ready for production use

Simple-Contact-Form gives you the possibility to create simple but secure forms in a very simple way without programming knowlegde.

Design Goals:

- simple
- secure
- no programming knowledge for the user
- runs out of the box with PHP 5.3 without extra modules
- if you know how to program php you can write your own tests (see folder custom_tests)

If a user sends the form and all the fields are successfull validated you have four options:

- Send a Mail to you
- Send a confirmation Mail to your customer
- Write the Content to a database (MySQL, more to come)
- Write the content to a CSV-File (Comma Separated Plain Text File)

You can enable or disable all these options. So, if you want to rest set all these settings to 0.
Maybe you will loose some customers but who cares ;-)

On the other hand if you want it on all channels set them to 1 in config/config.xml.

If you want to use a database, SCF will generate the code your you, if it has a problem connecting to the database.
You just have to set write_data_base to 1 and debug has to be set to 1 also.

You can have more than one form.

It uses a in-memory database ;-)

Requirements
------------

- You should have a basic understanding of XML. If you don't have please have a look at config/contact_form_form.xml now.
I think this is pretty self explanatory and now you have a basic understanding of xml. :-)

- A Webserver with PHP 5.3

Quickstart
----------

- Unpack the folder to a web accessable folder
- Call it <address>/simple-contact-form/contact_form.php
- You should see the contact form.

Adjust to your needs
--------------------

- Rename the folder
- Adjust config/config.ini
- Adjust the contact_form_mail.xml or delete it and use the mail_config.xml
- Important: If you want to send a confirmation mail we need the email Field called E-Mail
- If you want to use a salutation in the confirmation mail we need the field Salutation

IMPORTANT: If you change the form, you have to destroy the session in debug mode!

Make your own Form
------------------

Copy the three files contact_form.php, views/contact_form.php and config/contact_form_form.xml, to a new name.
Adjust to your needs.

Create an Input Field
---------------------

Add the field to contact_form_form.xml

Create a Dropdown (select)
--------------------------

Have a look at the example contact_form_form.xml: Countries and Salutation are option lists.
create a .xml in config/ (example.xml). These are the options.
Add the Labelname (e.g. Tickets) to language.xml
Add the fields to your contact_form_form.xml


TODO
-----

3.4.1 prüfe auf datentyp

- Textarea: Optional Remaining Characters
- Input Fields Readonly
- When Parsing XML Check if Label and type exist

