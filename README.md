Twilio PHP + OpenShift Quickstart
=================================
Twilio provides infrastructure APIs for businesses to build scalable, reliable voice and text messaging apps and integrate various communication methods into your software and programs. Twilio allows you to use your existing web development skills, existing code, existing servers, existing databases and existing karma to communication problems quickly and reliably.

You can learn more and sign up for a Twilio account at http://www.twilio.com

Getting (Quickly) Started with Twilio on OpenShift
--------------------------------------------------
If you have not yet done so, sign up for a Twilio account at http://www.twilio.com. In the account dashboard, note your 'Account SID' and 'Auth Token' (looks like a little key). You will need these later.

If you have not yet done so, sign up for an OpenShift account at http://openshift.redhat.com. Make a note of your login and namespace.  You need your login to create your application, and you need the namespace to browse to it after it is running.

Install the OpenShift Client tools on your machine if you don't have them. You can find more info here: https://openshift.redhat.com/app/getting_started

Create an OpenShift PHP application:

	rhc app create -a twilio -t php-5.3 -l $your_login

Add this upstream Twilio Quickstart repo to your app:

	cd twilio/php
	rm -rf *
	git remote add upstream -m master git://github.com/jaboutboul/twilio-php-openshift-quickstart.git
	git pull -s recursive -X theirs upstream master

Put your account credentials in the 'credentials.php' file in twilio/php. Copy and paste your Account SID, Auth Token, and a Twilio number you've purchased, or a verified outgoing Caller ID.

	vi credentials.php

	git add credentials.php
	git commit -m "add twilio account credentials"

Push to deploy on OpenShift:

	git push

If for some reason you have trouble pushing to OpenShift after you've added the upstream repo you can do:

	git push -u origin master

The sample app is in the twilio/php directory 'index.html' and 'send-sms.php', take a look at them if you like. When you load your app, you should be greeted by a form to input a phone number. Once you submit the form the 'send-sms.php' part of the application should run and send a text message to that phone via the Twilio API.

Let's check it out. Browse to your app at:

	http://twilio-$your_namespace.rhcloud.com

Please send all questions/comments/requests for improvements to this quickstart to jack@twilio.com or [@jackfoundation](http://www.twitter.com/#!/jackfoundation).

If you have any questions about OpenShift itself, email them to openshift@redhat.com.
