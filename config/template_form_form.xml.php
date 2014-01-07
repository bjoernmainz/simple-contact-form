<?xml version="1.0" encoding="UTF-8" ?>

<form>
    <field>
        <label>Salutation</label>
        <type>select</type>
        <required>True</required>
        <options>salutation</options>
        <maxlength>4</maxlength>
        <custom_tests>prevent_sql_injection_light</custom_tests>
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

    <field>
        <label>Street</label>
        <type>input</type>
        <maxlength>50</maxlength>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

    <field>
        <label>Zip</label>
        <type>input</type>
        <maxlength>9</maxlength>
        <custom_tests>prevent_sql_injection_light, postcode_de_simple</custom_tests>
    </field>

    <field>
        <label>City</label>
        <type>input</type>
        <maxlength>9</maxlength>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

    <field>
        <label>Country</label>
        <type>select</type>
        <options>countries</options>
        <maxlength>20</maxlength>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

    <!-- If you want to send a confirmation Mail, don't touch this -->
    <!-- //TODO: Configurable -->
    <field>
        <label>E-Mail</label>
        <type>email</type>
        <maxlength>255</maxlength>
        <required>True</required>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

    <!-- Input Field with preentered Text -->
    <field>
        <label>Subject</label>
        <type>input</type>
        <language lang="de">Vorbestellung Karten</language>
        <language lang="en">Preorder Tickets</language>
        <maxlength>29</maxlength>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

    <field>
        <label>Message</label>
        <type>textarea</type>
        <minlength>10</minlength>
        <maxlength>800</maxlength>
        <required>True</required>
        <show_remaining_characters>True</show_remaining_characters>
        <cols>40</cols>
        <rows>8</rows>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

    <field>
        <label>Terms</label>
        <type>terms</type>
        <maxlength>1</maxlength>
        <required>True</required>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

    <field>
        <label>Secret</label>
        <type>hidden</type>
        <language>www.mysite.de</language>
        <maxlength>30</maxlength>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

    <field>
        <label>Captcha</label>
        <type>captcha</type>
        <required>True</required>
        <maxlength>4</maxlength>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

    <field>
        <label>Send</label>
        <type>submit</type>
        <language lang="de">Absenden</language>
        <language lang="en">Send</language>
        <maxlength>10</maxlength>
        <custom_tests>prevent_sql_injection_light</custom_tests>
    </field>

</form>