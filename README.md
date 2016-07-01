#Introduction:
Wordpress EasyFAQ is a simple, lightweight plugin made with a very simple purpose, to allow you to make an FAQ section on any Wordpress page within five minutes.
This plugin add's a new custom post type and a shortcode that will generate an accordian displaying your FAQ within a page. Simple and easy to use!.


![Easy FAQ in Action](https://github.com/AllanOcelot/easyfaq/assets/image.png)

#Installation:
To install this plugin, either download and install via wordpress or simply clone the latest release into your plugins folder.

#Use:
Once installed, activate the plugin the wordpress dashboard. When you refresh you will have a new option in your sidebar - FAQs.
FAQs work in the same manner as posts do - Simply add a new FAQ, the title should be the question asked:
 >"How big is the universe?"



 with the content block being the answer:
 >"Pretty big"

To add the Accordian out of the box to an existing page, simply add:

```
[easyFAQ]
```
Anywhere within your content block and the barebones accordian will be added, simple!

If you wish to query the post type, it's name is:
```
FAQ
```

#Feature Planning:
 - Allow users to set the SlideUp and SlideDown speed via options page.
 - Allow users to select theme colours for the Accordian via options page.
 - Allow users to change Query results (Amount of posts / Only recent FAQs etc) via shortcode.
 - Feedback system (Per question? Per FAQ page?)
 - "Ask a new question" - Process, allowing visitors to ask a question and the site owner to respond.


#Notes:
This is a small personal project that I hope others find useful. It's aim was to teach a co-worker git and myself Wordpress plugin development.
This plugin uses [Font Awesome](http://fontawesome.io/) - If you don't have it, you simply won't get icons.
