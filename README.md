# Easy-Captcha
A simple effective captcha. As an example a contact form was designed with it.

![alt text](https://raw.githubusercontent.com/TaskManager91/Easy-Captcha/master/res/captcha.png "example contact form")

## Quickstart
Just check out the repo and copy the contact field to the desired location on your website!

To configure it you only have to enter sender and recipient in the [contact.php](https://github.com/TaskManager91/Easy-Captcha/blob/master/captcha/contact.php "contact.php").

![alt text](https://raw.githubusercontent.com/TaskManager91/Easy-Captcha/master/res/preview.png "example contact form")

## How it works

In [captcha.html](https://github.com/TaskManager91/Easy-Captcha/blob/master/captcha.html "captcha.html") four random numbers are generated with Javascript.

With these four random numbers the [image.php](https://github.com/TaskManager91/Easy-Captcha/blob/master/captcha/image.php "image.php") is called. This returns the captcha image.

When submitting the form, the four random numbers are transmitted to the [contact.js](https://github.com/TaskManager91/Easy-Captcha/blob/master/captcha/contact.js "contact.js"), so that it can be checked whether the generated captcha was typed correctly.

If the captcha is correct, all fields are passed to the [contact.php](https://github.com/TaskManager91/Easy-Captcha/blob/master/captcha/contact.php "contact.php"), which sends them to an e-mail.

![alt text](https://raw.githubusercontent.com/TaskManager91/Easy-Captcha/master/res/flow.png "example contact form")