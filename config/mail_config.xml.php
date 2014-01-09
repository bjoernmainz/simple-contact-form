<?xml version="1.0" encoding="UTF-8" ?>

<!--
This is the general mail config file.
If no config file for the form is found
this is the fallback
 -->

<mailconfiguration>
    <server>localhost</server>
    <sender>scf@sha-bang.net</sender>
    <subject>Kontakt: %form_name% %ticket_no%</subject>
    <!-- receivers: comma separated list -->
    <receivers>scf@sha-bang.net</receivers>

    <confirmation_subject lang="de">Ihre Nachricht: %ticket_no%</confirmation_subject>
    <confirmation_subject lang="en">Your Message: %ticket_no%</confirmation_subject>

    <confirmation_text_header lang="de">
        %p% %salutation_sentence%, %/p%
        %p% vielen Dank für Ihre Nachricht.%/p%
        %p% Wir haben diese wie folgt aufgenommen: %/p%
    </confirmation_text_header>

    <confirmation_text_header lang="en">
        %p% Thank you for your message.%/p%
    </confirmation_text_header>

    <confirmation_text_footer lang="de">
        %p% Ihre IP wurde mit %ip% geloggt. %/p%
        %p%Mit freundlichen Grüßen,%/p% SCF-Team
    </confirmation_text_footer>

    <confirmation_text_footer lang="en">
        Your IP has been logged as %ip%.
        %p%With kind Regards,%/p% SCF-Team
    </confirmation_text_footer>

    <salutation_sentence lang="de" sex="Herr">Sehr geehrter Herr %Lastname%</salutation_sentence>
    <salutation_sentence lang="de" sex="Frau">Sehr geehrte Frau %Lastname%</salutation_sentence>
    <salutation_sentence lang="en" sex="Mr.">Dear Mr. %Lastname%</salutation_sentence>
    <salutation_sentence lang="en" sex="Ms.">Dear Ms. %Lastname%</salutation_sentence>

    <hidden_fields_confirmation>E-Mail, Captcha, Terms, Secret, Send</hidden_fields_confirmation>
</mailconfiguration>
