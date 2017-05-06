import time
import sys
import _mysql
import random
import string
import re


from selenium import webdriver
from selenium.webdriver.support.ui import Select
import selenium.webdriver.chrome.service as service

try:
	# Check to see if it was added
	db=_mysql.connect('localhost','root','root','paws_db')
	rand_fname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_lname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_mail=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))


	db.query("INSERT INTO adopters (first_name,last_name,cat_count,address,email,created,is_deleted) VALUES(\""+rand_fname+"\",\""+rand_lname+"\",0,\"55 Gato Way\",\""+rand_mail+"@mail.com\",NOW(),true);");
	db.store_result()

	db.query("SELECT id,first_name FROM adopters where last_name=\""+rand_lname+"\" AND email=\""+rand_mail+"@mail.com\"")

	r=db.store_result()

	k=r.fetch_row(1,1)
	a_id = k[0].get('id')


	service = service.Service('D:\ChromeDriver\chromedriver')
	service.start()
	capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

	driver = webdriver.Remote(service.service_url, capabilities)

	driver.set_window_size(sys.argv[1], sys.argv[2]);

	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/adopters/edit/'+a_id);

	name = driver.find_element_by_id('first-name')
	name.clear()
	name.send_keys(rand_fname+rand_lname)

	driver.find_element_by_css_selector('input[type="submit"]').click()

	db.query('SELECT id,first_name FROM adopters where id="'+a_id+'";')
	
	r=db.store_result()
	k=r.fetch_row(1,1)
	check = k[0].get('first_name')
	check = str(check,'utf-8')

	if check == rand_fname + rand_lname:
		print("pass")
	else:
		print("fail")
except Exception as e:
	print(e)
	print("fail")

