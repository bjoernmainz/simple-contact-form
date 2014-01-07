<?xml version="1.0" encoding="UTF-8" ?>

        <config>
            <general>
                <debug>1</debug>
                <language>en</language>
                <send_mail>0</send_mail>
                <send_confirmation_mail>0</send_confirmation_mail>
                <write_to_database>1</write_to_database>
                <write_to_csv>0</write_to_csv>
                <config_folder>config</config_folder>
                <mail_config>mail_config.xml.php</mail_config>
                <lang_config>language.xml.php</lang_config>
                <strict_checking>1</strict_checking>
                <scf_version>0.1.3</scf_version>
            </general>

            <database>
                <host>localhost</host>
                <database>simple_contact_form</database>
                <user>yourusername</user>
                <password>yoursecretpassword</password>
                <charset>utf8</charset>
            </database>

            <csv>
                <path>/tmp</path>
            </csv>

            <logfile>
                <write_logfile>1</write_logfile>
                <log_file>log/log.txt.php</log_file>
                <user>scf</user>
                <password>12345</password>
            </logfile>

            <captcha>
                <path>images/captcha</path>
                <files>images</files>
                <audio_show>True</audio_show>
                <audio_files>speech</audio_files>
            </captcha>
        </config>
