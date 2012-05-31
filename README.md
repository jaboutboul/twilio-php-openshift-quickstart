Twilio PHP + OpenShift Quickstart
=========================
Twilio provides infrastructure APIs for businesses to build scalable, reliable voice and text messaging apps and integrate various communication methods into your software and programs. Twilio allows you to use your existing web development skills, existing code, existing servers, existing databases and existing karma to communication problems quickly and reliably.

You can learn more and sign up for a Twilio account at http://www.twilio.com

Getting (Quickly) Started with Twilio on OpenShift
--------------------
1. Sign up for a Twilio account at http://www.twilio.com. In the account dashboard, note your 'Account SID' and 'Auth Token' (looks like a little key). We will need these later.

2. Sign up for an openshift account at http://openshift.redhat.com/

3. Install the OpenShift Client tools on your machine if you don't have them. You can find more info here: https://openshift.redhat.com/app/getting_started

4. Create an OpenShift PHP application:

	```rhc-create-app -a twilio -t php-5.3 -l $your_login```

5. Add this upstream Twilio Quickstart repo to your app:

	```cd twilio/php
	rm -rf *
	git remote add upstream -m master git://github.com/jaboutboul/twilio-php-openshift-quickstart.git
	git pull -s recursive -X theirs upstream master
	```

6. Let's input our account credentials in the 'credentials.php' file in twilio/php. Copy and paste your Account SID, Auth Token, and a Twilio number you've purchased, or a verified outgoing Caller ID.

7. Push to deploy on OpenShift:

	```git push```

8. We have a sample app in the twilio/php directory 'index.html' and 'send-sms.php', take a look at them if you like. When you load your app, you should be greeted by a form to input your phone number. Once you submit the form the 'send-sms.php' part of the application should run and send you a text message via the Twilio API.

Let's check it out. Load your app at:

	```http://twilio-$your_login.rhcloud.com```

Please send all questions/comments/requests for improvements to this quickstart to jack@twilio.com
