# GiorgioLupo-DeveloperTask
Dev task for job interview
README

Welcome to my application! This application is an input form where users can input their salutation, first name, last name, telephone, and email. These inputs are then written in a table for easy reference.
Getting Started

The first page of the application is index.php, which is mostly made in HTML and CSS. The inputs are then validated via JavaScript (data-validation.js) and sent to a PHP form. The validation checks that the first name and last name fields cannot be left empty, and that the email and telephone fields match a specific format using regular expressions. This validation is done via JavaScript to improve the user experience.

After validation, the inputs are sent to a PHP form (submit.php) for further validation. In this form, the email is checked to ensure it is not already present in the database. If the email is found to be present, the user is sent back to the index.php page. If the email is not present, the data is sent to a database. If the upload is successful, the user is then redirected to output.php, where the inserted data is displayed in a table.

The application uses a combination of CSS, JavaScript, and PHP. I also used Bootstrap to make the design process easier and to avoid spaghetti code.

Please note that this application is not intended for production use and may not meet all safety requirements.
Built With

    HTML
    CSS
    JavaScript
    PHP
    Bootstrap

Authors

Giorgio Lupo

Acknowledgments

    Bootstrap
    JavaScript
    PHP
    CSS
    HTML
