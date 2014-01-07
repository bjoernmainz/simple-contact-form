<?xml version="1.0" encoding="UTF-8" ?>

<form>
    <field>
        <label>Salutation</label>
        <type>select</type>
        <required>True</required>
        <options>salutation</options>
        <maxlength>4</maxlength>
    </field>

    <field>
        <label>Firstname</label>
        <type>input</type>
        <required>True</required>
        <minlength>2</minlength>
        <maxlength>30</maxlength>
    </field>

    <field>
        <label>Lastname</label>
        <type>input</type>
        <required>True</required>
        <minlength>2</minlength>
        <maxlength>30</maxlength>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>


    <!-- If you want to send a confirmation Mail, don't touch this -->
    <!-- //TODO: Configurable -->
    <field>
        <label>EMail</label>
        <type>email</type>
        <maxlength>255</maxlength>
        <required>True</required>
    </field>

    <!-- Input Field with preentered Text -->
    <field>
        <label>Subject</label>
        <type>input</type>
        <maxlength>29</maxlength>
    </field>

    <field>
        <label>Message</label>
        <type>textarea</type>
        <minlength>10</minlength>
        <maxlength>400</maxlength>
        <required>True</required>
        <show_remaining_characters>True</show_remaining_characters>
        <cols>40</cols>
        <rows>8</rows>
        <custom_tests>german_text</custom_tests>
    </field>

    <field>
        <label>Captcha</label>
        <type>captcha</type>
        <required>True</required>
        <maxlength>4</maxlength>
    </field>

    <field>
        <label>Send</label>
        <type>submit</type>
        <language lang="de">Absenden</language>
        <language lang="en">Send</language>
        <maxlength>10</maxlength>
    </field>

</form>