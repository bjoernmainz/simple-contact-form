<?xml version="1.0" encoding="UTF-8" ?>

<!--

This is a special configuration file.
It will be used for contact_form.

-->


<mailconfiguration>
    <server>localhost</server>
    <sender>bjoern@sha-bang.net</sender>
    <subject>Kontakt: %form_name% %ticket_no%</subject>
    <!-- receivers: comma separated list -->
    <receivers>bjoern@sha-bang.net</receivers>

    <confirmation_subject lang="de">Ihre Nachricht aus %City% hat %ticket_no% erhalten.</confirmation_subject>
    <confirmation_subject lang="en">Your Message from %City% has %ticket_no%</confirmation_subject>

    <confirmation_text_header lang="de">
        %p% %salutation_sentence%, %/p%
        %p% vielen Dank für Ihre Nachricht.%/p%
        %p% Wir freuen uns sehr, daß sich auch Menschen aus %City% für unsere Produkte interessieren.%/p%
        %p% Wir haben diese wie folgt aufgenommen: %/p%
    </confirmation_text_header>

    <confirmation_text_header lang="en">
        %p% Thank you for your message.%/p%
        %p% We are very happy that people from %City% are interested in out products.%p%
    </confirmation_text_header>

    <confirmation_text_footer lang="de">
        %p% Ihre IP wurde mit %ip% geloggt. %/p%
        %p%Mit freundlichen Grüßen,%/p% SCF-Team
    </confirmation_text_footer>

    <confirmation_text_footer lang="en">
        Your IP has been logged as %ip%.
        %p%With kind Regards,%/p% SCF-Team
    </confirmation_text_footer>

    <salutation_sentence lang="de" sex="Herr">Sehr geehrter Herr %Firstname% %Lastname%</salutation_sentence>
    <salutation_sentence lang="de" sex="Frau">Sehr geehrte Frau %Firstname% %%Lastname%</salutation_sentence>
    <salutation_sentence lang="en" sex="Mr.">Dear Mr. %Lastname%</salutation_sentence>
    <salutation_sentence lang="en" sex="Ms.">Dear Ms. %Lastname%</salutation_sentence>


    <hidden_fields_confirmation>E-Mail, Captcha, Terms, Secret, Send</hidden_fields_confirmation>
</mailconfiguration>
