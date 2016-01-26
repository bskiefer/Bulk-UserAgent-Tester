# bulkuseragenttest
Testing bulk user agents to test your website against many bots on the internet by checking the status code.

# How to use?
Enter your website into the form located in index.php
Press submit and results will be processed in test.php

# Increase execution time
There are over 4000 user agents to test and you will need to increase your timeout settings to test them all
Add ini_set('max_execution_time', 300);" (the number represents seconds, 300 seconds = 5 minutes) to the top of test.php
