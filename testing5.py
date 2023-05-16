from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from time import sleep
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support.ui import Select

# set up the driver
driver = webdriver.Edge()

try:
    # navigate to the login page
    driver.get("http://localhost/shoes/login.php")

    # enter the username
    username_input = driver.find_element(By.ID, "nm")
    username_input.send_keys("athu")

    # enter the password
    password_input = driver.find_element(By.ID, "ps")
    password_input.send_keys("Athul@123")

    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
   

    # submit the form
    submit_button = driver.find_element(By.ID, "subBtn")
    submit_button.click()

    # wait for the page to load
    sleep(5)

    # navigate to the edit profile page
    driver.get("http://localhost/shoes/adminpanel.php")

    # scroll to the bottom of the page
    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
    sleep(2)
    
     # navigate to the edit profile page
    driver.get("http://localhost/shoes/sales_report.php")

      # enter the username
    date1_input = driver.find_element(By.ID, "a")
    date1_input.send_keys("04/01/2023")

    # enter the password
    date2_input = driver.find_element(By.ID, "b")
    date2_input.send_keys("05/01/2023")

    # scroll to the bottom of the page
    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
    sleep(2)

      # submit the form
    submit_button = driver.find_element(By.ID, "c")
    submit_button.click()


    # wait for the page to load
    sleep(5)

    print("-----Sales report Success-----")

except Exception as e:
    print("-----Sales report Failed-----")

finally:
    # close the browser window
    driver.quit()
 