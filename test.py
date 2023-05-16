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
    username_input.send_keys("amal")

    # enter the password
    password_input = driver.find_element(By.ID, "ps")
    password_input.send_keys("Amal@123")

    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
    sleep(2)

    # submit the form
    submit_button = driver.find_element(By.ID, "subBtn")
    submit_button.click()

    print("-----Login Successful-----");

except Exception as e:
    print("-----Login Failed-----");

finally:
    # close the browser window
    driver.quit()
