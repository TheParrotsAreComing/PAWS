import time
import sys
import _mysql
import random
import string
import re


from selenium import webdriver
from selenium.webdriver.support.ui import Select
import selenium.webdriver.chrome.service as service

service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

driver = webdriver.Remote(service.service_url, capabilities)
driver.set_window_size(sys.argv[1], sys.argv[2]);

driver.get('http://localhost:8765');
driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
driver.find_element_by_id('password').send_keys('password')
driver.find_element_by_css_selector('input[type="submit"]').click()

driver.get('http://localhost:8765/fosters/add');

f_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(7))
l_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(7))

#First Name
elem = driver.find_element_by_id("first-name");
elem.location_once_scrolled_into_view
elem.send_keys(f_name);

#Last Name
elem = driver.find_element_by_id("last-name");
elem.location_once_scrolled_into_view
elem.send_keys(l_name);

#Email
elem = driver.find_element_by_id("email");
elem.location_once_scrolled_into_view
elem.send_keys(l_name+"@"+f_name+".net");

#Email
elem = driver.find_element_by_id("address");
elem.location_once_scrolled_into_view
elem.send_keys("1234 HomeTown Dr");

#Email
elem = driver.find_element_by_id("exp");
elem.location_once_scrolled_into_view
elem.send_keys("Lorem ipsum et else the ipsump notes with words and other long works with donkeys");

#Email
elem = driver.find_element_by_id("avail");
elem.location_once_scrolled_into_view
elem.send_keys("Lorem ipsum et else the ipsump notes with words and other long works with donkeys");

#Email
elem = driver.find_element_by_id("notes");
elem.location_once_scrolled_into_view
elem.send_keys("Lorem ipsum et else the ipsump notes with words and other long works with donkeys");

#Submit
elem = driver.find_element_by_id("FosterAdd");
elem.location_once_scrolled_into_view
elem.click();

driver.quit()

# Check to see if it was added
db=_mysql.connect('localhost','root','root','paws_db')
db.query('SELECT * FROM fosters where first_name="'+f_name+'" AND last_name="'+l_name+'";')
r=db.store_result()

k=r.fetch_row(1,1)
sql_email = str(k[0].get('email'),'utf-8')

if sql_email == l_name+"@"+f_name+".net":
	print('pass')
else:
	print('fail')

#if sql_email == l_name+"@"+f_name+".net":
	#db.query('DELETE FROM fosters where first_name="'+f_name+'" AND last_name="'+l_name+'";')

