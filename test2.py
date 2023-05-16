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
    driver.get("http://localhost/shoes/signup.php")

    # enter the username
    name_input = driver.find_element(By.ID, "first")
    name_input.send_keys("Reshma")


    # enter the username
    username_input = driver.find_element(By.ID, "fifth")
    username_input.send_keys("Reshma")

    # enter the password
    password_input = driver.find_element(By.ID, "sixth")
    password_input.send_keys("Reshma@123")

      # enter the username
    confirmpassword_input = driver.find_element(By.ID, "seventh")
    confirmpassword_input.send_keys("Reshma@123")

    # enter the password
    mobile_input = driver.find_element(By.ID, "second")
    mobile_input.send_keys("7025893710")


  # enter the username
    email_input = driver.find_element(By.ID, "third")
    email_input.send_keys("reshma@gmail.com")

    # enter the password
    address_input = driver.find_element(By.ID, "fourth")
    address_input.send_keys("Reshma House")


    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")  
    sleep(2)

    # submit the form
    submit_button = driver.find_element(By.ID, "btn")
    submit_button.click()

    print("-----Success-----");

except Exception as e:
    print("-----Failed-----");

finally:
    # close the browser window
    driver.quit()
